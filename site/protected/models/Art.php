<?php


Yii::import('application.runtime.resourceSpace.ArtBase');

class Art extends ArtBase {
  /**
   * if looking direct for an special id
   * @var integer
   */
  public $searchId = null;
  
	
	private $_agent_id = null;	
	// the agents that are in the list
	private $_agent_ids = array();
	
	public $agents = array();
	
//	private $_trashbinName = null;
	
	private $_searchOrder = 'creation';

	protected $_downloadUrl = 'download/';
  /**
   * if it's a channel the id this channel belongs to
   *  
   * @var integer
   */
  private $_masterId = null;
  
  private $_channels = null;
	
	/**
	 * the information aboout the master file
	 * 
	 * @var FileInformation
	 */
	private $_masterFileInfo = null;
	/**
	 * the art related to this art
	 * @var array
	 */
	private $_relatedArt = null;
  
	private $_masterArtList = false;
	
	/**
	 * the text to quick search for
	 * @var array of words
	 */
	private $_quickSearch = false;
	
//	private $_collectionInfo = false;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}	
	
	public function rules() {
		return parent::rules() + 
			array(				
				array('title,agent,year', 'safe'),
				array('title', 'required'),
				array('file', 'file', 'allowEmpty'=>true, 'types'=>Yii::app()->config->allowFileExtensions),	
				array('selectFilename', 'safe'),	
        array('searchId,searchOrder', 'safe'), 
					
				array('agent_id', 'required', 'on' => 'create'),	
				array('title', 'required', 'on' => 'create)'),
			);		
	}
	public function behaviors() {

		return array(
				'selectable' => array(
					'class' => 'ResourceSpaceSelectableBehavior',
					'formulaFields'	=> array(
						'decennia' => '(substring({prefix}.value,2) div 10) * 10  as decennia'  // '({prefix}.value div 10) * 10'	
					),
					'calculatedNames' => array( // convert calculated name to fieldname
						'decennia' => 'year'	
					)	
				)				
		);				
	}
	
	
	public function afterConstruct() {
		$this->production_country = Yii::app()->config->defaultProductionCountry;
		parent::afterConstruct();
		$this->searchOrder = 'creation';
	}
	public function afterFind()
	{
		$this->collection = explode(',', $this->collection);
		$this->tags_gama = explode(',', $this->tags_gama);
 		$this->_agent_id = $this->agent_id;
		$this->agent_id = Util::explodeClean(',', $this->_agent_id);
		
    $this->_masterId = $this->master_id;
		if (count($this->agent_id) > 0) {
			$this->agents = array();
			foreach ($this->agent_id as $agentId) {
				$agent = Agent::model()->findByPk($agentId); 
				if (!empty($agent)) {
					$this->agents[$agent->id] = $agent->name;
				}
				// refresh the name any way
				// $this->agent = ($agent != null) ? $agent->name : null;
			}	
		}	
	}
	/**
	 * new version making: making a ProcessingJob
	 * 
	 */
	public function beforeSave()
	{
		if (is_array($this->agent_id)) {
			$this->_agent_ids = $this->agent_id;
			$this->agent_id = ltrim(implode(',', $this->agent_id));
		} else {
			$this->_agent_ids = array($this->agent_id);			
		}
		if ($this->_agent_id != $this->agent_id) {  // the on find loaded agent list
			// find all the names of the agents and make a , sep list in $this->agents
			$agents = '';
			foreach ($this->_agent_ids as $agentId) {
				$agent = Agent::model()->findByPk($agentId); // RS needs the name, because it's NOT an releation DB
				if ($agent) {
					$agents .= $agent->name.',';
				}
			}
			$this->agent = $agents;
			//$agent = Agent::model()->findByPk($this->agent_id); // RS needs the name, because it's NOT an releation DB
			//$this->agent = ($agent != null) ? $agent->name : null;
		}
    if ($this->_masterId != $this->master_id) {
      // we need to remove the relation with the 'old' art and connect to a new one
    }
    $s = $this->collection;
		if (is_array($this->collection)) { // if we save an art multiple time this changes
			$this->collection = ltrim(implode(',', $this->collection),',');
		}
		if (is_array($this->tags_gama)) {
			$this->tags_gama = ltrim(implode(',', $this->tags_gama),',');
		}
		return parent::beforeSave();
	}
	
