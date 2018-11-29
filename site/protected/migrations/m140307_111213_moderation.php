<?php

class m140307_111213_moderation extends CDbMigration
{
	// private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';

	public function up()
	{
		$this->addColumn('usergroup', 'moderator_id', 'integer default 0 not null');
		$this->addColumn('usergroup', 'email', 'string');							// the user to send mail to
		$this->addColumn('usergroup', 'is_moderation_active', 'tinyint default 1 not null');
		$this->addColumn('usergroup', 'interval', 'string');					// textual description use: strtotime
		$this->addColumn('usergroup', 'down_time_start', 'string');		// interval where mail isn't send
		$this->addColumn('usergroup', 'down_time_end', 'string');			// interval where mail isn't send
		$this->addColumn('usergroup', 'last_checked', 'datetime');		// time tried to send the mail
		$this->addColumn('usergroup', 'rights_json', 'text');					// rights compilid, including the inherited rights
		$this->addColumn('usergroup', 'visible_items', 'text');				// a , separated list of items visible (merged in rights)
		$this->addColumn('usergroup', 'application_title', 'string'); // the name of the application, if empty try parent (applicationTitle)
		
		
		$this->addColumn('user', 'activation_key', 'string');
		$this->addColumn('user', 'telephone', 'string');
		$this->addColumn('user', 'address', 'text');
		
		$this->createIndex('ix_user_key','user', 'activation_key', true);
	}

	public function down()
	{
		$this->dropColumn('user', 'address');
		$this->dropColumn('user', 'telephone');
		$this->dropColumn('user', 'activation_key' );
		
		
		$this->dropColumn('usergroup', 'application_title');
		$this->dropColumn('usergroup', 'rights_json');		
		$this->dropColumn('usergroup', 'last_checked');		
		$this->dropColumn('usergroup', 'down_time_end');		
		$this->dropColumn('usergroup', 'down_time_start');
		$this->dropColumn('usergroup', 'interval');
		$this->dropColumn('usergroup', 'is_moderation_active');
		$this->dropColumn('usergroup', 'email' );
		$this->dropColumn('usergroup', 'moderator_id');
		$this->dropColumn('usergroup', 'visible_items');
	}
}
