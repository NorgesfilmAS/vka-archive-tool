<?php

class m140810_123014_selections extends CDbMigration
{
	private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

	public function up()
	{
		$this->createTable('selected_item', array(
			'id' => 'pk',
			'guid' => 'string not null',
			'item_id' => 'integer not null',
			'order_1' => 'string',
			'order_2'	=> 'string',
			'order_3'	=> 'string',
			'order_4'	=> 'string',
			'order_5'	=> 'string',
			'order_6'	=> 'string',
			'order_7'	=> 'string',
			'order_8'	=> 'string',	
			'order_9'	=> 'string',					
			'order_10'	=> 'string',	
				
			'field_1' => 'string',
			'field_2' => 'string',
			'field_3' => 'string',
			'field_4' => 'string',
			'field_5' => 'string',
			'field_6' => 'string',
			'field_7' => 'string',
			'field_8' => 'string',
			'field_9' => 'string',
			'field_10' => 'string',	
			'field_11' => 'string',
			'field_12' => 'string',
			'field_13' => 'string',
			'field_14' => 'string',
			'field_15' => 'string',
			'field_16' => 'string',
			'field_17' => 'string',
			'field_18' => 'string',
			'field_19' => 'string',
			'field_20' => 'string',	
				
				
		), $this->_dbOptions);
		$this->createIndex('ix_selected_unique', 'selected_item', 'guid, item_id', true);
		$this->createIndex('ix_selected_item', 'selected_item', 'guid,order_1,order_2,order_3');
	}

	public function down()
	{
		$this->dropTable('selected_item');
	}
}
