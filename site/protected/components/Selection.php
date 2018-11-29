<?php
/**
 * a selection is a bookmark list in mySQL. 
 * this is a structure of:
 *    guid
 *    id		(the selected record)
 *    order_1
 *    order_2..order_10
 * 
 * This structure can be used to order the records
 * 
 * JSON format of the report:
 *	 model : what to select
 *   report: the order and grouping and fields to show
 *   select: the query to run
 *   name:   the name of the report
 * 
 * select: array of
 *		- value			: first char is compare (see @sqlCompare), then the text
 *		- attribute : the field to look in
 *		- joinTable : the name of the table to join. It's always a left join	
 *		- joinWhere : the where statement to join. master id = t.id
 * 
 * report:
 *    - order			: the grouping and order definition
 *		- fields		: what fields to export
 * 
 * report.order is an array of fields to group/order the information on
 *		- attribute		: which field to use
 *		- label				: what text is displayed (for translations)
 *		- order				: [asc|desc|group] the order to use
 *		- fields			: array of fields to show in the header of the group
 *										{ attribute, label }
 * 
 *	report.fields is an array of attribute name. (should be of a structure)	
 * 
 * 
 * 
 */

class Selection extends CComponent
{
	const MAX_ORDER = 10;
	const MAX_STORE = 20;
	
	public  $selectTable = false;
	public  $selectAttribute = 'id';	// the attribute to select
	public  $modelClass = false;      // classname used for translation
	private $_model = false;					// the model of modelclass
	
	public $guid = false;
	
	private $_selectionJson = false;
	private $_query = false;
	private $_sqlSelect;
	
	protected $_params;
	protected $_fields;
	protected $_selectJoin; // a [alias] => array('tablename' =>, 'inner' =>, 'condition')
	
	protected $_orderFields;
	protected $_orderJoin;
	
	protected $_storeFields;	// fields temp store
	
	public function __construct($definition = false) {
		if (is_array($definition)) {
			Yii::app()->session['selection'] = CJSON::encode($definition);
		} elseif (is_string($definition)) {
			Yii::app()->session['selection'] = $definition;
		} 
		$this->init();			
	}	
	public function init()
	{
		if (isset(Yii::app()->session['selection'])) {
			$this->json = Yii::app()->session['selection'];
		}
	}
	
	/**
	 * set/get the string returned by the interface to create the selection
	 * 
	 * @return string
	 */
	public function getJson()
	{
		return $this->_selectionJson;
	}
	public function setJson($value)
	{
		$this->_selectionJson = $value;
		$this->_query = CJSON::decode($value);
		Yii::app()->session['selection'] = $value;
			
		if ($this->selectTable === false ) {
			throw new CDbException(Yii::t('app', 'The selectTable should be set'));
		}
	}
	
	public function getQuery()
	{
		return $this->_query;
	}
	public function getReport()
	{
			return $this->_query;
	}
	
	public function getOrderDefinition() 
	{
		if (isset($this->_query['report']) && isset($this->_query['report']['order'])) {
			return $this->_query['report']['order'];
		}
		return array();
	}
	public function getFieldDefinition() 
	{
		if (isset($this->_query['report']) && isset($this->_query['report']['fields'])) {
			return $this->_query['report']['fields'];
		}
		return array();
	}
	
	/**
	 * return the select part of the sql-insert statement for debugging
	 */
	public function getSelectSql()
	{
		return $this->_sqlSelect;
	}
	public function getSelectParams()
	{
		return $this->_params;
	}
	public function getSelectCount()
	{
		$sql = 'SELECT count(id) as cnt FROM selected_item WHERE guid=:guid';
		$cmd = Yii::app()->db->createCommand($sql);
		$cmd->bindParam(':guid', $this->guid);
		return $cmd->queryScalar();
	}
	
	public function getModel() 
	{
		if ($this->_model === false) {
			$m = $this->modelClass;
			$this->_model = new $m();
		}
		return $this->_model;
	}
	
	public function run()
	{
		if ($this->guid === false) {
			throw new CDbException(Yii::t('app','There is no GUID active for the selection'));
		}
		if ($this->_query === false) {
			return array();
		}
		$this->buildSelection();
		return $this->query();
	}
	
