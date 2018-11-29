<?php

return array(
	'model' => 'User',
	'elements' => array(
		'mailSubject' => array(
			'type' => 'string',	
		),	
		'mailMessage' => array(
			'type' => 'textarea',
			'label' => 'Message',
			'helpUrl'	=> $this->createUrl('article/index', array('key' => 'email_invitation')),					
			'helpText' => Yii::t('app', 'info about markers')	
		),
		'mailBcc' => array(
			'type' => 'email',
			'tooltip' => Yii::t('app','Leave this empty to not send a bcc of this message')	
		)	
	),
	'buttons' => array(
			'send' => $this->button( array(
			'label' => $this->te('send'),
			'type' => 'submit',
			'position' => 'pull-left',		
	))),
);
