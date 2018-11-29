<?php
/**
 * called to create a new art
 */
return array(
	'caption' =>  $this->t('digitalization', true),	
	'canModerate' => true,	
	'model' => 'Art',	
	'elements' => array(				
		'screenings' => array(
			'type' => 'html',	
		),	
		'reviews' => array(
			'type' => 'html',	
		),	
		'awards' => array(
			'type' => 'html',	
		),	
		'reference_materials'	=> array(
			'type' => 'html',
		),						
		'impact_history' => array(
			'type' => 'html',
		),
	),	
	'buttons' => 'default',		
);
