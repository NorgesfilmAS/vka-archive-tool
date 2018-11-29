<?php
/**
 * fields editable in the artInfo definition
 */
return array(
	'caption' => 'master art work info',
	'canModerate' => true,	
	'model' => 'Art',	
		
	'menu' => array(
			
	),
	'elements' => array(	
    'master_id' => array(
      'type' => 'chosen',
      'items' => $this->model->masterArtList, 
      'url' => $this->model->master_id > 0 ? $this->createUrl('art/view', array('id' => /*$this->model->master_id */ '')) : null,	

    ), 
		'title' => array(),
		'title_no' => array(),
		'type' => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->attributeOptions('type'),						
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
			'type' => 'dropdown',
			'items' => $this->model->attributeOptions('aspect_ratio', array('sorted' => true)),	
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
		
		'is_color' => array(
			'type' => 'dropdown',
			'items' => $this->model->attributeOptions('is_color', array('sorted' => true)),	
			'width' => 'col-sm-5',													
		),
		'is_loop'	=> array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->isLoopOptions,	
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
