<?php
/**
 * fields editable in the artInfo definition
 */
return array(
	'caption' => 'artwork info',
	'canModerate' => true,	
	'model' => 'Art',	
		
	'menu' => array(
			
	),
	'elements' => array(	
		'title' => array(
				'type' => 'text',
		),
		'title_no' => array(),
		'type' => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->attributeOptions('type'),						
		),	
		'is_vka' => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->isVkaOptions,	
		),	
			
		'year'	 => array(
			'type' => 'mask',	
			'mask' => '9999',
			'width' => 'col-sm-3',					
		),
		'production_period' => array(
			'type' => 'text',	
		),			
		'production_country' => array(
			'type' => 'chosen',
			'items' => $this->model->attributeOptions('production_country', array('sorted' => true)),	
			'width' => 'col-sm-5',					
			'placeholder' => Yii::t('app', 'Select a country'),	
		),
		'edition' => array(),	
		'is_serie'  => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->isSerieOptions,	
		),			
			
		'length' => array(
			'type' => 'mask',
			'mask' => '99:99:99',	
			'width' => 'col-sm-3',	
		),
		'format' => array(
			'type' => 'dropdown',
			'items' => $this->model->attributeOptions('format', array('sorted' => true)),	
			'width' => 'col-sm-5',									
		),	
		'aspect_ratio' => array(
			'type' => 'radiobuttonlist',
			'items' => $this->model->attributeOptions('aspect_ratio', array('sorted' => true, 'nullValue' => Yii::t('app', '(unknown)'))),	
			'width' => 'col-sm-5',													
				
		),
			
		'is_sound' => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->isSoundOptions,	
		),
		'sound' => array(
			'type' => 'text',	
		),			
	
		'subtitles' => array(
			'type' => 'text',	
		),			
		'multi_channel_sound' => array(
			'type' => 'dropdown',
			'items' => $this->model->attributeOptions('multi_channel_sound', array('sorted' => true)),	
			'width' => 'col-sm-5',													
		),
		'multi_channel_picture' => array(
			'type' => 'dropdown',
			'items' => $this->model->attributeOptions('multi_channel_picture', array('sorted' => true)),	
			'width' => 'col-sm-5',													
		),		
		
		'is_color' => array(
			'type' => 'dropdown',
			'items' => $this->model->attributeOptions('is_color', array('sorted' => true)),	
			'width' => 'col-sm-5',													
		),
		'is_loop'	=> array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->isLoopOptions,	
		),			
		'collection' => array(
			'type' => 'chosen',	
			'items' => $this->model->attributeOptions('collection', array('sorted' => true)),
			'multi' => 1,
			'placeholder' => 'Choose collections...',	
		),
			
		'external_id' => array(
			'type' => 'text',	
		),
			
		'internal_notes' => array(
			'type' => 'html',				
		),
		'notes' => 	array(
			'type' => 'html',				
		),
	),
	'buttons' => 'default',

);