	public function afterSave()
	{
		if ($this->_agent_id != $this->agent_id) {
			// relating the agent back to the artwork 
			foreach ($this->_agent_ids as $agentId) {			
				$rel = ResourceRelated::model()->find('resource=:art_id AND related=:agent_id', array(':art_id' => $this->id, ':agent_id' => $agentId));
				if ($rel) {
					$rel->delete();
				} else {
					$rel = ResourceRelated::model()->find('resource=:art_id AND related=:agent_id', array(':agent_id' => $this->id, ':art_id' => $agentId));
					if ($rel) {
						$rel->delete();
					}	
				}
				if ($this->agent_id) {
					$rel = new ResourceRelated();
					$rel->resource = $this->id;
					$rel->related = $agentId;
					$rel->save();	// if error that is not important
				}
			}
		}		
	}
	
	/**
	 * 
	 * generates all derive images
	 */
	public function updatePreview()
	{
		 // delete all files stored in the cache with the id of $this->id.'*.*';
		$fileHelper = new CFileHelper();
		$ff = $fileHelper->findFiles(Yii::app()->imageCache->imagePath('thumb'));
		$len = strlen($this->id);
		$info = new FileInformation();
		foreach ($ff as $f) {
			$info->path = $f;
			if (substr($info->filename, 0, $len) == $this->id){
				unlink($f);
			}	
		}	
		// let resource space do the work
		
		$s = Yii::app()->config->resourceSpaceApi.'api_import?id='.$this->id;
		if (Yii::app()->config->useCurl) {
			Yii::log('Resource Space update through curl('.$s.')', CLogger::LEVEL_WARNING, 'application.models.Art.updatePreview');			
			$run = Yii::app()->curl->run($s);
		} else {			
			Yii::log('Resource Space update through file_get_content('.$s.')', CLogger::LEVEL_WARNING, 'application.models.Art.updatePreview');			
			$run = file_get_contents($s);
		}	
		if ((is_object($run) && $run->hasErrors()) || (substr($run, 0, 33) != 'File added / updated for resource') ) {
			Yii::log('Resource Space update failed.', CLogger::LEVEL_WARNING, 'application.models.Art.updatePreview');			
			$this->addError('file', 'The resource space definition could not be updated.');
		} else {
			Yii::log('Resource Space updated.', CLogger::LEVEL_INFO, 'application.models.Art.updatePreview');			
		}
	}	
	
	/** 
	 * retrieve a (fake) preview of the art work
	 * the image is of large size
	 */
	public function getPreviewLarge()
	{
		$filename = 'img'.$this->id.'.jpg';
		$url = Yii::app()->imageCache->imageUrl($filename, 'wide');
		if (!$url) {  // image not found
			$stream = file_get_contents('http://lorempixel.com/400/400?x='.  rand(0,10000000));			
			file_put_contents(Yii::app()->imageCache->path.$filename, $stream);
			$url = Yii::app()->imageCache->imageUrl($filename, 'wide');
		}
		return $url;
	}
	/** 
	 * get the 4:3 preview max 30 height
	 */
	public function getThumbPreview() {
		$filename = 'img'.$this->id.'.jpg';
		$imagePath = $this->previewImagePath;
		$url = Yii::app()->imageCache->imageAddUrl($imagePath, $filename, 'icon');
		if (empty($url)) {
			$url = Yii::app()->baseUrl.'/images/none.icon.png';
		}
		/*
		if (!$url) {  // image not found
			$imagePath = $this->previewImagePath;
			if (file_exists($imagePath)) {
				$stream = file_get_contents('http://lorempixel.com/400/400?x='.  rand(0,10000000));			
				file_put_contents(Yii::app()->imageCache->path.$filename, $stream);
				$url = Yii::app()->imageCache->imageUrl($filename, 'wide');
							} else {
				$url = Yii::app()->getBasePath().'/image/no.preview.icon.png';
			}
		}
		 * 
		 */
		return $url;
		
	}
	