	/**
	 * build the query builder and runs it
	 * 
	 */
	protected function query()
	{
		// remove the existing ones
		$cmdDel = Yii::app()->db->createCommand('DELETE FROM selected_item WHERE guid=:guid');
		$cmdDel->bindValues(array(':guid' => $this->guid));
		$cmdDel->execute();
		
		// build the sql
		$sql = 'INSERT IGNORE INTO selected_item (guid, item_id';
		$l = 1;		
		foreach ($this->_orderFields as $field) {
			$sql .= ', order_'.$l;
			$l++;
			if ($l > self::MAX_ORDER) {
				throw new CDbException(Yii::t('app', 'The selection has to many fields in the order'));
			}
		}
		foreach ($this->_storeFields as $field) {
			$sql .= ', field_'.$l;
			$l++;
			if ($l > self::MAX_STORE) {
				throw new CDbException(Yii::t('app', 'The selection has to many fields'));
			}			
		}		
		$sql .= ') ';
		// make the select seperate for debugging		
		$this->_sqlSelect = "SELECT '".$this->guid."', t.".$this->selectAttribute;
		foreach ($this->_orderFields as $field) {
			if ($this->modelClass) {
				$this->_sqlSelect .= ', '.$this->model->translateField($field['attribute']);
			} else {				
				$this->_sqlSelect .= ', '.$field['attribute'];
			}	
		}
		foreach ($this->_storeFields as $field) {
			if ($this->modelClass) {
				$this->_sqlSelect .= ', '.$this->model->translateField($field['attribute']);
			} else {				
				$this->_sqlSelect .= ', '.$field['attribute'];
			}	
		}
		
		
		$this->_sqlSelect .= ' FROM '.$this->selectTable.' t';		
		// building the join for the select
		if (count($this->_selectJoin))  {
			$statement = '';
			foreach ($this->_selectJoin as $alias => $join) {
				$statement .= ' '.(isset($join['inner']) && $join['inner'] ? 'INNER JOIN ': 'JOIN ').$join['tablename'].' '. $join['joinRef']. ' ON ('.$join['condition'].')';
			}
			$this->_sqlSelect .= $statement;
		}
		if (count($this->_fields) > 0) {
			$this->_sqlSelect .= ' WHERE ';
			$where = '';				
		 	foreach ($this->_fields as $field) {
				$where  .= ' AND ('.$field.')';
			}
			$this->_sqlSelect .= substr($where,5);			
		} 	
		$sql .= $this->_sqlSelect;
		$cmd = Yii::app()->db->createCommand($sql);
		if (count($this->_params > 0)) {
			$cmd->bindValues(
					$this->_params);
			$var = array();
			$val = array();
			foreach ($this->_params as $key => $param) {
				$var[] = $key;
				$val[] = "'".$param."'";
			}
			$this->_sqlSelect = str_replace($var, $val, $this->_sqlSelect);
			
		}
		// add them to the db
		// $sql = $cmd->getText();
	//	$query = $cmd->getText();
		$cmd->execute();
		return true;
	}
	
	/**
	 * cleans the definition so all keys are set to the defaults
	 * 
	 * @param array $definition
	 * @return array
	 */
	protected function cleanDefinition($definition)
	{
		if (!isset($definition['value'])) {
			$definition['value'] = '';
		}
		if (!isset($definition['compare'])) {
			$definition['compare'] = '';
		}
		if (!isset($definition['attribute'])) {
			$definition['attribute'] = '';
		}
		return $definition;
	}
	
