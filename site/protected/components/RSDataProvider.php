<?php

class RSDataProvider extends CSqlDataProvider
{
	const mark = '/*--mark--*/';
	/**
	 *
	 * @var RSCriteria
	 */
	public $_criteria;
	
	public $_order;
	/**
	 * the model used to query the database
	 * 
	 * @var RSRecordModel
	 */
	public $model = null;
	/**
	 * the name of the model to retriev
	 * @var string
	 */
	public $modelClass = '';
	/**
	 * 
	 * @param mixed $modelClass the model class ("Post") or the model instance Post::model()
	 * @param type $config
	 */
	public function __construct($modelClass,$config = array()) 
	{
		if (is_string($modelClass)) {			
			$this->modelClass = $modelClass;
			$this->model = RSRecordModel::model($this->modelClass);
							
		} else {
			$this->model = $modelClass;
			$this->modelClass = get_class($modelClass);
		}
		$this->setId($this->modelClass);
		parent::__construct('', $config);
	}
	
	/**
	 * set the criteria by converting the parts of the criteria to an SQL statement
	 * filling in $sql and $params
	 * 
	 * 
	 * @param RSCriteria $value
	 */
	public function setCriteria($value)
	{
		$firstField = '';
		$master = 'a';			
		$orderFields = is_array($this->_order) ? $this->_order : array();

		$this->_criteria = $value;
		$this->params = $this->_criteria->params;		
		// rebuild the criteria
		if ($this->_criteria->links == array()) {
			if ($this->_order == array()) {
				$this->sql = 'SELECT DISTINCT a.resource as id FROM resource_data a '.self::mark.' WHERE a.resource > 0 ';
			} else { 
				// build the order array fields
        $sqlFields = 'SELECT DISTINCT a.resource as id';
				$sql = '';
				$order = '';
				foreach ($this->_order as $step) {
					if ($step['column'] == 'id') {
						$order .= ', '.$master.'.resource '.$step['direction'];
            $sqlFields .= ', '.$master.'.resource ';
					} elseif ($step['column'] == 'creation_date') {
						$order .= ', ba.creation_date '.$step['direction'];
            $sqlFields .= ', ba.creation_date ';
					} else {
						$sql .= ' LEFT JOIN resource_data '.$step['key'].' ON ('.$master.'.resource = '.$step['key'].'.resource AND '.$step['key'].'.resource_type_field='.$this->model->nameToId($step['column']).')'; 
						$order .= ', '.$step['key'].'.value '.$step['direction'];
            $sqlFields .= ', '.$step['key'].'.value ';
					}	
				}
				$this->sql = $sqlFields.' FROM resource_data a '.self::mark.' INNER JOIN resource ba ON (a.resource > 0 AND a.resource = ba.ref AND ba.resource_type='.$this->model->typeId.') '.$sql.' ORDER BY '.substr($order, 2);
			}
		} else {
			// RC8: must filter by a comma on the first place
			$keys = array_keys($this->params);
      $sqlFields = 'SELECT DISTINCT a.resource as id'; 
			foreach ($this->_criteria->links as $link) {
				if (isset($orderFields[$link['column']])) {
					$orderFields[$link['column']]['masterKey'] = $link['key'];
				}
				if ($firstField == '') {
					$firstField = $this->model->nameToId($link['column']);
					$sql = ' FROM resource_data a '.self::mark;
				} else {
					// v1.10: if it's an OR it should be an LEFT join. But
					// does it still work on the AND. First test show YES, but......
					//$sql .= ' INNER JOIN resource_data '.$link['key'].' ON ('.$master.'.resource = '.$link['key'].'.resource AND '.$link['key'].'.resource_type_field='.$this->model->nameToId($link['column']).')';
					$sql .= ' LEFT JOIN resource_data '.$link['key'].' ON ('.$master.'.resource = '.$link['key'].'.resource AND '.$link['key'].'.resource_type_field='.$this->model->nameToId($link['column']).')';
				}
				// RC8 fix it
				$p = array_shift($keys);
				if ($p && $this->model->hasDataComma($link['column'])) {
					$this->params[$p] = ','.$this->params[$p];
				}
			}	
			$order = '';
			foreach ($orderFields as $field) {
				if (isset($field['masterKey'])) {	// field is also used as filter
					if ($field['column'] == 'id') {
						$order .= ', '.$field['masterKey'].'.resource '.$field['direction'];
            $sqlFields .= ', '.$field['masterKey'].'.resource ';
					} elseif ($field['column'] == 'creation_date') {
						// creation_date is in resource not resource_data
						$order .= ', ba.creation_date '.$step['direction'];		
						$sql .= ' LEFT JOIN resource ba ON (a.resource = ba.ref)';
            $sqlFields .= ', ba.creation_date ';
					} else {
						$order .= ', '.$field['masterKey'].'.value '.$field['direction'];
            $sqlFields .= ', '.$field['masterKey'].'.value ';
					}	
				} else { // field not used as filter
					if ($field['column'] == 'id') {
						$order .= ', '.$master.'.resource '.$field['direction'];
            $sqlFields .= ', '.$master.'.resource ';
					} elseif ($field['column'] == 'creation_date') {
						$order .= ', ba.creation_date '.$field['direction'];						
						$sql .= ' LEFT JOIN resource ba ON (a.resource = ba.ref)';						
            $sqlFields .= ', ba.creation_date ';
					} else {
						$sql .= ' LEFT JOIN resource_data '.$field['key'].' ON ('.$master.'.resource = '.$field['key'].'.resource AND '.$field['key'].'.resource_type_field='.$this->model->nameToId($field['column']).')';
						$order .= ', '.$field['key'].'.value '.$field['direction'];
            $sqlFields .= ', '.$field['key'].'.value ';
					}	
				}
			}
			$sql .= ' WHERE '.$master.'.resource > 0  AND '.$master.'.resource_type_field='.$firstField.' AND '.$this->_criteria->condition;
			$this->sql = $sqlFields.$sql.' '.(($order != '') ? (' ORDER BY '.substr($order, 2)): '');			
		}	
	}
	/**
	 * the current criteria
	 * 
	 * @return RSCriteria
	 */
	public function getCriteria()
	{
		return $this->_criteria;
	}

