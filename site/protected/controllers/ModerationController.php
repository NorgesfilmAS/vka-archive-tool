<?php
/**
 * controller that handles the moderation process
 * sss
 */

class ModerationController extends Controller
{
	protected $showGroups = false;
	public function actions()
	{
		return array_merge(
				parent::actions(),
				array(		
					'index' => array(
						'class' => 'toxus.actions.ViewAction',
						'view' => 'index',
						'modelClass' => 'ModerationModel',
						'params' => array(
							'caption' => $this->te('moderation'),	
						)	
					),	
					'date' => array(  // trick to show the users
						'class' => 'toxus.actions.ViewAction',
						'view' => 'changes',
						'modelClass' => 'ModerationModel',
						'onCreateModel' => array($this, 'initChangeActionDate'),								
						'params' => array(
							'menuItem' => '.menu-date',
							'listBy' => 'moderation/dateChangesByGroup'	  // url to call for list of resources
						)	
					),
					'selectGroup' => array(
						'class' => 'toxus.actions.ViewAction',
						'view' => 'changes',
						'modelClass' => 'ModerationModel',
						'onCreateModel' => array($this, 'initChangeActionGroup'),	
						'params' => array(
//							'showGroups' =>  true,	
							'menuItem' => '.menu-group',								// active menu
							'listBy' => 'moderation/dateChangesByUser',	  // url to call for list of resources
						),								
					),
					'group' => array(
						'class' => 'toxus.actions.ViewAction',
						'view' => 'changes',
						'modelClass' => 'ModerationModel',
						'onCreateModel' => array($this, 'initChangeActionGroup'),	
						'params' => array(
							'menuItem' => '.menu-group-~key~',								// active menu
							'listBy' => 'moderation/dateChangesByGroup'	  // url to call for list of resources
						),	
					),	
						
				)		
		);
	}
	
	/**
	 * function called when the change/id is called.
	 * set the working to select user
	 */
	public function initChangeActionGroup($id, $action)
	{
		$id = empty($id) ? 0 : $id;
		$this->model = new ModerationModel();
		$this->model->groupId = $id;
		$this->model->id = $id;								// needed to set the menu right
		$this->showGroups = true;
		$group = Usergroup::model()->findByPk($id);
		$action->params['caption'] = $this->te('Showing <strong>{name}</strong>', array('{name}' => CHtml::encode($group ? $group->name : 'all groups')));
		$action->params['id'] = $id;		
	}
	
	/**
	 * function called when the change/id is called.
	 * set the working to select user
	 */
	public function initChangeActionDate($id, $action)
	{
		$this->model = new ModerationModel();
		$this->model->groupId = $id;
		$this->model->id = $id;								// needed to set the menu right
		if ($id > 0) {
			$group = Usergroup::model()->findByPk($id);			
			$action->params['caption'] = $this->te('group: {name}', array(
					'{name}' => CHtml::encode($group ? $group->name : '(group not found)')
			));	
		} else {
			$action->params['caption'] = $this->te('all groups');
		}	
		$action->params['id'] = $id;
	}
	
	/**
	 * list the changed Resources by this user on the defined day
	 * @param string $d format yyyy-mm-dd
	 */
	public function actionDateChangesByUser($id, $d)
	{
		$this->model = new ModerationModel();
		$this->model->userId = $id;
		$params = array(
			'model' => $this->model->listChangesOnDate($d),
			'date' => $d,
			'id' => $id,	
			'detailUrl' => 'moderation/transactionByUser',	// ajax to call	
		);		
		$this->renderPartial('listResource', $params);
	}
	
	/**
	 * list the changed Resources by this user on the defined day
	 * @param string $d format yyyy-mm-dd
	 */
	public function actionDateChangesByGroup($id, $d)
	{
		$this->model = new ModerationModel();
		$this->model->groupId = $id;
		$params = array(
			'model' => $this->model->listChangesOnDate($d),
			'id' => $id,	
			'date' => $d,	
			'detailUrl' => 'moderation/transactionByGroup',	// ajax to call					
		);		
		$this->renderPartial('listResource', $params);
	}
	
	/**
	 * Shows what is changed on that day by that user to that resource
	 * @param type $id
	 * @param type $d
	 * @param type $resource_id
	 */
	public function actionTransactionByUser($id, $d, $resource_id)
	{
		$this->model = new ModerationModel();
		$this->model->userId = $id;		
		$params = array(
			'model' => $this->model->listTransactionsOnDate($d, $resource_id),
			'date' => $d,	
			'id' => $id,	
			'resourceId' => $resource_id,	
		);		
		$this->renderPartial('listChanges', $params);
	}

	/**
	 * Shows what is changed on that day by that user to that resource
	 * @param type $id
	 * @param type $d
	 * @param type $resource_id
	 */
	public function actionTransactionByGroup($id, $d, $resource_id)
	{
		$this->model = new ModerationModel();
		$this->model->groupId = $id;
		$params = array(
			'model' => $this->model->listTransactionsOnDate($d, $resource_id),
			'date' => $d,	
			'id' => $id,	
			'resourceId' => $resource_id,	
		);		
		$this->renderPartial('listChanges', $params);
		
	}
	
	/** 
	 * toggles the state of moderation and returns to the same page
	 */
	public function actionToggle()
	{
		Yii::app()->user->isModerating = ! Yii::app()->user->isModerating;
		$url = Yii::app()->request->urlReferrer;
		$this->redirect($url);
	}
	
	
}
