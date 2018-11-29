<?php

return  array(
	'buttons' => array(
		'add' => $this->button(array(
			'type' => 'dialog',	
			'label' => Yii::t('app', 'btn-add-file'),
			'url' => $this->createUrl('art/alternative', array('id' => $this->model->id, 'isMaster' => 1)),
			'visible' => Yii::app()->user->hasMenu('art/alt-edit') ? 1 : 0,
		)),
	)
);
