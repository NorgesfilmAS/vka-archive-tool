<?php
/**
 * change the definition of a job
 */
return array(
	'model' => 'Usergroup',	
	'title' => CHtml::encode('group: '.$this->model->name),
	'elements' => array(	
		'name' => array(
			'type' => 'text',	
		),
		'parent' => array(
			'type' => 'dropdown',
			'items' => $this->model->parentGroupsOptions(),	
			'width' => 'col-sm-3',	
		),
		'application_title' =>	array(
			'type' => 'string',
			'tooltip' => $this->te('the name the user sees for the application. Leave empty for the parents name.'),	
		),
		'ip_restrict' => array(
			'type' => 'string',
			'label' => $this->te('allowed ip range'),	
			'tooltip' => $this->te('Leave empty if all ip addresses are allowed. Wildcards are allowed (? and *)'),	
		),
		'visible_items' => array(
			'type' => 'chosen',
			'items' => $this->model->visibleItemsOptions,		
			'multi' => true,	
			'label' => $this->te('menu items'),	
			'tooltip' => $this->te('only access to these menu / views / options'),
			'placeholder' => ' ',
		),
			
		'moderator_id' => array(
			'type' => 'dropdown',
			'items' => $this->model->moderatorOptions,	
			'width' => 'col-sm-6',								
			'tooltip' => $this->te('who will recieve the email and moderates the changes'),	
				
		),
		'is_moderation_active' => array(
			'type'  => 'checkbox',	
			'label' => $this->te('is moderation active')	
		),
/* -- not yet: for sending message to the user			
		'email' => array(
			'type' => 'email',
			'tooltip' => $this->te('use this email instead of the email address of the moderator'),	
			'width' => 'col-sm-6',				
		),	
		'interval' => array(
			'type' => 'dropdown',
			'items' => $this->model->intervalOptions,	
			'label' => $this->te('send every'),	
			'tooltip' => $this->te('the mail will only be send once in the period'),					
			'width' => 'col-sm-3',
		),	
		'down_time_start' => array(	
			'label' => $this->te('not sending period'),	
			'tooltip' => $this->te('during this period the mail will not be send'),	
			'elements'	=> array(
				'down_time_start' => array(
					'type' => 'dropdown',
					'items' => $this->model->timeOptions,	
					'width' => 'col-sm-3',
					'tooltip' => $this->te('the time sending mail to the moderator should stop'),	
				),	
				'down_time_end' => array(
					'type' => 'dropdown',
					'items' => $this->model->timeOptions,	
					'width' => 'col-sm-3',
					'tooltip' => $this->te('the time sending mail to the moderator should start again'),	
				),				
			),		
 * 	),			
 * 
 */
	
	),
	'buttons' => 'default',	
/*		
	'buttons' => array(
		'group' => 	array(
				$this->button(array(
					'label' => $this->te('edit'),
					'url' => $this->createUrl('access/groupEdit', array('id' => $this->model->id, 'mode'=>'edit'))
				)),				
				$this->button(array(
						'label' => $this->te('rights'),
						'url' => $this->createUrl('access/groupRights', array('id' => $this->model->id))
				)),	
		),	
		'edit' => array(
				$this->button('cancel'),
				$this->button('submit'),
			),
		),	
	'onReady' => " 
		$('.menu-".$this->model->id."').addClass('active');
		",
 * 
 */
);
