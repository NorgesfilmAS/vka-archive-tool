<?php

class ArtController extends Controller
{
	public function getPageTitle() {
		return $pageTitle = Yii::app()->params['appName'].' - Art - '.$this->model->title;
	}
	
	
	public function actions()
  {
		return array(
			'index'	  => array(
                    'class' => 'toxus.actions.IndexAction',
                    'afterLoadModel' => array($this, 'checkUserRights'),                                
                  ),    
			'view'		=> array(
                    'class' => 'toxus.actions.ViewAction',
                    'afterLoadModel' => array($this, 'checkUserRights'),                                        
                    'view' => 'view',
                    'pageLayout' => 'content',
                    'params' => array(
                        'caption' => 'overview',
                      ),
                    ),		
			'update'	=> array(
                    'class' => 'toxus.actions.UpdateAction',	
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
                   ),   
			'create'	=> array(
										// 'class' => 'toxus.actions.CreatePopupAction',
										'class' => 'toxus.actions.DialogFormAction',
										'form' => 'artFields',
										'modelClass' => 'Art',
										'scenario' => 'create',
										'successUrl' => $this->createUrl('art/view',array('id' => '--key--')),
                    'afterLoadModel' => array($this, 'setArtistRight'),                                
                  ),		
			'agent'	 => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'agentFields',
										'menuItem' => '.menu-agent',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),
			'artworkInfo'	 => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'artworkInfoFields',
										'menuItem' => '.menu-artwork-info',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),
      'masterart'	 => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'masterArtFields',
										'menuItem' => '.menu-master-art',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),
      
 			'description' => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'descriptionFields',
										'menuItem' => '.menu-description',
                    'afterLoadModel' => array($this, 'checkUserRights'),          
									),				
			'history' => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'historyFields',
										'menuItem' => '.menu-history',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),
				
			'relatedAdd' => array(
										'class' => 'toxus.actions.DialogFormAction',
										'form' => 'relatedAddFields',
										'modelClass' => 'ResourceRelated',
										'masterField' => 'resource',
                    'afterLoadModel' => array($this, 'checkUserRights'),                                
									),
			'changerequest' => array(
										'class' => 'toxus.actions.DialogFormAction',
										'form' => 'changeMasterFields',
 										'modelClass' => 'Art',
                    'afterLoadModel' => array($this, 'checkUserRights'),                                
									),
      
			'digitization' => array(
										'class' => 'toxus.actions.UpdateAction',
										'form' => 'digitizationFields',
										'menuItem' => '.menu-digitization',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),
			'related' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'related',
										'form' =>	 'relatedFields',
										'defaultMode' => '',
										'menuItem' => '.menu-related',					
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
									),	
			'files'	=> array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'files',
										'form' =>	 'filesFields',
									//	'defaultMode' => '',
										'menuItem' => '.menu-files',					
										'defaultUserLayout' => 'grid',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
										'params' => array(
											'baseClass' => 'art',
											'caption' => 'files',
											'fullControl' => Yii::app()->user->hasMenu('art/files/full'),	
											'altControl' => Yii::app()->user->hasMenu('art/files/alt/edit') ? 'full' : (Yii::app()->user->hasMenu('art/files/alt') ? 'view' : ''),	
											'mode' => Yii::app()->user->hasMenu('art/files/alt/edit') ? 'view' : '',			
										),
									),
			'preview' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => (isset(Yii::app()->params['videojs']) && Yii::app()->params['videojs']) ? 'previewVideojs' : 'preview',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
										'params'	=> array(
											'isMaster' => 1,	
										)
									),	
			'alternative' => array(
										'class' => 'DocumentsAction',
										'baseClass' => 'Art',
										'refreshUrl' => $this->createUrl('art/files'),
										'captionAttribute' => array('parentResource','title'),
                    'afterLoadModel' => array($this, 'checkUserRights'),                                
									),	
			'alt-download' => array(
										'class' => 'DownloadResourceAction',
                    'afterLoadModel' => array($this, 'checkUserRights'),                                
									),	
			'logging' => array(
										'class' => 'toxus.actions.ViewAction',
										'view' => 'logging',
                    'afterLoadModel' => array($this, 'checkUserRights'),                  
										'menuItem' => '.menu-logging',					        
									),	
				
