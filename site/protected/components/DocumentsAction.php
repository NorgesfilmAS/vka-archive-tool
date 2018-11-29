<?php

Yii::import('toxus.actions.BaseAction');
class DocumentsAction extends BaseAction
{
	/**
	 * the url to call after the record has been update, excluding the id of the parent
	 * @var string
	 */
	public $refreshUrl = null;
	/**
	 * the captionField or caption Relation / field for the caption
	 * 
	 * @var mixed
	 */
	public $captionAttribute = null;
	/**
	 * the class of the controller
	 * 
	 * @var string
	 */
	public $baseClass = null;
	
	

	
	/**
	 * 
	 * @param integer $id the id of the current alternative file.
	 * @param bool isMaster if 1 the id is of the master so we can create an new File
	 */
	public function run($id, $isMaster = true)
	{
		if ($isMaster) {
			$masterId = $id;
			$this->controller->model = new ResourceAltFiles;
			$this->controller->model->resource = $masterId;
		} else {
			$this->controller->model = ResourceAltFiles::model()->findByPk($id);
			$masterId = $this->controller->model->resource;		
		}
    if ($this->afterLoadModel) {
      call_user_func($this->afterLoadModel, $this->controller->model->parentResource);
    }
	
		if (isset($_SERVER['CONTENT_LENGTH'])) {
			if ($_SERVER['CONTENT_LENGTH'] > Util::maxPostSize() ||	$_SERVER['CONTENT_LENGTH'] > Util::maxFileUploadSize()) {
				$this->controller->model->addError('file', $this->controller->te('File is too large to upload'));
			}			
		}	
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
			if ($action == 'delete') { 
				if ($this->controller->model->delete())
					$this->controller->redirect($this->refreshUrl.'/'.$masterId); //$this->createUrl('art/files', array('id' => $masterId)));
				else {
					$this->controller->model->addError('', Yii::t('app','The file could not be deleted.'));
				}
			} elseif ($action == 'download') {
				$this->controller->redirect($this->controller->model->downloadUrl);
			} elseif ($action == 'preview') {
				$params = array(
					'title' => $this->controller->model->name,	
					'isMaster' => $isMaster ? 1 : 0,
				);
				if (isset(Yii::app()->params['videojs']) && Yii::app()->params['videojs']) {
					$this->render('previewVideojs', $params);
				} else {
					$this->render('preview', $params);
				}	
				// $this->controller->render('preview', $params);
			} else {
				echo Yii::t('app', 'Error: unknown action');
				Yii::app()->end();
			}
		} else {
			if (isset($_POST['ResourceAltFiles'])) {
				$this->controller->model->attributes = $_POST['ResourceAltFiles'];
				$this->controller->model->file = CUploadedFile::getInstance($this->controller->model,'file');					
				if ($this->controller->model->save()) {
					echo 'url';	// refresh the window
					Yii::app()->end();
				}
			}
			if (is_array($this->captionAttribute)) {
				$caption =  $this->controller->model->{$this->captionAttribute[0]}->{$this->captionAttribute[1]};
			} elseif (is_string($this->captionAttributeion)) {
				$caption =  $this->controller->model->{$this->captionAttribute};
			} else {
				$caption = null;
			}
			$params = array(
				'fileList' => Yii::app()->uploadFileList->files(),
				'caption' => $caption,
				'baseClass' => lcfirst($this->baseClass),	
				'isMaster' => $isMaster,	
			);
			$this->controller->render('alternativeFiles', $params);
		}	
	}
	
	
}
