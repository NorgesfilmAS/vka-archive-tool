<?php

Yii::import('toxus.controllers.BaseSiteController');

class SiteController extends BaseSiteController
{
	public function getPageTitle() {
		return $pageTitle = Yii::app()->params['appName'];
	}
	
	
	public function actions()
  {
		$c = Yii::app()->config;
		return array_merge(
			parent::actions(),			
			array(
			'error'	  => 'toxus.actions.ErrorAction',
			'login'   => array(
										'class' => 'toxus.actions.LoginAction',
										'loginUrl' => $this->createUrl('site/login'),
					),	
			'logout'	=> 'toxus.actions.LogoutAction',
			'passwordRequest' => array(
					'class' => 'toxus.actions.PasswordRequestAction',
					'userProfileModel' => 'User',
//					'onAfterUpdate' => array($this, 'sendInvitation'),
			),
			'invitation' => array(
				'class' => 'toxus.actions.InvitationAction',
				'userProfileModel' => 'User',
				'loginModel' => 'LoginForm',	
			),		
			/*
			 
			'passwordRequest' => array(
					'class' => 'toxus.actions.UpdateAction',
					'form' => 'passwordForm',
					'scenario' => 'invite',	
					'view' => 'invite',	
					'modelClass' => 'User',	
					'menuItem' => '.menu-invite',
					'onAfterUpdate' => array($this, 'sendInvitation'),	
					'successUrl' => 'userInfo/index',
				),
			 * 
			 */					
			'index2' => array(
							'class' => 'toxus.actions.ViewAction',	
							'view' => 'index',
							'defaultMode' => 'hidden',
					),
			'removeAssets' => 'toxus.actions.RemoveAssetsAction',
			'systemInfo' => array(
					'class'=> 'toxus.actions.SystemInfoAction',
					'onExtraInfo' => array($this, 'systemInfo'),
			),
			'system' => array(
					'class' => 'toxus.actions.ViewAction',	
					'view' => 'system',
					'form' => 'systemSetup',
					'modelClass' => false,
			),	
			'deleteStream' => array(
				'class' => 'toxus.actions.DownloadFileAction',	
				'path' => $c->imageTrashBin,
				'forceDownload' => 0,	
			),	
			'deleteDownload' => array(
				'class' => 'toxus.actions.DownloadFileAction',	
				'path' => $c->imageTrashBin,
				'forceDownload' => 1,	
			),
			'profile' => array(
				'class' => 'toxus.actions.UpdateAction',
				'modelClass' => 'User',
				'onCreateModel' => array($this, 'editProfile'),	
				'scenario' => 'profile',
				'form' => 'profileFields',	
				'view' => 'profile',
				'params' => array(
					'pageLayout' => 'full',		
					'mode' => isset($_GET['mode']) ? $_GET['mode'] : 'view',	
				),	
			),	
			'profilePassword' => array(
				'class' => 'toxus.actions.UpdateAction',
				'modelClass' => 'User',
				'onCreateModel' => array($this, 'editProfile'),	
				'onAfterUpdate' => array($this, 'updatePassword'),	
				'scenario' => 'password',
				'form' => 'passwordFields',	
				'view' => 'formDialog',
				'successUrl' => 'site/profile',	
				'params' => array(
					'mode' => 'edit',
						
				),	
			),		
			'bounce' => array(
				'class' => 'toxus.actions.MailBouncePostmark',	
			),		
		));
	}	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionSearch()
	{
		$this->model = new Art();		
		$this->model->unsetAttributes();
		if (isset($_GET['Art'])) {
			$this->model->attributes = $_GET['Art'];
		}	
		if (isset($_GET['Art']['searchOrder'])) {
			$this->model->searchOrder = $_GET['Art']['searchOrder'];
		}
    if ($this->model->searchId) {
			$model = $this->loadModel($this->model->searchId, 'Art');
      if ($model) {
				$type = $model->getStoredResourceType();
        $this->redirect($this->createUrl($type.'/view', array('id' => $this->model->searchId)));
      }
      Yii::app()->user->setFlash('error', Yii::t('app', 'The id was not found'));
      $this->redirect($this->createUrl('site/index'));
    }
		/** the layout for the gird */
    $layout = isset($_GET['layout']) ? $_GET['layout'] : '';
		if (!in_array($layout,  array('large', 'tiles', 'grid'))) {
			$layout = 'tiles';
		}
		$itemsPerPage = array('large' => 6, 'tiles' => 15, 'grid' => 30);
		$this->model->pageSize = $itemsPerPage[$layout];
		
		/**
		 * try to find any Agent with the information given
		 */
	//	$this->model->agent = 'anne';
		if ($this->model->agent) {
			$agents = Agent::model()->findAll(array(
							'condition' => 'name LIKE :name', 
							'params' => array(':name' => '%'.$this->model->agent.'%'),
							'order' => 'name',
					));			
		} else {
			$agents = null;
		}
		$this->render('search' , array(
				'layout' => $layout,
				'agents' => $agents,
		));
	}
	
