<?php

Yii::import('application.models._base.BaseFileCheck');

class FileCheck extends BaseFileCheck
{
	/**
	 * holds the Recource connected to this file check
	 * 
	 * @var RSRecordModel
	 */
	private $_resource = false;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave() 
	{
		if ($this->isNewRecord) {
			$this->creation_date = new CDbExpression('now()');
}
		return parent::beforeSave();
	}
	

	/**
	 * Log a changes to a file. The FileCheck is save to disk
	 * 
	 * 
	 * @param string|bool $filename	the filename to calculate, if false the name of will be given by the Resource
	 * @param string $reason the reason why we are add a change
	 * @param string $location the location where the change to place
	 * @param bool $isSet if true it will update file/path/md5 to the new values 
	 *              otherwise this information is only logged (pre process update)
	 */
	public function change($filename, $reason, $location, $isSet=true) 
	{
		if (file_exists($filename)) {
			$md5 = md5_file($filename);
			$this->logInfo($filename, $reason, $md5);
			if ($isSet) {
				$path = pathinfo($filename);
				$this->filename = $path['basename'];
				$this->path = $path['dirname'];
				$this->md5 = $md5;
			}
		} else {
			$this->logError('File does not exists', $filename, $reason,$location);
		} 
		if (!$this->save()) {
			$e = $this->errors;
			throw new CDbException('FileCheck could not be saved: '.CHtml::errorSummary($e));
		}	
	}
	/**
	 * Log the change to an alternate file
	 * 
	 * @param integer $id the id of the alternate file
	 * @param string $filename the new filename to used
	 * @param string $reason    what initiated the change
	 * @param string $location	source code where
	 */
	public function changeAlt($id, $filename, $reason,$location)
	{
		if (file_exists($filename)) {
			$md5 = md5_file($filename);
			$alt = CJSON::decode($this->alternate_files_json);
			$alt[] = array(
				'date' => time(),
				'id' => $id,								// can be null of new alt file is added
				'filename' => $filename,
				'reasion' => $reason,
				'location' => $location,
				'md5' => $md5	
			);
			$this->alternate_files_json = CJSON::encode($alt);
			$info = CJSON::decode($this->info_json);
			$info[] = array(
				'date' => time(),
				'filename' => $filename,
				'reason' => 'Alternate file has been added (id:'.$id.')',
				'md5'	=> $md5,
			);
			$this->info_json = CJSON::encode($info);
		} else {
			$this->logError('Alternate file does not exists', $filename, $reason,$location);
		} 
		if (!$this->save()) {
			throw new CDbException('FileCheck could not be saved: '.CHtml::errorSummary($this->errors));
		}	
		
	}
	public function logInfo($filename, $reason, $md5) 
	{
		if (empty($this->info_json)) {
			$info = array();
		} else {
			$info = CJSON::decode($this->info_json);
		}
		$info[] = array(
			'date' => time(),	
			'filename'=> $filename,
			'reason' => $reason,
			'md5' => $md5,	
		);
		$this->info_json = CJSON::encode($info);
	}
	
	/**
	 * Store the error in the error_json. 
	 * Does NOT save the log to the disk
	 * 
	 * @param type $message		- what happend
	 * @param type $filename	- on which file
	 * @param type $reason		- what was the original event
	 * @param type $location	- where did it come from
	 */
	public function logError($message, $filename,$reason,$location) 
	{
		if (empty($this->error_json)) {
			$err = array();
		} else {
			$err = CJSON::decode($this->error_json);
		}
		$err[] = array(
			'date' => time(),	
			'message' => $message,
			'filename' => $filename,
			'reason' => $reason,
			'location' => $location,	
		);
		$this->error_json = CJSON::encode($err);
	}
	
	public function getResource()
	{
		if ($this->_resource === false) {
			$this->_resource = RSRecordModel::model()->findByPk($this->resource_id);
			if (empty($this->_resource)) {
				Yii::log('Resource model ('.$this->resource_id.') not found', CLogger::LEVEL_ERROR, 'toxus.fileCheck.resource');
			}
		}
		return $this->_resource;
	}
	
	/**
	 * List the alternate info as an array
	 * Duplicates are automatically removed
	 * 
	 * @return array of alternate_id => alt info
	 */
	public function getAlternates()
	{
		$alt = CJSON::decode($this->alternate_files_json);
		$result = array();
		foreach ($alt as $a) {
			$result[$a['id']] = $a;
		}
		return $a;
	}
}
