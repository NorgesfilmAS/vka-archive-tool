<?php

class ProcessCommand extends CConsoleCommand
{
	const DEFAULT_USER = 15;
	/**
	 * the userId to use to check if we are running
	 * @var integer
	 */
	private $_userId;
	
	/**
	 * if true the current process will be stopped if active
	 * 
	 * @var boolean
	 */
	private $_reset = false;
	/**
	 * the user record for the process
	 * 
	 * @var CActiveRecord
	 */
	private $_wait = false;
	
	private $_user = null;
	/**
	 * the session we are have. If changed we have to quit
	 * @var string
	 */
	private $_currentSession;
	
	/**
	 * number of miliseconds between the calls
	 * @var integer
	 */
	private $_sleepTime = 1000;
	/** 
	 * if true no message are send
	 * @var boolean
	 */
	private $_silentMode;
	
	private $_version = '1.01.00';
	
	function getHelp() {
		return <<<EOD
USAGE (version 1.1)
  process [kill] --wait=[0|1] --id=[id] --silent=[0|1] --reset=1
	
DESCRIPTION
  This command lets you process the process queue
	
PARAMETERS
  kill       stops the current processing queue for this id		
  list		   list the users defined in the system	
  connection show the db connection used
		
OPTIONS  
  --id     [number] the id of the queue (user.id in the database) to use to 
             mark that we are active. (default=15)
  --silent [0|1] show the message to the console (default=0)	
  --reset  [0|1] reset the processing queue and restarts it again (default=0)
  --wait   [0|1] creates a permanent processing queue (default=0)	
	
EXAMPLES
  yiic process
    runs the processing queue and terminates when all jobs are done.		
		
  yiic process --reset=1 --wait=1		
    process all jobs and stays active for new ones. If currently active
    the other process is terminated
		
  yicc process --wait=1 --id=16
    create an extra processing queue as process 16 and starts running it
		
  yiic process kill --id=16
    terminates the processing queue with id 16		

EOD;
	}
	
