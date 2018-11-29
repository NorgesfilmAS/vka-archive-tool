<?php

return  array(
	'buttons' => array(
		'add' => $this->button(array(
			'type' => 'dialog',	
			'label' => Yii::t('app', 'btn-add-art'),
			'url' => $this->createUrl('art/relatedAdd', array('id' => $this->model->id, 'isId' => 0)),
		)),
	)
);
