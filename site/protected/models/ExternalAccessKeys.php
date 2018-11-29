<?php

Yii::import('application.models._base.BaseExternalAccessKeys');

class ExternalAccessKeys extends BaseExternalAccessKeys
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
