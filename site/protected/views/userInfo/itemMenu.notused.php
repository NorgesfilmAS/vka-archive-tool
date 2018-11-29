<?php

$menu = array(
	'overview' => array(
		'label' => $this->t('overview',1), 
		'url' => $this->createUrl('userInfo/index', array('id' => $this->model->id)), 			
	),	
	'profile' => array(
		'label' => $this->t('profile', 1), 
		'url' => $this->createUrl('userInfo/profile', array('id' => $this->model->id)),				
	),	
	'changes' => array(
		'label' => $this->t('changes by date', 1),
		'url' => $this->createUrl('userInfo/changes', array('id' => $this->model->id)),					
	)	
);

return $menu;
