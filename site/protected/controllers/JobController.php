<?php

class JobController extends Controller
{
	
	public $logPage = false;	// pages do not need to be logged
	
	public function actions() {
		return 
			array_merge(parent::actions(),
			array(
				'update'	=> array(
								'class' => 'toxus.actions.DialogFormAction',
								'form' => 'editFields',
								'modelClass' => 'ProcessingJob',
								'successUrl' => $this->createUrl('job/active'),
				),	
				'view' => array(
					'class' => 'toxus.actions.ViewAction',	
					'view' => 'viewJob',	
					'modelClass' => 'ProcessingJob',	
				),	
				'downloadLog' => array(
								'class' => 'toxus.actions.DownloadFileAction',
								'path' => YiiBase::getPathOfAlias('application.runtime').'/toxus.process.log',
								'forceDownload' => true,
				),
			));
	}
	
	public function actionIndex()
	{
		$this->model = new ProcessingJob();
		$this->render('index');
	}
	public function actionActive()
	{
		$this->model = new ProcessingJob();
		$this->render('active');
	}
	
	public function actionDone()
	{
		$this->model = new ProcessingJob();
		$this->render('done');
	}
	
	
	public function actionRun($id)
	{
		$job = ProcessingJob::model()->findByPk($id);
		if ($job) {
			$job->run();
			if (isset($_GET['redirect']) && $_GET['redirect'] == '1') {
				$this->redirect($this->createUrl('job/active'));
			} else {
				echo 'ok';
			}
		} else {
			if (isset($_GET['redirect']) && $_GET['redirect'] == '1') {
				Yii::app()->user->setFlash('error', Yii::t('app', 'Job {id} does not exist.', array('{id}' => $id)));
				$this->redirect($this->createUrl('job/index'));
			} else {
				echo 'error: job not found';
			}
		}
	}
	
	public function actionLastActive()
	{
		$status = Yii::app()->queue->status;
		$result = array(
				'active' => $status['last_active'], 
				'started' => $status['started'],
				'running' => $status['running']
		);
		
		echo CJSON::encode($result);
		Yii::app()->end(200);
	}
	
	public function actionDelete($id)
	{
		$this->model = ProcessingJob::model()->findByPk($id);
		if ($this->model) {
			$this->model->delete();
			$this->redirect($this->createUrl('job/active'));
		} else {
			throw new CDbException(Yii::t('app', 'The job id {id} does not exists', array('{id}' => $id)));
		}
	}
	
	/**
	 * hides a job from the done queue
	 * @param integer $id the id of the job
	 */
	public function actionHide($id)
	{
		$this->model = ProcessingJob::model()->findByPk($id);
		if ($this->model) {
			$this->model->is_hidden = 1;
			$this->model->save();
			$this->redirect($this->createUrl('job/done'));
		} else {
			throw new CDbException(Yii::t('app', 'The job id {id} does not exists', array('{id}' => $id)));
		}
	}
	
	
	public function actionRestart()
	{
		Yii::app()->queue->restart();
		$this->redirect($this->createUrl('job/index'));
	}
	
	public function actionReprocess($id)
	{
		$job = new ProcessingJob();
		
		if ($job->reprocess($id)) {			
			$job->save();
			Yii::app()->user->setFlash('info', Yii::t('app','Resource will be reprocessed'));
		} else {
			Yii::app()->user->setFlash('error', Yii::t('app', 'Resource not found'));
		}
		$this->redirect(Yii::app()->request->urlReferrer);
	}
	
	/**
	 * Runs the end processing of the job as mysql has gone away 
	 * @param integer $id the id of the job
	 */
	public function actionEndProcess($id)
	{
		if (Yii::app()->user->hasMenu('job/endprocess')) {
			$job = ProcessingJob::model()->findByPk($id);
			if (empty($job)) {
				throw new CDbException(Yii::t('app', 'The job {id} does not exists', array('{id}' => $id)));
			}	
			$job->endProcess(true);
			Yii::app()->user->setFlash('info', Yii::t('app','The end processing has been done manual.'));
		} else {
			Yii::app()->user->setFlash('error', Yii::t('app','Access denied'));
		}
		$this->actionActive();
	}
}