	/**
	 * to complex to create in a simple view
	 * 
	 */
	public function actionIndex()
	{
    $this->model = new Art();
		$params = array();
		// find all new art (top 10)
		$newArt = Resource::model()->findAll(array(
			'condition' => 'resource_type = '.Yii::app()->config->resourceArtId,
			'order' => 'creation_date DESC',
			'limit' => 10,	
		));
		if ($newArt) {
			$params['art'] = array();
			foreach ($newArt as $a) {
				$params['art'][] = Art::model()->findByPk($a->ref);
			}
		}
		// find the new agents in the database
		$newAgent = Resource::model()->findAll(array(
			'condition' => 'resource_type = '.Yii::app()->config->resourceAgentId,
			'order' => 'creation_date DESC',
			'limit' => 10,	
		));
		if ($newAgent) {
			$params['agent'] = array();
			foreach ($newAgent as $a) {
				$params['agent'][] = Agent::model()->findByPk($a->ref);
			}
		}		
		
		// show the files in the upload directory
		$files = Yii::app()->uploadFileList->filesByDate(5);
		if ($files) {
			$params['files'] = $files;
			$params['moreFiles'] = Yii::app()->uploadFileList->moreFiles;
			
		}
		// the digitization
    /**
		$isDigitized = Art::model()->findAll(array(
						'condition' => 'not digitization_date is null',
						'order' => 'str_to_date(digitization_date, "%d-%m-%Y") DESC',
						'limit' => 6,
				));
     * 
     */
    // beter solution is to use the processing queue for the lastest video uploaded
    $pq = Yii::app()->db->createCommand('SELECT DISTINCT resource_id as id FROM processing_job pb WHERE pb.is_finished = 1 AND error is null AND alternate_id is null AND resource_id > 0 ORDER BY ended_date DESC LIMIT 6')
        ->queryAll();
    
    $isDigitized = array();
    foreach ($pq as $rec) {
      $art = Art::model()->findByPk($rec['id']);
      if (!empty($art)) {
        $isDigitized[] = $art;
      }
    }
		$params['digitized'] = array();		
		if ($isDigitized) {
			$params['digitized']['done'] = $isDigitized;
		}
		/*		
		$received = Art::model()->findAll(array(
						'condition' => 'not received_date is null',
						'order' => 'received_date DESC',
						'limit' => 5,
				));
		if ($received) {
			$params['digitized']['received'] = $received;
		}
		*/
		$this->render('index', $params);		
	}
	
	/**
	 * show the files last digitized
	 */
	public function actionLastDigitized() 
	{
		$this->model = new Art();
		$this->render('lastDigitized');
	}
	
	public function actionDownload($filename = null)
	{
		$fysicalName = '';
		$id = Art::filenameToId($filename);
		if ($id) {
			$this->model = $this->loadModel($id, 'Art');
			$folder = $this->model->folder;
			$fysicalName = $this->model->resourcePath.$filename;
			if (file_exists($fysicalName)) {
				header ("Content-Type: application/download");
				header ("Content-Disposition: attachment; filename=$filename");
				header("Content-Length: " . filesize("$fysicalName"));
				$fp = fopen("$fysicalName", "r");
				fpassthru($fp);
				exit;
			}
		} 
		echo 'the file '.$filename.' does not exists. ('.$fysicalName.')';		
	}
	
