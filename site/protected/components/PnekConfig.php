<?php
/**
 * client defined options
 */
class PnekConfig extends ApplicationConfig
{
	public $alternateTypeSystem = 'system';
	
	public $language = 'en';
	
	public $altImageRoot;
	/**
	 * the resource information has been loaded from the rs/include/config
	 * 
	 * @var boolean
	 * 	 */
	private $_configLoaded = false;
	/**
	 * key used to generate the filename, so it can be quest from the outside.
	 * 
	 * @var string
	 */
	private $_scrambleKey = '';
	/**
	 * the file extension used for ffmpeg
	 * @var array
	 */
	private $_ffmpegExtensions = array();
	/**
	 * return the extension process for audio
	 * @var array
	 */
	private $_ffmpegAudioExtensions = array();

	/**
	 * return the doc, pdf, etc extensions
	 * 
	 * @var array
	 */
	private $_docExtensions = array();
	/**
	 * The extension for the images
	 * @var array
	 */
	private $_imageExtensions = array();
	/** 
	 * the root of resource space
	 * @var string
	 */	
	private $_baseUrl = null;
	
	/**
	 * the config file.
	 * 
	 * @var string
	 */
	private $_resourceSpaceConfigFilename = '';
	
	/**
	 * the type of alternative files that do exist
	 * @var array
	 */
	private $_alternativeTypes = false;
	
  /*
	public function init()
	{
		$this->altImageRoot = realpath(Yii::getPathOfAlias('website').'/../'.Yii::app()->config->system['rsDirectory'].'/filestore').'/';
		parent::init();
	}
	*/
	public function getYesNoUnknownOptions()
	{
		return array(
				'Ja' => Yii::t('app','Yes'),
				'Nei'=> Yii::t('app', 'No'),
				'' => Yii::t('app', 'Unknown'),
		);		
	}
	public function getYesNoOptions()
	{
		return array(
				'Ja' => Yii::t('app','Yes'),
				''=> Yii::t('app', 'No'),
		);		
	}
	
	public function getDefaultProductionCountry()
	{
		return 'Norway';
	}
	
	/**
	 * get the fysical path of the resource space installation
	 */
	public function getResourceSpacePath()
	{
		return realpath(dirname(__FILE__).'/../../../'.Yii::app()->config->system['rsDirectory']).'/';
	}
	
	/**
	 * the root on the server for resource space
	 * 
	 * @return string
	 */
	public function getResourceSpace()
	{
		return '/'.Yii::app()->config->system['dbDirectory'].'/';
	}
	
	public function getResourceSpaceBaseUrl()
	{
		$this->loadResourceSpaceConfig();
		return $this->_baseUrl.'/';
	}
	
	public function getResourceSpaceRoot()
	{
		// $rs = Yii::app()->params['resourceSpacePath'];
    $rs = Yii::app()->config->system['rsDirectory'];
		$path = Yii::getPathOfAlias('webroot');
		return realpath($path.'/../'.$rs).'/';		
	}
	
	public function getResourceSpaceImageRoot()
	{
		return $this->resourceSpaceRoot.'filestore'.'/';
	}
	public function getImageTrashBin()
	{
		$dir = $this->resourceSpaceRoot.'filestore'.'/_delete';
		if (!is_dir($dir)) {
			@mkdir($dir, 0777);
			@chmod($dir, 0777);			
		}
		return $dir.'/';
	}
	
	public function getResourceSpaceImageUrl()
	{
		//return 'http://'.Yii::app()->request->serverName.'/'.Yii::app()->params['resourceSpaceUrl'].'/filestore/';
		return $this->resourceSpaceBaseUrl.'filestore/';
	}
	public function getResourceSpaceApi()
	{
		// return 'http://'.Yii::app()->request->serverName.'/'.Yii::app()->params['resourceSpaceUrl'].'/plugins/';
		return $this->resourceSpaceBaseUrl.'plugins/';
	}
	
