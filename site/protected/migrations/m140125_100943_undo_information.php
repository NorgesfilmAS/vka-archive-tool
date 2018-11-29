<?php

/**
 * undoing saved information by user edit
 * all steps are grouped in transaction, so the moderator can undo it all at once
 * 
 * version 1.0  25 jan 2014
 */
class m140125_100943_undo_information extends CDbMigration
{
	private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

	public function up()
	{
		/**
		 * save the previous state of a field
		 */
		$this->createTable('undo_step', array(
			'id' => 'pk',
			'transaction_id' => 'integer',	
			'field_id' => 'integer default 0 not null',	
			'original_value' => 'text',	
		), $this->_dbOptions);
		$this->createIndex('ix_undo_step_user', 'undo_step', 'transaction_id, id');
		
		/**
		 * one step update
		 */
		$this->createTable('undo_transaction', array(
			'id' =>'pk',
			'user_id' => 'integer',
			'creation_date' => 'datetime',
			'resource_id' => 'integer not null default 0',	
			'path' => 'string',	
			'is_confirmed' => 'boolean default 0',	
			'is_rollback' => 'boolean default 0',	
		), $this->_dbOptions);
		$this->createIndex('ix_undo_transaction_user', 'undo_transaction', 'user_id,creation_date');
	}

	public function down()
	{
		$this->dropTable('undo_transaction');
		$this->dropTable('undo_step');
	}
	
}
