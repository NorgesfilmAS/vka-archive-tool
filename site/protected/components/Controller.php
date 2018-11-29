<?php


class Controller extends BaseController
{
	
	public function findPackage($name) {
		switch ($name) {
		  case 'jplayer' :			
			  return array(
					'basePath' => 'application.packages.jplayer',
					'css' => array(
								'css/pink.flag/jplayer.pink.flag.css',
								'css/circle.skin/circle.player.css'
					),
					'js' => array(
						CClientScript::POS_END => array(
								'js/jquery.jplayer.min.js', 
								'js/jquery.jplayer.inspector.js',
								'js/jquery.transform2d.js',
								'js/jquery.grab.js',
								'js/jquery.jplayer.inspector.js',
								'js/mod.csstransforms.min.js',
								'js/circle.player.js',
						),
					),
				);					 		
		  case 'fancybox' :
			  return array(
					'basePath' => 'application.packages.fancybox',
					'css' => array('source/jquery.fancybox.css'),
					'js' => array(
						CClientScript::POS_END => array(
								'source/jquery.fancybox.pack.js', 
								'extends.js'
						),	
					)
				);
			default :	
				return parent::findPackage($name);
		}		
	}
	
	public function getVersion()
	{
		return '1.'.parent::getVersion();
	}
	/**
	 * must overload because have to create a RSRecordModel!
	 * 
	 * @param integer $key
	 * @param string $modelClass
	 * @return RSRecordModel
	 */
	public function loadModel($key, $modelClass) {
		return $modelClass::model()->findByPk($key);
	}
	

	
	/**
	 * patch the form so the rights are set according to the user righgs
	 * 
	 * @param array $form
	 * @return form
	 */
	public function parseForm($form)
	{
    $showEditButton = false;
		$form = parent::parseForm($form);
    $model = false;
		// check for the state of the fields
		if (isset($form['model'])) {
			$modelClass = $form['model'];
			$model = new $modelClass();
			if ($model instanceof RSRecordModel) {
				foreach ($form['elements'] as $key => $element) {
					if (isset($element['elements'])) { // it's a grouped field
						foreach ($element['elements'] as $key2 => $subElement) {
							$fieldId = $model->nameToId($key2);
							if ($fieldId) { // it's an Resource Space
								$state = Yii::app()->user->fieldState($fieldId);
								switch ($state) { 
									case Usergroup::RIGHT_NONE : ;
										$form['elements'][$key]['elements'][$key2]['hidden'] = true;							
										break;
									case Usergroup::RIGHT_READ : 
										$form['elements'][$key]['elements'][$key2]['readOnly'] = true;
										break;
								}		
							}					
						}	
					} else {
						$fieldId = $model->nameToId($key);
						if ($fieldId) { // it's an Resource Space
							$state = Yii::app()->user->fieldState($fieldId);
							if ($state == Usergroup::RIGHT_NONE) {
								$form['elements'][$key]['hidden'] = true;							
							} elseif ($state == Usergroup::RIGHT_READ) { 
								$form['elements'][$key]['readOnly'] = true;
							}	else {
                $showEditButton = true;
              }
						}					
					}
				}
			}
		}	
    // make sure there are not unwanted edit buttons flying arround, because no fields are editable
    if (($model instanceof RSRecordModel) && $showEditButton == false && isset($form['buttons']) && isset($form['buttons']['view']) && 
      isset($form['buttons']['view']['edit'])) {
      unset($form['buttons']['view']['edit']);
    }
		return $form;	
	}
  /**
   * Checks if the user has the rigths to a page view. If not raises an error
   * 
   * @return boolean
   * @throws CHttpException
   */
  protected function checkAccessRights() {
		$route = $this->route;
		$p = strpos($route, '/');
    
		if ($p) { // pages that have a - in the name are dialog pages of the main page
			if ($p == 'help') return true;
		}	
		if (Yii::app()->user->hasMenu($route)) {      
			return true;
		} 
    try {
      $s = 'Access denied: '.$route.' not in: '.CJSON::encode(Yii::app()->user->profile->group->rights['menus']);
      Yii::log($s, CLogger::LEVEL_INFO, 'toxus.rights.info');    
    } catch (Exception $e) {}
		throw new CHttpException(403,'Access denied');    
  }
}
