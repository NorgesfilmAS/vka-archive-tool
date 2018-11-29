<?php
/**
 * the class to manage the user and group definitions
 * 
 */
class AccessController extends Controller
{
	// if true the submenu is displayed
	protected $subMenu = false;
	
	public function actions()
	{
		return array_merge(parent::actions(),
				array(
				'index' => array(
					'class' => 'toxus.actions.ViewAction',
					'modelClass' => 'AccessModel',
					'view' => 'index',	
				),		
				'user' => array(
					'class' => 'toxus.actions.DialogFormAction',
					'form' => 'userForm',	
					'modelClass' => 'User',	
				),	
				'groupCreate' => array(
					'class' => 'toxus.actions.DialogFormAction',	
					'modelClass' => 'Usergroup',
					'form' => 'groupForm',	
					'scenario' => 'create',
					'successUrl' => $this->createUrl('access/group',array('id' => '--key--')),
				),	
						
				'groupEdit' => array(
					'class' => 'toxus.actions.UpdateAction',	
					'form' => 'groupForm',	
					'modelClass' => 'Usergroup',		// do not load a class if id is given	
					'menuItem' => '.menu-definition',	
					'successUrl' => 'access/group',	
					'onCreateModel' => array($this, 'makeGroupEdit'),	
				),	
				'help' => array(
					'class' => 'toxus.actions.ArticleReadAction',		
					'menuItem' => '.menu-help',	
				), 		
				'group' => array(
					'class' => 'toxus.actions.ViewAction',
					'modelClass' => 'Usergroup',
					'onCreateModel' => array($this,'makeGroupEdit'),
					'view' => 'group-view',	
					'menuItem' => '.menu-group-index',	
				),
				
				'users' => array(
					'class' => 'toxus.actions.ViewAction',
					'onCreateModel' => array($this, 'setUserOrder'),							
					'form' =>  'userAddForm',
					'view' =>  'users',
				),
				'usercreate' => array(
					'class' => 'toxus.actions.DialogFormAction',	
					'form' => 'userForm',
					'modelClass' => 'User',
					'scenario' => 'create',
					'successUrl' => $this->createUrl('userInfo/index',array('id' => '--key--')),
				),		
				'groups' => array(
					'class' => 'toxus.actions.ViewAction',
					// 'onCreateModel' => array($this, 'setUserOrder'),		
					'modelClass' => 'Usergroup',	
					'form' =>  'groupAddForm',
					'view' =>  'groups',
				),
						
						
		));
	}
	
	public function actionIndexXX()
	{
		$params = array('model' => new AccessModel());
		$this->model = $params['model'];
		$this->render('index', $params);
	}
	
	
	public function getToolButtonsXX($isStart) {
		if ($this->route == 'access/group' && $isStart) {
			$form = array(
					'buttons' => array(
						'edit' =>	array(
							'back' =>	$this->button(array(
								'label' => $this->te(' << Groups'),	
								'position' => 'pull-left',		
								'url' => $this->createUrl('access/groups'),	
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
	
	public function makeGroupEdit($id, $action)
	{
		$this->model = $this->loadModel($id, 'Usergroup');
		$this->subMenu = $this->model->name;
	}
	
	/**
	 * Show the overview of one group
	 * 
	 * @param integer $id
	 */			
	public function actionGroupXXXX($id)
	{
		
		$this->model = $this->loadModel($id, 'Usergroup');
		$params = array(
				'state' => 'group',
				'form' => $this->loadForm('groupForm'),
		);
		$this->subMenu = $this->model->name;
		$this->render('group-view', $params);
	}
	/**
	 * shows the field rights editor
	 * @param integer $id
	 */
	public function actionGroupRights($id)
	{
		$this->model = $this->loadModel($id, 'Usergroup');
		if (! $this->model) {
			throw new CDbException('The id could not be found');
		}
		$this->subMenu = $this->model->name;		
		$this->model->scenario = 'rights';
				
		if (isset($_POST['Usergroup'])) {	// save the information
			$this->model->attributes = $_POST['Usergroup'];
			if ($this->model->validate() && $this->model->save()) {
				$this->redirect($this->createUrl('access/group', array('id' => $this->model->id)));
			}	
		}
		$params = array(
				'mode' => 'edit',
				'form' => $this->loadForm('groupRightsForm'));
		$this->render('group-rights', $params);
	}
	
	public function setUserOrder($id, $action)
	{
		$this->model = new User();
		$this->model->unsetAttributes();
		if (isset($_GET['orderBy'])) {
			$this->model->orderBy = $_GET['orderBy'];
		}
	}
}
