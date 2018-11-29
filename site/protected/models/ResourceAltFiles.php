<?php
/**
 * Resource Space Alternate Files
 * 
 * LIMITS: 
 *   * on delete: the alternate files will not be deleted from disk.
 */

Yii::import('application.models._base.BaseResourceAltFiles');
class ResourceAltFiles extends BaseResourceAltFiles
{
	private $_parent = null;
	protected $_resourceRootPath = null;
	protected $_resourceRootUrl = null;
	/**
	 * the job creating all sub files
	 * 
	 * @var ProcessingJob
	 */
	private $_processingJob = false;
	
	public $file = null;	// the uploaded file
	public $selectFilename = null;
	public $filePath = null; // the full path to the file if it's uploaded
	
	/**
	 * if set then on the end of processing a mail is send to the user
	 * @var integer
	 */
	public $send_mail = 0;
	 /** The connected art model 
	 * 
	 * @var RSModel
	 */
	private $_art = null;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return //parent::rules() + 
			array(				
				array('name,folder,send_mail', 'safe'),	
				array('file', 'file', 'allowEmpty'=>true, 'types'=>Yii::app()->config->allowFileExtensions),	
				array('selectFilename,description', 'safe'),	
			);		
	}
	
	
	public function beforeSave() {
		if ($this->isNewRecord) {
			if ($this->file==null && strlen($this->selectFilename) == 0) {
				$this->addError('file', Yii::t('app', 'An file must be uploaded or a file must be linked'));
				return false;
			}		
		}	
		if ($this->file !=null || strlen($this->selectFilename) != 0) {
			$this->_processingJob = new ProcessingJob();					
			if ($this->file != null) {
				// move file to better location
				$l = 1;
				//$name = YiiBase::getPathOfAlias('application.runtime.temp');// $this->file->tempName.'.rs_import';
				$name = Yii::app()->config->fixedValues['temp_storage_path'];
				$name .= substr($name, -1) == '/' ? '' : '/';				
//				if (!is_dir($name)) {
//					@mkdir($name);
//					@chmod($name, 0777);
//				}
//				$name .= '/';
				$filename = $name.'temp.rs_import';
				while (file_exists($filename)) {
					$filename = $name.'temp.'.$l.'.rs_import';
					$l ++;
				}				
				while (file_exists($filename)) {
					$filename = $this->file->tempName.'.rs_import.'.$l;
					$l ++;
				}
				$this->file_size = filesize($this->file->tempName);								
				$this->art->fileCheck->changeAlt($this->id, $this->file->tempName, 'New alt file', 'rs.resourcealtfiles.beforeSave');
				$tmpName = $this->file->tempName;
				if (@rename($tmpName, $filename) == false) {
					throw new CException(Yii::t('app', 'The file could not be move in location. (from: {from}, to: {to}', array('{from}' => $tmpName, '{to}' => $filename)));
				}	
				$this->_processingJob->filename = $filename;
				$ext = $this->file->extensionName;
				if ($this->name == '') {
					$this->name = $this->file->name;
				}				
				$this->file_name = $this->file->name;
				$this->file_extension = $this->file->extensionName;		
			} else { 
				$this->_processingJob->filename = Yii::app()->config->fixedValues['upload_path'].'/'.$this->selectFilename;
				$ext = strtolower(pathinfo($this->selectFilename, PATHINFO_EXTENSION));				
				if ($this->name == '') {
					$this->name = $this->selectFilename;
				}
//				$s = $this->selectFilename;
				$this->file_name = $this->selectFilename;
				$this->file_size = filesize(Yii::app()->config->fixedValues['upload_path'].'/'.$this->selectFilename);				
				$this->file_extension = pathinfo($this->selectFilename, PATHINFO_EXTENSION);				
			} 
			$this->file_extension = strtolower($this->file_extension);			
			$this->creation_date = new CDbExpression('NOW()');	
			
			$this->_processingJob->resource_id = $this->resource;
			$this->_processingJob->job_type_id = ProcessingJob::JOB_RESOURCE_SPACE;
			$this->_processingJob->is_send_mail = $this->send_mail;
			$this->_processingJob->save();			
			$this->art->fileCheck->changeAlt($this->id, $this->_processingJob->filename, 'New alt file', 'rs.resourcealtfiles.beforeSave');			
		}
		if (trim($this->name) == '') {
			$this->addError('name', Yii::t('app', 'There is no name given' ));
			return false;
		}
		return parent::beforeSave();
	}
	
	protected function moveOriginalFile()
	{
		//$fysicalName = $this->resourcePath.$this->filename();
		$fysicalName = $this->downloadPath;
		if (file_exists($fysicalName)) {
			Yii::log('Moving file fysical file to trash: '.$fysicalName, CLogger::LEVEL_INFO, 'application.models.art.moveOriginalFile');
			$ext = pathInfo($fysicalName, PATHINFO_EXTENSION);
			$deleteName = Yii::app()->config->imageTrashBin.  $this->resource .'.alt.'.$ext;; //pathinfo($fysicalName, PATHINFO_BASENAME);
			$path = pathinfo($deleteName);
			$l = 0;
			while (file_exists($deleteName)) {
				$l++;
				$deleteName = $path['dirname'].'/'.$path['filename'].'.'.$l.'.'.$path['extension'] ;
			}
			Yii::log('Renaming file: '.$deleteName, CLogger::LEVEL_INFO, 'application.models.art');			
			if (!@rename($fysicalName, $deleteName))
				return false;
		//	$this->_trashbinName = $deleteName;
		}
		return true;
	}
	
	/**
	 * process the file location
	 */
	public function afterSave()
	{
		if ($this->_processingJob) {
			$this->_processingJob->new_filename = $this->resourcePath. $this->parentResource->filename(array(
					'alternative' => $this->id,
					'extension' => $this->file_extension,	
					'generateDirectories' => true,
			));			
			$this->_processingJob->alternate_id = $this->ref;
			$this->_processingJob->save();
		}
	}
	

	/**
	 * move the file to the _delete directory so the system NEVER overwrites any file
	 */
	public function beforeDelete()
	{
		if ($this->moveOriginalFile()) {	
			return parent::beforeDelete();
		}
		return false;
	}
	
	public function updatePreview()
	{
		 // delete all files stored in the cache with the id of $this->parent->id.'pre_alt_'.$this->id.'.*';
		$prefix = $this->resource.'pre_alt_'.$this->id;
		$fileHelper = new CFileHelper();
		$ff = $fileHelper->findFiles(Yii::app()->imageCache->imagePath('thumb'));
		$len = strlen($prefix);
		$info = new FileInformation();
		foreach ($ff as $f) {
			$info->path = $f;
			if (substr($info->filename, 0, $len) == $prefix){
				unlink($f);
			}	
		}	
		
		// give file to resource space
		$s = Yii::app()->config->resourceSpaceApi.'/api_import?id='.$this->resource.'&altId='.$this->id;
		if (Yii::app()->config->useCurl) {
			Yii::log('Resource Space update through curl('.$s.')', CLogger::LEVEL_WARNING, 'application.models.ResourceAltFiles.updatePreview');			
			$run = Yii::app()->curl->run($s);
		} else {			
			Yii::log('Resource Space update through file_get_content('.$s.')', CLogger::LEVEL_WARNING, 'application.models.ResourceAltFiles.updatePreview');			
			$run = file_get_contents($s);
		}	
		if ((is_object($run) && $run->hasErrors()) || (substr($run, 0, 33) != 'File added / updated for resource') ) {
			Yii::log('Resource Space update failed.', CLogger::LEVEL_WARNING, 'application.models.ResourceAltFiles.updatePreview');			
			$this->addError('file', 'The resource space definition could not be updated.');
		} else {
			Yii::log('Resource Space updated.', CLogger::LEVEL_INFO, 'application.models.ResourceAltFiles.updatePreview');			
		}
	}
	
	public function getParentResource()
	{
		if ($this->_parent == null) {
			$res = Resource::model()->findByPk($this->resource);
			if (!$res) throw new CDbException('Resource '.$this->resource.' not found');			
			$class = ucfirst(Yii::t('fields', $res->type->name));
			$this->_parent = $class::model()->findByPk($this->resource);
		}
		return $this->_parent;	
	}
	
	public function getId()
	{
		return $this->ref;
	}
	public function setId($value)
	{
		$this->ref = $value;
	}
	
	/**
	 * returns the fysical path on the server to all resources
	 * 
	 * @return string
	 */
	public function getResourcePath()
	{
		if ($this->_resourceRootPath == null) {
			$this->_resourceRootPath = Yii::app()->config->resourceSpaceImageRoot;
		}
		return $this->_resourceRootPath;
	}
	/**
	 * returns the url to the root of all resource
	 *  
	 * @return string
	 */
	public function getResourceUrl()
	{
		if ($this->_resourceRootUrl == null) {
			$this->_resourceRootUrl = Yii::app()->config->resourceSpaceImageUrl;
		}
		return $this->_resourceRootUrl;
	}	
		
	public function getIsImage()
	{
		$ext = $this->file_extension;
		$graph = Yii::app()->config->imageExtensions;
		if (in_array($ext, $graph))
			return true;
		$video = Yii::app()->config->videoExtensions;
		if (in_array($ext, $video))
			return true;		
		return false;
	}
	
	/** 
	 * return true if the file is an video
	 */
	public function getIsVideo()
	{
		$videoExt = Yii::app()->config->videoExtensions;
		return in_array(strtolower($this->file_extension), $videoExt);
	}
	
	/**
	 * returns the url of the preview image even if it's an video.
	 * 
	 * @returns string
	 */
	public function getPreviewImageUrl()
	{
		$params = array(
		//		'size' => 'pre', 
				'alternative' => $this->id, 
				'extension' => 'jpg');
		return $this->resourceUrl.$this->parentResource->filename($params);		
	}
	/**
	 * return the full path to the thumbnail
	 * 
	 * @return string
	 */
	public function getPreviewThumbUrl()
	{
		$params = array(
	//			'size' => 'pre',// 'scr', 
				'alternative' => $this->id, 
				'extension' => 'jpg');
		$filename = $this->parentResource->filename($params);		
		$url = '';
		if ($filename) {
			$filename = $this->resourcePath.$filename;
			$url = Yii::app()->imageCache->imageUrl($filename, 'thumb');
		}
		return $url;
	}
	
	/**
	 * the preview in 4:3 definition
	 */
	public function getTvRatioUrl() 
	{
		$params = array(
	//			'size' => 'pre',// 'scr', 
				'alternative' => $this->id, 
				'extension' => 'jpg');
		$filename = $this->parentResource->filename($params);		
		$url = false;
		if ($filename) {
			$filename = $this->resourcePath.$filename;
			$url = Yii::app()->imageCache->imageAddUrl($filename, 'alt-'.$this->id.'.jpg', 'tv');
		}
		return $url;
		
	}
	/**
	 * returns the full url to the preview. Can be an .jpg or .flv depending on the isVideo
	 * 
	 * @returns string
	 */
	public function getPreviewUrl($ext = 'flv')
	{
		$params = array(
				'size' => 'pre', 
				'alternative' => $this->id, 
				'extension' => $this->isVideo ? $ext : 'jpg',
				);
		return $this->resourceUrl.$this->parentResource->filename($params);				
	}
	/**
	 * returns the url to the original file.
	 * 
	 * @return string
	 */
	public function getDownloadUrl()
	{
		$params = array(
				'alternative' => $this->id, 
				'extension' => $this->file_extension,
				);
		return $this->resourceUrl.$this->parentResource->filename($params);						
	}
	/**
	 * return the fysical path to the resource including filename
	 * @return string
	 */
	public function getDownloadPath()
	{
		$params = array(
				'alternative' => $this->id  ?$this->id : 'none',	// don't let it be false! 
				'extension' => $this->file_extension,
				);
		return $this->resourcePath.$this->parentResource->filename($params);								
	}
	
	public function getFileSize()
	{
		$bytes = $this->file_size;
		if ($bytes > 0)	{
			$unit = intval(log($bytes, 1024));
			$units = array('B', 'KB', 'MB', 'GB');

			if (array_key_exists($unit, $units) === true)	{
				return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
			}
		}
		return $bytes.' B';
	}
	
	/**
	 * the folder in the alternatives
	 * @return array
	 */
	public function getFolderOptions()
	{
		return Yii::app()->config->alternativeTypesOptions;
	}
	/**
	 * the name of the folder
	 * @return string
	 */
	public function getFolder()
	{
		return $this->alt_type;
	}
	public function setFolder($name)
	{
		$this->alt_type = $name;
	}
	/**
	 * true if this is a system folder file
	 * @return boolean
	 */
	public function getIsSystemFolder()
	{
		return $this->alt_type == Yii::app()->alternateTypeSystem;
	}
	
	/**
	 * return the unfinished job that is processing this resource
	 * @return CActiveRecord
	 */
	protected function getProcessingJob()
	{
	  if ($this->_processingJob === false) {
			$this->_processingJob = ProcessingJob::model()->find('alternate_id=:id AND is_finished=0', array(':id' => $this->id));
		}	
		return $this->_processingJob;
	}	
	
	
	/**
	 * return true if the Alternate file is in the processing queue and not finished
	 */
	public function getIsProcessing()
	{
		return !empty($this->processingJob);
	}
	
	public function getArt()
	{
		if ($this->_art == null) {
			$this->_art = Art::model()->findByPk($this->resource);
		}
		return $this->_art;
	}
	
	/**
	 * checkes for any inconsistencies and fixes them. Return false + errors if 
	 * something is realy wrong
	 */
	public function checkStatus() 
	{
		$this->clearErrors();
		$result = true;
		$res = Resource::model()->findByPk($this->resource);
		if (empty($res)) {
			$this->addError('alt', Yii::t('app', 'There resource {id} could not be found.', array('{id}' => $this->resource)));
			return false;
		}
		$altFileSystemNames = Yii::app()->config->altFileSystemNames;   // the name defined by ResourceSpace
		$altFileType = Yii::app()->config->alternateTypeSystem;					// which directory to use
		foreach ($res->allAltFiles as $altFile) {
			$name = $altFile->name;
			$type = $altFile->alt_type;
			if ($altFile->alt_type == '' && in_array($altFile->name, $altFileSystemNames )) {
				$altFile->alt_type = $altFileType;
				Yii::log('File '.$altFile->id.' marked as system file.', CLogger::LEVEL_INFO, 'toxus.resource.altfile');
				$altFile->save();
			} elseif ($altFile->alt_type == $altFileType) {
				Yii::log('File '.$altFile->id.' is already marked as system file.', CLogger::LEVEL_INFO, 'toxus.resource.altfile');
			}
			$path = $altFile->downloadPath;
			if (!file_exists($path)) {
				$this->addError('file', Yii::t('app', 'The file "{name}" (filename: "{filename}") does not exist on disk.', array('{name}' => $altFile->name, '{filename}' => $path)));
				$result = false;
			} elseif (filesize($path) < Yii::app()->config->fixedValues['minAltFileSize']) {
				$this->addError('file', Yii::t('app', 'Warning: The file "{name}" is very small ({bytes} bytes).', array('{name}' => $altFile->name, '{bytes}' => filesize($path))));
				$result = false;				
			};
		}		
		return $result;
	}
	
}
