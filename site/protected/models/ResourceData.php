<?php

Yii::import('application.models._base.BaseResourceData');

class ResourceData extends BaseResourceData
{
	/**
	 * var needed to find the max of the resource_id column. Used to generate a new
	 * id
	 * 
	 * @var integer
	 */
	public $maxId;
	
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
