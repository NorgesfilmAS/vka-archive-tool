<?php


Yii::import('application.runtime.resourceSpace.AgentBase');

class Agent extends AgentBase {
	
  const ARTIST_LOGIN_ID = 169;
  
	private $_works = null;
	private $_sort = 'title';
  
  private $_org_loginEmail = false;  
  private $_org_loginName = false;
  private $_org_artist_login_id = false;
  
  // the User record 
  private $_artistUser = false;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}	
	
  public function getArtistUser() {
    if (empty($this->_artistUser)) {
      if (!empty($this->is_login_active)) {
        if (empty($this->artist_login_id)) {
          Yii::log('There is no user id for the artist login', CLogger::LEVEL_ERROR, 'toxus.agent.getArtistUser');
        } else {
          $this->_artistUser = User::model()->findByPk($this->artist_login_id);
          if (empty($this->_artistUser)) {
            Yii::log('Could not find the user for artist '.$this->id, CLogger::LEVEL_ERROR, 'toxus.agent.getArtistUser');
          }
        }
      } 
    }
    return $this->_artistUser;
  }
  public function afterFind() {
    if ($this->is_login_active) { // the artist can login to the system. Get his name
      
      if (!empty($this->artist_login_id)) {
        $user = User::model()->findByPk($this->artist_login_id);
        if (empty($user)) {
          Yii::log('The user_login_id was not found. (id: '.$this->artist_login_id.')',  CLogger::LEVEL_WARNING, 'toxus.agent');
        } else {
          $this->login_email = $user->email;
          $this->login_name = $user->username;
        }
      }
    } else {
      $this->login_email = $this->email;
      $this->login_name = $this->name;
    }
    $this->_org_loginEmail = $this->login_email;
    $this->_org_loginName = $this->login_name;
    $this->_org_artist_login_id = $this->artist_login_id;
    if (empty($this->artist_invite_message)) {
      $this->artist_invite_message = Yii::app()->config->mail['artist_invite_message'];
    }    
    return parent::afterFind();
  }

  public function beforeValidate() {
    if ($this->is_login_active) {
      $this->login_name = trim($this->login_name);
      if (empty($this->login_email)) {
        $this->addError('loginName', 'An email address is required.');
      }
      if (!empty($this->artist_login_id) && ($this->_org_loginName != $this->login_name)) {
        $this->addError('login_name', 'The login name can not be changed after it has been created');
      }
      $user = User::model()->find('email=:email', array(':email' => $this->login_email));
      if (empty($user) && empty($this->login_name)) {
          $this->addError('login_name', 'Please enter a username');
      }
    }  
    return parent::beforeValidate();
  }
  
  /**
   * One user can have multiple agents. This is done by mapping the email address
   * of one agent onto the user account.
   *    
   */
  
  public function beforeSave() {
    $user = false;
    // is User an artist with a login?
    if ($this->is_login_active) {
      // check for the user by email address
      $user = User::model()->find('email=:email', array(':email' => $this->login_email));
      if (!empty($user)) { // found this user, so connect to it
        if ($this->artist_login_id != $user->id) { // it changed
          $this->artist_login_id = $user->id;
          $this->login_name = $user->username;
        }
      } else {
        $user = User::model()->find('username=:username', array(':username' => $this->login_name));
        if (!empty($user)) {
          // $this->addError('login_name', 'The username is already used for an other user');
          return false;
        } else {
          $user = new User();
          $user->email = $this->login_email;
          $user->username = $this->login_name;
          $user->fullname = $this->name;
          $user->usergroup = Yii::app()->config->fixedValues['artistGeneral'];
          if (!$user->save()) {
            Yii::log('The artist login could not be create: '.Util::errorToString($user->errors), CLogger::LEVEL_ERROR, 'toxus.agent.afterSave');
            $this->addErrors($user->errors);
            return false;
          }
        }  
        $this->artist_login_id = $user->id;
      }    
      $this->createFtpDirectory();
    } else {
      $this->artist_login_id = 0; // reset the artist login
    }
    return parent::beforeSave();
  }
  
  public function rules() {
		return parent::rules() + 
			array(				
				array('name', 'required'),
				array('name', 'isUnique'),	
				array('email', 'email', 'message'=> Yii::t('app', 'The email isn´t correct')),
				array('url', 'url'),
        array('login_email', 'email', 'message' => Yii::t('app', 'The artist email is not a valid email address')),
			);		
	} 
	
	public function isUnique($attribute, $params)
	{
		$value = $this->$attribute;
		$model = Agent::findAll('name=:name', array(':name' => $value));
		if ($this->isNewRecord) {			
			if ($model != null) {
				$message = Yii::t('yii','{attribute} "{value}" has already been taken.', array('{value}'=>CHtml::encode($value) , '{attribute}' => $attribute));
				$this->addError($attribute, $message);
			}
			return ;
		}
		if (count($model) == 1) {
			return $model[0]->id == $this->id;
		} else {
			foreach ($model as $rec) {
				if ($rec->id != $this->id) {
					$message = Yii::t('yii','{attribute} "{value}" has already been taken.', array('{value}'=>CHtml::encode($value) , '{attribute}' => $attribute));
					$this->addError($attribute, $message);					
					return;
				}
			}
			return;
		}
	}
	
	/**
	 * list all works of the agent
	 */
	public function getWorks()
	{
		if ($this->_works == null) {
			/**
			 * we need to do a direct search in the resource of the field agent_id
			 * default we sort by Title
			 */
			$sql = 'SELECT res.ref as id, rd.value as title FROM resource_related rr ' .
						 'INNER JOIN resource res ON (rr.resource = res.ref) '.
						 'INNER JOIN resource_data rd ON (rr.resource = rd.resource AND rd.resource_type_field=8) '.
						 'WHERE rr.related = ' . $this->id.' '.	
						 'ORDER BY rd.value	';
			$con = Yii::app()->db;
			$cmd = $con->createCommand($sql);
			$rows = $cmd->queryAll();
			$result = array();
			foreach ($rows as $row) {
				$work = Art::model()->findByPk($row['id']);
				$result[] = $work;
			}
			return $result;
			/*			
			$this->_works = Art::model()->findAll(array(
				'condition' => 'agent_id = :agent_id', 
				'order' => 'title', 
				'params' => array(
						'agent_id'=> $this->id,
				)
			));
 * 
 */
		}
		return $this->_works;
	}
	
	public function getWorkCount() 
	{
		return count($this->works);
	}
	/**
	 * list the number of document connected to this artist
	 */
	public function getDocumentCount() 
	{
		return count($this->altFiles);
	}
	/**
	 * 
	 * @param string $field the requested sort order
	 * @return array of Art
	 */
	public function worksSortedBy($field)
	{
		if ($this->_works == null || $field != $this->_sort) {
			/**
			 * we need to do a direct search in the resource of the field agent_id
			 * default we sort by Title
			 */
			$this->_works = Art::model()->findAll(array(
				'condition' => 'agent_id = :agent_id', 
				'order' => 'title', 
				'params' => array(
						'agent_id'=> $this->id,
				)
			));
			$this->_sort = $field;
		}
		return $this->_works;
		
	}
  /**
   * sends an invitation to the user
   */
  public function sendArtistInvitation()
  {
    if (empty($this->is_login_active)) {
      $this->addError('is_login_active', 'The login is not active');
    } else {
      if (empty($this->artist_invite_message)) {
        $this->artist_invite_message = Yii::app()->config->mail['artist_invite_message'];
      }
      if (strpos('{signin}', $this->artist_invite_message) < 0) {
        $this->addError('artist_invite_message', 'There is no signup key in the invite message. Key is {signup}.');
      }
      $user = $this->artistUser;
      if (empty($user)) {
        $this->addError('login_name', 'Could not find the user for this artist. Please reset the "Can artist update the profile"');      
      } else {
        $user->email = $this->login_email;
        $user->mailSubject = Yii::app()->config->mail['invite_subject'];
        $user->mailMessage = $this->artist_invite_message;
        if (!$user->sendMailMessage()) {
          $this->addErrors($user>errors);
        }
      }      
    }
    return count($this->errors) == 0;
  }
  
  protected function createFtpDirectory() {
    $dir = Yii::app()->config->fixedValues['upload_path']. str_replace(' ', '_', strtolower(Util::normalizeStr( $this->login_name)));
    if (!is_dir($dir)) {
      mkdir($dir);
      chmod($dir, 0777);
    }
    // $this->addError('login_name', 'The ftp directory is not yet created.');
    return true;
  }
}
