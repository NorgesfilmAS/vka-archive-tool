<?php
/**
 * table to hold multiple artist for one artwork
 * table is auto maintained and can be regenerated from the resource table
 * 
 * version 1.0 jvk 2015.02.24
 */
class m150224_082046_multi_artist extends CDbMigration
{
	private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
	
	public function up()
	{
		$this->createTable('resource_multi_rel', array(
			'id' => 'pk',
			'master_id' => 'integer not null default 0',			// the master record
			'child_id' => 'integer not null default 0',				// the key of the related child
			'sort_key' => 'string'														// the way it's sorted	
		), $this->_dbOptions);
		$this->createIndex('ix_resource_mr_master', 'resource_multi_rel', 'master_id,sort_key');
		$this->createIndex('ix_resource_mr_unique', 'resource_multi_rel', 'master_id, child_id', true);
	}

	public function down()
	{
		$this->dropTable('resource_multi_rel');
		return true;
	}

}
