<?php

class m150803_083414_my_transfer extends CDbMigration
{
  /**
   * The file_json is the structure that permits some files to be viewed
   * and others to be downloaded
   * files => [
   *    'view-['master'|'webm_hq'|'webm_lq'|'mp4_hq'|mp4_lq']' => [
   *        'key' => 'nsdof8w34hafss',
   *        'id' => '12355',                      // id of the art work 
   *    ],
   *    'down-['master'|'webm_hq'|'webm_lq'|'mp4_hq'|mp4_lq']' => [
   *        'key' => 'nsdof8w34hafss',
   *        'id' => '12355',                      // id of the art work 
   *    ],    
   *    'alt_[id of alt-files]' => [
   *        'key' => 'nsdof8w34hafss',
   *        'id' => '12355',
   *    ]
   * ]
   * recipients => [
   *  'addr-1' => [
   *      'email' => 'jaap@toxus.nl',             // send to
   *      'key' => '3495798ewghoierg',            // id the user
   *      'send_date' => 'yyyy-MM-dd hh:mm:ss',   // when send
   *      'open_date' => 'yyyy-MM-dd hh:mm:ss',   // when opend
   *      'files' => [ file-key, file-key ]       // which we read/downloaded
   *    ]
   * ]
   * 
   * 
   */
	private $_dbOptions = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
	
	public function up()
	{
    $this->createTable('transfer', array(
      'id' => 'pk',
      'art_id' => 'integer default 0 not null',
      'sender_id' => 'integer default 0 not null',  // the user whos send the transfer
      'creation_date' => 'datetime',                // date send
      'expire_date' => 'datetime',                  // the date it's not valid any more
      'is_expired' => 'boolean',                    // 1 -> expired
      'key' => 'string not null',                   // key to get these files
      'message' => 'text',                          // email to the users
      'recipients_json' => 'text',                  // list of , seperated addresses
      'files_json' => 'text',                       // a json string of files and rights        
    ), $this->_dbOptions);
    $this->createIndex('ix-transfer-key', 'transfer', 'key', true);
	}

	public function down()
	{
    $this->dropTable('transfer');
	}
}