  public function getIsChannel()
  {
    return strtolower($this->type) == 'channel';
  }
  public function getIsMultiChannel()
  {
    return count($this->channels) > 0;
  }
  
	public function getIsSoundOptions()
	{
		return Yii::app()->config->YesNoUnknownOptions;
	}
	public function getIsLoopOptions()
	{
		return Yii::app()->config->YesNoUnknownOptions;
	}
	public function getIsSerieOptions()
	{
		return Yii::app()->config->YesNoUnknownOptions;
	}
	public function getIsVkaOptions()
	{
		return Yii::app()->config->YesNoUnknownOptions;
	}
	
	public function getDocumentCount() {
		return count($this->altFiles);
	}
	public function getChannelCount() {
		return count($this->channels);
	}
	public function getIsInstallationOptions()
	{
		return Yii::app()->config->YesNoOptions;
	}
	public function getisDigitizedOptions()
	{
		return Yii::app()->config->YesNoUnknownOptions;
	}

	public function getDefaultSearchOrder()
	{
		return $this->_defaultSearchOrder;
	}
	public function setDefaultSearchOrder($value)
	{
		
		switch ($value) {
			case 'title' : 
							$this->_defaultSearchOrder = 'title, year DESC';
							break;
			case 'agent' :						
							$this->_defaultSearchOrder = 'agent, title';
							break;
		  case 'year' :
							$this->_defaultSearchOrder = 'year DESC, title';
							break;
			case 'id' :
							$this->_defaultSearchOrder = 'id';
							break;
			case 'creation' :			
							$this->_defaultSearchOrder = 'creation_date DESC';
							break;
			case 'digitization_date' :
							$this->_defaultSearchOrder = 'digitization_date DESC';
							break;
			case 'recieved_date' :
							$this->_defaultSearchOrder = 'recieved_date DESC';
							break;
				
			default :			
						$this->_defaultSearchOrder = 'title, year DESC';
		}
	}
	public function getSearchOrder()
	{
		return $this->_searchOrder;
	}
	
	public function setSearchOrder($order)
	{
		$this->_searchOrder = $order;
		$this->defaultSearcHorder = $this->_searchOrder;
	}


	/**
	 * list all agents as a dropdown
   * 
   * @param $update if set to true the list is used for updating a field and
   *                is limited to the allowed users 
	 */
	public function getAgentOptions($update=false)
	{
		$result = array(null => '');
    if ($update) {
      $agentIds = Yii::app()->user->profile->agentIds;
    }
    if ($update && count($agentIds)) { // user has limited access to the agents
      foreach ($agentIds as $id) {
        $agent = Agent::model()->findByPk($id);
        if (!empty($agent)) {
          $result[$id] = $agent->name;
        }
      }
    } else {
      $agents = Agent::model()->findAll(array('order' => 'name')); //, 'condition' => 'name=:name and biography LIKE :test'));
      if ($agents) {
        foreach ($agents as $agent) {
          $result[$agent->id] = $agent->name;
        }
      } 
    }
		return $result;
	}

  /**
   * list all works that can be a master art (only installations, multichannel)
   */
  public function getMasterArtList()
  {
		if ($this->_masterArtList === false) {
			$m = Art::model()->findAll(array(
				 'condition' => 'type = :type',
				 'params' => array(
						 ':type' => ',Installation',
					), 
				 'order' => 'title' 
			));
			$this->_masterArtList = array('0' => '('.Yii::t('app', 'undefined').')') +
            CHtml::listData($m, 'id', 'title');
			$m = Art::model()->findAll(array(
				 'condition' => 'type = :type',
				 'params' => array(
						 ':type' => 'Installation',
					), 
				 'order' => 'title' 
			));
			$this->_masterArtList += CHtml::listData($m, 'id', 'title');
			
		}	
    $result = $this->_masterArtList;
            
    return $result;
  }
  /*
   * list the channels belonging to this master
   */
  public function getChannels()
  {
    if (! $this->_channels) {
      $this->_channels = Art::model()->findAll(array(
        'condition' => 'master_id = :masterId',
        'params' => array(':masterId' => $this->id),
        'order' => 'title' 
      ));
    }  
    return $this->_channels;
  }
	
