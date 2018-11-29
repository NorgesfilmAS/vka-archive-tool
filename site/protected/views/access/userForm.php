<?php
/**
 * change the definition of a job
 */
return array(
	'model' => 'User',	
	'title' => $this->te('User information'),
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
		'comments' => array(
			'type' => 'textarea',	
		),
		'ip_restrict' => array(
			'type' => 'text'	
		),			
	),
	'buttons' => 'default',
);
