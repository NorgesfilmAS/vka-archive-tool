<?php
/**
 * Artist wants to change the master file. Has to request this to the office
 * at Archive Tool.
 * This is not yet implemented because it's probably never used
 */
return array(
	'title' => Yii::t('app','Request changing master file'),	
	'canModerate' => false,	
	'model' => 'Art',	
	'labelClass' => 'col-xs-3',
	'controlClass' => 'col-xs-9',	
	'elements' => array(	
		'title' => array(
			'type' => 'text',	
      'readOnly' => true
		),
 		'agent' => array(
			'type' => 'text',	
      'readOnly' => true
		),
    /* 
    'message' => array(
      'type' => 'textarea'
    )
     * 
     */
  ),
  'buttons' => 'default',	
);
