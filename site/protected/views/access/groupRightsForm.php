<?php

return array(
	'model' => 'Usergroup',	
	'title' => CHtml::encode('group: '.$this->model->name),
	'elements' => array(	
		'read_access' => array(
			'type' => 'hidden',	
		),	
	/*		
		'readAccessAll' => array(
			'type' => 'checkbox',	
		),	
		
	 * 
	 */	
		'edit_access' => array(
			'type' => 'hidden',	
		),	
	/*		
		'editAccessAll' => array(
			'type' => 'checkbox',	
		),	
		
	 * 
	 */	
	),
	'buttons' => 'default',
);
