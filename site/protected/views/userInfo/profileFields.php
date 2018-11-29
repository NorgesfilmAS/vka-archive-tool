<?php
/**
 * creating and updating a profile
 */
return array(
	'model' => 'User',	
	'title' => $this->te('update user information'),
	'elements' => array(	
		'username' => array(
			'type' => 'text',	
		),
		'fullname' => array(
			'type' => 'text',	
		),
		'email' => array(
			'type' => 'email'	
		),
		'usergroup' => array(
			'type' => 'dropdown',
			'items' => $this->model->userGroupOptions(),	
		),
		'account_expires' => array(
			'type' => 'date'	
		),
		'approved' => array(
			'type' => 'checkbox',
			'label' => $this->te('user can login'),	
		),	
		'comments' => array(
			'type' => 'textarea',	
		),
		'ip_restrict' => array(
			'type' => 'text'	
		),			
		'telephone' => array(
			'type' => 'string'	
		),
		'address' => array(
			'type' => 'textarea'	
		),	
	),
	'buttons' => 'default',
/*		
	'extraButtons' => array(
			$this->button(array(
				'label' => $this->te(' << Users'),	
				'position' => 'pull-left',		
				'url' => $this->createUrl('access/users'),	
			)),
	),	
 * 
 */
);
