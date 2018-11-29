<?php

Yii::import('application.vendors.toxus.models.UserProfileModel');

class UserProfile extends UserProfileModel
{
	private $_user = null;
	
	public $username;
	public $password;
	public $email;
	public $is_confirmed;
	public $is_suspended;
	public $rights_id;
	public $has_newsletter;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	/** 
	 * this routine is used to locate the current user
	 * 
	 * @param integer $pk
	 */
	public function findByPk($pk, $condition='',$params=array())
	{
		$user = User::model()->findByPk($pk, $condition, $params);		
		if (isset($user)) {
			$this->username = $user->username;
			$this->password = '';
			$this->email = $user->email;
			$this->is_confirmed = $user->approved;
			$this->is_suspended = ! $user->approved;
			$this->rights_id = $this->translateRights($user->usergroup);
			$this->has_newsletter = false;
		}	else {
			$this->username = null;
			return null;
		}
		return $this;
	}
	
	public function find($condition='',$params=array())
	{
		$user = User::model()->find($condition, $params);		
		if (isset($user)) {
			$this->username = $user->username;
			$this->password = '';
			$this->email = $user->email;
			$this->is_confirmed = $user->approved;
			$this->is_suspended = ! $user->approved;
			$this->rights_id = $this->translateRights($user->usergroup);
			$this->has_newsletter = false;
		}	else {
			$this->username = null;
			return null;
		}
		return $this;		
	}
	
	protected function makePassword($username, $password)
	{
    // NOT USED: See UserIndentity.makePassword
    // 
		// For version < 6 return md5("RS" . $username . $password);
    return hash('sha256', md5('RS' . $username . $password)); 
	}
	/**
	 * set a new password of 8 characters
	 * 
	 * @return boolean false, if no record active
	 */
	public function resetPassword()
	{
		if ($this->username) {
			$this->password = Util::generateRandomString(8);
			$user = User::model()->find('username=:user', array(':user' => $this->username));
			if (! $user ) return false;
			$user->password = $this->makePassword($this->username, $this->password); //a74895b303f1bd858fd5fd32d8904391
			return $user->save();
		} else {
			return false;
		}
	}
	
	public function translateRights($rightid)
	{
		return $rightid;
	}
}
