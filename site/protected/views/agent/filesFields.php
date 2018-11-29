<?php

return  array(
	'buttons' => array(
		'add' => $this->button(array(
			'type' => 'dialog',	
			'label' => Yii::t('button', 'btn-add-file'),
			'url' => $this->createUrl('agent/alternative', array('id' => $this->model->id, 'isMaster' => 1)),
			'visible' => Yii::app()->user->hasMenu('agent/alt-edit') ? 1 : 0,
		)),
	)
);
