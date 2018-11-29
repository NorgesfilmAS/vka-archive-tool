<?php

return array(
	'overview' => array(
		'label' => $this->t('overview',1), 
		'url' => $this->createUrl('job/index'), 			
	),	
	'active' => array(
		'label' => $this->t('active', 1), 
		'url' => $this->createUrl('job/active'),				
	),	
	'done' => array(
		'label' => $this->t('done', 1), 
		'url' => $this->createUrl('job/done'),	
	),	
);
