<?php

class RSLogging extends CModel
{
	const COMP_NONE = 'none';
	const COMP_LIKE = 'like';
	const COMP_IS =   'is';
	const COMP_DATE = 'date';
	
	public $loggingTypes = array('a','b','c','d','e','E','l','m','p','r','t','u','U','x'); 	
	
	private $_orderByOptions = array(
		'date' => 'l.date DESC',	
		'action' => 'l.type, l.date DESC',
		'id' => 'l.resource, l.date DESC',
		'title' => 'f.value',
		'user' => 'u.username, l.date DESC',	
	);
	
	private $_fieldDef = array(
			'resourceTypeId' => array(
				'compare' => RSLogging::COMP_NONE	
			),
			'orderBy' => array(
				'compare' => RSLogging::COMP_NONE	
			),
			'date' => array(
				'compare' => RSLogging::COMP_DATE,
				'field' => 'l.date',	
			),
			'id' => array(
				'compare' => RSLogging::COMP_IS,
				'field' => 'l.resource',	
			),
			'title' => array(
				'compare' => RSLogging::COMP_LIKE,
				'field' => 'f.value',
				'useField' => true,			// count with the field = 8/xx for the filter
			),
			'user'=> array(
				'compare' => RSLogging::COMP_IS,
				'field' => 'l.user',	
			),
			'fieldId'=> array(
				'compare' => RSLogging::COMP_IS,	
				'field' => 'l.resource_type_field',	
			),
			'action' => array(
				'compare' => RSLogging::COMP_IS,
				'field' => 'l.type',	
			),
	);
	private $_data = array();
	
	public function __construct() {
		$this->orderBy = 'date';
	}
	
	public function attributeNames()
	{
		return array_keys($this->_fieldDef);
	}
	
	public function __get($name) 
	{
		if (isset($this->_fieldDef[$name])) {
			return isset($this->_data[$name]) ? $this->_data[$name] : null;
		} else {
			return parent::__get($name);
		}	
	}
	public function __set($name, $value) 
	{
		if (isset($this->_fieldDef[$name])) {
			$this->_data[$name] = $value;
		} else {
			parent::__set($name, $value);
		}	
	}
	public function __isset($name)
	{
		if (isset($this->_fieldDef[$name])) {
			return true; //isset($this->_data[$name]);
		} else {
			return parent::__isset($name);
		}
	}
	public function __unset($name) {
		if (isset($this->_fieldDef[$name])) {
			unset($this->_data[$name]);
		} else {
			parent::__unset($name);
		}		
	}
	
	/**
$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_user')->queryScalar();
$sql='SELECT * FROM tbl_user';
$dataProvider=new CSqlDataProvider($sql, array(
    'totalItemCount'=>$count,
    'sort'=>array(
        'attributes'=>array(
             'id', 'username', 'email',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
	 */
	public function entries()
	{
		if ($this->resourceTypeId > 0) {
			$where = '(r.resource_type = '.$this->resourceTypeId.')';
			//throw new CDbException('The resourceTypeId should be set before querying');
		} else {
			$where = '(l.resource=0)'; // l.type="l" AND
		}
		$l = 1;
		$params = array();
		$useField = false;
		$fieldId = $this->explainField;	// title or agentsname
		foreach ($this->attributeNames() as $fieldName) {
			if (isset($this->$fieldName) && strlen($this->$fieldName) > 0) {
				switch ($this->_fieldDef[$fieldName]['compare']) {
					case RSLogging::COMP_DATE : break;
						// not yet ...
					case RSLogging::COMP_IS: 
						$where .= ' AND ('.$this->_fieldDef[$fieldName]['field'].' = :field'.$l.')';
						$params[':field'.$l] = $this->$fieldName;
						$useField = $useField || isset($this->_fieldDef[$fieldName]['useField']) && $this->_fieldDef[$fieldName]['useField'];
						break;
					case RSLogging::COMP_LIKE : 
						$where .= ' AND ('.$this->_fieldDef[$fieldName]['field'].' LIKE :field'.$l.')';
						$params[':field'.$l] = '%'.$this->$fieldName.'%';
						$useField = $useField || isset($this->_fieldDef[$fieldName]['useField']) && $this->_fieldDef[$fieldName]['useField'];						
						break;
				}
			}
			$l++;
		}
		
		$sqlCount = 'SELECT count( DISTINCT CONCAT_WS(" ", l.date, l.type, l.resource, l.user)) FROM resource_log l LEFT JOIN resource r ON (l.resource = r.ref)';
		if ($useField) {
			$sqlCount .= ' LEFT JOIN resource_data f ON (l.resource = f.resource AND f.resource_type_field= '.$fieldId.')';
		}
		$sqlCount .= 'WHERE '.$where;
		$cmd = Yii::app()->db->createCommand($sqlCount);
		foreach ($params as $key => $value) {
			$cmd->bindParam($key, $value);
		}
		$count = $cmd->queryScalar();
		
		/**
		 * SELECT DISTINCT l.date, l.type, l.resource, f.value as title, l.user, u.fullname  
		 * FROM resource_log l 
		 *		INNER JOIN user u ON (l.user = u.ref) 
		 *		INNER JOIN resource r ON (l.resource=.r.ref) 
		 *		INNER JOIN resource_data f ON (l.resource = f.resource AND f.resource_type_field=8)
		 */
		$sql  = 'SELECT DISTINCT l.date, l.type as action, l.resource as id, f.value as `explain`, l.user, u.fullname as username';
		$sql .= '	FROM resource_log l ';
		$sql .= '		LEFT JOIN user u ON (l.user = u.ref) '; 
		$sql .=	'		LEFT JOIN resource r ON (l.resource=.r.ref) ';
		$sql .= '		LEFT JOIN resource_data f ON (l.resource = f.resource AND f.resource_type_field='.$fieldId.') '; // 8 should be the title or the name of the artist
		$sql .= ' WHERE '.$where;
		if (isset($this->_orderByOptions[$this->orderBy])) {
			$sql .= ' ORDER BY '.$this->_orderByOptions[$this->orderBy];
		}	
		
		$dataProvider=new CSqlDataProvider($sql, array(
				'totalItemCount'=>$count,
				'params' => $params,
				'pagination'=>array('pageSize'=>20)				
			));		
		return $dataProvider;
	}
	
	public function getUsers()
	{
		$usr = User::model()->findAll(array(
				'order' => 'fullname',
		));
		return CHtml::listData($usr, 'ref', 'fullname');
	}
	
	public function getExplainField()
	{
		$field = array(
				'3' => 8,
				'4' => 88,
 		);
		if (isset($field[$this->resourceTypeId])) {
			return $field[$this->resourceTypeId];
		}				
		return 0;
	}
}
