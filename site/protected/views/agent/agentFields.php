<?php
/**
 * called to create a new art
 */
return array(
	'model' => 'Agent',	
	'canModerate' => true,	
	'labelClass' => 'col-xs-3',
	'controlClass' => 'col-xs-9',	
		
	'title' => Yii::t('app', 'New Artist'),	
	'caption' => 'general / contact',	
	'elements' => array(	
		'name' => array(
			'type' => 'text',				
		),	
		'born' => array(	
			'elements' => array(	
				'born'	=> array(
					'width' => 'col-xs-4',		
				),	
				'deceased' => array(
					'width' => 'col-xs-4',						
				),	
			),		
		),
		'gender' => array(
			'type' => 'radiobuttonlist',			
			'items' => $this->model->attributeOptions('gender', array('nullValue' => Yii::t('app','(unknown)'))),						
		),	
		'address' => array(
			'type' => 'textarea',				
			'rows' => 1,	
		),			
		'telephone'=> array(
			'type' => 'text',				
		),	
		'email'=> array(
			'type' => 'email',				
		),	
		'url'=> array(
			'type' => 'url',				
		),		
		'contact_information' => array(
			'type' => 'textarea',				
			'rows' => 1,	
		),			
	),
	'buttons' => 'default',		
);
