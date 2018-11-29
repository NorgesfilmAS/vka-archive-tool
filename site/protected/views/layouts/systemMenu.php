<?php

if (Yii::app()->user->isGuest) {
	return array(
	);		
} else {
return array(
	'search' => array(
		'label' => $this->t('search', 1), 
		'url' => $this->createUrl('site/search'),	
		'isVisible' => Yii::app()->user->hasMenu('site/search'),							
	),	
	'select' => array(
		'label' => $this->t('select', 1), 
		'url' => $this->createUrl('selection/index'),	
		//'isVisible' => Yii::app()->user->hasMenu('site/search'),							
	),	
		
	'newArt' => array(
		'label' => $this->t('new art', 1), 
		'url' => $this->createUrl('art/create'),	
		'dialog' => true,				// create a dialog when this is clicked				
		'isVisible' => Yii::app()->user->hasMenu('art/create'),	
	),	
	'newAgent' => array(
		'label' => $this->t('new artist', 1), 
		'url' => $this->createUrl('agent/create'),	
		'dialog' => true,				// create a dialog when this is clicked	
		'isVisible' => Yii::app()->user->hasMenu('agent/create'),				
	),	
		
);
}
