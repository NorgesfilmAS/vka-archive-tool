<?php
return array(
	'model' => 'Art',	
	'canModerate' => true,	
	'caption' => $this->t('description', true),
		
	'elements' => array(	
		'content' => array(
			'type' => 'html',				
		),	
		'content_no' => array(
			'type' => 'html',				
		),				
		'tags_gama' => array(
			'type' => 'chosen',
			'items' => $this->model->attributeOptions('tags_gama', array('sorted' => true)),		
			'multi' => true,	
		),
		'screening_instructions' => array(
			'type' => 'html',	
		)	
	),	
	'buttons' => 'default',		
);
