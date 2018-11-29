<?php
  /**
   * the menu for the user
   */
  if (Yii::app()->user->isGuest) {
    return array(
      'sign-in' => array (
        'label' => $this->t('sign in', 1),
        'url' => $this->createUrl('site/login'),						
      ),	
    );
  } else {
    $menu = array(
  /*			
      'user' => array(
        'label' => ucfirst(Yii::app()->user->profile->username),
        'url' => $this->createUrl('profile/index'),	
      ),	
   * 
   */
      'moderate' => array(
        'label' => $this->te('moderation'),
        'isVisible' => Yii::app()->user->hasMenu('moderation'),								
        'items' => array(
          'toggle-moderation' => array(
            'label' => (Yii::app()->user->isModerating ? '&#10003;' : '&nbsp;').' '.$this->te('moderation'),						
            'checkMark' => 1,	
            'url' => $this->createUrl('moderation/toggle'),	
            'isVisible' => Yii::app()->user->hasMenu('moderation/toggle'),														
          ),
          'overview' => array(
            'label' => $this->te('overview'),
            'url' => $this->createUrl('moderation/index'),		
            'isVisible' => Yii::app()->user->hasMenu('moderation/index'),																				
          ),	
        )

      ),	
      'system' => array(
        'label' =>  $this->te('system'),
        'isVisible' => Yii::app()->user->hasMenu('system'),																				
        'items' => array(	
          'processing-queue' => array(
            'label' => $this->te('processing queue'),
            'url' => $this->createUrl('job/index'),												
            'isVisible' => Yii::app()->user->hasMenu('job/index'),																				
          ),	
          'logging' => array(	
            'label' => $this->te('General logging'),
            'url' => $this->createUrl('logging/index'),						
            'isVisible' => Yii::app()->user->hasMenu('logging/index'),																										
          ),		
          'systemInfo' => array(
            'label' => $this->te('SystemInfo'),
            'url' => $this->createUrl('site/systemInfo'),		
            'isVisible' => Yii::app()->user->hasMenu('site/systemInfo'),																																
          ),
          'deleteFiles'	=> array(
            'label' => $this->te('Deleted files'),
            'url' => $this->createUrl('site/deleteFiles'),				
            'isVisible' => Yii::app()->user->hasMenu('site/deleteFiles'),																																						
          ),
          'uploadedFiles'	=> array(
            'label' => $this->te('Uploaded files'),
            'url' => $this->createUrl('site/uploadedFiles'),				
            'isVisible' => Yii::app()->user->hasMenu('site/uploadedFiles'),																																						
          ),

          'resourceSpace'	=> array(
            'label' => $this->te('Resource Space'),
            'url' =>  Yii::app()->request->hostInfo.'/'.Yii::app()->config->system['rsDirectory'],									
            'linkOptions' => array('target' => '_blank'),	
            'isVisible' => Yii::app()->user->hasMenu('site/resourcespace'),																																						
          ),
          'access' => array(
            'label' => $this->te('Access control'),
            'url' =>  $this->createUrl('access/index'),
            'isVisible' => Yii::app()->user->hasMenu('access/index'),																																						
          )
        ),		
      )
    );  
  };

  if (!Yii::app()->user->isGuest) {
    $profile = array(
      'profile' => array(
        'label' => Yii::t('app', 'profile: {name}', array('{name}'=> CHtml::encode(Yii::app()->user->profile->username))),
        'items' => array(	
          'settings' => array(
            'label' => $this->te('settings'),
            'url' => $this->createUrl('site/profile', array('id' => Yii::app()->user->id)),										
          ),	
        ),
      )  
    );

    // For the artist add their works to the profile menu
    $agentMnu = array();
    $agents = Yii::app()->user->profile->agentIds;
    if (count($agents) == 1) {
      $profile['my-works'] = array (
          'label' => $this->te('my works'),
          'url' => $this->createUrl('agent/works', array('id' => $agents[0])),						
      );
      $profile['newArt'] = array(
        'label' => $this->t('new art', 1), 
        'url' => $this->createUrl('art/create'),	
        'dialog' => true,				// create a dialog when this is clicked				
        'isVisible' => true, // Yii::app()->user->hasMenu('art/create'),	
      );	      
    } elseif (count($agents) > 1) {    
      foreach ($agents as $agentId) {
        $agent = Agent::model()->findByPk($agentId);
        $agentMnu['mnu-'.$agentId] = array(
          'label' => $agent->name,
          'url' => $this->createUrl('agent/works', array('id' => $agentId))
        );
      }
      $agentMnu['newArt'] = array(
        'label' => $this->t('new art', 1), 
        'url' => $this->createUrl('art/create'),	
        'dialog' => true,				// create a dialog when this is clicked				
        'isVisible' => true // Yii::app()->user->hasMenu('art/create'),	
      );	     
    }
    $profile['sign-out'] = array (
              'label' => $this->te('logout'),
              'url' => $this->createUrl('site/logout'),						
            );		

    // now build the menu. 
    if (count($agentMnu) > 0) {
      $menu['works'] = array(
          'label' => Yii::t('app', 'my agents'),
          'items' => $agentMnu
      );					    
    }

    $menu['profile'] = array(
        'label' => Yii::t('app', 'profile: {name}', array('{name}'=> CHtml::encode(Yii::app()->user->profile->username))),
        'items' => $profile
    );	
  }

  return $menu;
