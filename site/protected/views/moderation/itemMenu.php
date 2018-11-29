<?php

$menu = array(
	'overview' => array(
		'label' => $this->t('overview',1), 
		'url' => $this->createUrl('moderation/index'), 			
	),	
	'date' => array(
		'label' => $this->t('changes per Date', 1),
		'url' => $this->createUrl('moderation/date', array('id' => 0)),					
	)	,	
	'group' => array(
		'label' => $this->t('changes by Group', 1),
		'url' => $this->createUrl('moderation/selectGroup'),					
	)		
);
if ($this->showGroups) {
		foreach (Yii::app()->user->profile->listModeratedGroups() as $group) {
	$menu['group-'.$group['id']] = array(
				'label' => CHtml::encode($group['name']),
				'url' => $this->createUrl('moderation/group', array('id' => $group['id'])),
				'level' => 1,	
				'style' => 'menu-overflow',	
		);
	}
}
/*
foreach (Yii::app()->user->profile->listModeratedUsers() as $user) {
	$menu['users']['items'][$user['id']] = array(
		'label' => CHtml::encode($user['name']).' - '.CHtml::encode($user['email']),
		'url' => $this->createUrl('moderation/user', array('id' => $user['id'])),	
	);
}
 * 
 */
return $menu;
