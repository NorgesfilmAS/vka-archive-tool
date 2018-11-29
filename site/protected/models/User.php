<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser
{
	private $_group = false;
	private $_moderatedUsers = false;
	private $_moderatedGroups = false;
	
	public $orderBy = 'username';
	
	/** the invitation */
	public $_mailMessage = false;
	public $_mailSubject = false;
	public $_mailBcc = false;
	public $_passwordText = false;
	public $_passwordTextRepeat = false;
	
  // the original values
  private $_username = false;
  private $_password = false;
					
	protected $mailLogModel = 'MailModel';  
 	public $autoLoginUrl = 'site/invitation';

  // the id(s) of the agent(s) if this is a Artist Login Account.
  private $_agentIds = false;
  
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/**
	 * remove the system generated definition. It's wrong
	 * 
	 * @return array
	 */
	public function rules() {
		return array(
				
			array('username,fullname', 'required'),
			array('usergroup, logged_in, current_collection,accepted_terms,login_tries,approved', 'numerical', 'integerOnly'=>true),
			array('username, password, session', 'length', 'max'=>64),
			array('fullname, email, last_ip', 'length', 'max'=>100),
			array('telephone,address,account_expires,ip_restrict', 'safe'),	
			// invite	
			array('mailMessage, mailSubject', 'required', 'on' => 'invite'),	
			array('mailBcc', 'safe', 'on' => 'invite'),	
				
			// the invitations	
			array('passwordText,passwordTextRepeat, accepted_terms', 'required', 'on' => 'invitation'),
			array('passwordText', 'compare', 'compareAttribute'=>'passwordTextRepeat', 'on' => 'invitation'),									
			array('accepted_terms', 'compare', 'compareValue'=>1, 'on' => 'invitation', 'message' => Yii::t('app', 'You must accept the terms.')),													
			array('passwordText', 'length', 'min'=>5, 'max'=>64, 'tooShort'=> Yii::t('app','Password is too short (minimum is 5 characters)'), 'on' => 'invitation'),        									
				
			// the profile
			array('telephone,address,email', 'safe', 'on' => 'profile'),
			array('fullname, email', 'length', 'max'=>100, 'on' => 'profile'),				
				
			// password	
			array('passwordText,passwordTextRepeat,email', 'required', 'on' => 'password'),				
			array('passwordText', 'compare', 'compareAttribute'=>'passwordTextRepeat', 'on' => 'password'),
				
		);
	}	
	
	public function beforeSave() {
		$this->account_expires = Util::dateToSQL($this->account_expires);
		if ($this->isNewRecord) {
			$this->created = new CDbExpression('NOW()');			
		}
		return parent::beforeSave();
	}
	public function afterFind() {
		if ($this->account_expires != null) {
			$this->account_expires = Util::dateDisplay($this->account_expires);
		}	
    $this->_username = $this->username;
    $this->_password = $this->password;
		return parent::afterFind();
	}
	
	public function getId()
	{
		return $this->ref;
	}

	
	/**
	 * return the group record for this user
	 * 
	 * @return Usergroup
	 */
	public function getGroup()
	{
		if ($this->_group === false) {
			$this->_group = Usergroup::model()->findByPk($this->usergroup);
			if (!isset($this->_group)) {
				Yii::log('The user.usergroup is not found: '.$this->usergroup, CLogger::LEVEL_ERROR, 'toxus.user.getGroup');
				$this->_group = false;
				return new UserGroup();
			}
		}
		return $this->_group;
	}
	
	/**
	 * the groups the user belongs to
	 * @return UserGroup
	 */
	public function userGroups()
	{
		return Usergroup::model()->findAll(array('order' => 'name'));
	}
	/**
	 * the id => names of the groups the user can belong to
	 * @return array of id => group name
	 */
	public function userGroupOptions()
	{
		return CHtml::listData($this->userGroups(), 'ref', 'name');
	}
	
	/**
	 * list all users that are moderated by this user
	 */
	public function listModeratedUsers()
	{
		if ($this->_moderatedUsers === false) {
			$this->_moderatedUsers = array();
			$users = Yii::app()->db->createCommand()
					->select('u.ref as id, u.username, u.email, ug.moderator_id')
					->from('user u')
					->leftJoin('usergroup ug', 'u.usergroup = ug.ref')	
					->group('username')
					->having('ug.moderator_id = :user_id', array(
						':user_id' => $this->id	
					))
					->order('username')
					->queryAll();
			if ($users) {
				foreach ($users as $user) {
					$this->_moderatedUsers[] = array(
						'id' => $user['id'],
						'name' => $user['username'],
						'email' => $user['email']	
					);
				}
			}
		}
		return $this->_moderatedUsers;
	}
	/**
	 * list all groups the have a moderator
	 * 
	 * @return array
	 */
	public function listModeratedGroups()
	{
		if ($this->_moderatedGroups === false) {
			$this->_moderatedGroups = new CMap();
			$groups = Usergroup::model()->findAll(array(
				'condition' => 'is_moderation_active <> 0', //moderator_id <> 0',
				'order' => 'name'	
			));
			if ($groups) {
				foreach ($groups as $group) {
					$this->_moderatedGroups[$group->ref] = array(
							'id' => $group->ref,
							'name' => $group->name
									);
				}
			} else {
				$this->_moderatedGroups = array();
			}
		}
		return $this->_moderatedGroups;
	}
		
	public function search() 
	{
		$search = parent::search();
		return new CActiveDataProvider($this, array(
			 'criteria' => $search->criteria,
			 'sort' => array(
					'defaultOrder' => array(
						 $this->orderBy => CSort::SORT_ASC
					),
			 ),
			'pagination'=>array(
          'pageSize'=>'30'
      ),
		));
	}

	
	public function getMailMessage()
	{
		if ($this->_mailMessage == false) {
			$this->_mailMessage = Yii::app()->config->mail['invite_message'];
		}
 		return $this->_mailMessage;
	}
	public function setMailMessage($value)
	{
		$this->_mailMessage = $value;
	}
	public function getMailSubject()
	{
		if ($this->_mailSubject === false) {
			$this->_mailSubject = Yii::app()->config->mail['invite_subject'];
		}
		return $this->_mailSubject;
	}
	public function getMailBcc()
	{
		if ($this->_mailBcc === false) {
			$this->_mailBcc = Yii::app()->config->mail['invite_bcc'];
		}
		return $this->_mailBcc;
	}
	public function setMailBcc($value)
	{
		$this->_mailBcc = $value;
	}
	
	public function setMailSubject($value)
	{
		$this->_mailSubject = $value;
	}
	public function getPasswordText()					
	{
		return $this->_passwordText;
	}
	public function setPasswordText($value)
	{
		$this->_passwordText = $value;
	}
	public function getPasswordTextRepeat()
	{
		return $this->_passwordTextRepeat;
	}
	public function setPasswordTextRepeat($value)
	{
		$this->_passwordTextRepeat = $value;
	}
	
	/**
	 * sets the password to a unique key for invitations
	 */
	protected function generateInvitationKey()
	{
		$this->activation_key = Util::generateRandomString(60);
		$this->save();
	}
	
	/**
	 * sends the message to the user
	 */
	public function sendMailMessage()
	{
		$this->generateInvitationKey();
		$mailClass = Yii::app()->config->mail['mailer'];
		$mail = new $mailClass();
		if (!$mail->send(
						$this->email, 
						$this->mailSubject, 
						$this->mailMessage, 
						array(
							'{signin}' => Yii::app()->createAbsoluteUrl('site/invitation', array('k' => $this->activation_key)),
							'bcc' => $this->mailBcc				
				))) {
			foreach ($mail->errors as $key => $err) {
				$this->addError($key, $err);
			}
			return false;
		} 
		return true;		
	}
	/**
	 * 
	 * @param string $key
	 * @
	 */
	public function findByInvitation($key)
	{
		return $this->find('activation_key=:key',array(
				':key' => $key 	
		));
	}
	/**
	 * convert the passwords in to the crypted version
	 */
	public function createLogin()
	{
		Yii::app()->user->logout();
		$usr = new UserIdentity($this->username, $this->passwordText);
		$this->password = $usr->makePassword();
		$this->activation_key = null;
		$this->password_last_change = new CDbExpression('NOW()');
		return $this->save();		
	}
	
	/**
	 * encodes the password into the md5 field
	 * 96d6f27cc23c8a193f5a1b74fed86f27
	 */
	public function updatePassword()
	{
		$ident = new UserIdentity($this->username, $this->passwordText);
		$md5 = $ident->makePassword();
		$this->password = $md5;
		$this->save();
	}
	/**
	 * logs in the current user
	 * @returns integer the error codes for authentication
	 */
	public function login()
	{
		$ident = new UserIdentity($this->username, $this->passwordText);
		return $ident->authenticate();
	}
  
/**
	 * sets the password to a unique key for invitations
	 */
	protected function generateInvitation()
	{
		$this->activation_key = Util::generateRandomString(60);
    $result =  $this->save();
    if (! $result) {
      $err = Util::errorToString($this->errors);
    }
		return $result;
	}

	/**
	 * sends the user a new login help key
	 * 
	 * @return boolean
	 */
	public function sendMailPasswordRequest()
	{
		$field = 'activation_key';
		if ($this->generateInvitation()) {								// generate a new key for this user
      $mailClass = Yii::app()->config->mail['mailer'];
      $mail = new $mailClass();
      $mail->mailLogModel = $this->mailLogModel;
      return $mail->render(
              'requestPassword', 
              array(
                'model' => $this,
                'keyFieldname' => $field
              ), 
              false);	
    }
	}  
  
  /**
   * find the agents that this user has control over because of the binding
   * between the agent and the user.
   * 
   * @return array
   */
  public function getAgentIds() {
    if ($this->_agentIds == false) {
      $rs = ResourceData::model()->findAll('resource_type_field=:typeId AND (value=:userId OR value=CONCAT(",", :userId))', array(
        ':typeId' => Agent::ARTIST_LOGIN_ID,
        ':userId' => $this->id)
      );
      $this->_agentIds = array();
      if (count($rs)) {
        foreach ($rs as $r) {
          $this->_agentIds[] = $r->resource;
        } 
      }
    }
    return $this->_agentIds;
  }
  /**
   * 
   * @param array/int $agentId
   * @returns true if rights have changed, false if this call had no effect
   */
  public function updateExtraRights($agentId) {
    if (!is_array($agentId)) {
      $agentId = array($agentId);
    }
    foreach ($agentId as $id) {
      if (in_array($id, $this->agentIds)) {
        $this->_group = Usergroup::model()->findByPk(Yii::app()->config->fixedValues['artistPersonal']);
        if (!isset($this->_group)) {
          throw new CDbException('The value of fixed values, artist personal does not return an group information');
        }
        return true;
      }
    }
    return false;
  }
}
