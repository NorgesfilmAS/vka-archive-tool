<?php
return array(
	'model' => 'UserProfile',	
	'elements' => array(	
		'logging' => array(
				'type' => 'button',
				'caption' => $this->te('General logging'),
				'url' => $this->createUrl('logging/index'),
				'style' => 'btn-primary col-xs-6',
		),
		'systemInfo' => array(
				'type' => 'button',
				'caption' => $this->te('SystemInfo'),
				'url' => $this->createUrl('site/systemInfo'),		
				'style' => 'btn-primary col-xs-6',
		),
		'deleteFiles'	=> array(
				'type' => 'button',
				'caption' => $this->te('Deleted files'),
				'url' => $this->createUrl('site/deleteFiles'),				
				'style' => 'btn-primary col-xs-6',
		),
		'resourceSpace'	=> array(
				'type' => 'button',
				'caption' => $this->te('Resource Space'),
				'url' =>  Yii::app()->request->hostInfo.'/resourcespace',				
				'style' => 'btn-primary col-xs-6',
		),
		
	)	
);
