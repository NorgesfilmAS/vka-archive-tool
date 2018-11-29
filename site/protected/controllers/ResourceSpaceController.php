<?php

class ResourceSpaceController extends Controller
{
	public function actionIndex()
	{
		$rs = new ResourceSpace();
		$this->model = $rs->resourceModels();
		$this->render('index', array('model' => $this->model));
	}
	
	
	public function actionListModel($id)
	{
		$rs = new ResourceSpace();
		$this->model = $rs->listFields($id);
		$this->render('listModelFields', array('rs' => $rs, 'modelId' => $id));
	}
	
	public function actionShow($modelName, $id)
	{
		$model = new $modelName();
		$model->findByPk($id);
		
		$this->render('listFields', array('model' => $model,'modelName' => $model));
	}
	
  public function actionModels() {
    $rs = new ResourceSpace();
		$result = $rs->generateModel(3);
    $result = $rs->generateModel(4);
    Yii::app()->user->setFlash('success', Yii::t('app', 'The database structure has been generated'));
    $this->redirect($this->createUrl('setup/index'));
  }
	public function actionGenerateModel($id)
	{
		$rs = new ResourceSpace();
		$result = $rs->generateModel($id);
		if (is_array($result)) {
			foreach ($result as $err) {
				Yii::app()->user->setFlash('error', $err);
			}
		} else {	
			Yii::app()->user->setFlash('success', Yii::t('app', 'Model id {id} has been generated', array('{id}' => $id)));
		}
		$this->redirect($this->createUrl('resourceSpace/index'));
	}
	
	/**
	 * undo's one step out of an transaction
	 * 
	 * @param integer $id
	 */
	public function actionUndoStep($id, $route, $url)
	{
		$step = UndoStep::model()->findByPk($id);
		if ($step == null) {
			throw new CHttpException(Yii::t('app', 'Step {id} not found', array('{id}' => $id)));
		}
		$step->undo($route);
		$this->redirect($url);
	}
	
	/**
	 * restores an entire transaction
	 * 
	 * 
	 * @param type $id the id of the the transaction
	 * @param type $route the route to restore
	 * @param string $url the url to redirect to
	 */
	public function actionUndoTransaction($id, $url)
	{
		$trans = UndoTransaction::model()->findByPk($id);
		if ($trans == null) {
			throw new CHttpException(Yii::t('app', 'Transaction {id} not found', array('{id}' => $id)));			
		}
		$trans->undo();
		$this->redirect($url);
	}
}
