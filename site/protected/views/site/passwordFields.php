<?php

return array(
	'title' => $this->te('change password'),	
	'model' => 'User',
	'elements' => array(
		'passwordText' => array(
			'type' => 'password',
			'label' => $this->te('password'),	
		),
		'passwordTextRepeat' => array(
			'type' => 'password',
			'label' => $this->te('type again')	
		),			
	),
	'buttons' => 'default'			
);
