<?php

/**
 * reads the information about the processing queue
 */
class QueueStatus extends CComponent
{
	public $userId = 15; // default user in the system
	
	private $_errors = array();
	private $_statusRecord = null;
	
	
	public function init()
	{
	}
	/**
	 * 
	 * @return array array of running process, with file size update
	 */
	private function findRunningProcess() {
		$jobs = new ProcessingJob();
		$jobsDb = $jobs->activeJobs();
		$result = array();
		if ($jobsDb) {
			foreach ($jobsDb->getData() as $job) {
				if ($job->status == Yii::t('app', 'running')) {
					$result[] = $job->fileStatus;
				}
			}
		}
		return $result;
	}
	protected function getStatus()
	{
		$this->_statusRecord = User::model()->findByPk($this->userId);
		if ($this->_statusRecord == null) {
			$this->addError(Yii::t('app', 'There is no active user {id}.', array('{id}' => $this->userId)));
			return false;
		}
		$running = $this->findRunningProcess();
		return array(
			'last_active' => $this->_statusRecord->last_active,
			'started' => $this->_statusRecord->login_last_try,
			'running' => $running	
		);
	}
	
	public function addError($err) 
	{
		$this->_errors[] = $err;
	}
	public function hasErrrors()
	{
		return count($this->_errors) > 0;
	}
	public function getErrors()
	{
		return $this->_errors;
	}
	
	public function restart()
	{
		if ($this->status) {
			$this->_statusRecord->session = null;
			$this->_statusRecord->last_active = null;
			$this->_statusRecord->save();
			return true;
		}
		return false;
	}
}
