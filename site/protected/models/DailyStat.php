<?php

Yii::import('application.models._base.BaseDailyStat');

class DailyStat extends BaseDailyStat
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
