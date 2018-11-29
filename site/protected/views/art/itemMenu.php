<?php

return array(
	'overview' => array(
		'label' => $this->t('overview',1), 
		'url' => $this->createUrl('art/view',array('id' => $this->model->id)), 	
		'hidden' => ! Yii::app()->user->hasMenu('art/view'),	
	),	
	'agent' => array(
		'label' => $this->t('artist / credits', 1), 
		'url' => $this->createUrl('art/agent', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('art/agent'),				
	),	
	'artwork-info' => array(
		'label' => $this->t('artwork info', 1), 
		'url' => $this->createUrl('art/artworkInfo', array('id' => $this->model->id)),	
    'hidden' => $this->model->isChannel && ! Yii::app()->user->hasMenu('art/artworkInfo'),
	),	
  'master-art' => array(
		'label' => $this->t('channel belongs to', 1), 
		'url' => $this->createUrl('art/masterart', array('id' => $this->model->id)),	
    'hidden' => ! $this->model->isChannel && ! Yii::app()->user->hasMenu('art/masterArt') ,
  ),
  'channels' => array(
	//	'label' => $this->t('channels', 1), 
		'label' => Yii::t('app', 'Channels <div class="badge badge-info badge-menu">{count}</div>', array('{count}' =>$this->model->channelCount)), 			
		'url' => $this->createUrl('art/channels', array('id' => $this->model->id)),	
    'hidden' => !( $this->model->isMultiChannel && Yii::app()->user->hasMenu('art/channels')),
      
  ),  
	'related' =>  array(
		'label' => $this->t('related', 1), 
		'url' => $this->createUrl('art/related', array('id' => $this->model->id)),	
			'hidden' => ! Yii::app()->user->hasMenu('art/related'),				
  ),  
	'description' => array(
		'label' => $this->t('description', 1), 
		'url' => $this->createUrl('art/description', array('id' => $this->model->id)),				
			'hidden' => ! Yii::app()->user->hasMenu('art/description'),				
	),
	'history' => array(
		'label' => $this->t('history', 1), 
		'url' => $this->createUrl('art/history', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('art/history'),							
	),
	'files' => array(
		//'label' => $this->t('files', 1), 
		'label' => Yii::t('app', 'Files <div class="badge badge-info badge-menu">{count}</div>', array('{count}' =>$this->model->documentCount)), 			
		'url' => $this->createUrl('art/files', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('art/files'),				
	),	
	'digitization' => array(
		'label' => $this->t('digitization', 1), 
		'url' => $this->createUrl('art/digitization', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('art/digitization'),							
	),
	'logging' => array(
		'label' => $this->t('logging', 1), 
		'url' => $this->createUrl('art/logging', array('id' => $this->model->id)),				
		'hidden' => ! Yii::app()->user->hasMenu('art/logging'),				
	),	
		
);
