<?php
/**
 * change the definition of a job
 */
return array(
	'model' => 'ProcessingJob',	
	'title' => CHtml::encode($this->model->explain),
	'elements' => array(	
		'id' => array(
			'type' => 'panel'	
		),	
		'creationDate' => array(
			'type' => 'panel',
			'label' => $this->te('created'),	
			// 'caption' => $this->model->creation_date,	
		),	
		'priority' => array(
			'type' => 'dropdown',
			'items' => $this->model->priorityOptions,	
		),	
	),
	'buttons' => array(
			'edit' => array(
				$this->button(array(
					'default' => 'run direct',
					'label'	=> 'run direct',
					'url' => $this->createUrl('job/run', array('id' => $this->model->id, 'redirect' => '1')),
					'position' => 'pull-left',
					'ask' => Yii::t('app','Do you want to run this job bypassing the queue?'),						
					'visible' => Yii::app()->user->hasMenu('job/run'),	
				)),	
				$this->button(array(
						'default' => 'delete', 
						'url' => $this->createUrl('job/delete', array('id' => $this->model->id)),
						'position' => 'pull-left',
						'ask' => Yii::t('app','Do you want to remove this job from the queue?'),
						)),	
				$this->button('cancel'),
				$this->button('submit'),	
			),
	), 
);
