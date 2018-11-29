<?php

return  array(
	'buttons' => array(
		'view' => array(
			'add' => $this->button(array(
				'type' => 'dialog',	
				'label' => Yii::t('app','btn-add-group'),
				'url' => $this->createUrl('access/groupCreate'),
			)),
		)
	)
);
