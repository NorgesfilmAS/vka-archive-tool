<?php

class m140512_133716_extra_info extends CDbMigration
{
	 private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

	public function up()
	{
		$this->createTable('info_text', array(
			'id' => 'pk',
			'code' => 'string not null',
			'text' => 'text',
			'html' => 'text',	
		), $this->_dbOptions);
		$this->createIndex('ix_info_text_key', 'info_text', 'code', true);
	}

	public function down()
	{
		$this->dropTable('info_text');
		return true;
	}

	
}