	public function actionIndex($id=null, $silent=0, $reset=0, $wait=0)
	{
		$PROCESS_LOG = 'toxus.process.queue';
		$this->initParams($id, $silent, $reset, $wait);
		if ($this->_user->last_active) {
			
			$this->logMessage('Process is currently active. Process not restarted.');			
			if ($this->_reset) {				
				$this->reset();
				Yii::log('Process is active. Reset and exiting', CLogger::LEVEL_INFO, $PROCESS_LOG);
			}	else {	
				Yii::log('Process is active. Exiting', CLogger::LEVEL_INFO, $PROCESS_LOG);				
				exit;
			}	
		}
		$this->activateSession();
		try {
			Yii::log('Startup (version '.$this->_version.')', CLogger::LEVEL_INFO, $PROCESS_LOG);
			$this->logMessage('Processing started');
			if ($this->_silentMode == false ) {
				$sql = 'SELECT COUNT(id) as cnt FROM processing_job WHERE is_finished=0 AND started_date is null ORDER BY priority, id';
				$cnt = Yii::app()->db->createCommand($sql)->queryScalar();
				$this->logMessage(Yii::t('app','n==0#There are no jobs in the queue.|n==1#There is {n} job in the queue.|n>1#There are {n} jobs in the queue.', $cnt));
			}	
			$sql = 'SELECT id FROM processing_job WHERE is_finished=0 AND started_date is null ORDER BY priority DESC, id LIMIT 1';

			$lastId = 0;
			while ($this->isSessionActive()) {
				Yii::log('Session is Active', CLogger::LEVEL_INFO, $PROCESS_LOG);
				$id = Yii::app()->db->createCommand($sql)->queryScalar();
				if (!empty($id) && $id == $lastId) {
					Yii::log('Job '. $id.' returned an error on mySQL', CLogger::LEVEL_ERROR, $PROCESS_LOG);
					break;
				}
				if (empty($id)) {					
					if ($this->_wait) {
						Yii::log('No job. Start waiting '.$this->_sleepTime.' seconds', CLogger::LEVEL_INFO, $PROCESS_LOG);						
						YiiBase::getLogger()->flush(true);
						usleep($this->_sleepTime * 1000);					
					} else {
						Yii::log('No job. no waiting. Exit process', CLogger::LEVEL_INFO, $PROCESS_LOG);
						break;
					}	
				} else {
					Yii::log('Job found. id: '.$id, CLogger::LEVEL_INFO, $PROCESS_LOG);						
					$job = ProcessingJob::model()->findByPk($id);
					set_time_limit(0);
					if (!$job) {
						Yii::log('Job not loaded', CLogger::LEVEL_WARNING, $PROCESS_LOG);						
						$this->logMessage('The job id: '.$id.' could not be found', 'error');
					} else {
						Yii::log('Starting job', CLogger::LEVEL_INFO, $PROCESS_LOG);						
						$this->logMessage('Job started ('.$id.')');
						try {
							// $url = Yii::app()->params->processUrl.$job->id;
							$url = Yii::app()->config->fixedValues['process_url'].$job->id;;
							$job->log('Activating job through: '.$url);
							$this->logMessage('Open job through: '.$url);
							
							// change the timeouts
							//    http://stackoverflow.com/questions/10236166/does-file-get-contents-have-a-timeout-setting
							ini_set('default_socket_timeout', 60 * 60 * 24); // a whole day
							$ctx = stream_context_create(array('http'=>
							  array('timeout' => 60*60*24)  //  1 day
							));
							// $url = 'http://rs.videokunstarkivet.org/site/index.php/job/run/43';
							Yii::log('Job started by command: '.$url, CLogger::LEVEL_INFO, $PROCESS_LOG);						
							$s = @file_get_contents($url, false, $ctx);
							
							try {
								// this can run very long and the mySQL server can go away
								Yii::app()->db->setActive(false);
								Yii::app()->db->setActive(true);
								Yii::app()->db->createCommand('select 1')->execute();
							} catch (Exception $ex) {
								Yii::log('MySQL does not responde: '.$ex->getMessage(), CLogger::LEVEL_WARNING, $PROCESS_LOG);						
							}
							
							
							$this->logMessage('Process returned: '.$s);
							$job->log('Process return: '.$s);
							if ($s === false) {
								Yii::log('Job returned an error: '.$s, CLogger::LEVEL_WARNING, $PROCESS_LOG);						
								$job->log('file_get_contents returns an error on url: '.$url);
								$this->logMessage('file_get_contents returns an error on url: '.$url);
							} else {
								Yii::log('Job ended without an error', CLogger::LEVEL_INFO, $PROCESS_LOG);						
							}

							// now test if job is finished
							$jobDone = ProcessingJob::model()->findByPk($id);
							if ($jobDone) {
								if ($jobDone->is_finished != 1) {
									Yii::log('Job did not end successfully. id: '.$id, CLogger::LEVEL_ERROR, $PROCESS_LOG);															
									$jobDone->is_finished = 1;
									$jobDone->error_message = 'Job not finished. Force QUIT';
									$jobDone->ended_date = new CDbExpression('NOW()');
									if (!$jobDone->save()) {
										break;	// kill the process at once
									}
								} else {
									$lastId = $jobDone->id;
									Yii::log('Job ended successfully.', CLogger::LEVEL_INFO, $PROCESS_LOG);															
								}
							} else {
								Yii::log('Job ended but not found.', CLogger::LEVEL_WARNING, $PROCESS_LOG);															
							}							
							Yii::log('Waiting for new job', CLogger::LEVEL_INFO, $PROCESS_LOG);															
							usleep($this->_sleepTime * 1000);												
						} catch (Exception $e) {
							Yii::log('Job throws an error. error:'.$e->getMessage(), CLogger::LEVEL_ERROR, $PROCESS_LOG);															
							$this->logMessage('Exception in Job: '.$e->getMessage(), 'error');
						}	
						if ($job->error > 0) {
							Yii::log('Job has an error.', CLogger::LEVEL_WARNING, $PROCESS_LOG);															
							$this->logMessage('Error in job '.$id, 'error');	
						} else {
							Yii::log('Job processed. id'. $id, CLogger::LEVEL_INFO, $PROCESS_LOG);															
							$this->logMessage('Job '.$id.' processed');
						}	
					}
				}	
			}
		} catch (Exception $e) {
			$this->logMessage('Exception in Processing: '.$e->getMessage(), 'error');
		}
		$this->terminateSession();
	  $this->logMessage('Processing done');	
	}
	
