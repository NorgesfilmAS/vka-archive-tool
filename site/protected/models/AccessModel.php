<?php
/**
 * class holding information about the access
 * 
 */
class AccessModel extends CFormModel
{
	
	public function init() {
		return parent::init();
	}
	
	public function getRootGroups()
	{
		$groups = Usergroup::model()->findAll(array(
			'condition' => 'parent = 0',
			'order' => 'name'	
		));
		return $groups;
	}
	
	public function getGroups()
	{
		return Usergroup::model()->findAll(array(
			'order' => 'name'					
		));
	}
}