	/**
	 * given a name of the file the id of the art is returned 
	 * false if there is no filename.
	 * 
	 * @param string $filename
	 */
	static public function filenameToId($filename)
	{
		$s = '';
		$l = 0;
		$name = pathinfo($filename, PATHINFO_BASENAME);
		while (is_numeric(substr($name, $l, 1)) && $l < strlen($name)) {
			$s .= substr($name, $l, 1);
			$l++;
		}	
		if ($s > 0) 
			return $s;
		return false;	
	}

	public function getRelatedArt()
	{
		if ($this->_relatedArt === null) {
			$related = ResourceRelated::model()->findAll(array(
				'condition' => 'resource=:id or related=:id',
				'params' => array(':id' => $this->id),
			));
			
			$this->_relatedArt = array();
			foreach ($related as $rel ) {
				$artId = $rel['resource'] == $this->id ? $rel['related'] : $rel['resource'];
				$art = Art::model()->findByPk($artId);
				if (!empty($art) && $art->storedResourceType == 'Art') {
					$this->_relatedArt[$rel->id] = $art;
				}				
			}			
			// now sort the on the key
		}
		return $this->_relatedArt;
	}
	
	/**
	 * return the file information of the master file
	 * 
	 * @return FileInformation
	 */
	protected function getMasterFileInfo()
	{
		if ($this->_masterFileInfo == null) {
			$extension = $this->fileExtension;
			$filename = $this->resourcePath . $this->filename(array('generateDirectories' => true, 'extension' => $extension));			
			$this->_masterFileInfo = new FileInformation($filename);
		}
		return $this->_masterFileInfo;
	}	

	protected function getMasterFileName()
	{
    $extension = $this->fileExtension;
    return $this->resourcePath . $this->filename(array('generateDirectories' => true, 'extension' => $extension));						
	}	
  
	public function getMasterFileExists()
	{
		return $this->masterFileInfo->exists();
	}
	public function getMasterFileSize()
	{
		if ($this->masterFileInfo->exists()) {
			return $this->masterFileInfo->sizeText;
		} else {
			return Yii::t('app', 'not found');
		}
	}

  
	public function calculateMd5() 
	{
		return $this->masterFileInfo->calcMd5();
	}
	
	public function getMasterFileSizeBytes()
	{
		return $this->masterFileInfo->size;
	}

	public function getMasterFileExtension()
	{
		if ($this->masterFileInfo->exists()) {
			return $this->masterFileInfo->extension;
		} else {
			return '';
		}	
	}
	
	public function beforeSearch($criteria) {
		if (isset($this->title)) {
			$criteria->compare('title_no', $this->title, true, 'OR');
			$a = $criteria->toArray();
		}
		parent::beforeSearch($criteria);
	}
	
	/**
	 * returns more information about the collection
	 * 
	 * @param string $collection the name of the collection
	 */
	public function collectionInfo($collection, $useHtml = true)
	{
		if ($collection != '') {
			$col = InfoText::model()->find(array(
				'condition'  => 'code=:key',
				'params' => array(
					':key' => $collection	
				)
			));
			if (!empty($col)) {
				return $col->html;
			} else {
				Yii::log('Unknown collection '.$collection, CLogger::LEVEL_WARNING);
			} 
		}
		return null; 
	}
	
	public function getDecennia()
	{
		$year = $this->year;
		$dec = floor($year / 10) * 10; // round($year / 10, 0, PHP_ROUND_HALF_DOWN) * 10;
		return $dec;
	}
	
	/** 
	 * returns the length of the video in seconds
	 */
	public function getSeconds()
	{
		$length = $this->length;
		if (empty($length)) {
			return 0;
		} else {
			$time = explode(':', $length);
			if (count($time) == 3) {
				return $time[2] + ($time[1] * 60) + ($time[0] * 60 * 60);
			} else {
				return -1; // error in format
			}
		}
	}

