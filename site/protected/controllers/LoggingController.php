<?php

class LoggingController extends Controller 
{
	
	public function actions()
  {
		return array(
			'indexxxx'	  => array(
					'class' => 'toxus.actions.IndexAction',
					'params' => array(
							'artwork-count' => 1235,
					)
			),
			'artXX'	  => array(
					'class' => 'toxus.actions.ViewAction',
					'modelClass' => 'Art',
					'view' => 'art',
					'menuItem' => '.menu-art'
			),	
		);
	}	

	public function actionIndex()
	{
		$this->model = new RSLogging();
		$this->model->resourceTypeId = null;		
		if (isset($_GET['Logging'])) {
			$this->model->setAttributes($_GET['Logging'], false);
		}		
		$params = array(
			'menuItem' => '.menu-overview',	
		);
		$this->render('list', $params);
		
	}
	public function actionArt()
	{
		$this->model = new RSLogging();
		$this->model->resourceTypeId = 3;
		if (isset($_GET['Logging'])) {
			$this->model->setAttributes($_GET['Logging'], false);
		}
		
		$params = array(
			'menuItem' => '.menu-art',	
			'modelClass' => 'Art',				
		);
		$this->render('list', $params);
	}
	
	public function actionArtist()
	{
		$this->model = new RSLogging();
		$this->model->resourceTypeId = 4;
		if (isset($_GET['Logging'])) {
			$this->model->setAttributes($_GET['Logging'], false);
		}
		
		$params = array(
			'menuItem' => '.menu-artist',	
			'modelClass' => 'Agent',				
		);
		$this->render('list', $params);
	}
}
