<?php

Yii::import('application.models._base.BaseResourceMultiRel');

class ResourceMultiRel extends BaseResourceMultiRel
{
	public function relations() {
		return array(
			'master' => array(self::BELONGS_TO, 'Resource', 'master_id'),
			'child' => array(self::BELONGS_TO, 'Resource', 'child_id')	
		);
	}
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