	/**
	 * rebuilds the ResourceRelation table
	 */
	public static function rebuildRelations() 
	{
		// remove the existing definitions
		$con = Yii::app()->db;
		$sql = 'DELETE FROM resource_related';
		$cmd = $con->createCommand($sql);
		$cmd->execute();
		$sql = 'SELECT r.ref as id, rd.value as agents FROM resource r INNER JOIN resource_data rd ON (r.ref = rd.resource AND rd.resource_type_field=151) WHERE r.resource_type=3';
		$cmd = $con->createCommand($sql);
		$rows = $cmd->queryAll();
		foreach ($rows as $row) {
			$agents = Util::explodeClean(',', $row['agents']);
			foreach ($agents as $agentId) {
				$rr = new ResourceRelated();
				$rr->resource = $row['id'];
				$rr->related = $agentId;
				try {
					$rr->save();
				} catch(Exception $e) {
					// just forget it. It duplicate
				}	
			}
		}
	}
	
	
	public function search() {
		if (!$this->_quickSearch) {
			return parent::search();
		} else {
			$refs = array();
			$params = array();
			$i = 0;
			foreach ($this->_quickSearch as $searchWord) {
				if (!empty($searchWord)) {
					$dataIds = array();
					$keywords = Keyword::model()->findAll('keyword LIKE :s', array(':s' => $searchWord.'%'));				
					foreach ($keywords as $keyword) {
						$dataIds[] = $keyword->ref;
					}
					$refs[] = $dataIds;
					$i++;
					$params[':keyword'.$i] = $searchWord.'%';
				}
			}
			// we now have an array of refs
			$sqlJoin = '';
			$sqlWhere = '';
			$i = 0;
			foreach ($refs  as $ref) {
				$i++;
				$sqlJoin .= ' INNER JOIN resource_keyword rk'.$i.' ON (r.ref=rk'.$i.'.resource) '.
										' INNER JOIN keyword k'.$i.' ON (rk'.$i.'.keyword = k'.$i.'.ref)';
				$sqlWhere .= ' AND k'.$i.'.keyword LIKE :keyword'.$i;
			}
			
			$sql = 'SELECT r.ref as id FROM resource r '.$sqlJoin.' WHERE '.substr($sqlWhere, 5);
			
			return new RSSqlDataProvider('Art', $sql, array(
				'params' =>	$params,
				'pagination'=> array('pageSize'=>2000)					
			));
			
/*			
			return new CSqlDataProvider($sql, array(
				'params' =>	$params
			));
			
			$criteria = new RSCriteria;
			foreach ($this->_quickSearch as $searchWord) {
				$criteria->compare('title', $searchWord, true);
			}
			$this->beforeSearch($criteria);
			if ($this->_defaultSearchOrder != null) {
				return new RSDataProvider($this, array(
					'criteria' => $criteria,
					'order'=>$this->_defaultSearchOrder,
					'pagination'=> array('pageSize'=>200)
				));
			 } else {
				return new RSDataProvider($this, array(
					'criteria' => $criteria,
					'pagination'=> array('pageSize'=>200)
				));
			}			
 */
		}
	}
	
	/**
	 * list the files that where digitized in rev order
	 */
	public function searchLastDigitized() 
	{
		$sql = 'SELECT d.resource as id FROM resource_data d WHERE d.`resource_type_field` = 132 and not isnull(d.value) ORDER BY str_to_date(d.value, "%d-%m-%Y" ) DESC';
		
		return new RSSqlDataProvider('Art', $sql, array(
				'pagination'=> array('pageSize'=>500)					
			));
	}	
	
	/**
	 * retuns a search definition that looks in the predefined fields if something found
	 * 
	 * 
	 * @param string $values an space seperated string to look for
	 */
	public function setQuickSearch($values)
	{
		$this->_quickSearch = explode(' ', $values);
	}
	
	/**
	 * returns the url to the 4:3 url with the widht of 263 (max of 1/4 column)
	 */
	public function getTvRatioUrl() 
	{
		$filename = 'img'.$this->id.'.jpg';
		$imagePath = $this->previewImagePath;
		
		$url = Yii::app()->imageCache->imageAddUrl($imagePath, $filename, 'tv');
		return $url;
	}
	
  public function getArtistNames($separator=', ') {
    $result = '';
    foreach ($this->agents as $agent) {
      $result .= ', '.$agent;
    }
    return substr($result,2);
  }
	
	
}
