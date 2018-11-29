<?php

/* 
 * Resource Space Sql Data Provider
 * 
 * version 1.0 jvk 2015.03.05
 */

class RSSqlDataProvider extends CSqlDataProvider {
	
	public $sql = false;
	public $params = array();
	public $modelClass = false;
	
	public function __construct($class, $sql, $config = array()) {
		$this->modelClass = $class;
		parent::__construct($sql, $config);
	}
	
	protected function fetchData()
	{
		if (!$this->sql) {
			throw  new CDbException('There is not Sql active');
		}
		if (!$this->modelClass) {
			throw new CDbException('There is no model class active');
		}
		$db = $this->db===null ? Yii::app()->db : $this->db;
		$command = $db->createCommand($this->sql);

		if(($pagination = $this->getPagination()) !== false) 	{
			$pagination->setItemCount($this->getTotalItemCount());
			$limit = $pagination->getLimit();
			$offset = $pagination->getOffset();
			$command->text=$command->getConnection()->getCommandBuilder()->applyLimit($command->text,$limit,$offset);
		}

		foreach($this->params as $name=>$value) {
			$command->bindValue($name, $value);
		}
		
		$ids = $command->queryAll();
		$records = array();
		$className = $this->modelClass;
		foreach ($ids as $id) {
			$rec = $className::model()->findByPk($id['id']);
			if ($rec) {
				//$records[$id['id']] = $rec;	
				$records[] = $rec;	
			}
		}
		return $records;
	}	
}
