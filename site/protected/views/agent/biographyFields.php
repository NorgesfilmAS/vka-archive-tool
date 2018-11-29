<?php
/**
 * called to create a new art
 */
return array(
	'model' => 'Agent',	
	'canModerate' => true,		
	'caption' => 'biography',	
	'elements' => array(	
		'biography' => array(
			'type' => 'html',				
		),	
	),
	'buttons' => 'default',		
);
