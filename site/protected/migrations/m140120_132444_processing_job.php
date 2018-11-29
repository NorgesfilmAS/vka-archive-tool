<?php

class m140120_132444_processing_job extends CDbMigration
{
	private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

	public function up()
	{
		$this->createTable('processing_job', array(
			'id' => 'pk',
			'user_id' => 'integer default 0 not null',	
			'creation_date' => 'datetime',
			'started_date' => 'datetime',
			'ended_date' => 'datetime',
			'is_finished' => 'tinyint default 0 not null',	
			'priority' => 'integer default 50',
			'job_type_id' => 'integer',	
			'resource_id' => 'integer',
			'alternate_id' => 'integer',
			'filename' => 'string',
			'original_filename' => 'string',
			'new_filename' => 'string',	
			'action' => 'text',
			'error' => 'integer',
			'error_message' => 'text',
			'logging' => 'text',
			'is_send_mail' => 'tinyint default 0 not null',		// if 1 at the end the mail will be send			
		), $this->_dbOptions);
	}

	public function down()
	{
		$this->dropTable('processing_job');
	}
	
}