	/**
	 * 
	 * @param type $properties
	 * @return array
	 */
	public function systemInfo($properties, $action)
	{
		$c = Yii::app()->config;
		$isShown = true;
		/*
		 * try to read / write something in the resource space directory
		 */
		$root = $c->resourceSpaceImageRoot;
		$file = $root .'test.txt';
		$fileStore = '';
		if (!is_writable($file)) {			
			$fileStore .= 'no write access';
		} else {
			try {
				$s = 'Test';
				if (!file_put_contents($file, $s)) {
					$fileStore .= 'unable no write';
				} else {
					$fileStore .= 'write access';
				}
			} catch (Exception $e) {
				$fileStore .= 'exception: '.$e->messsage();
			}	
		}	
		if (!is_readable($file)) {
			$fileStore .= ' - no read access';
		} else {
			$fileStore .= ' - read access';
		}
		
		$imageMagic = @system('type convert', $isShown );			
		$properties['resoureSpace'] = array(
			'caption' => 'resource space',
			'items' => array(
				'config filename' => $c->resourceSpaceConfigFilename,	
				'resourceSpaceBaseUrl' => $c->resourceSpaceBaseUrl,	
				'resourceSpacePath' => $c->resourceSpacePath,
				'resourceSpace' => $c->resourceSpace,
				'resourceSpaceRoot' => $c->resourceSpaceRoot,
				'resourceSpaceImageRoot' => $c->resourceSpaceImageRoot,
				'imageTrashBin'	=> $c->imageTrashBin,
				'resourceSpaceImageUrl'	=> $c->resourceSpaceImageUrl,
				'filestore access' =>  $fileStore,	
				'resourceSpaceApi' => $c->resourceSpaceApi,	
				'scrambleKey'	=> $c->scrambleKey,
				'uploadPath' => $c->uploadPath,	
				'useCurl' => $c->useCurl ? 'Yes' : 'No',	
				'allowed video extension' => array(
						'value' => implode(', ', is_array($c->VideoExtensions) ? $c->VideoExtensions : array('none')),
						'explain' => Yii::t('app','Set through resourcespace file include/config.php, $ffmpeg_supported_extensions')
				),
				'allowed audio extension' => array(
						'value' => implode(', ', is_array($c->AudioExtensions) ? $c->AudioExtensions : array('none')),
						'explain' => Yii::t('app','Set through resourcespace file include/config.php, $ffmpeg_audio_extensions'),
				),
				'allowed image extension' => array(
						'value' => implode(', ', is_array($c->ImageExtensions) ? $c->ImageExtensions : array('none')),	
						'explain' => Yii::t('app','Set through resourcespace file include/config.php, $image_extensions'),
				),		
				'allowed doc extension' => array(
						'value' => implode(', ', is_array($c->DocExtensions) ? $c->DocExtensions : array('none')),	
						'explain' => Yii::t('app','Set through resourcespace file include/config.php, $doc_extensions'),
				),
				'image magic path' => $isShown ? $imageMagic : '(NOT FOUND)',
				'alternative file folders' => array(
						'value' => implode(', ', is_array($c->alternativeTypesOptions) ? $c->alternativeTypesOptions : array('none')),
						'explain' => Yii::t('app','Set through resourcespace file include/config.php, $alt_types declaration')						
				),	
				'process url' => array(
						'value' => Yii::app()->config->fixedValues['process_url'],
						'explain' => Yii::t('app', 'Set in the config/local.php'),
				),	
			)	
		);
		
		$action->actions['testFtp'] = array(
			'action' => 'setup/testFtp',				
			'caption' => 'Test ftp access',
			'info' => 'Run a test to get the read / write state of the ftp server.'
		);
		$action->actions['resourcespace'] = array(
			'action' => 'resourceSpace/index',				
			'caption' => 'Refresh field information',
			'info' => 'Refresh the information stored in Resource Space, like fields, allowed values, types, etc.'
		);
		$action->actions['relationRebuild'] = array(
			'action' => 'setup/rebuildRelations',				
			'caption' => 'Rebuild Art to Artist relation',
			'info' => 'Refresh the internal used link table for the Art to Artist relation'
		);
		
		
		return $properties;
	}
	/**
	 * list all files in the _delete directory so they can be restored
	 * 
	 */
	public function actionDeleteFiles()
	{
		$c = Yii::app()->config;
		$ff  = new CFileHelper();
		$files = $ff->findFiles($c->imageTrashBin);
		$fileInfo = array();
		foreach ($files as $file) {
			$f = new FileInformation($file);
			$fileInfo[$f->time] = $f;
		}
		krsort($fileInfo);
		$this->render('listDeletedFiles', array('files' => $fileInfo));
	}
	
	public function actionUploadedFiles()
	{
		$c = Yii::app()->config;
		$path = substr($c->uploadPath, 0, strlen($c->uploadPath) - 1);
		$ff  = new CFileHelper();
		
		$files = $ff->findFiles($path, array('level' => 0));
		$s = $c->uploadPath;
		
		if (isset($_GET['filename'])) { // mark this file for md5 generation
			$job = new ProcessingJob();
			$job->job_type_id = ProcessingJob::JOB_MD5_FTP;
			$job->filename =  $c->uploadPath . $_GET['filename'];
			if (!$job->save()) {
				Yii::app()->user->setFlash('error', 'The Job could not be created: '.Util::errorToString($job->errors));
			} else {
				Yii::app()->user->setFlash('info', 'The file '.$_GET['filename'].' has been marked for MD5 generation.');
			}
		}
		$fileInfo = array();
		foreach ($files as $file) {
			$f = new FileInformation($file);
			$fileInfo[] = $f;
		}
		krsort($fileInfo);
		$this->render('listUploadedFiles', array('files' => $fileInfo));		
	}
	