	public function setOrder($value)
	{
		$order = explode(',', $value);
		$this->_order = array();
		$l = 0;
		foreach ($order as $o) {
			$names = explode(' ', trim($o));
			$this->_order[$names[0]] = array(
					'column' => $names[0], 
					'direction' => isset($names[1]) ? $names[1] : 'ASC',
					'key' => 'a'.chr(ord('a') + $l),
			);
			$l++;
		}
		// rebuild the criteria
		$this->criteria = $this->_criteria;
	}
	public function getOrder()
	{
		return $this->_order;
	}
	/** 
	 * overloaded verion so filtering and ordering is still the same
	 * 
	 * @return array of record arrays
	 */
	protected function fetchData()
	{
		if (!($this->sql instanceof CDbCommand)) {
			$db = $this->db===null ? Yii::app()->db : $this->db;
			$command = $db->createCommand($this->sql);
		}	else {
			$command = clone $this->sql;
		}	

		/**
		if(($sort = $this->getSort()) !== false) {
			$order = $sort->getOrderBy();
			if(!empty($order)) {
				if(preg_match('/\s+order\s+by\s+[\w\s,\.]+$/i',$command->text))
					$command->text .= ', '.$order;
				else
					$command->text .= ' ORDER BY '.$order;
			}
		}
		 * 
		 */

		if(($pagination = $this->getPagination()) !== false) 	{
			$pagination->setItemCount($this->getTotalItemCount());
			$limit = $pagination->getLimit();
			$offset = $pagination->getOffset();
			$command->text=$command->getConnection()->getCommandBuilder()->applyLimit($command->text,$limit,$offset);
		}

		foreach($this->params as $name=>$value)
			$command->bindValue($name, $value);

		$ids = $command->queryAll();
		$records = array();
		$className = $this->modelClass;
		foreach ($ids as $id) {
			$rec = $className::model()->findByPk($id['id']);
			if ($rec) {
				$records[] = $rec;	
			}
		}
		return $records;
	}

	/** 
	 * returns the number of rows found by the criteria for the pager
	 * 
	 * @return integer
	 */
	protected function calculateTotalItemCount()
	{
		// in the sql is a mark. replace previous data with the count function
		$db = $this->db===null ? Yii::app()->db : $this->db;
		$s = explode(self::mark, $this->sql);
		
		$command = $db->createCommand('SELECT COUNT(DISTINCT a.resource) as cnt FROM resource_data a '.$s[1]);	
		foreach($this->params as $name=>$value)
			$command->bindValue($name,$value);

		$row = $command->queryRow();
		return $row['cnt'];
		
	}
}
