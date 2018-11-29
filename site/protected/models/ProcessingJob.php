<?php

Yii::import('application.models._base.BaseProcessingJob');

class ProcessingJob extends BaseProcessingJob
{
	const ERR_NOT_YET_IMPLEMENTED = 1;
	const ERR_CAN_NOT_MOVE_ORIGINAL = 10;	// the file could not be moved
	const ERR_FILE_NOT_FOUND = 20;  // the file to move into resource space does not exist
	const ERR_MOVING_FILE = 30;			// rename retuns an error
	const ERR_RESOURCE_SPACE = 100;	// resource space returns an error
	
	const JOB_RESOURCE_SPACE = 1;
	const JOB_ACTION = 2;
	const JOB_REPROCESS = 3;
	const JOB_MD5 = 4;	// generate md5 info	
	const JOB_MD5_FTP = 5; 
	
	const LOG_PREFIX = 'job.processing.';
	/**
	 * the art connected (as relation
	 * @var CActiveRecord
	 */
	private $_art = null;
	private $_agent = null;
	/**
	 * the resource used
	 * @var RSModel
	 */
	private $_resource = null;
	
	/**
	 * the name of the file if moved to the trashbin
	 * @var string
	 */
	private $_trashbinName = null;
	
	/**
	 * the name of the original file
	 * @var string
	 */
	private $_originalFilename = null;
	/**
	 * list of possible options
	 * @var array
	 */
	private $_priorityOptions = null;
	
	/**
	 * the user request the Processeing
	 * 
	 * @var User
	 */
	private $_user = null;
	
