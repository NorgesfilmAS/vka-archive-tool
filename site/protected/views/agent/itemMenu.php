<?php

return array(
	'view' => array(
		'label' => $this->t('overview',1), 
		'url' => $this->createUrl('agent/view',array('id' => $this->model->id)), 			
		'hidden' => ! Yii::app()->user->hasMenu('agent/view'),	
	),	
	'description' => array(
		'label' => $this->t('general / contact', 1), 
		'url' => $this->createUrl('agent/general', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('agent/description'),				
	),	
	'biography' => array(
		'label' => $this->t('biography', 1), 
		'url' => $this->createUrl('agent/biography', array('id' => $this->model->id)),	
		'hidden' => ! Yii::app()->user->hasMenu('agent/biography'),				
	),	
  'artistlogin' => array(
		'label' => $this->t('artist login', 1), 
		'url' => $this->createUrl('agent/artistLogin', array('id' => $this->model->id)),	
		'hidden' => ! Yii::app()->user->hasMenu('agent/artistLogin'),				    
  ),
	'works' => array(
		'label' => Yii::t('app', 'Works <div class="badge badge-info badge-menu">{count}</div>', array('{count}' =>$this->model->workCount)), 
		'url' => $this->createUrl('agent/works', array('id' => $this->model->id)),				
		// 'hidden' => ! Yii::app()->user->hasMenu('agentrtist/works'),	
	),		
		
	'files' => array(
		'label' => Yii::t('app', 'Documents <div class="badge badge-info badge-menu">{count}</div>', array('{count}' =>$this->model->documentCount)), 
		'url' => $this->createUrl('agent/files', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('agent/files'),				
	),		
	'notes' => array(
		'label' => $this->t('notes', 1), 
		'url' => $this->createUrl('agent/notes', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('agent/notes'),				
	),	
	'logging' => array(
		'label' => $this->t('logging', 1), 
		'url' => $this->createUrl('agent/logging', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('agent/logging'),				
	),		
);
