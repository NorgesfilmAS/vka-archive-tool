<?php
/**
 * access to the user profile for the moderators
 */

class UserInfoController extends Controller
{
	public function actions()
	{
		return array_merge(
			array(
				'index' => array(
					'class' => 'toxus.actions.ViewAction',
					'view' => 'index',
					'modelClass' => 'User',						
				),
				'profile' => array(
					'class' => 'toxus.actions.UpdateAction',
					'form' => 'profileFields',
					'modelClass' => 'User',	
					'menuItem' => '.menu-profile',	
				),
				'invite' => array(
					'class' => 'toxus.actions.UpdateAction',
					'form' => 'inviteFields',
					'scenario' => 'invite',	
					'view' => 'invite',	
					'modelClass' => 'User',	
					'menuItem' => '.menu-invite',
					'onAfterUpdate' => array($this, 'sendInvitation'),	
					'successUrl' => 'userInfo/index',
				),
					
				'changes' => array(
					'class' => 'toxus.actions.ViewAction',
					'view' => '/moderation/changes',
					'modelClass' => 'ModerationModel',
					'onCreateModel' => array($this, 'initChangeAction'),	
					'params' => array(
						'menuItem' => '.menu-changes',								// active menu
						'listBy' => 'moderation/dateChangesByUser'	  // url to call for list of resources
					)	
				),	
		));
	}
	
	/**
	 * function called when the change/id is called.
	 * set the working to select user
	 */
	public function initChangeAction($id, $action)
	{
		$this->model = new ModerationModel();
		$this->model->userId = $id;
		$this->model->id = $id;								// needed to set the menu right
		$user = User::model()->findByPk($id);
		$action->params['caption'] = $user ? $user->username : Yii::t('app', '(user not found)');
		$action->params['id'] = $id;
	}
	
	public function getToolButtonsX($isStart) {
		if ($isStart) {
			$form = array(
					'buttons' => array(
						'edit' =>	array(
							'back' =>	$this->button(array(
								'label' => Yii::t('app', ' << Users'),	
								'position' => 'pull-left',		
								'url' => $this->createUrl('access/users'),	
							))),		
				)								
			);
			$params = array(
				'form' => $form,
			);
			$s = $this->renderPartial('_buttons', $params, true);
			return $s;
		} 
		return '';
	}
	
	public function sendInvitation($id, $action)
	{
		if ($this->model->sendMailMessage()) {
			Yii::app()->user->setFlash('success', Yii::t('app', 'The message has been send.'));
		} else {
			Yii::app()->user->setFlash('error', Yii::t('app', 'There was an error sending the message.'));
		}	
	}
}

