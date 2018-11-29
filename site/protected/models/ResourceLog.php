<?php

Yii::import('application.models._base.BaseResourceLog');

class ResourceLog extends BaseResourceLog
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->date = new CDbExpression('NOW()');
			if ($this->user == null)
				$this->user = Yii::app()->user->id;
		}
		return parent::beforeSave();
	}
}
