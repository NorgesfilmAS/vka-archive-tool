<?php

class m140614_163820_md5_file_check extends CDbMigration
{
	private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

	public function up()
	{
		$this->createTable('file_check',array(
			'id' => 'pk',
			'filename' => 'string',		// the name on disk (no path)
			'path' => 'string',				// the current location of the file without the /
			'md5' => 'string',					// the md5 generated when file was add. NEVER CHANGES
			'creation_date' => 'datetime',			// the date it was checked
			'last_checked_date' => 'datetime',	// last time it was ok
			'resource_id'	=> 'integer not null default 0',	// the resource this file belongs to
			'alternate_files_json' => 'text',		// the information about the alternate files			
			'is_valid'	=> 'tinyint default 1 not null',		// if set to 0 something is wrong with the file
			'info_json' => 'text',							// what happend to the file (deleted, changed, etc.) 	
			'error_json' => 'text',							// description of the error					
		), $this->_dbOptions);
		$this->createIndex('ix_file_check_resource', 'file_check','resource_id', true);
		$this->createIndex('ix_file_check_error', 'file_check', 'is_valid');
	}

	public function down()
	{
		$this->dropTable('file_check');
		return true;
	}

}
