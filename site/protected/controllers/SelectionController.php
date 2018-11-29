<?php
/**
 * class to generate a selection, save it, load it, run it, export it
 * 
 * version 1.0 JvK 2014 Aug
 */

Yii::import('toxus.controllers.BaseJsonController');

class SelectionController extends BaseJsonController 
{
	/**
	 * The types the selection is running on
	 * 
	 * @var array 
	 */
	public $baseTypes = array(
		'art' => array(
			'class' => 'Art'	
		),
		'agent' => 	array(
			'class' => 'Agent'	
		)
	);
	
	public function actionIndex()
	{
		$params = array(
			'reports' => $this->listReports(true),
			'header' => Yii::t('app', 'Selections and Reports'),	
		);
		
		$this->render('index', $params);
	}
	/**
	 * opens a report
	 * @param string $name
	 */
	public function actionPreview($guid)
	{
		$sel = new ResourceSpaceSelection();
		$name = $sel->report['name'];		
		$model = new Art();
		$params = array(
			'header' => Yii::t('app', 'Report: {name}', array('{name}' => $name)),
			'filename' => $name,
			'showEdit' => true,
			'collections' => Util::array2NameArray($model->attributeOptions('collection', array('sorted' => true)), array('id','label'))
		);
		$this->render('preview', $params);
	}
	
	public function actionSetActive($guid, $name=false)
	{
		if ($name == false) {
			$name = $_POST['name'];
		}
		$filename = $this->reportPath($name);
		if (!file_exists($filename)) {
			$this->error = Yii::t('app', 'The report does not exist');
		} else {
			$report = file_get_contents($filename);
			$sel = new ResourceSpaceSelection(CJSON::decode($report));
			
			$this->data = array(
				'url' => $this->createUrl('selection/preview', array('guid' => $guid))	
			);
			
			file_put_contents($this->quickPath($guid), $report);
		}
		$this->asJson();
	}
	
	/**
	 * 
	 * @param string $name then name of the report
	 * @return string a full path to the report
	 */
	protected function reportPath($name)
	{
		$path = YiiBase::getPathOfAlias('application.config.users');
		return $path.'/'.$name.'.report';
	}
	protected function quickPath($guid)
	{
		$path = YiiBase::getPathOfAlias('application.config.users');
		return $path.'/'.Util::sanitize($guid).'.quick';

	}
	/**
	 * Loads the report and shows the information
	 * 
	 * @param string $guid
	 * @param string the name of the report
	 */
	public function actionShow($guid)
	{
		$report = file_get_contents("php://input");
		$filename = $this->quickPath($guid);

		file_put_contents($filename, $report);
		// $filename = $this->reportPath($name);
		if (file_exists($filename)) {
			$data = CJSON::decode($report);			
			$sel = new ResourceSpaceSelection();
			$sel->guid = $guid;
			$sel->json = CJSON::encode($data); //$example);
			try {
				if (!$sel->run()) {
					$this->addError('form', Yii::t('app', 'Could not select records'));			
				} else {
					if (Yii::app()->config->debug['isDevelop'] == 1 || isset($_GET['debug'])) {
						$this->data = array(
							'sql' => $sel->selectSql,
							'params' => $sel->selectParams,	
							'count' => $sel->selectCount,	
						);
					} else {
						$this->data = array(
							'count' => $sel->selectCount,	
						);						
					}	
				}
			} catch (Exception $e) {
				$this->addError('form', Yii::t('app', $e->getMessage()));			
				$this->message = $e->getMessage();
				$this->data = array(
					'sql' => $sel->selectSql,
					'params' => $sel->selectParams,	
					'count' => $sel->selectCount,	
				);			
			}	
		} else {
			$this->error = Yii::t('app','The file does not exist.');
		}
		$this->asJson();
	}
	/**
	 * runs the report
	 * @param type $guid
	 */
	public function actionReport($guid)
	{
		try {
			$sel = new ResourceSpaceSelection();		
			$sel->guid = $guid;
			$grid = new VkaReportGrid();
			$grid->selection = $sel;
			$grid->run();

		} catch (Exception $e) {
			header('HTTP/1.1 500 '.$e->getMessage());
			echo $e->getMessage();
			//throw new CHttpException(500, $e->getMessage());
		}	
	}		
	