	protected function loadResourceSpaceConfig()
	{
		if (!$this->_configLoaded) {
			$this->_resourceSpaceConfigFilename =  $this->resourceSpaceRoot.'include/config.php';
			if (!file_exists($this->_resourceSpaceConfigFilename)) {
				echo 'ERROR: The resource space definition does not exist in: '.$this->_resourceSpaceConfigFilename.'<br/>';
				echo 'Please adjust the /config/main.php resourceSpacePath so this is relative to the Yii webroot.<br/>';
				Yii::app()->end();
			}
			include $this->_resourceSpaceConfigFilename;		
			$this->_baseUrl = isset($baseurl) ? $baseurl : '';
			$this->_scrambleKey = isset( $scramble_key) ?  $scramble_key : '';
			$this->_ffmpegExtensions = isset($ffmpeg_supported_extensions) ? $ffmpeg_supported_extensions : array('*');
			$this->_ffmpegAudioExtensions = isset($ffmpeg_audio_extensions) ? $ffmpeg_audio_extensions : array('*');
			$this->_docExtensions = isset($doc_extensions) ? $doc_extensions : array('*');
			$this->_imageExtensions =  isset($image_extensions) ? $image_extensions : array('*');
			$this->_alternativeTypes = isset($alt_types) ? $alt_types : array('');
			$this->_configLoaded = 1;
		}
	}
	
	public function getResourceSpaceConfigFilename()
	{
		$this->loadResourceSpaceConfig();
		return $this->_resourceSpaceConfigFilename;
	}
	public function getScrambleKey()
	{
		$this->loadResourceSpaceConfig();
		return $this->_scrambleKey;
	}

	public function getVideoExtensions()
	{
		$this->loadResourceSpaceConfig();
		return $this->_ffmpegExtensions;
	}
	public function getAudioExtensions()
	{
		$this->loadResourceSpaceConfig();
		return $this->_ffmpegAudioExtensions;
	}
	public function getDocExtensions()
	{
		$this->loadResourceSpaceConfig();
		return $this->_docExtensions;

		// don't know the resource key for doc extension
		//return array('doc','docx','pdf','odt', 'ott', 'odg', 'otg', 'odp', 'otp', 'ods', 'ots', 'odf', 'otf', 'odm', 'oth','xlsx', 'pptx', 'xps','blend',
		//						'txt','art','epi','eps', 'eps2', 'eps3', 'epsf','epsi', 'ept','fax');
	}
	/**
	 * the full path to the ftp/copy upload directory 
	 * 
	 * @return string
	 */
	public function getUploadPath()
	{
		// return Yii::app()->params->upload.'/';
		return Yii::app()->config->fixedValues['upload_path'];
	}
	/**
	 * returns the extension of the file allowed to connect
	 */
	public function getAllowFileExtensions()
	{
		return implode(',', array_merge($this->videoExtensions, $this->imageExtensions, $this->audioExtensions, $this->docExtensions ));
		//return Yii::app()->params['fileExtensions'];
	}
	public function getImageExtensions()
	{
		$this->loadResourceSpaceConfig();
		return $this->_imageExtensions;
	//	return array('jpg','gif','jpeg','tiff','png');
	}
	/**
	 * the id for a resource of the type of art
	 * @return int
	 */
	public function getResourceArtId()
	{
		return 3;
	}				
	/**
	 * return the id for a resource of the type of agent
	 * @return int
	 */
	public function getResourceAgentId()
	{
		return 4;
	}
	
	/**
	 * return true if Curl should be used for the ResourceSpace connector, otherwise file_get_contents
	 * 
	 * @return boolean
	 */
	public function getUseCurl()
	{
		return false;
	}
	
	public function getAlternativeTypesOptions()
	{
		$this->loadResourceSpaceConfig();
		return $this->_alternativeTypes;
	}
	
	/**
	 * the names use for system files
	 * order: x, webm and suborder LQ HQ
	 * @return array
	 */
	public function getAltFileSystemNames()
	{
		return array(
				'x264_LQ',
				'x264_HQ',
				'webm_LQ',				
				'webm_HQ',
        'Mezzanine'
		);
	}
}
