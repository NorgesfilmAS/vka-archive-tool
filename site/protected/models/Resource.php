<?php

Yii::import('application.models._base.BaseResource');

class Resource extends BaseResource
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function relations() {
		return array_merge(
				parent::relations(),
				array(
					'type' => array(self::BELONGS_TO, 'ResourceType', 'resource_type'),
					'allAltFiles' => array(self::HAS_MANY, 'ResourceAltFiles', 'resource')
				)		
		);
	}
	
	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->creation_date = new CDbExpression('NOW()');
		}
		return parent::beforeSave();
	}
	
	public function getId()
	{
		return $this->ref;
	}
	public function setId($value)
	{
		$this->ref = $value;
	}
}