	/**
	 * builds the structure of the sql statement
	 */
	protected function buildSelection()
	{
		$this->queryBegin();
		if (isset($this->_query['select'])) {
			foreach ($this->_query['select'] as $definition) {
				$def = $this->cleanDefinition($definition);
				if (!empty($def['attribute']) && !empty($def['value'])) {
					$this->queryAdd($def['attribute'], $def );
				}	
			}
		}
		if (isset($this->_query['report']) && isset($this->_query['report']['order'])) {
			foreach ($this->_query['report']['order'] as $definition) {
				if (isset($definition['attribute'])) {
					$this->queryAddOrder($definition['attribute'], $definition);
				}	
				if (isset($definition['fields'])) {
					foreach ($definition['fields'] as $field) {  
						$this->queryAddField($field['attribute']);
					}
				}
			}
		}
		if (isset($this->_query['report']) && isset($this->_query['report']['fields'])) {
			foreach ($this->_query['report']['fields'] as $field) {  
				$this->queryAddField($field);
			}			
		}
		
		
		$this->queryEnd(); 
	}
	/**
	 * start the query builder cleaning all up
	 */
	protected function queryBegin()
	{
		$this->_params = array();
		$this->_fields = array();
		$this->_selectJoin = array();
		$this->_orderFields = array();
		$this->_orderJoin = array();
		$this->_storeFields = array();
	}
	/**
	 * adds an AND statement to the query
	 * @param string $attribute
	 * @param array $definition
	 */
	protected function queryAdd($attribute, $definition)
	{
		// should solve:  t1.value_id = :value_1
		// but also       t1.value LIKE CONCAT_WS('','%',:value_1,'%')
		// and also       t1.value BETWEEN :value_1 AND :other_value_1
		$this->_fields[$attribute] = $attribute.' '.$this->sqlCompare($definition, ':'.$attribute);
		$this->_params[':'.$attribute] = $definition['value'];		
	}
	
	/**
	 * create the definition to fill the order fields
	 * 
	 * @param string $attribute
	 * @param array $definition
	 */
	protected function queryAddOrder($attribute, $definition)
	{
		$this->_orderFields[$attribute] = array(
			'attribute' => $attribute,	
			'group' => isset($definition['group']) && $definition['group'] ? 1 : 0,  // OLD CONSTRUCTION
			'order' => isset($definition['order']) && $definition['order'] ? 1 : 0				
		);	
	}
	
	protected function queryAddField($attribute)
	{
		return; /* FOR A LATER VERSION */
		$this->_storeFields[$attribute] = array(	// will auto remove duplicates
			'attribute' => $attribute	
		);	
	}
	
