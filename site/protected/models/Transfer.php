<?php

Yii::import('application.models._base.BaseTransfer');

class Transfer extends BaseTransfer
{
  const DATE_FORMAT = 'y-M-d h:m:s';
  
  public $sendTo = '';              // , sep list of send to
  protected $sendToArray = array();     // array of email address
  public $recipients = array();         // full info what was send
  
	protected $mailLogModel = 'MailModel';
  
  private $_sender = false;
  
  private $_masterDownload = array();
  private $_masterView = array();
  private $_altDownload = array();
  public $files = array();

  private $_userKey = false;  // the current user looking
  private $_art = false;
	
  
  public function rules() {
    return array(
      array('sendTo,message', 'safe'),      
    );
  }
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
  
  public function beforeValidate() {
    $this->sendTo = str_replace(' ', '', trim($this->sendTo));
    $this->sendToArray = Util::explodeClean(',', $this->sendTo);
    if (count($this->sendToArray) == 0) {
      $this->addError('sendTo', 'There are not recipients.');
    } else {
      $Validator = new CEmailValidator;
      foreach ($this->sendToArray as $email) {
        if (!$Validator->validateValue($email)) {
          $this->addError('sendTo', $email.' is not a valid email address');  
        }        
      }
    }
    if (count($this->_altDownload) == 0 && count($this->_masterDownload) == 0 && count($this->_masterView) == 0) {
      $this->addError('sendTo', 'There are no files to transfer');  
    }
    $this->processFiles();

    
    return parent::beforeValidate();
  }
  
  public function afterFind() {
    $this->recipients = CJSON::decode($this->recipients_json);
    $this->files = CJSON::decode($this->files_json);
    return parent::afterFind();
  }
  
  public function beforeSave() {
    if ($this->isNewRecord) {
      $this->creation_date = new CDbExpression('now()');      
      $this->expire_date = new CDbExpression('DATE_ADD(NOW(), INTERVAL '.Yii::app()->config->transfer['expire_days'].' DAY)');
      $this->sender_id = Yii::app()->user->profile->id;
      $this->key = Util::generateRandomString(30);
      
      $this->notifyUsers();      
    }
    $this->recipients_json = CJSON::encode($this->recipients);
    $this->files_json = CJSON::encode($this->files);
    return parent::beforeSave();
  }
  /**
   * builds the list of users to send the mail to
   * 
   * @return boolean
   */
  protected function notifyUsers() {
    $this->recipients = array();
    foreach ($this->sendToArray as $email) {
      $msgDef = array(
        'key' => Util::generateRandomString(30),
        'email' => $email,
        'send_date' => date_format(date_create(),self::DATE_FORMAT),
        'open_date' => false,
      );
      if (!$this->sendMessage($msgDef)) {
        return false;;
      }
      $this->recipients[] = $msgDef;
    }
    return true;
  }
  
  /**
   * process the file list into a storage structure
   */
  public function processFiles() {
    $result = array();
    foreach ($this->_masterDownload as $fileType) {
      $alt = ResourceAltFiles::model()->find('resource=:artId AND name=:type', array(
        ':artId' => $this->art_id,
        ':type' => $fileType
      ));
      if (!empty($alt)) {
        $result['down-'.$fileType] = array(
          'key' => Util::generateRandomString(30),
          'type' => $fileType,
          'altId' => $alt->ref,
          'action' => 'download'
        );
      }
    }
    foreach ($this->_masterView as $fileType) { // hq or lq
      $alt = ResourceAltFiles::model()->find('resource=:artId AND name=:type', array(
        ':artId' => $this->art_id,
        ':type' => 'x264_'.$fileType
      ));
      if (!empty($alt)) {
        $result['view-mp4-'.$fileType] = array(
          'key' => Util::generateRandomString(30),
          'type' => $fileType, // hq | lq  
          'extension' => 'mp4',
          'action' => 'view',
          'altId' => $alt->id,
        );
      }
      $alt = ResourceAltFiles::model()->find('resource=:artId AND name=:type', array(
        ':artId' => $this->art_id,
        ':type' => 'webm_'.$fileType
      ));
      if (!empty($alt)) {
        $result['view-webm-'.$fileType] = array(
          'key' => Util::generateRandomString(30),
          'type' => $fileType, // hq | lq  
          'extension' => 'webm',
          'action' => 'view',
          'altId' => $alt->id,
        );
      }
    }
    foreach ($this->_altDownload as $fileId) {
      $result['altr-'.$fileId] = array(
        'key' => Util::generateRandomString(30),
        'type' => 'altr',
        'altId' => $fileId,
        'action' => 'alternate'
      );
    }
    $this->files = $result;
    return count($result) > 0;
  }
  
  public function fileChecked($action, $quality) {
    foreach ($this->files as $f) {
      if ($f['action'] == $action && $f['type'] == $quality) {
        return true;
      }
    }
    return false;
  }
  /**
   * Send the message to the user
   * 
   * @param array $definition
   * @return boolean
   */
  protected function sendMessage($definition) {
    $class = Yii::app()->config->mail['mailer'];
    $mailer = new $class();
		$mailer->mailLogModel = $this->mailLogModel;
		try {
      if (! $mailer->render('transfer', array(      
        'model' => $this,
        'definition' => $definition,
      ), false)) {
        $this->addError('sendTo', Yii::t('base', 'Unable to send mail'));
        return false;
      }	
    } catch (Exception $e) {
      $this->addError('sendTo', 'Error rendering the mail.'.$e->getMessage());
      return false;
    }
		return true;
  }
  /**
   * generates a key as array, to create a link to this definition
   * @param type $definition is generated in notifyUsers
   */
  public function generateUrlKey($definition) {
    return array(
      $this->key => $definition['key']
    );
  }
  public function getSender() {
    if ($this->_sender == false) {
      $this->_sender = User::model()->findByPk($this->sender_id);
    }
    return $this->_sender;
  }
  public function getArt() {
    if ($this->_art == false) {
      $this->_art = Art::model()->findByPk($this->art_id);
    }
    return $this->_art;
  }
  
