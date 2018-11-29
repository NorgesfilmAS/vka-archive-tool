<?php

$menu = array(
	// 'style' => 'submenu bs-sidenav',	
	'overview' => array(
		'label' => $this->t('overview',1), 
		'url' => $this->createUrl('access/index'), 			
	),	
	'groups' => array(
		'label' => $this->t('groups', 1), 
		'url' => $this->createUrl('access/groups'),						
	),	
	'users' => array(
		'label' => $this->t('users', 1), 
		'url' => $this->createUrl('access/users'),	
	),
	'user' => array(
		'label' => CHtml::encode($this->te('user: {name}', array('{name}' => $this->model->username))),
		'level' => 1,		
		'style' => 'menu-info-block'	
	),		
	'user-overview' => array(
		'label' => 'Overview',
		'url' => $this->createUrl('userInfo/index', array('id' => $this->model->id)),	
		'level' => 1,	
	),	
	'profile' => array(
		'label' => $this->t('profile', 1), 
		'url' => $this->createUrl('userInfo/profile', array('id' => $this->model->id)),				
		'level' => 1,			
	),	
	'invite' => array(
		'label' => $this->t('invitation', 1), 
		'url' => $this->createUrl('userInfo/invite', array('id' => $this->model->id)),				
		'level' => 1,						
	),	
	'changes' => array(
		'label' => $this->t('changes by date', 1),
		'url' => $this->createUrl('userInfo/changes', array('id' => $this->model->id)),					
		'level' => 1,			
	)	
);

return $menu;
