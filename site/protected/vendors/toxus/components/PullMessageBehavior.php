<?php
/**
 * generate the polling definition on disk
 * version 1.0 - april 2014
 * 
 * 
 * Copyright 2014, Jaap van der Kreeft, Toxus, www.toxus.nl
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Jaap van der Kreeft (jaap@toxus.nl) at toxus (www.toxus.nl)
 * @copyright Copyright 2013 - 2014, Jaap van der Kreeft, Toxus, www.toxus.nl
 * @version 0.1.0
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * 
 * 
 * example:
 *  to start a sender:
 *   $this->registerClient('1234','myInst');
 *  this returns a path to call to get the latest news from the server
 * 
 *  to send a message call
 *    $this->notifyMessage('invite.new', '1234', array('message' => 'Will you come to the party'));
 *  or to send to multiple clients
 *    $this->notifyMessage('invite.new', array('1234', '222'), array('message' => 'Will you all come to my party'));  
 * 
 *  the message deliverd is:
 *    array('event' => 'invite.new', 
 *					'data' => array('message' => 'Will you come to the party))
 */


class PullMessageBehavior extends CBehavior
{
	// the http://www.example.com/poll/$userId/$instanceId
	public $pollPath = '/polling/';		
	
/**
	 * registers a new device for a user
	 * 
	 * @param string $userId
	 * @param string $instanceId
	 * @returns the url to poll
	 */
	public function registerClient($userId, $instanceId)
	{
		$userDir = $this->rootDir().$userId;
		if (!is_dir($userDir)) { 
			@mkdir($userDir);
			@chmod($userDir, 0777);			
		}
		$filename = $userDir.'/'.$instanceId.'.json';
		if (!file_exists($filename)) {
			file_put_contents($filename, '[]');
			file_put_contents($userDir.'/'.$instanceId.'.timestamp', time());	// the expire
		}
		// the http://www.example.com/poll/$userId/$instanceId
		return Yii::app()->request->hostInfo.$this->pollPath.$userId.'/'.$instanceId.'.json';
	}	

	/**
	 * removes an instance from the polling system
	 * 
	 * @param string $userId
	 * @param string $instanceId
	 */
	public function unRegisterClient($userId, $instanceId)
	{
		$userDir = $this->rootDir().$userId;
		if (is_dir($userDir)) {
			$filename = $userDir.'/'.$instanceId.'.json';
			if (is_file($filename)) {
				if (@unlink($filename)) {
					$filename = $userDir.'/'.$instanceId.'.timestamp';
					if (is_file($filename)) {
						@unlink($filename); 
					}
				}
			}
		}
		// http://stackoverflow.com/questions/12801370/count-how-many-files-in-directory-php
		$fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
		if (iterator_count($fi) == 0) {
			@rmdir($userDir);
		}	
	}	
	/**
	 * Send the message to all listening users
	 * 
	 * @param string $message the message received by the user (message.add, etc)
	 * @param string/array $users a user or array of users id to send the message to 
	 * @param array $data the array to send to the user 
	 * @param array method the methode ($this, getData) to call to get the json information
	 */
	public function notifyMessage($message, $users, $data, $method = null)
	{
		if (!is_array($users))  {
			$users = array($users);
		}	

		foreach ($users as $userId) {
			$userDir = $userDir = $this->rootDir().$userId;
			if (is_dir($userDir)) { // user is not globaly registered so nothing to do
				if ($method) {	// get the array
					$data = call_user_func($method);
				}
				$instances = glob($userDir.'/*.json', GLOB_BRACE);
				if (is_array($instances)) {
					foreach ($instances as $filename) {
						$fo = fopen($filename, 'rw');
						if (!flock($fo, LOCK_EX)) {
							throw new CException(Yii::t('base','Can get a lock on file {filename}', array('{filename}' => $filename)));
						}
						try {
							// should check then timestamp that it has been read the last x minutes
							// otherwise remove the file and directory
							$timeStampFile = Util::fileChangeExtension($filename, 'timestamp');
							if (!file_exists($timeStampFile)) {
								Yii::log('The timestamp: '.$timeStampFile.' does not exist, creation', CLogger::LEVEL_WARNING, 'pullmessage.notifyMessage');
								file_put_contents($timeStampFile, time());	// the expire
							} else {
								$timestamp = file_get_contents($timeStampFile);
								$t = Yii::app()->config->polling['unreadTimeout'];
								if (time() - $timestamp > $t)  {	// time has passed
									unlink($timeStampFile);
									flock($fo, LOCK_UN);
									fclose($fo);	
									unlink($filename);
									continue;
								}
							}
							
							$content = file_get_contents($filename);

							if ($content == '[]') {
								$store = array();
							} else {
								try {
									$store = CJSON::decode($content);
								} catch (Exception $e ){
									$store[] = array();
								}	
							}

							$store[] = array(			// push a new message
								'event' => $message,
								'timestamp' => time(),
								'data'	=> $data
							);
							file_put_contents($filename, CJSON::encode($store));
						} catch (Exception $e) 
						{};
						flock($fo, LOCK_UN);
						fclose($fo);	
					}
				}	
			}
			 
		}
 		return true;
	}	
	
	/**
	 * take care the path does exist
	 */
	public function __construct() {
		$path = $this->rootDir();
		if (!is_dir($path)) {
			@mkdir($path);
			@chmod($path, 0777);			
		}
	}
	/**
	 * returns the rootdir where all user reecords are stored
	 * 
	 * @return string
	 */
	private function rootDir()
	{
		return YiiBase::getPathOfAlias('application.runtime').$this->pollPath;
	}	
	
}