	/**
	 * retrieves the compare 'sign' out of the definition
	 * 
	 * WATCH OUT: HAS SIDE EFFECT: the $definition['value'] can change because the compare is removed
	 * 
	 * 
	 * @param array $defintion
	 * @return string 
	 * @throws CDbException
	 */
	protected function sqlCompare(&$definition, $attributeRef)
	{
		if (empty($definition['compare']) || $definition['compare'] == '?') { // set it by the first value in the field
			$c1 = substr($definition['value'],0,1);
			$c2 = substr($definition['value'],0,2);
			switch($c1) {
				case '=' : 
							$definition['compare-state'] = '=';
							$definition['value'] = substr($definition['value'],1);
							break;
				case '<' : 
							if ($c2 == '=') {
								$definition['compare-state'] = '<=';
								$definition['value'] = substr($definition['value'],2);
							} else {
								$definition['compare-state'] = '<';
								$definition['value'] = substr($definition['value'],1);
							}
							break;
				case '>' : 
							if ($c2 == '=') {
								$definition['compare-state'] = '>=';
								$definition['value'] = substr($definition['value'],2);
							} else {
								$definition['compare-state'] = '>';
								$definition['value'] = substr($definition['value'],1);
							}					
							break;
				case '!' : 
							$definition['compare-state'] = 'not-contains';				
							$definition['value'] = substr($definition['value'],1);
							break;
				case '%' : 
							$definition['compare-state'] = 'contains';					
							$definition['value'] = substr($definition['value'],1);
							break;
				case '$' : 
							$definition['compare-state'] = 'begins';					
							$definition['value'] = substr($definition['value'],1);
							break;
					
				case '\\' : // literal, just remove it
							$definition['value'] = substr($definition['value'],1);
							break;
				default :
					
					if (Util::strposEscape($definition['value'], '-')) {
						$definition['compare-state'] = 'range';					
						$values = explode('-', $definition['value']);
						$definition['value'] = false;							
						if (isset($values[0])) {
							$definition['value'] = $values[0];
						} else {
							$definition['compare-state'] = '=';
						}
						if (isset($values[1])) {
							$this->_params[$attributeRef.'_max'] = $this->sqlValue($definition['attribute'], trim($values[1])); // add an extra attribute with -1 extension
						} else {
							$definition['compare-state'] = '=';
						}						
					} else {
						$definition['compare-state'] = 'contains';					
					}	
			}			
		} else {
			$definition['compare-state'] = $definition['compare'];
		}
		// remove the possible space between the compare and the text
		
		$definition['value'] = trim($definition['value']);
		
		switch ($definition['compare-state']) {
			case '=' : return '= '.$attributeRef;
			case '>=' : return '>=' .$attributeRef;
			case '>' : return '>' .$attributeRef;
			case '<=' : return '<='.$attributeRef;
			case '<' : return '<'.$attributeRef;				
			case 'contains' : return 'like CONCAT_WS("","%",'.$attributeRef.',"%")';	
			case 'begins' : return 'like CONCAT_WS("", "%",'.$attributeRef.')';	
			case 'not-contains' : return 'not like CONCAT_WS("","%",'.$attributeRef.',"%")';	
			case 'range' : return 'between '.$attributeRef.' and '.$attributeRef.'_max';	
			default : throw new CDbException(Yii::t('app', 'Unknown compare ({compare}}', array('{compare}' => $definition['compare-state'])));
		}
	}
	/**
	 * return the value part or the compare
	 * 
	 * @param string $attribute
	 * @param array $defintion
	 * @return type
	 */
	/*
	protected function sqlValue($attributeRef, $definition)
	{
		switch ($definition['compare-state']) {			
			case 'begins'   :
					$this->_params[$attributeRef] = 'CONCAT_WS("", "%",'.$definition['value'].')';
					break;				
			case 'contains' :
					$this->_params[$attributeRef] = 'CONCAT_WS("", "%",'.$definition['value'].',"%")';;
					break;
			case 'not-contains' :  // ERROR
					$this->_params[$attributeRef] = 'CONCAT_WS("", "%"'.$definition['value'].',"%")';
					break;
			default :	
					$this->_params[$attributeRef] = $definition['value'];
					break;
		}
		return $attributeRef;	
	}
	 * 
	 */
	/**
	 * End process the value
	 * @param type $attribute
	 * @param type $value
	 * @return string
	 */
	
	protected function sqlValue($attribute, $value, $model = null) {
		return $value;
	}
	/**
	 * return the build sql statement
	 * @return string
	 */
	protected function queryEnd()
	{
		$sql = '';
		foreach ($this->_fields as $field) {
			$sql .= ' AND '.$field;
		}
		return substr($sql, 5);
	}
	
	/**
	 * create the base model and return it
	 * @param integer $id
	 */
	public function createModel($id)
	{
		$class = $this->_query['model'];
		return $class::model()->findByPk($id);
	}
	
	/**
	 * convert the array into a tree based on order_1 till order_n
	 * 
	 * @param Array $records [id, order_1, .. order_n
	 * @return Array Current level array
	 */
	protected function groupedBuild($records, $level, &$index, &$return)
	{
		if (count($records) == 0 ) return;
		
		// if we are the end level
		if (!isset($records[$index]['order_'.($level + 1)])) {
			$levelKey = 'order_'.$level;
			$current = $records[$index][$levelKey];
			$result = array();
			while ($index < count($records)) {
				if ($current == $records[$index][$levelKey]) {
					// get the fields out of this record and store them in $result
					$result[] = $this->createModel($records[$index]['id']);				
					$index++;
				} else {  // no we are on the next level key
					break;
				}
			}	
			// result is now the array of endnode records
			$return[$current] = $result;
		} elseif ($level == 0) {  //root level
			$return = array();
			while ($index < count($records)) {
				$this->groupedBuild($records, $level + 1, $index, $return);			
			}				
		} else {
			// loop one level deeper
			$levelKey = 'order_'.$level;
			$current = $records[$levelKey];
			$result = array();
			while ($index < count($records)) {
				if ($current == $records[$index][$levelKey]) {
					// get the fields out of this record and store them in $result
					$this->groupedBuild($records, $level + 1, $index, $result);			
					$index++;
				} else {  // no we are on the next level key
					break;
				}
			}	
			// result is now the array of endnode records
			$return[$current] = $result;						
		}		
	}
	
