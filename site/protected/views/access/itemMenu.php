<?php

	$menu = array(
		'overview' => array(
			'label' => $this->t('overview',1), 
			'url' => $this->createUrl('access/index'), 			
		),	
		'groups' => array(
			'label' => $this->t('groups', 1), 
			'url' => $this->createUrl('access/groups'),						
		),
	);
	if ($this->subMenu) {
		$menu['name'] = array(
			'label'	=> $this->te('Group: {name} ', array('{name}' => $this->subMenu)),
			'level' => 1,		
			'style' => 'menu-info-block text-right',	
		);
		$menu['group-index'] = array(
			'label' => 'Overview',
			'url' => $this->createUrl('access/group', array('id' => $this->model->id)),	
			'level' => 1,	
		);	
		$menu['definition'] = array(
			'label' => $this->t('menu access', 1), 
			'url' => $this->createUrl('access/groupEdit', array('id' => $this->model->id)),				
			'level' => 1,			
		);
		$menu['rights'] = array(
			'label' => $this->t('field rights', 1),
			'url' => $this->createUrl('access/groupRights', array('id' => $this->model->id)),					
			'level' => 1,			
		);
	} 
	$menu['users']  = array(
		'label' => $this->t('users', 1), 
		'url' => $this->createUrl('access/users'),	
	);
	$menu['help'] = array(
	'label' => $this->t('help', 1),
	'url' => $this->createUrl('access/help', array('key' => 'group_config')),					
	);
;	


return $menu;
