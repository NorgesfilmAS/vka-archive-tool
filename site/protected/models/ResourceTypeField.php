<?php

Yii::import('application.models._base.BaseResourceTypeField');

class ResourceTypeField extends BaseResourceTypeField
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function relations() {
		return array(
			'resource' => array(self::BELONGS_TO, 'ResourceType', 'resource_type'),						
		);
	}	
	public function getFieldname()
	{
		return $this->generateAttributeLabel(Yii::t('fields', $this->title));
	}
	public function getResourceName()
	{
		if ($this->resource) {
			return Yii::t('fields', $this->resource->name);
		} else {
			return '';
		}
	}
}
