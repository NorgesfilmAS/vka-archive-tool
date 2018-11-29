<?php

Yii::import('application.models._base.BaseResourceType');

class ResourceType extends BaseResourceType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function getClass()
	{
		return ucfirst(Yii::t('fields', $this->name));
	}
}