	/**
	 * shows a popup of the deleted file
	 * 
	 * @param string $name
	 */
	public function actionDeleteView($name)
	{
		if (Yii::app()->user->id <= 0)
			throw new CHttpException(403,'access denied');
		$c = Yii::app()->config;
		$filename = $c->imageTrashBin.$name;
		$ff = new FileInformation($filename);
		if (!$ff->exists()) {
			$this->render('error', array(
					'message' => $this->te('The file :file does not exist.', array(':file' => $filename)),
					'dialog' => 1,
					'title' => $this->te('File not found'),
					));
		} elseif (in_array($ff->extension, $c->videoExtensions) || in_array($ff->extension, $c->imageExtensions))  {
			$this->render('preview', array(
				'isVideo' => 1, //in_array($ff->extension, $c->videoExtensions),
				'file' => $ff,
				'title' => $this->te('preview'),	
			));
		} else {		
				$this->render('error', array(
					'message' => $this->te('There is not preview possible for :file.', array(':file' => $filename)),
					'dialog' => 1,
					));				
		}
	}
	
	/**
	 * restores the file back to the upload directory
	 * @param string $name
	 */
	public function actionDeleteRestore($name)
	{
		$c = Yii::app()->config;
		$filename = $c->imageTrashBin.$name;
		$ff = new FileInformation($filename);
		if ($ff->exists()) {
			$fn = new FileInformation($c->uploadPath.'_undeleted_'.$ff->filename);
			if ($fn->exists()) {
				$l = 1;
				while (true) {
					$fn->path = $c->uploadPath.'_undeleted_'.$l.'_'.$ff->filename;
					if (!$fn->exists()) {
						break;
					}
					$l++;
				}	
			}
			if ( rename($ff->path, $fn->path)) {
				$this->render('message', array(
					'body' => $this->te('The file has been moved to the upload directory under the name<br /><div class="text-center"><b>:file</b></div>.', array(':file' => $fn->filename)),
					'title' => $this->te('File restored'), 
					'url' => $this->createUrl('site/deleteFiles'),	
					'width' => 'col-sm-6 col-sm-offset-1',	
					));				
			} else {
				$this->render('error', array(
					'message' => $this->te('The file :file could not be moved to the upload directory.', array(':file' => $fn->path)),
					'title' => $this->te('Error moving'),
					'url' => $this->createUrl('site/deleteFiles'),						
					));
			}
		} else {
			$this->render('error', array(
					'message' => $this->te('The file :file does not exist.', array(':file' => $filename)),
					'title' => $this->te('File not found'),
					'url' => $this->createUrl('site/deleteFiles'),	
					'closeCaption' => $this->te('continue'),
					));
		}

	}

	public function actionInvitationXXX($k)
	{
		$this->model = User::model()->find(array(
			'condition' => 'activation_key = :key',
			'params' => array(
				':key'	=> $k
			)));
		if ($k != '' && $this->model) {	// found the user, now ask for a new password
			$this->model->scenario = 'invitation';
			if (isset($_POST['User'])) {
				$this->model->attributes = $_POST['User'];
				if ($this->model->validate()) {
					if ($this->model->createLogin()) {
						$this->redirect($this->createUrl('site/index'));
					}
				}
			}
			$this->model->passwordText = '';
			$this->model->accepted_terms = 0;
			$params = array(
				'form' => $this->loadForm('inviteFields'),
				'error' => '',
				'pageLayout' => 'full'	
			);
			$this->model->password = '';
			$this->render('invite', $params);
		} else {
			$this->render('invite', array(
					'pageLayout' => 'full',
					'error' => 'The invitation could not be found. Please contact us if you think this is an error.'
			));
		}
	}
	
	public function actionInfo()
	{
		$a = $b / $a;
		// phpinfo();
	}
	
	public function editProfile($id, $action)
	{
		$this->model = Yii::app()->user->profile;
	}	
	
	public function updatePassword($id, $action)
	{
		$this->model->updatePassword();
		
	}
	
	/**
	 * do the quick search
	 * it should ALWAY replace then .pnek with new information because we don't know on which
	 * page we are.
	 * 
	 */
	public function actionQuickSearch() {
		if (empty($_POST['quickSearch'])) {
			$this->actionIndex();
		} else {
			$layout = isset($_POST['layout']) ? $_POST['layout'] : 'grid';
			$this->model = new Art();		
			$this->model->unsetAttributes();
			$this->model->setQuickSearch($_POST['quickSearch']);
			
			// if (isset($_GET['Art']['searchOrder'])) { $this->model->searchOrder = $_GET['Art']['searchOrder'];}
			
			$this->render('search' , array(
			'layout' => $layout,
			'agents' => array(),
		));
		}
	}
  
  public function actionOffLine() {
    $this->render('offline');
  }
}
