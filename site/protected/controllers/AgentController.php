<?php

class AgentController extends Controller
{
	
	//http://www.yiiframework.com/doc/guide/1.1/en/basics.controller
  /* Can not be used because right may change depending on the work that
   * is being worked on
   * 
	public function filters()
  {
		return array(
				array(
						'MenuRightsFilter',
				),
		);
	}	
	*/
	public function getPageTitle() {
		return $pageTitle = Yii::app()->params['appName'].' - Artist - '.$this->model->name;
	}
	public function actions()
  {
		return array(
			'view'		=> array(
                  'class' => 'toxus.actions.ViewAction',
                  'view' => 'view',
                  'afterLoadModel' => array($this, 'checkUserRights'),                  
			),		
			'update'	=> array(
                  'class' => 'toxus.actions.UpdateAction',	
                  'afterLoadModel' => array($this, 'checkUserRights'),          
                   ), 
			'description' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'description',
										'form' => 'descriptionFields',
                    'afterLoadModel' => array($this, 'checkUserRights'),          
									),				
			'create' => array(
										'class' => 'toxus.actions.DialogFormAction',
										'form' => 'agentFields',
										'modelClass' => 'Agent',
										'successUrl' => $this->createUrl('agent/view',array('id' => '--key--')),
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
			),
			'general'	 => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'agentFields',
										'menuItem' => '.menu-description',
                    'afterLoadModel' => array($this, 'checkUserRights'),  
									),
			'biography'	 => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'biographyFields',
										'menuItem' => '.menu-biography',
                    'afterLoadModel' => array($this, 'checkUserRights'),  
									),
      'artistLogin' => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'loginFields',
										'menuItem' => '.menu-artistlogin',        
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
                  ),
			'notes'	 => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'notesFields',
										'menuItem' => '.menu-notes',
                    'afterLoadModel' => array($this, 'checkUserRights'),          
									),
			'works' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'works',
										'defaultMode' => '',
										'params' => array(
											'caption' => 'artist works',																						
										),
                    'afterLoadModel' => array($this, 'checkUserRights'),          
                  ),	
      'myworks' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'works',
										'defaultMode' => '',
                    'onCreateModel' => array($this, 'artistWorks'),  
										'params' => array(
											'caption' => 'artist works',																						
										),
                    'afterLoadModel' => array($this, 'checkUserRights'),          
                  ),	
			'files'	=> array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'files',
										'form' =>	 'filesFields',					
//										'defaultMode' => '',
										'params' => array(
											'baseClass' => 'agent',
											'caption' => 'documents',	
											'hideMasterResource' => 1,		
											'fullControl' => '',
											'altControl' => Yii::app()->user->hasMenu('agent/files/alt/edit') ? 'full' : (Yii::app()->user->hasMenu('art/files/alt') ? 'view' : ''),	
											'mode' => Yii::app()->user->hasMenu('agent/files/alt/edit') ? 'view' : '',			
										),
                    'afterLoadModel' => array($this, 'checkUserRights'),          
									),
			'alternative' => array(
										'class' => 'DocumentsAction',
										'baseClass' => 'Agent',
										'refreshUrl' => $this->createUrl('agent/documents'),
										'captionAttribute' => array('parentResource', 'name'),  
                    'afterLoadModel' => array($this, 'checkUserRights'),          
									),	
			'alt-download' => array(
										'class' => 'DownloadResourceAction',
									),					
			'logging' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'logging',
										'menuItem' => '.menu-logging',					
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),	
				
			
		);
	}
  
  /**
   * 
   * @param integer $id the id of agent
   */
  public function actionSendArtistInvitation($id) 
  {
    $agent = Agent::model()->findByPk($id);
    if (empty($agent)) {
      Yii::app()->user->setFlash('error', 'The artist could not be found');
    } else {
      if (!$agent->sendArtistInvitation()) {      
        Yii::app()->user->setFlash('error', Util::errorToString($agent->errors));
      } else {
        Yii::app()->user->setFlash('success', 'The invitation has been send');        
      }  
    }
    $this->redirect($this->createUrl('agent/artistLogin', array('id' => $id)));
  }
  
  /**
   * check if the user has extra rights on this model
   * 
   * @param CModel $model
   */
  public function checkUserRights($agent) {
    if (!empty($agent) && Yii::app()->user->profile->updateExtraRights($agent->id)) {      
      // so load the user setting for the artist extended model
      Yii::log('This user has extra rights', CLogger::LEVEL_INFO, 'toxus.agentController.checkUserRights');
    }
    $this->checkAccessRights();
  }
  
  
  
  /**
   * the user can control multiple artist works. So if there are multiple we should
   * make a dropdown selecting the works.
   * If only one artist, we should open the agent/work/xxx page
   * 
   * @param type $id      // fake id
   * @param type $action
   */
  public function artistWorks($id, $action) {
    $agents = Yii::app()->user->profile->agentIds;
    if (count($agents)  >= 1) {
      $action->controller->model = Agent::model()->findByPk($agents[0]);
    } else {
      $action->controller->model = new Agent(); // make it a fake
    }
  }
  
}
