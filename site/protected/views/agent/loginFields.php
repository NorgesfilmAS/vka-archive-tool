<?php
/**
 * called to create a new art
 */
return array(
	'model' => 'Agent',	
	'canModerate' => true,		
	'caption' => $this->te('artist login')	,	
	'elements' => array(	  
    'is_login_active' => array(
      'type' => 'checkbox',
      'label' => $this->te('artist can update info')	
    ),
    'login_email' => array(		
      'type' => 'email',
      'label' => $this->te('Artist email'),
      'viewHidden' => !$this->model->is_login_active
		),	    
    'login_name' => array(		
      'label' => $this->te('Artist username'),
      'readOnly' => !empty($this->model->artist_login_id),
      'viewHidden' => !$this->model->is_login_active
		),	    
    'artist_invite_message' => array(	
      'type' => 'textarea',
      'label' => $this->te('Invitation'),
      'viewHidden' => !$this->model->is_login_active  
		),	
    'resend' => array(
    	'type' => 'button',
      'hideLabel' => true,	
			'caption' => $this->te('Send invitation'),	
			'url' => $this->createUrl('agent/sendartistinvitation', array('id' => $this->model->id)),
      'formHidden' => true, 
      'viewHidden' => !$this->model->is_login_active,
    ),  
	),
	'buttons' => 'default',		
);