	public function actionExport($guid) 
	{
		try {
			$sel = new ResourceSpaceSelection();		
			$sel->guid = $guid;
			$grid = new VkaReportGrid();
			$grid->selection = $sel;
			header('Content-disposition: attachment; filename=report.xls');
			header('Content-type: application/vnd.ms-excel');
			header_remove("X-Powered-By");			
			$grid->run();
//			header('Content-Length: ' . $filesize);
//			header('Accept-Ranges: bytes');

		} catch (Exception $e) {
			header('HTTP/1.1 500 '.$e->getMessage());
			echo $e->getMessage();
			//throw new CHttpException(500, $e->getMessage());
		}			
	}
	
	public function actionCreate($guid, $name = false)
	{
		if ($name == false) {
			$name = $_POST['name'];
		}
		$filename = $this->reportPath($name);
		if (file_exists($filename)) { // can't over write
			$this->setError(Yii::t('app','The report already exist'));
		} else {
			$report = CJSON::encode(array(
					'name' => $name,
					'order' => array(), 
					'fields' => array(), 
					'design' => array())
			);
			file_put_contents($filename, $report);
			$path = YiiBase::getPathOfAlias('application.config.users');
			file_put_contents($path.'/'.Util::sanitize($guid).'.quick', $report);			
			// set as default
			$sel = new ResourceSpaceSelection($report);			
			
			$this->data = array(
				'url' => $this->createUrl('selection/preview', array('guid' => $guid)),
			);
		}
		$this->asJson();
	}
	/**
	 * save the report under this name 
	 * @param string $name
	 */
	public function actionSave()
	{
		$reportJson = file_get_contents("php://input");
		$report = CJSON::decode($reportJson);
		// save report in the application.runtime.reports directory
		$path = YiiBase::getPathOfAlias('application.config.users');
		
		if (!isset($report['name']) || trim(Util::sanitize($report['name'])) == '') {
			header('HTTP/1.1 500 ');
			echo Yii::t('app','Name of the report is not set');
			return;
			throw new CHttpException(500,Yii::t('app','Name of the report is not set'));
		}
		$filename = $this->reportPath($report['name']);
		if (file_put_contents($filename, $reportJson) === false) {
			Yii::app()->user->setFlash('error', Yii::t('app', 'There was an error saving the report. Please try again'));	
		} else {
			Yii::app()->user->setFlash('info', Yii::t('app', 'Report saved'));			
		}
		$this->redirect($this->createUrl('selection/index'));
	}
	
	public function actionLoad()
	{
		if (!isset($_POST['name'])) {
			throw new CHttpException(500, Yii::t('app', 'The is no name given'));
		}
		$path = YiiBase::getPathOfAlias('application.config.users');
		$name = Util::sanitize($_POST['name'],true,false,false);
		$filename = $path.'/'.$name.'.report';
		if (file_exists($filename)) {
			$report = file_get_contents($filename);
			$this->data = CJSON::decode($report);
		} else {
			$this->error = Yii::t('app','The file does not exist.');
		}
		$this->asJson();
	}
	
	public function actionDelete()
	{
		if (!isset($_POST['name'])) {
			throw new CHttpException(500, Yii::t('app', 'The is no name given'));
		}
		$path = YiiBase::getPathOfAlias('application.config.users');
		$name = Util::sanitize($_POST['name'],true,false,false);
		$filename = $path.'/'.$name.'.report';
		if (file_exists($filename)) {
			@unlink($filename);	
			$this->message = Yii::t('app','The report has been remove.');			
		} else {
			$this->error = Yii::t('app','The file does not exist.');
		}
		$this->asJson();
		
	}
	
	public function actionQuickSave($guid) {
		$report = file_get_contents("php://input");
		$path = YiiBase::getPathOfAlias('application.config.users');
		$name = Util::sanitize($guid);
		if (file_put_contents($path.'/'.$name.'.quick', $report) === false) {
			throw new CHttpException(500, Yii::t('app', 'Could not quick save the information'));
		}
		$this->asJson();
	}
	