	/**
	 * the fileCheck for this operation
	 * @var FileCheck
	 */
	private $_fileCheck = false;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	
	public function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->user_id = Yii::app()->user->id;
			$this->creation_date = new CDbExpression('Now()');
		}
		return parent::beforeSave();
	}
	/**
	 * returns string the status text of current job
	 */
	public function getStatus()
	{
		if ($this->ended_date) {
			if ($this->error) {
				return Yii::t('app', 'error');
			} else {
				return Yii::t('app', 'done');
			}
		} elseif ($this->started_date) {
			return Yii::t('app','running');
		} else {
			return Yii::t('app','queued');
		}
	}
	
	/**
	 * get the status of job by looking at the files generated
	 * 
	 * @returns array
	 */
	public function getFileStatus() {
		$result = array(
			'id' => $this->art->id,
			'jobId' => $this->id,	
			'files' => array(),
			'alternate' => false,	
		);
		if (! empty($this->alternate_id)) {
			$result['alternate'] = Yii::t('app', 'creating alternate files');
		} else {
			$art = $this->art;
			$master = $art->downloadPath; // this is the path to the MASTER file
			$dir = dirname($master);
			$files = scandir($dir);
			foreach ($files as $file) {
				$ext = pathinfo($file, PATHINFO_EXTENSION);
				if (($ext == 'webm' || $ext == 'mp4') && $file != $master) {
					$filename = $dir . '/' . $file;
					$result['files'][] = array(
						'size' => filesize($filename),	
						'filename' => $filename,
						'type' => $ext,
					);
				}
			}	
			$size = 0;
			foreach ($result['files'] as $file) {
				if (isset($file['size'])) {
					$size += $file['size'];
				}
			}
			$result['size'] = $size;
			$result['sizeText'] = Util::sizeText($size);			
		}
		return $result;
	}
	public function getCreationDate()
	{
		if ($this->creation_date) {
			$date = new DateTime($this->creation_date);
			return $date->format('d-m-Y H:i:s');
		}
		return '';
	}
	public function getStartedDate()
	{
		if ($this->started_date) {
			$date = new DateTime($this->started_date);
			return $date->format('d-m-Y H:i:s');
		} 
		return Yii::t('app', 'not yet');
	}
	
	public function getEndedDate()
	{
		if ($this->ended_date) {
			$date = new DateTime($this->ended_date);
			return $date->format('d-m-Y H:i:s');		
		}
		return '';	
	}
	
	public function getIsAlternative()
	{
		return $this->alternate_id > 0;
	}
	/**
	 * returns the art connected to this job
	 * @return Art
	 */
	public function getArt()
	{
		if ($this->_art == null) {
			$this->_art = Art::model()->findByPk($this->resource_id);
			if ($this->_art == null) { // return an empty art if not found
				$this->_art = new Art;
			}
		}
		return $this->_art;
	}
	public function getAgent()
	{
		if ($this->_agent == null) {
			$this->_agent = Agent::model()->findByPk($this->resource_id);
			if ($this->_agent == null) { // return an empty art if not found
				$this->_agent = new Agent;
			}
		}
		return $this->_agent;
		
	}
	
	/**
	 * then class name of the resource bound to this resourceId
	 * @return string
	 */
	public function getResourceType()
	{
		if ($this->_resource == null) {
			$this->_resource = Art::model()->findByPk($this->resource_id);
			if ($this->_resource == null) { // return an empty art if not found
				$this->_resource = new Art;
			}
		}
		return $this->_resource->storedResourceType;
	}
	public function getUser()
	{
		if ($this->_user == null) {
			$this->_user = User::model()->findByPk($this->user_id);
		}
		return $this->_user;
	}
	


	/* -------------------------------- */
	/**
	 * returns the total number of jobs in the system
	 * @return integer the total count of jobs in the system
	 */
	public static function jobCount()
	{
		return Yii::app()->db->createCommand()
							->select('COUNT(*) as cnt')
							->from('processing_job')
							->queryScalar();
	}
	/**
	 * @returns integer the number of jobs in the queue
	 */
	public static function queueCount()
	{
		return Yii::app()->db->createCommand()
							->select('COUNT(*) as cnt')
							->from('processing_job')
							->where('is_finished=0')
							->queryScalar();		
	}
	
	/**
	 * List all active jobs
	 * 
	 * @return CActiveDataProvider
	 */
	public function activeJobs()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'is_finished=0';
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort'=>array(
            'defaultOrder'=>'priority DESC, creation_date',
        ),	
		));
	}
	
	/**
	 * List all active jobs
	 * 
	 * @return CActiveDataProvider
	 */
	public function doneJobs()
	{
		$criteria = new CDbCriteria;
		if (Yii::app()->config->debug['showAllJobs'] == 1) {
			$criteria->condition = 'is_finished=1';	
		} else {
			$criteria->condition = 'is_finished=1 AND (is_hidden is null OR is_hidden <> 1)';
		}	
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort'=>array(
            'defaultOrder'=>'started_date DESC'
        ),	
			'pagination'=>array('pageSize'=>30)								
		));
	}
	public function getPriorityOptions()
	{
		if (!$this->_priorityOptions) {
			$this->_priorityOptions =  array(
					'1' => Yii::t('app', 'very low'),
					'10' => Yii::t('app', 'low'),	
					'30' => Yii::t('app', 'below normal'),
					'50' => Yii::t('app', 'normal'),
					'60' => Yii::t('app', 'above normal'),
					'80' => Yii::t('app', ' high'),
					'100' => Yii::t('app', 'very high'),
				);
		}
		return $this->_priorityOptions;
	}
	public function getPriorityText()
	{
		$arr = $this->getPriorityOptions();
		return isset($arr[$this->priority]) ? $arr[$this->priority] : Yii::t('app', 'unknown');
	}
	
	/** --------------------------------------------------------------------------
	 * The job processor
	 */
	/**
	 * runs the current job
	 */
	public function run()
	{
		try {
			$d = new DateTime('NOW');
			$this->storeValue('started_date', $d->format('Y-m-d H:i:s'));
//		$this->started_date = $d->format('Y-m-d H:i:s'); // new CDbExpression('NOW()');
			$this->log('start of processing'); // wil save the started date to		
			set_time_limit(0);
			switch ($this->job_type_id) {
				case ProcessingJob::JOB_RESOURCE_SPACE : 
					$this->runResourceSpace();
					break;
				case ProcessingJob::JOB_ACTION : 
					$this->runAction();
					break;
				case ProcessingJob::JOB_REPROCESS :  // reprocess the resource space file
					$this->log('re-processing resource');
					$this->runReprocess();
					break;
				case ProcessingJob::JOB_MD5 : 
					$this->log('calculate md5');
					$this->generateMd5();
					break;
				case ProcessingJob::JOB_MD5_FTP :
					$this->log('calculate md5 ftp');
					$this->generateMd5FTP();
					break;
				default :
					$this->log('Unknown job type (only 1 (runResourceSpace), 2 (runAction) or 3 (runReprocess) are excepted)');
			}		
		} catch (Exception $e) {						
			$this->log('Error: '.$e->getMessage(). ' (line: '.$e->getLine().')');			
		}	
		$this->markEnded();
	}	
	
	protected function runReprocess()
	{
		// reset the error state so previous errors don't show up.
		$this->storeValue('error', null);
		$this->storeValue('error_message', null);
		
		if (! $this->isAlternative) {
			$this->log('Processing master');
			$s = Yii::app()->config->resourceSpaceApi.'api_import?id='.$this->resource_id;
			$this->fileCheck->change(false, 'Pre run reprocess resource space', 'rs.ProcessingJob.runReprocess', false);						
		}	else {
			$this->log('Processing alternative file');
			$s = Yii::app()->config->resourceSpaceApi.'api_import?id='.$this->resource_id.'&altId='.$this->alternate_id;
			$this->fileCheck->changeAlt($this->alternate_id, 'filename unknown', 'reprocess alt file', 'rs.ProcessingJob.runReporcess');
		}


		// let resource space do the work
		if (Yii::app()->config->useCurl) {
			$this->log('Processing resource with curl');
			$run = Yii::app()->curl->run($s);
		} else {			
			$this->log('Processing resource through file_get_content, ('.$s.')');
			ini_set('default_socket_timeout', 60 * 60 * 24); // a whole day
			$ctx = stream_context_create(array('http'=>
				array('timeout' => 60*60*24)  //  1 day
			));				
			$run = file_get_contents($s, false, $ctx);
			$result = Util::substringIndex($run, ' ', -1);
			if ($result !== 'OK') {
				$this->log('Did not recieve ok: '.$run, true);
			}
		}	
		$this->rebuildConnection(); 

//		$this->fileCheck->change($orgFilename, 'File moved inplace', 'ProcessingJob.runResourceSpace', false);
		
		if (! $this->isAlternative) {	// we should set the alt_type of the alternate files created. Resource Space can't do it.
			$this->endProcess();
		}
		if (is_object($run) && $run->hasErrors()) {
			$this->reportError(self::ERR_RESOURCE_SPACE, $run->errors->message);
		} elseif (! ((substr($run, 0, 33) == 'File added / updated for resource') || (substr($run, 0, 35) == 'Alternate file updated for resource' ))) {
			$this->reportError(self::ERR_RESOURCE_SPACE, $run);
		} else {
			$this->log('Resource processed');
			if ($this->is_send_mail) {
				$mailClass = Yii::app()->config->mail['mailer'];
				$mail = new $mailClass();
				$this->log('Sending mail');
				$mail->render('processingDone', array('model' => $this));
				$this->log('Mail send');
			}
		}		
	}
	/**
	 * restores the trashbin if an error occured
	 */
	
	protected function restoreTrashbin()
	{
		if ($this->_trashbinName) {
			@rename($this->_trashbinName, $this->originalFilename);
		}
	}	
	
	/**
	 * runs the convert action with resource space.
	 * 
	 */
	protected function runResourceSpace()
	{
		try {
			if (!$this->moveOriginalFile()) {
				return false;
			}
			// copy file into Resource Space
			$orgFilename = $this->filename;	// the file somewhere to
			$newFilename = $this->new_filename;
			$extension = strtolower(pathinfo($newFilename, PATHINFO_EXTENSION));
			if (!file_exists($orgFilename)) {
				$this->reportError(self::ERR_FILE_NOT_FOUND, 'The file '.$orgFilename.' does not exist');
				$this->restoreOriginalFile();
				$this->storeValue('error_message', Yii::t('app', 'File {filename} not found', array('{filename}' => $orgFilename)), true);
				$this->storeValue('is_finished', 1);
				return false;
			}
			try {
				$this->log('Rename: '.$orgFilename.' to '.$newFilename);
				if (!file_exists($orgFilename) || !is_readable($orgFilename)) {
					$this->reportError(self::ERR_MOVING_FILE, 'The original file '. (file_exists($orgFilename) ? 'is not readable':'does not exist'));
					$this->restoreOriginalFile();
					return false;									
				}				
				if (file_exists($newFilename)) {
					@unlink($newFilename);
				}
				$this->fileCheck->change($orgFilename, 'File moved inplace', 'ProcessingJob.runResourceSpace', false);
				// this is the first time we did touch this file. So we have to make the md5 of this file and store it in the
				// art record uploaded_md5
				$this->log('Generating md5 of the file');
				$fileInfo = new FileInformation($orgFilename);
				try {
					$md5 = $fileInfo->calcMd5();
					$this->log('uploaded_md5=' .$md5);
	//				$this->art->uploaded_md5 = $md5;
				} catch(Exception $err) {
					$this->log('Error generating md5 on FTP:', $err->getMessage());
//					$this->art->uploaded_md5 = 'error';
				}
//				$this->art->save();
				// end of pre md5
				
				if (!$this->rename($orgFilename, $newFilename)) {
					$this->reportError(self::ERR_MOVING_FILE, 'Unexpected error moving file');
					$this->restoreOriginalFile();
					return false;									
				}
				// Post md5 calc
				$this->log('Calculating MD5 on Share');
				$fileInfo = new FileInformation($newFilename);
				try {
					$md5 = $fileInfo->calcMd5();
					$this->log('original_md5'.$md5);
					//$this->art->original_md5 = $md5;
				} catch(Exception $err) {
					$this->log('Error generating md5 on Share:', $err->getMessage());
//					$this->art->original_md5 = 'error';
				}
//				$this->art->save();
				$this->log('MD5 process ended.');
				// end post calc
				
				$this->fileCheck->change($newFilename, 'File moved inplace', 'ProcessingJob.runResourceSpace', true);				
			} catch (Exception $e) {
				$this->reportError(self::ERR_MOVING_FILE, $e->getMessage());
				$this->restoreTrashbin();
				return false;				
			}
			$this->log('Move succeded');
			if (! $this->isAlternative) {
				/**
				 * we must update the Resource extension
				 */
				$this->log('clearing image cache');
				$this->art->checkExtension($extension);
				$this->art->logChange(0, RSRecordModel::LOG_UPLOAD, null, null, $orgFilename, $this->user_id);

				// now update the previews
				// 
				// delete all files stored in the cache with the id of $this->id.'*.*';
				$fileHelper = new CFileHelper();
				$ff = $fileHelper->findFiles(Yii::app()->imageCache->imagePath('thumb'));
				$len = strlen($this->resource_id);
				$info = new FileInformation();
				foreach ($ff as $f) {
					$info->path = $f;
					if (substr($info->filename, 0, $len) == $this->id){
						@unlink($f);
					}	
				}					
			}	
			$this->runReprocess();			
		} catch (Exception $e) {
			$this->reportError('Exception: '. $e->getMessage(), true);
			$this->log('Unexpected exception');
			$this->restoreOriginalFile();
			return false;
		}	
		return true;
	}

	/**
	 * move the original file to the trashbin
	 * @return boolean true if done, otherwise false and error is reported
	 */
	protected function moveOriginalFile()
	{
		if ($this->original_filename) {
			$this->_originalFilename = $this->original_filename;
			$this->log('Moving original file ('.$this->_originalFilename.')');
			if (file_exists($this->_originalFilename)) {
				Yii::log('Moving file fysical file to trash: '.$this->_originalFilename, CLogger::LEVEL_INFO, 'toxus.process.procesingJob');
				$ext = pathInfo($this->_originalFilename, PATHINFO_EXTENSION);
				$deleteName = Yii::app()->config->imageTrashBin.$this->resource_id .'.'.$ext;; //pathinfo($fysicalName, PATHINFO_BASENAME);
				$path = pathinfo($deleteName);
				$l = 0;
				while (file_exists($deleteName)) {
					$l++;
					$deleteName = $path['dirname'].'/'.$path['filename'].'.'.$l.'.'.$path['extension'] ;
				}				
				$this->log('Final name '.$deleteName);			
				$this->fileCheck->change($this->_originalFilename, 'Move file to _delete', 'ProcessingJob.moveOriginalFile', false);
				if (!$this->rename($this->_originalFilename, $deleteName)) {				
					$this->reportError(self::ERR_CAN_NOT_MOVE_ORIGINAL, 'Can not move the original file');
					return false;
				}	
				$this->_trashbinName = $deleteName;
				$this->log('File moved');
			} else {
				$this->log('File does not exist', true);
			}
		}	
		return true;
	}
	/**
	 * restore the file if an error occures
	 */
	protected function restoreOriginalFile()
	{
		if ($this->_trashbinName) {
			$this->log('Restoring original file');
			$this->rename($this->_trashbinName, $this->_originalFilename);
			$this->log('Done');			
		}
	}


	/**
	 * runs a script
	 */
	protected function runAction()
	{
		$this->reportError(ERR_NOT_YET_IMPLEMENTED, 'Actions are not yet supported');
	}




	/**
	 * logs a message to the record and saves it 
	 * 
	 * @param string $message
	 * @param boolean $isError
	 */
	public function log($message, $isError = false)
	{
		Yii::log($message, CLogger::LEVEL_INFO, self::LOG_PREFIX.'log');
		/*
		$this->logging .= ($isError ? 'Error: ' : 'Info: ').Util::uDate().' - '. $message."\n";
		if (!$this->save()) {  // this a fatal condition. Must log this in the system
			Yii::log('FATAL: Can not save information.', CLogger::LEVEL_ERROR,  self::LOG_PREFIX,'log');
		};
 	  */
		$value = ($isError ? 'Error: ' : 'Info: ').Util::uDate().' - '. $message."\n";
		$this->storeValue('logging', $value, true);	// append the text
	}
	
	public function reportError($status, $message)
	{
		$this->error = $status;
		$this->error_message .= $message;
		$this->log($message.' (error: '.$status.')', true);
	}
	
	public function getJobTypeOptions()
	{
		return array(
			ProcessingJob::JOB_RESOURCE_SPACE => Yii::t('app', 'Resource Space conversion'),
			ProcessingJob::JOB_ACTION => Yii::t('app', 'Action'),
			ProcessingJob::JOB_REPROCESS => Yii::t('app', 'Reprocess'),
			ProcessingJob::JOB_MD5 => Yii::t('app', 'MD5 calculation'),
			ProcessingJob::JOB_MD5_FTP => Yii::t('app', 'MD5 FTP calculation')	
		);
	}
	public function getJobTypeText()
	{
		$a = $this->jobTypeOptions;
		return isset($a[$this->job_type_id]) ? $a[$this->job_type_id] : '(unknown)';
	}
	/**
	 * returns an explanation about the Job
	 */
	public function getExplain()
	{
		if ($this->resourceType == 'Art') {
			return $this->art->title;
		} else {
			return $this->agent->name;
		}	
	}
	/**
	 * 
	 * moves a file accros volums
	 * 
	 * @param string $org
	 * @param string $new
	 * @returns boolean
	 */
	private function rename($org, $new)
	{
		if (!@rename($org,$new)) {
			throw new CException(Yii::t('app','Error coping file: {org} to {new}',
							array(
								'{org}' => $org,
								'{new}' => $new	
							)));
		
		}
		return true;
	/*	
		if (@copy($org, $new) ) {
			@unlink($org);
			return true;
		}
		return false;
	}
	
	 * 
	 */
	}
	/**
	 * queues a job for reprocesssing
	 * 
	 * @param integer $id
	 */
	public function reprocess($id)
	{
		$model = Resource::model()->findByPk($id);
		if ($model) {
			$this->resource_id = $id;
			$this->job_type_id = self::JOB_REPROCESS;
			return true;
		} else {
			Yii::log('The resource '.$id.' could not be found.', CLogger::LEVEL_ERROR,  self::LOG_PREFIX.'reprocess');
			return false;
		}
	}
	/**
	 * There must be timeout on the mySQL when processing file longer the 1 hour.
	 * This routine reopens the record, store the value and save it
	 * 
	 * @param string $fieldname the name of the field
	 * @param string $value the value of the field
	 */
	private function storeValue($fieldname, $value, $append = false)
	{
		try {
			$job = ProcessingJob::model()->findByPk($this->id);
			if ($job) {
				if ($append) {
						$job->$fieldname .= $value;
				} else {
					$job->$fieldname = $value;
				}	
				if ($job->save()) {
					return;
				}
				Yii::log("The field $fieldname could not be save with $value",  CLogger::LEVEL_ERROR, self::LOG_PREFIX,'storeValue');
			}
		} catch(Exception $e) {
			Yii::log("The field $fieldname with save $value, generates an error: ".$e->getMessage(),  CLogger::LEVEL_ERROR, self::LOG_PREFIX,'storeValue');
		}
	}
	
	public function getFileCheck()
	{
		if ($this->_fileCheck === false) {
			$this->_fileCheck = FileCheck::model()->find(
				'resource_id=:id', array(':id' => $this->resource_id)			
			);
			if (empty($this->_fileCheck)) {
				$this->_fileCheck = new FileCheck();
				$this->_fileCheck->resource_id = $this->resource_id;
				$this->_fileCheck->logInfo('', 'created by ProcessingJob', '');
				// save and reopen because we keep writing to this check
				$this->_fileCheck->save();
				$this->_fileCheck = FileCheck::model()->find( // should not be needed but can't recreate error.
					'resource_id=:id', array(':id' => $this->resource_id)			
				);
			}
		}
		return $this->_fileCheck;
	}
	
	/**
	 * mark the job as ended
	 */
	public function markEnded()
	{
		$this->storeValue('ended_date', new CDbExpression('NOW()'));
		$this->storeValue('is_finished', 1);		

		$this->log('End of processing');
		if ($this->is_send_mail) { // send the message to the user the processing has been done
			$mail = new MailMessage();
			$to = UserProfile::model()->findByPk($this->user_id);			
			$mail->render('processingDone', array(
				'user' => $to,
				'art' => $this->art,
				'is_alternative' => $this->alternate_id > 0 ? 1 : 0,
				'has_errors' => empty($this->error_message) ? 0:1,
			));
		}		
	}
	
	/**
	 * Does the end processing so the files are placed in the directories 
	 * 
	 * @param bool $markDone if true the job will be marked as done too	 * 
	 * @return boolean
	 */
	public function endProcess($markDone = false) {
		$this->log('Marking master files as system');
		foreach ($this->art->altFiles as $altFile) {
			if ($altFile->alt_type == '' && in_array($altFile->name, Yii::app()->config->altFileSystemNames)) {
				$altFile->alt_type = Yii::app()->config->alternateTypeSystem;
				$this->log('File '.$altFile->id.' is system file.');
				$altFile->save();
			} elseif ($altFile->alt_type == Yii::app()->config->altFileSystemNames) {
				$this->log('File '.$altFile->id.' is system file.');
			}
		}
		if ($markDone) {
			$this->markEnded();
		}
		return true;
	}
	
	/**
	 * calculate the md5 of the master and stores this in the Art
	 * 
	 * @return boolean
	 */
	public function generateMd5() 
	{
		$art = $this->art;
		if (empty ($art)) {
			$this->log('Error: The Art does not exists');			
			return false;
		}
		if (! $art->masterFileExists) {
			$this->log('Error: The master file does not exist');			
			return false;			
		}
		
	  $art->storage_md5 = $art->calculateMd5();
		if (!$art->save()) {
			$this->log('Error: Can not save art');			
		};
		$this->endProcess();
		return $art->storage_md5 === false ? false : true;
	}
	
	public function generateMd5FTP() 
	{
		$fileInfo = new FileInformation($this->filename);
		if (!$fileInfo->exists()) {
			$this->log('The file '.$this->filename.' does not exist');
		} else {			
			$md5 = $fileInfo->calcMd5();
			$this->storeValue('action', $md5);
		}
		$this->endProcess();
	}
	
	/**
	 * called when the processing has been for a long long time
	 * 
	 */
	protected function rebuildConnection() 
	{
		try {
			Yii::app()->db->setActive(false);
			Yii::app()->db->setActive(true);
			Yii::app()->db->createCommand('select 1')->execute();
			return true;
		} catch (Exception $ex) {
			Yii::log('MySQL does not responde: '.$ex->getMessage(), CLogger::LEVEL_WARNING, $PROCESS_LOG);						
			return false;
		}		
	}
}
