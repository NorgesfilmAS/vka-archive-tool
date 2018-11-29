<?php

class m151026_130429_resource_space_7 extends CDbMigration
{
  private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
  
	public function up()
	{
    if (Yii::app()->config->system['rsVersion'] == 'v6') {
      $this->addColumn('collection', 'session_id', 'int');
      $this->addColumn(('daily_stat'), 'external', 'bool');

      $this->createTable('dash_tile', array(
        'ref' => 'pk',
        'title' => 'string default null',
        'txt' => 'text',
        'all_users' => 'bool DEFAULT NULL',
        'default_order_by' => 'integer default null',
        'url' => 'text',
        'link' => 'text',
        'reload_interval_secs' => 'integer DEFAULT NULL',
        'resource_count' => 'integer DEFAULT NULL',
        'allow_delete' => 'bool DEFAULT 1'
        ), $this->_dbOptions);
      $this->addColumn('external_access_keys', 'usergroup', 'integer default null');
      $this->dropTable('message');
      $this->createTable('message', array(
        'ref' => 'pk',
        'created' => 'datetime DEFAULT NULL',
        'owner' => 'integer DEFAULT NULL',
        'message' => 'text',
        'url' => 'text',
        'expires' => 'datetime DEFAULT NULL'  
      ), $this->_dbOptions);

      $this->alterColumn('plugins', 'name', 'string');
      $this->alterColumn('plugins', 'config_json', 'longtext');

      $this->addColumn('report_periodic_emails', 'user_groups', 'string');
      $this->createTable('report_periodic_emails_unsubscribe', array(
        'id' => 'pk',
        'user_id' => 'integer DEFAULT NULL',
        'periodic_email_id' => 'integer DEFAULT NULL'
      ), $this->_dbOptions);

      $this->alterColumn('resource', 'disk_usage', 'bigint(20)');
      $this->alterColumn('resource', 'file_size', 'bigint(20)');
      $this->alterColumn('resource_alt_files', 'file_size', 'bigint(20)');

      $this->dropIndex('rk_all', 'resource_keyword');
      $this->createIndex('rk_all','resource_keyword', 'resource,keyword,resource_type_field,hit_count');
      $this->alterColumn('resource_type', 'name', 'varchar(200)');
      $this->addColumn('resource_type', 'config_options', 'text');
      $this->addColumn('resource_type', 'tab_name', 'varchar(50)');
      $this->addColumn('resource_type_field', 'onchange_macro', 'text');
      $this->alterColumn('site_text', 'name', 'varchar(200)');
      $this->alterColumn('user', 'password', 'varchar(64)');
      $this->addColumn('user', 'hidden_collections', 'text');
      $this->addColumn('user', 'password_reset_hash', 'varchar(100)');

      $this->createTable('user_dash_tile', array(
        'ref' => 'pk',
        'user' => 'integer DEFAULT NULL',
        'dash_tile' => 'integer DEFAULT NULL',
        'order_by' => 'integer DEFAULT NULL'
        ), $this->_dbOptions);
      $this->addColumn('user_profile', 'derestrict_filter', 'text');
      $this->addColumn('user_profile', 'group_specific_logo', 'text');

      $this->createTable('usergroup_collection', array(
        'id' => 'pk',
        'usergroup' => 'integer NOT NULL DEFAULT 0',
        'collection' => 'integer NOT NULL DEFAULT 0',
        'request_feedback' => 'integer DEFAULT 0',
        ),$this->_dbOptions);
      $this->createIndex('ix_usergroup', 'usergroup_collection', 'usergroup, collection', true);
      $this->createIndex('usergroup', 'usergroup_collection', 'usergroup');
      $this->createIndex('collection', 'usergroup_collection', 'collection');
    }
	}

	public function down()
	{
    if (Yii::app()->config->system['rsVersion'] == 'v6') {
      $this->dropTable('usergroup_collection');
      $this->dropColumn('user_profile', 'group_specific_logo');
      $this->dropColumn('user_profile','derestrict_filter');
      $this->dropTable('user_dash_tile');
      $this->dropColumn('user', 'password_reset_hash');
      $this->dropColumn('user', 'hidden_collections');
      $this->dropColumn('resource_type_field', 'onchange_macro');
      $this->dropColumn('resource_type', 'tab_name');
      $this->dropColumn('resource_type', 'config_options');
      $this->alterColumn('resource_alt_files', 'file_size', 'bigint(11)');
      $this->alterColumn('resource', 'file_size', 'bigint(11)');
      $this->alterColumn('resource', 'disk_usage', 'bigint(11)');
      $this->dropTable('report_periodic_emails_unsubscribe');
      $this->dropColumn('report_periodic_emails', 'user_groups');
      $this->dropTable('message');
      $this->createTable('message', array(
          'id' => 'pk',	
          'name' => 'string not null',
          'email' => 'string not null',
          'subject' => 'string',
          'message' => 'text not null',
          'creation_date' => 'datetime',
          'modified_date' => 'datetime',
          'user_id' => 'integer default 0 not null',
          'ip' => 'string',
          'is_handled' => 'boolean default false',
          'reply_to_message_id' => 'integer default 0 not null',
      ), $this->_dbOptions);    
      $this->dropColumn('external_access_keys', 'usergroup');
      $this->dropTable('dash_tile');
      $this->dropColumn('daily_stat', 'external');
      $this->dropColumn('collection','session_id');
    }
    return true;
	}

}