	/**
	 * Stops the selected process by changing the session
	 * 
	 * @param integer $userId the process to kill
	 */
	public function actionKill($id=null, $silent=0)
	{
		$this->initParams($id, $silent, 1, 0);
		
		$user = User::model()->findByPk($this->_userId);
		if (empty($user)) {
			$this->logMessage('Error: The process with id '.$this->_userId.' does not exist', 'error');
		} elseif ($user->last_active) {
			$this->reset($user);
		} else {
			$this->logMessage('No process active');
		}
	}

	/**
	 * list the users in the system
	 */
	public function actionList()
	{
		$this->initParams();
		$this->logMessage('Using connection: '.Yii::app()->db->connectionString.', userId:'.$this->_userId);
		echo "Listing users in the database:\n";
		$users = User::model()->findAll();
		foreach ($users as $user) {
			echo $user->ref.' - '.$user->username.' - '.$user->fullname."\n";
		}
	}
	
	public function actionConnection() 
	{
		try {
	//		$this->initParams();
			echo 'Using connection: '.Yii::app()->db->connectionString."\n";
			echo 'user id:'.$this->_userId;
		} catch(Exception $e) {
			echo 'Error: '.$e->getMessage();
		}
		echo "\n\n";
	}
	/**
	 * UTILITIES
	 */
	
	/**
	 * function to confirm what we are doing
	 */
	/**
	 * Reads the params and load them into the class
	 * 
	 * @param type $userId
	 * @param type $silent
	 * @param type $reset
	 * @param type $wait
	 */
	protected function initParams($userId= self::DEFAULT_USER, $silent=0, $reset=0, $wait=0)
	{
		$this->_userId = isset($userId) ? $userId : self::DEFAULT_USER;
		$this->_silentMode = isset($silent) ?$silent == 1 : false;
		$this->_currentSession = Util::generateRandomString(30);
		$this->_reset = $reset != 0 ? true : false;
		$this->_wait = $wait != 0 ? true : false;
		
		$this->logMessage('Using connection: '.Yii::app()->db->connectionString.', userId:'.$this->_userId);
		$this->_user = User::model()->findByPk($this->_userId);
		if (empty($this->_user)) {
			$this->logMessage('Error: The process with id '.$this->_userId.' does not exist', 'error');
			exit;
		}
	}	
	/**
	 * logs in the current user and actives it
	 */
	protected function activateSession()
	{
		$this->_user->last_active = new CDbExpression('NOW()');
		$this->_user->login_last_try = new CDbExpression('NOW()');
		$this->_user->session = $this->_currentSession;
		if (!$this->_user->save()) {
			$this->logMessage('Could not save activation information. exiting', 'error');
			Yii::app()->end(10);
		}
		$this->logMessage('Current session: '.$this->_currentSession.', response time:'.$this->_sleepTime.' milliseconds');	
	}

	protected function terminateSession()
	{
		if ($this->_user) {
			$this->_user->last_active = null;
			$this->_user->session = null;
			$this->_user->login_last_try = null;
			if (!$this->_user->save()) {
				$this->logMessage('Could not reset activation information.', 'warning');
			}
		} else {	
			$this->logMessage('No user active on termination', 'error');
		}
	}
	/**
	 * Checks if the the current user.session is the same as our session.
	 * Will update the user.last_active to reflect we checked
	 * 
	 * @return boolean true if we are still active
	 */
	protected function isSessionActive()
	{
		$this->_user = User::model()->findByPk($this->_userId);				
		if ($this->_user) {
			$this->_user->last_active = new CDbExpression('NOW()');
			if (!$this->_user->save()) {
				$this->logMessage('Could not save activation information. exiting', 'error');
				return false;
			}	else {
			 return $this->_user->session == $this->_currentSession;
			} 
		} else {
			$this->logMessage('User lost during session', 'error');
		}
	}
	
	
	/**
	 * stop the current running process
	 * @param type $
	 */
	protected function reset($user = false)
	{
    if ($user == false) {
      $user = $this->_user;
    }
    $user->last_active = null;
		$user->session = null;
		$user->save();
		$this->logMessage('Process has be reset', 'warning');
	}
	
	protected function logMessage($msg, $level = 'info')
	{
		Yii::log($msg, $level, 'toxus.process.queue');
		if (!$this->_silentMode || $level != 'error') {
			echo $msg."\n";
		}
	}
}
