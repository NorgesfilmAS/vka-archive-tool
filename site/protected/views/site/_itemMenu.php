<?php

return array(
	'home' => array(
		'label' => $this->t('home',1), 
		'url' => $this->createUrl('site/index'), 			
	),	
	'search' => array(
		'label' => $this->t('search', 1), 
		'url' => $this->createUrl('site/search'),	
	),	
		
	'newArt' => array(
		'label' => $this->t('new art', 1), 
		'url' => $this->createUrl('art/create'),	
	),	
	'newAgent' => array(
		'label' => $this->t('new artist', 1), 
		'url' => $this->createUrl('agent/create'),	
	),	
		
);
