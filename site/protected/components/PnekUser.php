<?php

class PnekUser extends WebUser
{
  
	public function getProfile()
	{
		if (Yii::app()->user->id) {	// it there a user?
			if ($this->_profile === null) {
				// validate we have an db connection
				try {
					$this->_profile = User::model()->findByPk(Yii::App()->user->id);
					if ($this->_profile == null) {
						$this->_profile = new User();
					}
				} catch (Exception $e) {
					Yii::log('Error opening db connection', CLogger::LEVEL_WARNING, 'toxus.pnekUser.getProfile');
					$this->_profile = false;
				}	
			}			
			return $this->_profile;
		}
		return null;
	}

	
	public function getIsCustomer()
	{
		return $this->profile->rights_id >= UserProfile::CUSTOMER_BASIC;
	}	
	public function getIsCustomerExtend()
  {
		return $this->profile_id->righs_id >= UserProfile::CUSTOMER_EXTEND;
	}
	public function getIsModerating()
	{
		$a = Yii::app()->session['isModerating'];
		return empty($a) ? 0 : 1;
	}
	public function setIsModerating($value)
	{
		Yii::app()->session['isModerating'] = $value;
	}
	/**
	 * returns 1 if the route is allowed
	 * 
	 * @param string $route
	 * @return integer
	 */
	public function hasMenu($route)
	{
		return $this->profile->group->hasMenu($route) ? 1 : 0;
	}

	/**
	 * The state of the fields: Edit / View / None
	 */
	public function isFieldVisible($fieldId)
	{
		return $this->profile->group->isFieldVisible($fieldId) ? 1 : 0;
	}
	public function isFieldEditable($fieldId)
	{
		return $this->profile->group->isFieldEditable($fieldId) ? 1 : 0;
	}	
	public function fieldState($fieldId)
	{
		return $this->profile->group->fieldState($fieldId);
	}
	public function getApplicationTitle()
	{
		if ($this->profile && $this->profile->group) {
			return $this->profile->group->applicationTitle;
		} else {
			return Yii::app()->config->fixedValues['application_name'];
		}
	}
					
	
	
}
