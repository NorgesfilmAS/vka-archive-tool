<?php
/**
 * called to create a new art
 */
return array(
	'model' => 'Agent',
	'canModerate' => true,		
	'caption' => 'notes',	
	'elements' => array(	
		'internal_notes' => array(
			'type' => 'html',				
		),	
	),
	'buttons' => 'default',		
);
