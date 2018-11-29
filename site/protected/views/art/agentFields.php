<?php
return array(
	'model' => 'Art',
	'canModerate' => true,
	'caption' => Yii::t('app', 'agent & co-workers'),
	'labelClass' => 'col-xs-4',
	'controlClass' => 'col-xs-8',	

		
	'elements' => array(	
		'agent_id' => array(
			'type' => 'chosen',	
			'items' => $this->model->agentOptions,
			'multi' => 1,
			'url' => $this->model->agent_id ? $this->createUrl('agent/view', array('id' => '' /* $this->model->agent_id */)) : null,	
		),	
		'agent_group' => array(
			'type' => 'textarea',
			'rows' => 1,	
		),
		'producer' => array(
			'type' => 'textarea',
			'rows' => 1,	
		),
		'distributor' => array(
			'type' => 'textarea',
			'rows' => 1,					
		),
		'purchased_by' => array(
			'type' => 'textarea',
			'rows' => 1,					
		),			
		'credits' => array(
			'type' => 'html',	
		),
	),	
	'buttons' => 'default',	
);