//			'delete'  => 'toxus.actions.DeletaAction',	
		);
	}	
	
	
	public function actionSearch()
	{
    $this->checkUserRights();
		$this->render('searchLayout');
	}
	public function actionTest($view)
	{
		echo "do the test";
		$this->render($view);
	}
	
	/**
	 * Does the communication about a new file upload
	 * 
	 * 
	 * @param integer $id the current id of the Art
	 * @param string $type the type of action required
	 */
	public function actionUpload($id, $isMaster = 0, $type='dialog')
	{

		$this->model = $this->loadModel($id, 'Art');
    $this->checkUserRights($this->model);
		if (isset($_SERVER['CONTENT_LENGTH'])) {
			if ($_SERVER['CONTENT_LENGTH'] > Util::maxPostSize() ||	$_SERVER['CONTENT_LENGTH'] > Util::maxFileUploadSize()) {
				$this->model->addError('file', $this->te('File is too large to upload'));
			}	
		}	
		$params = array(
			'isMaster' => $isMaster,				
		);
		
    $isArtist = count(Yii::app()->user->profile->agentIds) > 0;
    
		if (isset($_POST['Art'])) {
			$this->model->attributes = $_POST['Art'];
			if ($type == 'upload') {
				Yii::log('Start uploading new file', CLogger::LEVEL_INFO, 'application.controller.ArtController');				
				$this->model->file = CUploadedFile::getInstance($this->model, 'file');
			} elseif ($isArtist) { // artist files are in a different directory
				$this->model->selectFilename = 'artist/'.$this->model->selectFilename;
			} // elsif ($type == 'select'){					
      
			Yii::log('Start save new file', CLogger::LEVEL_INFO, 'application.controller.ArtController');
      if ($this->model->save()) {  // this can take a loooooong time !!
				echo 'url';
        Yii::app()->end(200);																
			}	
		}		
		

		$params['fileList'] =  Yii::app()->uploadFileList->files($isArtist);		
		$this->render('uploadDialog', $params);
	}
	
	/**
	 * show the MD5 form for checking the master file
	 * @param int $id
	 */
	public function actionMd5($id) 
	{
		$this->model = $this->loadModel($id, 'Art');
    $this->checkUserRights($this->model);		
    
		$params = array();
		if (isset($_POST['Art'])) {
			$this->model->attributes = $_POST['Art'];
      if ($this->model->save()) {  // this can take a loooooong time !!
				echo 'url';
        Yii::app()->end(200);																
			}	
		}
		$this->render('md5form', $params);		
	}
	
	/**
	 * Places a job in the queue to update the md5 of the file.
	 * 
	 * @param integer $id
	 */
	public function actionMd5Generate($id)
	{
    
		$this->model = $this->loadModel($id, 'Art');
    $this->checkUserRights($this->model);
		$this->model->storage_md5 = Yii::t('app', 'Processing md5 info');
		$job = ProcessingJob::model()->findAll('is_finished=0 AND resource_id=:id AND job_type_id=:type_id', array(
				':id' => $id,
				':type_id' => ProcessingJob::JOB_MD5
		));
		if (empty($job) || count($job) == 0) {
			$job = new ProcessingJob();
			$job->resource_id = $id;
			$job->job_type_id = ProcessingJob::JOB_MD5;
			if (! $job->save()) {				
				echo Util::errorToString($job->errors);
			}
		} else {		
			echo 'md5';
		}
		Yii::app()->end(200);
	}
	
	/**
	 * download the current file
	 * 
	 * @param type $id
	 */
	public function actionDownload($id)
	{
    
		// check that the file exists
		$this->model = $this->loadModel($id, 'Art');
    $this->checkUserRights($this->model);
		if (file_exists($this->model->downloadPath)) {
			$this->redirect($this->model->downloadUrl);
		} else {
			$this->model->addError('','The original file was not found');
		}
	}
  
  public function actionChannels($id)
  {    
    $this->model = $this->loadModel($id, 'Art');
    $this->checkUserRights($this->model);
    $params = array();
    $this->render('channels', $params);
  }
	
	/**
	 * list for the lookup field. Should become an action
	 * 
	 * @param string $q query value
	 * @return array
	 */
	public function actionLookup($q=null, $l=20)
	{
    $this->checkUserRights();
		if ($q) {
			$art = Art::model()->findAll(	array(
							'condition' => 'title LIKE :title', 
							'params' => array(':title' => '%'.$q.'%'),
							'order' => 'title',
							'limit' => $l
					));			
			$result = array();
			foreach ($art as $a) {
				// $result[$a->id] = $a->title;
				$result[$a->id] = array(
					'id' => $a->id,
					'value' => CHtml::encode($a->title).(strlen($a->agent) > 0 ? (' ('. CHtml::encode($a->agent).')') : ''),
				);
			}
		} else {
			$result = array();
		}	
    
		echo CJSON::encode($result);
	}
	/**
	 * querys for unique values in fields and matches them with query
	 * 
	 * @param string $field the field to look in
	 * @param string $query the text to ask
	 */
	public function actionAttributeLookup($field, $query)
	{
    $this->checkUserRights();
		$result = array();
		if ($query && $field) {
			// should limit it to 10
			$art = new Art();
			$fieldId = $art->nameToId($field);
			if ($fieldId) {				
				$cmd = Yii::app()->db->createCommand()
							->selectDistinct('value')
							->from('resource_data')
							->where('resource_type_field='.$fieldId.' AND value LIKE :value' , array(':value'=>'%'.$query.'%'))
							->order('value')
							->limit(10);	
				$model = $cmd->queryAll(false);
				if ($model) {
					foreach ($model as $rec) {
						$result[] = array('value' => $rec[0]);
					}
				}
			}	
		}
		echo CJSON::encode($result);
	}
	
	public function actionInfo($id, $view = 'info')
	{    
		if ($id > 0) {
			$this->model = $this->loadModel($id, 'Art');
			$params = array();
      $this->checkUserRights($this->model);      
			echo $this->renderPartial($view, $params, true);				
		} else {
			echo '	';	// tab
		}	
	}
	/**
	 * popup showing what changed
	 */
	public function actionLoggingDialog($id, $date, $user)
	{
    
		$this->model = $this->loadModel($id, 'Art');
    $this->checkUserRights($this->model);    
		$usr = User::model()->findByPk($user);
		$params = array(
			'date' => $date,
			'user_id' => $user,
			'fullname' => $usr->fullname,	
		);
		$this->render('loggingDialog', $params);
	}
	
	public function actionRelatedRemove($id, $parent)
	{
    $this->checkUserRights();
		$model = ResourceRelated::model()->findByPk($id);
		if ($model) {			
			$model->delete();
			$this->redirect($this->createUrl('art/related', array('id' => $parent)));
		} else {
			throw new CDbException('The related information could not be found');
		}
	}
	/**
	 * check the status of the alt file
	 * 
	 * @param integer $id of the alternate file
	 */
	public function actionAltCheck($id) 
	{
		$this->model = ResourceAltFiles::model()->findByPk($id);

		if (empty($this->model)) {
			throw new CHttpException(404, Yii::t('app', 'That alternate file id {id} could not be found', array('{id}' => $id)));			
		}
    $this->checkUserRights($this->model->parentResource);    
		if ($this->model->checkStatus() == false) {
			Yii::app()->user->setFlash('error', Util::errorToString($this->model->errors));
		}	
		$this->redirect($this->createUrl('art/files', array('id' => $this->model->resource)));		
	}
	
	public function actionListNew()
	{
		
	}
  
  /**
   * Checks/Update the right of the current user depending if the Artwork->artist
   * is the current user.
   * @param Art $model
   */
  public function checkUserRights($art=false) {
    if ($art && $art instanceof Art) {
      Yii::app()->user->profile->updateExtraRights($art->agent_id);  // it can be multiple agents     
    }  
    $this->checkAccessRights();
  }
  
  public function setArtistRight($art=false) {
    // trick the system into thinking it has right
    $agentIds = Yii::app()->user->profile->agentIds;
    Yii::app()->user->profile->updateExtraRights($agentIds);
  }
}