  public function getMasterTypes() {
    if (Yii::app()->config->transfer['allow_master']) {
      $return = array(
        'master' => 'Master file'
      );
    } else {
      $return = array();
    }
    return array_merge(
      $return,
      array(
        'webm_lq' => 'Webm Low Quality',
        'webm_hq' => 'Webm High Quality',
        'x264_lq' =>  'Mp4 Low Quality',        
        'x264_hq' =>  'Mp4 High Quality', 
        'mezzanine' => 'Mezzanine codec',
      )
    );
  }
  
  /**
   * overloaded version that can get the array info from the form
   */
  public function setAttributes($values, $safeOnly = true) {
   
    $this->_altDownload = array();
    $this->_masterDownload = array();
    $this->_masterView = array();
    foreach ($values as $key => $value) {
      if (!empty($value)) {
        $name = substr($key, 0,5);
        switch ($name) {
          case 'view_' : $this->_masterView[] = $value; break;
          case 'down_' : $this->_masterDownload[] = $value; break;
          case 'altr_' : $this->_altDownload[] = $value; break;
        }
      }  
    }
    parent::setAttributes($values, $safeOnly);  // get the normal definition
  }
  
  /**
   * Validate the download for the user by date and entry in the recipients
   * @param type $user
   */
  public function validateUser($user=false) {
    if ($user == false) {
      $user = $this->_userKey;
    }
    $now = date_format(date_create(), self::DATE_FORMAT);
    if ($this->expire_date < $now) {
      return Yii::t('app', 'The download has expired');
    }
    foreach ($this->recipients as $recipient) {
      if ($recipient['key'] == $user) {
        return '';
      }
    }
    return Yii::t('app', 'The user could not be found');
  }
  
  
  public function setCurrentUser($user) {
    $this->_userKey = $user;
  }
  
    /*
   * returns the full fysical path to the file
   */
  public function fysicalFilename($fileId) {
    $this->validateUser();
    foreach ($this->files as $file) {
      if ($file['key'] == $fileId) {
        $altFile = ResourceAltFiles::model()->findByPk($file['altId']);
        if (empty($altFile)) {
          Yii::log('The ResourceAltFile '.$file['altId'].' does not exist', CLogger::LEVEL_ERROR, 'toxus.transfer.fysicalFilename');
          throw new CDbException('The file could not be found.');
        }
        return $altFile->downloadPath;
      }
    }
    throw new CDbException('The file could not be found');
  }
  
  protected function userMasterView($hq, $mp4) {
    $result = false;  
    $hqTxt = $hq ? 'hq' : 'lq';
    $typeTxt = $mp4 ? 'mp4' : 'webm';
     foreach ($this->files as $file) {
      if ($file['action'] == 'view' && $file['type'] == $hqTxt && $file['extension'] == $typeTxt) {
        $alt = ResourceAltFiles::model()->findByPk($file['altId']);
        if (!empty($alt)) {
          $result = array(
            'url' => Yii::app()->createUrl('transfer/view').'/'.$this->key.'/'.$this->_userKey.'/'.$file['key'],
            'key' => $file['key'],
            'caption' => $alt->name
          );
        }
        break;
      }
    }
    return $result;    
  }
  /**
   * return the url to use for download the HQ version of the file
   */
  public function getUserMasterViewHQWebm() {
    return $this->userMasterView(true, false);
  }
  public function getUserMasterViewLQWebm() {
    return $this->userMasterView(false, false);
  }
  public function getUserMasterViewHQMp4() {
    return $this->userMasterView(true, true);
  }
  public function getUserMasterViewLQMp4() {
    return $this->userMasterView(false, false);
  }
  
  /**
   * returns an array of links to master files that can be watch
   */
  public function userMasterDownloadFiles() {
    $result = array();
    foreach ($this->files as $file) {
      if ($file['action'] == 'download') {
        $alt = ResourceAltFiles::model()->findByPk($file['altId']);
        if (!empty($alt)) {
          $result[] = array(
            'url' => Yii::app()->createUrl('transfer/view').'/'.$this->key.'/'.$this->_userKey.'/'.$file['key'],
            'key' => $file['key'],
            'caption' => $alt->name
          );
        }
      }
    }
    return $result;
  }
 /**
   * returns an array of links to alt files that can be watch
   */
  public function userAltDownloadFiles() {
    $result = array();
    foreach ($this->files as $file) {
      if ($file['action'] == 'alternate') {
        $alt = ResourceAltFiles::model()->findByPk($file['altId']);
        if (!empty($alt)) {
          $result[] = array(
            'url' => Yii::app()->createUrl('transfer/view').'/'.$this->key.'/'.$this->_userKey.'/'.$file['key'],
            'key' => $file['key'],
            'caption' => $alt->name
          );
        }
      }
    }
    return $result;
  }  
  
  public function altFile($fileKey) {
    foreach ($this->files as $file) {
      if ($file['action'] == 'alternate' && $file['key'] == $fileKey) {
        $alt = ResourceAltFiles::model()->findByPk($file['altId']);
        if (!empty($alt)) {
          return $alt;
        }
      }
    }
    return false;
  }
}