	public function actionQuickLoad($guid)
	{
		$path = YiiBase::getPathOfAlias('application.config.users');
		$name = Util::sanitize($guid);
		$filename = $path.'/'.$name.'.quick';
		if (file_exists($filename)) {
			$report = file_get_contents($filename);
			$this->data = CJSON::decode($report);
		}
		$this->asJson();
	}
	
	protected function listReports($shortName = false)
	{
		$result = array();
		$path = YiiBase::getPathOfAlias('application.config.users');
		foreach (new DirectoryIterator($path) as $fileInfo) {
			if (!$fileInfo->isDot()) {
				if ($fileInfo->isFile()) {
					if ($fileInfo->getExtension() == 'report') {
						$name = pathinfo($fileInfo->getFilename(), PATHINFO_FILENAME);
						$result[strtolower($name)] = iconv(mb_detect_encoding($name, mb_detect_order(), true), "UTF-8", $name);
					}
				} else if ($fileInfo->isDir()) {
					//  no subdirs yet
				}	
			}
		}	
		ksort($result);
		$data = array();	
		foreach ($result as $k) {
			$data[$shortName ? urlencode($k) : count($data)] = $k;
		}
		return $data;
	}
	
	/**
	 * list all the report in the system and returns an json
	 */
	public function actionListReports()
	{
		$this->data = $this->listReports();
		$this->asJson();
	}
	
	/**
	 * runs the query that's stored in the json definition
	 * 
	 * @param type $guid
	 * @returns the number of records selected
	 * 
	 */
	public function actionQuery($guid)
	{
		$s = file_get_contents("php://input");
		$data = CJSON::decode($s);
		
		$sel = new ResourceSpaceSelection();
		$sel->guid = $guid;
		$sel->json = CJSON::encode($data); //$example);
		try {
			if (!$sel->run()) {
				$this->addError('form', Yii::t('app', 'Could not select records'));			
			} else {
				if (Yii::app()->config->debug['isDevelop'] == 1) {
					$this->data = array(
						'sql' => $sel->selectSql,
						'params' => $sel->selectParams,	
						'count' => $sel->selectCount,	
					);
				}	
			}
		} catch (Exception $e) {
			$this->addError('form', Yii::t('app', $e->getMessage()));			
			$this->data = array(
				'sql' => $sel->selectSql,
				'params' => $sel->selectParams,	
				'count' => $sel->selectCount,	
			);			
		}	
		$this->asJson();
	}
	/**
	 * post a temp selection for this deviceGuid
	 * @param string $guid
	 */
	public function actionSelection($guid)
	{
		$layout = array(
			'id',
			'year',	
			'title'	
		);
		
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 0;
		}
		$sel = new ResourceSpaceSelection();
		$sel->guid = $guid;
		$result = $sel->search($page);
		
		$selJson = new SelectionJson();
		$this->data = $selJson->layout($result, $layout);
		$this->asJson();
	}
	
	public function actionResult($guid)
	{
		$sel = new ResourceSpaceSelection();
		$sel->guid = $guid;
		$this->data = $sel->search(-1, array('group'=> true));		
		$this->asJson();
	}
	
	
	public function actionReportXXX($guid, $layout = 'artPerDecennia')
	{
		$sel = new ResourceSpaceSelection();		
		$sel->guid = $guid;
		$params = array(
			'model'	=> $sel->search(-1, array('group'=> true))
		);
		
		echo $this->renderPartial($layout, $params, true, true);
		
		/*
		$reports = new Reports();
		if (($report = $reports->reports[$layout]) === false) {
			$this->addError('form', Yii::t('app', 'Report not found'));			
		}
		$report->guid = $guid;
		$report->type = 'html';  // does nothing
		$report->render();
		 * 
		 */
	}
	
	public function actionReportSQL($guid)
	{
		$sel = new ResourceSpaceSelection();		
		$sel->guid = $guid;
		$sql = $sel->reportSql();
		$this->data = array(
			'sql' => $sql	
		);
		$this->asJson();
	}

	public function actionSelectSQL($guid)
	{
		$sel = new ResourceSpaceSelection();		
		$sel->guid = $guid;
		$sel->run();
		$sql = $sel->selectSql;
		$this->data = array(
			'sql' => $sql	
		);
		$this->asJson();
	}
	
	
}
