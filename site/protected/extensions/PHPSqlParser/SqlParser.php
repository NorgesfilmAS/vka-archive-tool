<?php

require_once Yii::getPathOfAlias('application.extensions.PHPSqlParser').'/php-sql-parser.php';
class SqlParser extends CComponent
{
	public function parse($sql)
	{
		$parse = new PHPSQLParser();
		return $parse->parse($sql);
	}
}