	public function search($page=-1, $options=array())
	{
		$defaults = array_merge( array(
				'itemsPerPage' => 40,
				'group' => false,							// group the information 
			),$options		
		);
		$order = '';
		if (isset($this->_query['order'])) {
			$l = 1;
			foreach ($this->_query['order'] as $attribute => $definition) {
				$order .= ', order_'.$l.(isset($definition['order']) && $definition['order'] == false ? ' desc' : ' asc'); 
				$l++;
			}
			$order = substr($order,2);
		}
		$cmd = Yii::app()->db->createCommand()
						->from('selected_item')
						->where('guid=:guid', array(':guid' => $this->guid))
						->order($order);
		// list the order fields in the sql statement
		if ($defaults['group'] && isset($this->_query['order'])) {
			$sql = '';
			$l = 1;
			foreach ($this->_query['order'] as $field) {
				if (isset($field['group']) && $field['group']) {
					$sql .= ', order_'.$l;
				}
				$l++;
			}
			if ($sql != '') {
				$cmd->select('item_id as id, '.$sql);				
			} else {
				$defaults['group'] = false;
				$cmd->select('item_id as id');
			}
		} else {
			$defaults['group'] = false;
			$cmd->select('item_id as id');
		}
		
		if ($page == 0) {
			$cmd->limit($defaults['itemsPerPage']);
		} elseif ($page != -1) {
			$cmd->limit($defaults['itemsPerPage'], $page * $defaults['itemsPerPage']);
		}	
		$items = $cmd->queryAll();
//		$query = $cmd->getText();
		if ($defaults['group']) {
			$index = 0;
			$result = array();
			$this->groupedBuild($items, 0, $index, $result);
		} else {
			foreach ($items as $item) {
				$result[] = $this->createModel($item['id']);				
			}
		}	
		return $result;
	}	
	
	/**
	 * build the sql statement used to get the records in to array
	 * 
	 * @return CDbCommand
	 */
	protected function buildReportSql()
	{
		$order = '';
		if (isset($this->_query['report']) && isset($this->_query['report']['order'])) {
			$l = 1;
			foreach ($this->_query['report']['order'] as $attribute => $definition) {
				$order .= ', order_'.$l.(isset($definition['order']) && $definition['order'] == false ? ' desc' : ' asc'); 
				$l++;
			}
			$order = substr($order,2);		
		}	
		$cmd = Yii::app()->db->createCommand()
						->from('selected_item')
						->where('guid=:guid', array(':guid' => $this->guid))
						->order($order);
		// list the order fields in the sql statement
		$sql = '';
		if (isset($this->_query['report']) && isset($this->_query['report']['order'])) {		
			$l = 1;
			foreach ($this->_query['report']['order'] as $field) {
				if (isset($field['order']) && $field['order'] == 'group') {
					$sql .= ', order_'.$l;
				}
				$l++;
			}
		}	
		if (isset($this->_query['report']) && isset($this->_query['report']['fields'])) {		
			$l = 1;
			foreach ($this->_query['report']['fields'] as $field) {
				$sql .= ', field_'.$l;
				$l++;
			}
		}	
		
		if ($sql != '') {
			$cmd->select('item_id as id, '.$sql);				
		} else {
			$cmd->select('item_id as id');
		}
		return $cmd;
	}
	
	/**
	 * returns the sql statement that list the record in the report
	 * 
	 * @return string
	 */
	public function reportSql() 
	{
		$cmd = $this->buildReportSql();
		return str_replace(array("\n", ':guid'),array(' ',"'".$this->guid."'"), $cmd->getText());
	}
	
	/**
	 * returns the array with data for the report
	 * 
	 * @return array
	 */
	public function selectionToArray()
	{
		$cmd = $this->buildReportSql();
		return $cmd->queryAll();
	}
	
}
