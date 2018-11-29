<?php

Yii::import('application.models._base.BaseReportPeriodicEmails');

class ReportPeriodicEmails extends BaseReportPeriodicEmails
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
