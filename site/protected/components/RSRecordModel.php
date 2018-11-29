<?php
/**
 * the base class to access the Resource Space Records as an Yii active record
 * 
 * implemented are:
 *   - save()
 *   - findByPk() 
 *   - findAll()   (limted to AND conditions)
 * 
 * properties
 *   - isNewRecord
 * 
 * event
 *	 afterConstruct
 *   beforeSave
 *   afterSave
 *	 beforeFind
 *   afterFind
 * 
 * version 2.0
 *  uses processing queue to handle changes
 * 
 *  isProcessing: true if resource is queue in the processing queue
 * 
 */

class RSRecordModel extends CModel
{
	const MIN_KEYWORD_LENGTH = 3;
	const LOG_CREATE = 'c';
	const LOG_SAVE ='e';
	const LOG_UPLOAD = 'u';
	const LOG_UPLOAD_ALT = 'U';
	
	protected $_seperators = array('/','_','.',';','-','(',')','\'','\'','\\', '?','"',"\n","\r","\t",',',':','!','@','#');
	
	/**
	 * overload this definition with the id => name defintion in ResourceSpace
	 * Is Fixed by generator
	 * 
	 * @var array
	 */
	
	protected $_fieldDefs;

	/**
	 * overloaded version which holds the meta data of the field
	 * key = fieldname
	 * Is Fixed by generator
	 * 
	 * @var array of array
	 */
	protected $_fieldInfo;
	
	/**
	 * defines the type (art, agent) of the resource. Is Fixed by generator
	 * @var integer
	 */
	protected $_typeId=null;

	/**
	 * the list of fields that have to be put into the Keyword, ResourceKeywords
	 * table.
	 * array of [fieldname] = true;
	 * Keywords are use by ResourceSpace to search for items
	 * 
	 * @var array
	 */
	protected $_keywordFields = array();
	
	
	/**
	 * The name of the model in the Resource Space database
	 *  
	 * @var string 
	 */
	protected $_modelName = null;		
	/**
	 *
	 * @var ResourceSpace
	 */
	protected $_rs=null;
	/**
	 * the id of the resource
	 * @var integer
	 */
	protected $_pk;

	/**
	 * the alternate files excluding the system files
	 * 
	 * @var array of ResourceAltFiles
	 */
	protected $_altFiles = false;
	
	/**
	 * the system files
	 * 
	 * @var array of ResourceAltFiles
	 */
	private $_altSystemFiles = false;
	/**
	 * defines if the record is new
	 */
	protected $_new = false;
	
	private $_c = null;
	
	/**
	 * the base Resource connected to this model
	 * 
	 * @var Resource
	 */
	private $_resource = null;
	/**
	 * path to the resource and key generation
	 * @var string
	 */
	private $_scramble = null;
	private $_scrablePath;
	/**
	 * if _downloadPath is set, this url is prepended to the path.
	 * This could be the controller. The path should include the training /
	 * 
	 * @var string
	 */
	protected $_downloadUrl = null;
	/**
	 * the number of items per page for the grid.
	 * used in the function search()
	 * Should not be here, but no other place found to set it.
	 */
	public $pageSize=10;
	/**
	 * all names of the attributes used in the resource space definition
	 * 
	 * @var array
	 */
	protected $_attributeNames = null;		// array of names [] = 'country'
	protected $_attributeIds = null;      // array of [4] = 'country'
	protected $_attributeKeys = null;			// array of 'country' => 4
	/**
	 * the data stored by the application. This is the updatable information, which
	 * is checked against the _originalValues to decide what has to be saved
	 * 
	 * @var array
	 */
	protected $_data = array();
	/**
	 * the value of the fields on disk. We use this info to check if something
	 * has changed, so we can update or delete the information.
	 * if it's an new record, this information will be an empty array (what do we do with default values ???)
	 * 
	 * @var array
	 */
	protected $_originalValues = null;		
	
	/**
	 * The job holding the processing.
	 *   if false it is not initialized
	 *   if null there is no job
	 *   if Cactive there is a job waiting
	 * 
	 * @var CActiveRecord or Null or False
	 */
	private $_processingJob = false;
	
	/**
	 * the changes to this record
	 * 
	 * @var CActiveRecordModel
	 */
	private $_moderations = null;
	
	/**
	 * the current undo transaction
	 * can be reached through $this->moderation;
	 * @var Moderation
	 */
	private $_undoTrans = null;
	
	/**
	 * The information about this fysical resource File
	 * @var FileInfo
	 */
	protected $_fileCheck = false;
	
	/**
	 * the filename in the upload directory
	 * 
	 * @var string
	 */
	public $selectFilename = null;
	/**
	 *
	 * @var fysical uploaded file
	 */
	public $file = null;
	
	public static function model($class=__CLASS__)
	{
		return new $class;
	}
	
	public function __construct() {
		
		$this->attributeNames();
		$this->init();
		$this->attachBehaviors($this->behaviors());
//		$this->afterConstruct();		
	}
	public function attributeNames() {
		if ($this->_attributeNames === null) {
			$this->_attributeNames = array();
			$this->_attributeIds = array();
			$this->_attributeKeys = array();
			foreach ($this->_fieldDefs as $key => $field) {
				$this->_attributeNames[] = $field;
				$this->_attributeIds[$key] = $field;
				$this->_attributeKeys[$field] = $key;
			}			
		}	
		return $this->_attributeNames;
	}
	
	public function init()
	{
		Yii::import('application.extensions.PHPSqlParser.*');
		$this->setIsNewRecord(true);
		$this->afterConstruct();
		$this->afterFind();
	}
	
	public function attributeOptions($name, $options=array())
	{
		if (isset($options['nullValue'])) {
			$result = array_combine($this->_fieldInfo[$name]['options'], $this->_fieldInfo[$name]['options']);
			reset($result);
			$result[key($result)] = $options['nullValue'];
		} else {
			$result = array_combine($this->_fieldInfo[$name]['options'], $this->_fieldInfo[$name]['options']);
		}	
		if (isset($options['sorted']) && $options['sorted'] && is_array($result)) {
			asort($result);
		}
		return $result;
	}
					
	/**
	 * given a field name the id is return. If not found null is returned
	 * 
	 * @param string $name
	 * @return integer or null
	 */
	public function nameToId($name)
	{
		
		return isset($this->_attributeKeys[$name]) ? $this->_attributeKeys[$name] : null;
	}
	/**
	 * convert the field_id into an field name
	 * if not found an empty string is returned
	 * 
	 * @param integer $id
	 * @return string
	 */
	public function idToName($id)
	{	
		return isset($this->_attributeIds[$id]) ? $this->_attributeIds[$id] : '';
	}	
	
	
	public function getAttributeLabel($attribute)
	{
		
		if (in_array( $attribute, $this->_attributeNames, true)) {
			$label = parent::getAttributeLabel($attribute);
			return Yii::t('app', $label);
		} 
		return $attribute;
	}
	
	public function __set($name, $value) {		
		if (isset($this->_attributeKeys[$name])) {			
			if (!is_array($value)) {
				$this->_data[$name] = trim($value);
			} else {
				$this->_data[$name] = $value;
			}	
		} else {
			parent::__set($name, $value);
		}	
	}
	public function __get($name)
	{
		if ($name == 'id') return $this->_pk ? $this->_pk : null;
		if ($this->nameToId($name) > 0) {
			if (isset($this->_data[$name])) {
				return $this->_data[$name];
			}
			return null;
		}
		return parent::__get($name);
	}
	public function __isset($name)
	{
		if ($this->nameToId($name) > 0) {
			return true;
		} elseif ($name == 'id') {
			return true;
		} else {	
			return parent::__isset($name);
		}
	}
	
	/**
	 * moves the data from the multi-record definition of ResourceSpace into
	 * an array style Yii definition. The data is marked as _original so we can 'remember'
	 * what data is already stored.
	 * 
	 * @param integer $id
	 * @return RSRecordModel
	 */
	public function findByPk($id)
	{
		$this->beforeFind();
		$this->_pk = $id;
		$this->_data = array();
		$this->attributeNames();
		$models = ResourceData::model()->findAll('resource=:id', array(':id' => $id));
		if ($models == null) return null;
		foreach ($models as $model) {
			$name = trim($this->idToName($model->resource_type_field));
			if ($name != '' && $model->value != ',')
				$this->$name = substr($model->value,0,1) != ',' ? $model->value : substr($model->value,1);
		}	
		$this->setIsNewRecord(false);
		$this->afterFind();
		return $this;
	}
	/**
	 * Finds all records who have the $conditon. If $condition is an array:
	 *   'condition' = the condition
	 *   'order' = the order
	 * 
	 * @param array or string $condition
	 * @param array $params
	 */
	public function findAll($condition, $params=array())
	{
		$this->beforeFind();
		if (!is_array($condition)) $condition = array('condition' => $condition);
		if (!isset($condition['condition'])) $condition['condition'] = '(1=1)';
		if (isset($condition['params'])) $params = $condition['params'];
		$parser = new SqlParser();
		$sql = 'SELECT * FROM resource_data WHERE '.$condition['condition'].(isset($condition['order']) ? (' ORDER BY '.$condition['order']) : '');
		$p = $parser->parse($sql);
	//	echo print_r($p);
		$fieldnameToPrefix = array();
		$l = 0;  
		$where = is_array($p['WHERE']) ? $p['WHERE'] : array();
		$prefix = 'a';
		$sqlFields = 'SELECT DISTINCT a.resource as id ';
    $sqlFrom = ' FROM resource_data '.$prefix.' ';
		$sqlWhere = '';
		try {
			if (count($where) > 0) {
				while ($l < count($where)) {			
					// DEBUG split the where stament in to compare statement			
					//$a = $where[$l]['expr_type'];
					//$c = count($where);
					//$a1 = $where[$l+1]['expr_type'];
					//$a2 = $where[$l+2]['expr_type'];

					if ($where[$l]['expr_type'] == 'colref' && $l < count($where) - 2 &&
							$where[$l+1]['expr_type'] == 'operator' && $where[$l+2]['expr_type'] == 'colref') { // colname compare :param					
						if ($l == 0) {
							$sqlWhere = $prefix.'.resource_type_field = '.$this->nameToId($where[$l]['base_expr']);
							$fieldnameToPrefix[$where[$l]['base_expr']] = $prefix;	// remember for ordering
						} else {
							$prefix = chr(ord($prefix) + 1);
							$sqlFrom .= ' INNER JOIN resource_data '.$prefix.' ON (a.resource = '.$prefix.'.resource AND '.$prefix.'.resource_type_field='.$this->nameToId($where[$l]['base_expr']).')';
							$fieldnameToPrefix[$where[$l]['base_expr']] = $prefix;	// remember for ordering
						}
						// now combine the compare field to the where instruction
						$sqlWhere .= ' AND ('.$prefix.'.value '.$where[$l+1]['base_expr'].' '.$where[$l+2]['base_expr'].')';
						$l = $l + 3;
					} elseif ($where[$l]['expr_type'] == 'operator' && $where[$l+1]['expr_type'] == 'colref' && $where[$l+2]['expr_type'] == 'operator' && $where[$l+3]['expr_type'] == 'const' ) {	
						// parsed: not fieldname is null
						if ($l == 0) {
							$sqlWhere = $prefix.'.resource_type_field = '.$this->nameToId($where[$l + 1]['base_expr']);
							$fieldnameToPrefix[$where[$l + 1]['base_expr']] = $prefix;	// remember for ordering
						} else {
							$prefix = chr(ord($prefix) + 1);
							$sqlFrom .= ' INNER JOIN resource_data '.$prefix.' ON (a.resource = '.$prefix.'.resource AND '.$prefix.'.resource_type_field='.$this->nameToId($where[$l + 1]['base_expr']).')';
							$fieldnameToPrefix[$where[$l + 1]['base_expr']] = $prefix;	// remember for ordering
						}
						// now combine the compare field to the where instruction
						$sqlWhere .= ' AND ('.$where[$l]['base_expr'].' '.$prefix.'.value '.' '.$where[$l+2]['base_expr'].' '.$where[$l+3]['base_expr'].')';
						$l = $l + 4;

					} else {
						if ($l + 1 >= count($where) || $where[$l+1]['expr_type'] == 'operator') {
							$l++;
						} else {	
						 throw new CDbException('SQL to complex (expecting AND statement)');
						}		 
					}				
				}
			} else {
				/** we have an problem: there is no where clause so we don't know if the
				 * record is of the proper type.
				 * we need to create an where to select atleast one of our fields
				 */
				$s = '';
				foreach ($this->_fieldDefs as $id => $name) {
					$s .= ', '.$id;
				}
				$sqlWhere = 'FIELD(a.resource_type_field'.$s.') > 0';
			}	

			/**
			 * check if there is an order statement
			 */
			$order = '';
			if (isset($p['ORDER'])) {
				foreach ($p['ORDER'] as $step) {
					// untested: 2013.12.04
					if ($step['base_expr'] == 'creation_date') { // special case because it's in the resource table
						$order .= 'ba.creation_date '.$step['direction'];
            $sqlFields .= ', ba.creation_date ';
					} else {
						// handleing ordering with functions
						if ($step['expr_type'] == 'function') {

							$order .= ', '.$step['base_expr'].'(';
              $sqlFields .= ', '.$step['base_expr'];
							$i = 0;
							foreach ($step['sub_tree'] as $subfield) {
								if ($subfield['expr_type'] == 'colref') {
									if (! isset($fieldnameToPrefix[$subfield['base_expr']])) { // column not used in where construction
										$prefix = chr(ord($prefix) + 1);				
										$sqlFrom .= ' INNER JOIN resource_data '.$prefix.' ON (a.resource = '.$prefix.'.resource AND '.$prefix.'.resource_type_field='.$this->nameToId($subfield['base_expr']).')';
										$fieldnameToPrefix[$subfield['base_expr']] = $prefix;						
									}									
									$order .= $fieldnameToPrefix[$subfield['base_expr']].'.value ';
                  $sqlFields .= ', '.$fieldnameToPrefix[$subfield['base_expr']].'.value ';
								} elseif ($subfield['expr_type'] == 'const') {
									$order .= $subfield['base_expr'];
                  $sqlFields .= $subField['base_expr'];
								} else {
									throw new CException('unknown type in order: '. $subfield['expr_type']);
								}
								$i ++;
								if ($i < count($step['sub_tree'])) {
									$order .= ',';
								}								
							}
							$order .= ') '.$step['direction'];				
						} else {
						// end untested	
							if (! isset($fieldnameToPrefix[$step['base_expr']])) { // column not used in where construction
								$prefix = chr(ord($prefix) + 1);				
								$sqlFrom .= ' INNER JOIN resource_data '.$prefix.' ON (a.resource = '.$prefix.'.resource AND '.$prefix.'.resource_type_field='.$this->nameToId($step['base_expr']).')';
								$fieldnameToPrefix[$step['base_expr']] = $prefix;						
							}
							$order .= ', '.$fieldnameToPrefix[$step['base_expr']].'.value '.$step['direction'];	
              $sqlFields .= ', '.$fieldnameToPrefix[$step['base_expr']].'.value ';
						}						
					}	
				} 
				$order = ' ORDER BY '.substr($order,2);
			}
			$sql = $sqlFields . $sqlFrom. (strlen($sqlWhere) > 0 ? (' WHERE '.$sqlWhere) : '').$order.(isset($condition['limit']) ? (' LIMIT '.$condition['limit']) : '');		

			$cmd = Yii::app()->db->createCommand($sql);
			foreach ($params as $key => $param) {
				$cmd->bindValue($key, $param);
			}
			$list= $cmd->queryAll();
			/*
			 * we now have a list of id's: convert this to records
			 */
			$result = array();
			$model = $this->_modelName;
			foreach ($list as $rec) {			
				$result[] = $model::model()->findByPk($rec['id']);
			}
			// echo $sql;
			// Yii::app()->end();
			return $result;
		} catch (Exception $e) {
			throw new CException('RSRecordModel. Error in SQL statement: Where: '.  json_encode($where).', $sql: '.$sql. ', err:'.$e->getMessage(). ', line: '.$e->getLine());
		}	
	}
	
	public function beforeFind()
	{
	}
	public function afterFind()
	{
	}
	
	
	public function save($runValidation=true, $attributes=null)
	{
    if(!$runValidation || $this->validate($attributes))
			return $this->getIsNewRecord() ? $this->insert() : $this->update();
    else
			return false;
	}

	public function getMetaData()
	{
		if ($this->_rs === null) {
			$this->_rs = new ResourceSpace;
		}
		return $this->_rs;
	}
	
	public function getModelName()
	{
		if ($this->_modelName === null) {
			$this->_modelName = strtolower(get_class($this));
		}
		return $this->_modelName;
	}
	
	public function getIsNewRecord()
	{
		return $this->_new;
	}
	private function setIsNewRecord($value)
	{
		$this->_new = $value;
	}
	
	/**
	 * 
	 * list all fields to save in an array like:
	 *    $['fieldname'] = 'value';
	 * empty fields are skipped
	 */
	protected function fieldsToSqlSet()
	{
		$fields = array();
		foreach ($this->_data as $name => $value) {
			if ($value !== null) {
				$fields[$name] = $value;
			}
		}
		return $fields;
	}
	
	public function beforeSave()	
	{
// check to queue the job
		$processingJob = null;
		if ($this->selectFilename !== null ) { 
			$processingJob = new ProcessingJob();
			$processingJob->filename = Yii::app()->config->fixedValues['upload_path']. $this->selectFilename;
			$ext = strtolower(pathinfo($this->selectFilename, PATHINFO_EXTENSION));
		} elseif ($this->file !== null) {
			$processingJob = new ProcessingJob();
//			$name = YiiBase::getPathOfAlias('application.runtime.temp');
//			if (!is_dir($name)) {
//				mkdir($name);
//			}
			$name = Yii::app()->config->fixedValues['temp_storage_path'];
			$name .= substr($name, -1) == '/' ? '' : '/';
			$l = 1;			
			$filename = $name.'temp.rs_import';
			while (file_exists($filename)) {
				$filename = $name.'temp.'.$l.'.rs_import';
				$l++;
			}
			Yii::log('Moving '.$this->file->tempName.' to '.$filename, CLogger::LEVEL_INFO,'rs.recordmodel.save');
			// generate the md5 before moving the file
			$this->fileCheck->change($this->file->tempName, 'New upload, file moved to temp directory', 'rsRecordModel.beforeSave', false);
			@rename($this->file->tempName, $filename);
			$processingJob->filename = $filename;
			$ext = $this->file->extensionName;
		}
		if ($processingJob) {
			if ($this->hasResource) {	// only move it if it exist
				$processingJob->original_filename = $this->resourcePath.$this->filename();
			}	
			$processingJob->new_filename = $this->resourcePath . $this->filename(array(
											'generateDirectories' => true, 
											'extension' => $ext));
			$processingJob->resource_id = $this->id;
			$processingJob->job_type_id = ProcessingJob::JOB_RESOURCE_SPACE;
			$processingJob->save();			
		}
		// end of processing
		
		return true;
	}
	public function afterSave()
	{
	}
	
	/**
	 * Split the sentence into sperate words.
	 * 
	 * @param string $text the text to split
	 * @return array of words (nummeric indexed)
	 */
	protected function splitToKeywords($text,$isDate = false)
	{
		$result = array();
		if ($isDate) {
			$words = explode(Yii::app()->config->dateSeperator, $text);
			if (count($words) >= 3) {
				$result = array($words[0], $words[0].Yii::app()->config->dateSeperator.$words[1],$text);
		  } else {
				$result = $words;
			}
		} else {		
			/*
			 * if the text starts with a , it is a keyword list (STRANGE..... AND STUPID)
			 */
			$text = trim(mb_strtolower(Util::trimSpaces(str_replace($this->_seperators, ' ', $text)), 'UTF-8'), ',');
			$result = explode(' ', $text);
		}
		return $result;
	}
	
	/**
	 * 
	 * @param integer $id the current resource->id
	 * @param integer $fieldId the id of the field to store
	 * @param string $newValue the value of the field to store
	 * @param string $oldValue the values originally stored.
	 */
	protected function updateKeywordStore($id, $fieldId, $newValue, $isDate = false)
	{
		$newWords = $this->splitToKeywords($newValue, $isDate);
		// field type 2 (checkbox) and 3 (combobox) add the entire text to the keywords (if it does not exist)
		$attributeName = $this->_fieldDefs[$fieldId];
		if (($this->_fieldInfo[$attributeName]['typeId'] == 2) || (($this->_fieldInfo[$attributeName]['typeId'] == 3))) {
			if (!in_array(trim($newValue, ','), $newWords)) {
				$newWords[] = mb_strtolower(trim($newValue, ','), 'UTF-8');
			}
		}
		// end of v1.01
		$criteria = new CDbCriteria();
		$criteria->addCondition('resource = '.$id.' AND resource_type_field = '.$fieldId);
		$resourceKeyword = ResourceKeyword::model()->findAll($criteria);
		/* words is a list on keyword.id of assigned words */
		$words = array(); 
		foreach ($resourceKeyword as $rk) {
			$s = $rk->keyword;
			$words[$rk->keyword] = true;
		}
		/**
		 * the list of words not used
		 */
		$wordsNotUsed = $words;
		$pos = 0;
		foreach ($newWords as $newWord) {
			if (strlen($newWord) >= self::MIN_KEYWORD_LENGTH) {
				$keyword = Keyword::model()->find('keyword = :keyword', array(':keyword' => $newWord));
				if ($keyword == null) {
					$keyword = new Keyword();
					$keyword->keyword = $newWord;
					if (! $keyword->save())
						throw new CDbException('The keyword can not be saved');
				} else {
					/* the word does exists. Is it assigned? */
					if (array_key_exists($keyword->ref, $words)) {
						unset($wordsNotUsed[$keyword->ref]); // mark it found
						$keyword = null;	// mark keyword done
					} 
				}	
				if ($keyword) {
					$resourceKeyword = new ResourceKeyword();
					$resourceKeyword->resource = $id;
					$resourceKeyword->keyword = $keyword->ref;
					$resourceKeyword->resource_type_field = $fieldId;
					$resourceKeyword->position = $pos;
					if (! $resourceKeyword->save() ) 
						throw new CDbException('The Resource Keyword can not be saved');											
				}
				$pos += 1;
			}	
		}		
		foreach ($wordsNotUsed as $keyword => $word) {
			$resourceKeyword = ResourceKeyword::model()->find(
							'resource = :resourse_id AND resource_type_field = :field_id AND keyword = :keyword', 
							array(':resourse_id' => $id, ':field_id' => $fieldId, ':keyword' => $keyword));
			if ($resourceKeyword) {
				$resourceKeyword->delete();
			}
		}		
	}
	
	/**
	 * Log the changes to the ResourceLog.
	 * 
	 * @param integer $fieldId the field to be changed
	 * @param string $typeId the type of change
	 * @param string $newValue the new value of the field
	 * @param string $orgValue the original value
	 */
	public function logChange($fieldId, $typeId, $newValue = '', $orgValue = '', $notes=null, $userId=null)
	{
		$log = new ResourceLog();
		$log->resource = $this->id;
		$log->resource_type_field = $fieldId;
		$log->type = $typeId;
		$log->notes = $notes;
		$log->user = $userId;
		if ($newValue !== $orgValue) {
			$log->diff = Yii::app()->diff->compare($orgValue, $newValue);
		}
		if (!$log->save()) {
			Yii::log('The log information could not be saved', CLogger::LEVEL_ERROR, 'application.components.RSRecordModel');
		}
	}


	/**
	 * Does the fysicla store of the information updating the Resource and
	 * Keyword, ResourceKeyword information
	 * 
	 * @param type $resource a Resource model
	 */
	protected function storeData($resource)
	{
		$id = $resource->id;		
		$indexFields = $resource->attributes;
		$saveResource = false;
		$this->_undoTrans = new Moderation();
		$this->_undoTrans->begin($id);
		
		// find all fields which changed (modified or deleted)
		foreach ($this->_data as $fieldname => $value) {
			// security on field level		
			$fieldId = $this->nameToId($fieldname);
			if ($fieldId) { // it's an Resource Space
				$state = Yii::app()->user->fieldState($fieldId);
				if ($state != Usergroup::RIGHT_UPDATE) {
					continue;
				}
			}
			
			$value = trim($value);				
			$value = $this->hasDataComma($fieldname) ? (','.$value) : $value;
			if (isset($this->originalValues[$fieldname])) {	// was set before
				$orgVal = $this->originalValues[$fieldname];
				if ($orgVal['value'] != $value) { // changed
					$rd = ResourceData::model()->findByPk($orgVal['id']);							
					if ($rd == null) {
						throw new CDbException('Could not find ResourceData['.$orgVal['id'].'] but should have.');
					}							
					if ($value == '' || $value == null) {	// it's empty now, so delete it
						if (!$rd->delete()) {
							throw new CDbException('Could not delete ResourceData['.$orgVal['id'].'] but should have.');
						}
					} else {
						$rd->value = $value;
						if (!$rd->save()) {
							throw new CDbException('Could not delete ResourceData['.$orgVal['id'].'] but should have.');
						}
					}
					$resourceFieldname = 'field'.$rd->resource_type_field;							
					if (array_key_exists($resourceFieldname, $indexFields)) {
						// the field is used by some internal index
						$resource->$resourceFieldname = $value;
						$saveResource = true;
					}
					
					if (array_key_exists($fieldname, $this->_keywordFields)) {
						$this->updateKeywordStore($this->id, $rd->resource_type_field, $value);
					}
					$this->logChange($this->nameToId($fieldname), RSRecordModel::LOG_SAVE, $value, $orgVal['value']);										
					$this->_undoTrans->change($this->nameToId($fieldname), $orgVal['value'], $value);
				}
			} else { // is a new field to add
				if (!($value == '' || $value == null)) {	// it's empty now, so delete it
					$rd = new ResourceData();
					$rd->resource = $id;
					$rd->resource_type_field = $this->nameToId($fieldname);
					$rd->value = $value;					
					if (! $rd->save())  throw new CDbException(Yii::t('app', 'The field {fieldname} could not be saved.', array('{fieldname}' => $fieldname)));
					
					$resourceFieldname = 'field'.$rd->resource_type_field;							
					if (array_key_exists($resourceFieldname, $indexFields)) {
						// the field is used by some internal index
						$resource->$resourceFieldname = $value;
						$saveResource = true;
					}
					if (array_key_exists($fieldname, $this->_keywordFields)) {
						$this->updateKeywordStore($this->id, $rd->resource_type_field, $value);
					}
					$this->logChange($this->nameToId($fieldname), RSRecordModel::LOG_SAVE, $value);					
					$this->_undoTrans->change($this->nameToId($fieldname), '', $value);					
				}	
			}
		}
		/**
		 * check if we did modify something of the internal index
		 */
		if ($saveResource) {
			if (!$resource->save()) {
				throw new CDbException(Yii::t('app','The Resource could not be saved.'));
			}
		}	
		$this->_undoTrans->commit();
	}
					
	
	public function insert()
	{
    if (!$this->getIsNewRecord())
        throw new CDbException(Yii::t('app','The resource space record cannot be inserted to database because it is not new.'));
    if ($this->beforeSave())    {
      Yii::trace(get_class($this).'.insert()','application.compontents.RSRecordModel');
		//	$fields = $this->fieldsToSqlSet();
			
			$transaction = Yii::app()->db->beginTransaction();
			/**
			 * we need a resource to save the field information. Generate an empty resource
			 */
			$resource = new Resource();
			$resource->resource_type = $this->typeId;
			$resource->has_image = 0;
			$resource->save();
			$this->_pk = $resource->id;			
			$this->logChange(null, RSRecordModel::LOG_CREATE);			
			try {
				$this->storeData($resource);
				$transaction->commit();
			} catch (Exception $e) {	
				$transaction->rollback();
				throw new CDbException($e->getMessage());
			}
			

			$this->afterSave();
			$this->setIsNewRecord(false);
			$this->setScenario('update');
			return true;
    }
    return false;		
	}
	

	/**
	 * returns the values stored on disk, index by the name of the field
	 * every element has an id and value key
	 * 
	 * @return array[fieldname] of array('id' => .., 'value' => ...);
	 */
	public function getOriginalValues()
	{
		if ($this->_originalValues == null) {
			$this->_originalValues = array();
			$models = ResourceData::model()->findAll('resource=:resource', array(':resource' => $this->_pk));
			foreach ($models as $model) {
				// RC8
				// $this->_originalValues[$this->idToName($model->resource_type_field)] = array('id' => $model->id, 'value'=> substr($model->value,0,1) != ',' ? $model->value : substr($model->value,1));
				$name = $this->idToName($model->resource_type_field); // RC8 $name can be empty if field definition has been deleted without deleting the field
				$hasComma = false; //($name != '' && $this->hasDataComma($name));
				$this->_originalValues[$name] = array('id' => $model->id, 'value'=> $hasComma ? substr($model->value,1) : $model->value);
			}
		}
		return $this->_originalValues;
	}
	
	/**
	 * updates the ResourceData records so the record changes are reflected
	 * some of the fields are also stored in the Resource record under 'field88'
	 * 
	 * @return boolean
	 * @throws CDbException
	 */
	
	public function update()
	{
		if($this->getIsNewRecord())
      throw new CDbException(Yii::t('app','The resource space record cannot be updated because it is new.'));
    if($this->beforeSave())  {
			Yii::trace(get_class($this).'.update()','application.compontents.RSRecordModel');
			if($this->_pk === null)
				throw new CDbException(Yii::t('app','The resource space record cannot be updated because there is no id for the pk.'));
			
			$transaction = Yii::app()->db->beginTransaction();
			/**
			 * we must load the resource to check for the possible field[nn] definitions
			 */
			$resource = Resource::model()->findByPk($this->_pk);
			try {
				$this->storeData($resource);
				$transaction->commit();
			} catch(Exception $e) {
				$transaction->rollback();
				throw new CDbException($e->getMessage());
			}
			$this->afterSave();
			return true;
    } else
     return false;		
	}
	
	public function getDbCriteria()
	{
		if ($this->_c === null) {
			$this->_c = new CDbCriteria();			
		}
		return $this->_c;
	}

	/**
	 * all Resource records share the possibility to store resource
	 */
	
	/**
	 * the file extension of the master file is stored in the Resource
	 */
	public function getFileExtension()
	{
		if ($this->_resource === null) {
			$this->_resource = Resource::model()->findByPk($this->id);
			if ($this->_resource === null) {
				return '';
				
			}
		}
		return $this->_resource->file_extension;
	}
	public function checkExtension($newExtension)
	{
		if ($this->fileExtension != $newExtension) {
			$this->_resource->file_extension = strtolower($newExtension);
			$this->_resource->save();
		}
	}

	
	/**
	 * returns an array of ResourceAltFiles which belong to this Art
	 * this is the relation altFiles
	 * 
	 */
	public function getAltFiles()
	{
		if ($this->_altFiles == false ) {
			$this->_altFiles = ResourceAltFiles::model()->findAll(array(
					'condition' => 'resource=:resource_id AND (alt_type <> :folder OR alt_type is null)', 
					'order' => 'alt_type,name,ref',
					'params' => array(':resource_id' => $this->id, ':folder' => Yii::app()->config->alternateTypeSystem)
			));
		}	
		return $this->_altFiles;
	}
	
	public function getAltSystemFiles()
	{
		if ($this->_altSystemFiles === false) {
			$this->_altSystemFiles = ResourceAltFiles::model()->findAll(array(
				'condition' => 'resource=:resource_id AND alt_type = :folder',
				'params' => array(':resource_id' => $this->id, ':folder' =>  Yii::app()->config->alternateTypeSystem)
			));
		}
		return $this->_altSystemFiles;
	}
	
	
	/**
	 * returns the scramble key for the filenames
	 * 
	 * @return string
	 */
	protected function getScramble()
	{
		if ($this->_scramble === null) {			
			$this->_scramble = strlen(Yii::app()->config->scrambleKey) > 0; 
		}
		return $this->_scramble;
	}
	/**
	 * return the scramble directory for this key
	 * 
	 * @return string
	 */
	protected function getScramblePath()
	{
		if ($this->scramble && empty($this->_scrablePath)) {
			$this->_scrablePath = substr(md5($this->id . "_" . Yii::app()->config->scrambleKey),0,15);
		}
		return $this->_scrablePath;
	}
	
	/**
	 * the fysical directory where the images are stored
	 * 
	 * @return string
	 */
	public function getResourcePath()
	{
		return Yii::app()->config->resourceSpaceImageRoot;
	}
	/**
	 * the root url used to access the images
	 */
	public function getResourceUrl()
	{
		return Yii::app()->config->resourceSpaceImageUrl;
	}
	
		
	/**
	 * returns the folder in which the files are stored
	 * this depends on the id of the current Resource
	 * every Resouce gets it's own directory
	 * 
	 * @return string
	 */
	public function getFolder($generatePath = false, $id = null)
	{		
		if ($id === null) $id = $this->id;
		$storageDir = Yii::app()->config->resourceSpaceImageRoot;
		$folder = '';
		for ($n = 0;$n < strlen($id); $n++) {
			$folder .= substr($this->id, $n, 1);
			if (($this->scramble) && ($n == (strlen($id) - 1))) {
				$folder .= "_" .$this->scramblePath;
			}
			$folder .= "/";
			if ($generatePath && !(file_exists($storageDir . $folder))) {
				if (@mkdir($storageDir . $folder,0777)) {
					@chmod($storageDir .  $folder,0777);
				}	else {
					Yii::app()->user->setFlash('error',Yii::t('app', 'The directory {directory} could not be created.', array('{directory}' => $storageDir . $folder)));
				}
			}
		}
		return $folder;
	}
	
	/**
	 * returns all different types of file name relative to the filestore root
	 * watermark and pageing are not supported
	 * 
	 * @param array $options
	 */
	public function filename($options = array())
	{
		/** the options merged with our default */
		$opt = array_merge(
			array(
				'id' => $this->id,	
				'scramble' => true,							/* make the filename obscured */	
				'size' => '',										/* one of the size defined in PreviewSize */
				'extension' => false,				/* the extension requested */
				'alternative' => false,					/* the id of ResourceAltFile when retrieve the alternate file */
				'generateDirectories' => false,	/* if true the path will be valid after generating the filename */
			),			
			$options			
		);
		$ext = ($opt['extension'] != false ? $opt['extension'] : $this->fileExtension);
		$alt = ($opt['alternative'] != false ? '_alt_' .$opt['alternative'] : '');
		if ($this->scramble) {			
			$filename = $this->getFolder($opt['generateDirectories'], $opt['id']) . $opt['id'] . $opt['size'].$alt."_" . substr(md5($opt['id'] .$opt['size'].$alt.Yii::app()->config->scrambleKey),0,15).'.'.$ext ;
			/**
			 * if the filename does not exist rename the unscramble to the filename
			 */
			if (!file_exists($this->resourcePath . $filename)) {
				$unScrambledName = $this->folder . $opt['id'] . '.'.$ext;
				if (file_exists($this->resourcePath .$filename)) {
					rename($this->resourcePath.$unScrambledName, $this->resourcePath.$filename);
				} 
			}
		} else {
			$filename = $this->getFolder($opt['generateDirectories'], $opt['id']) . $opt['id'] .$opt['size']. $alt. '.'.$ext;
		}	
		return $filename;		
	}
	
	/**
	 * return true if there is a resource connected to this Art
	 * 
	 * @return boolean
	 */
	public function getHasResource()
	{
		$filename = $this->downloadPath;
		return file_exists($filename);
	}

	/**
	 * returns true if Art master file is an Video file
	 * 
	 * @return boolean
	 */
	public function getIsVideo()
	{
		$ext = Yii::app()->config->videoExtensions;
		return in_array(strtolower($this->fileExtension), $ext);
	}
	/**
	 * returns the url of the preview image even if it's an video.
	 * 
	 * @returns string
	 */
	public function getPreviewImageUrl()
	{
		$params = array(
				//'size' => 'pre', 
				'extension' => 'jpg');
		return $this->resourceUrl.$this->filename($params);		
	}	
	public function getPreviewImagePath()
	{
		$params = array(
				//'size' => 'pre', 
				'extension' => 'jpg');
		return $this->resourcePath.$this->filename($params);		
	}	
	
	/**
	 * return the full path to the thumbnail
	 * 
	 * @return string
	 */
	public function getPreviewThumbUrl()
	{
		$params = array(
				'size' => 'pre',// 'scr', 
				'extension' => 'jpg');
		$filename = $this->filename($params);		
		$url = '';
		if ($filename) {
			$filename = $this->resourcePath.$filename;
			$url = Yii::app()->imageCache->imageUrl($filename, 'thumb');
		}
		return $url;
	}
 /**
	 * return the full path to the thumbnail
	 * 
	 * @return string
	 */
	public function getPreviewThumbPath()
	{
		$params = array(
				'size' => 'pre',// 'scr', 
				'extension' => 'jpg');
		$filename = $this->filename($params);
		return $filename;
	} 
	/**
	 * returns the full url to the preview. Can be an .jpg or .flv depending on the isVideo
	 * 
	 * @returns string
	 */
	public function getPreviewUrl()
	{
		$params = array(
				'size' => 'pre', 
				'extension' => $this->isVideo ? 'flv' : 'jpg',
				);
		return $this->resourceUrl.$this->filename($params);				
	}
	
	/**
	 * This version uses the alternate files so we can load the 'proper' 
	 * converted video file. If it's not a video the link to the filename
	 * is returned.
	 * 
	 * 
	 * @param string $ext the type of file requested 
	 * @param boolean $isLow if true the low quality resource is requested
	 * 
	 * @return string the full url to the preview file
	 */
	public function previewUrl($ext, $isLow = false)
	{
		if ($this->isVideo) {
      if (strtolower($ext) == 'mezzanine') {
        $name = 'Mezzanine';
      } else {
        $searchExt = $ext == 'webm' ? 'webm' : 'x264';
        $name = $searchExt.($isLow ? '_LQ' : '_HQ');	
      }
			foreach ($this->altSystemFiles as $altFile) {
				if (strcasecmp($altFile->name, $name) == 0) {
					return $altFile->downloadUrl;
				}
			}
			Yii::log('The requested preview resource '.$name.' could not be found for id '.$this->id, CLogger::LEVEL_ERROR, 'toxus.resourcespace.RSRecordModel');
			return '';	// not found
		} else {
			$params = array(
					'size' => 'pre', 
					'extension' => $ext,
					);
			return $this->resourceUrl.$this->filename($params);						
		}	
	}
	/**
	 * Return true is the preview file exists
	 * 
	 * @param string $ext  the extension (same as previewUrl)
	 * @param boolean $isLow if true request is for the low quality
	 */
	public function previewExists($ext, $isLow = false)
	{
		if ($this->isVideo) {
      if (strtolower($ext) == 'mezzanine') {
        $name = 'Mezzanine';
      } else {
        $searchExt = $ext == 'webm' ? 'webm' : 'x264';
        $name = $searchExt.($isLow ? '_LQ' : '_HQ');	
      }
			foreach ($this->altSystemFiles as $altFile) {
        $s = $altFile->name;
				if (strcasecmp($altFile->name, $name) == 0) {
          $filename = $altFile->downloadPath;
					return file_exists($filename);
				}
			}
			return false;	// not found
		} else {
			return false;	// only video has a preview
		}
	}
  
  public function previewFileName($ext, $isLow = false)
  {
		if ($this->isVideo) {
      if (strtolower($ext) == 'mezzanine') {
        $name = 'Mezzanine';
      } else {
        $searchExt = $ext == 'webm' ? 'webm' : 'x264';
        $name = $searchExt.($isLow ? '_LQ' : '_HQ');	
      }
			foreach ($this->altSystemFiles as $altFile) {
        $s = $altFile->name;
				if (strcasecmp($altFile->name, $name) == 0) {
          return $altFile->downloadPath;
				}
			}
			return false;	// not found
		} else {
			return false;	// only video has a preview
		}    
  }
	/**
	 * 
	 * @param string $ext
	 * @param bool $isLow
	 * @returns string the path of the file or false if no video or not existing
	 */
	public function previewPath($ext, $isLow = false) {
		if ($this->isVideo) {
			$searchExt = $ext == 'webm' ? 'webm' : 'x264';
			$name = $searchExt.($isLow ? '_LQ' : '_HQ');	
			foreach ($this->altSystemFiles as $altFile) {
				if (strcasecmp($altFile->name, $name) == 0) {
					return $altFile->downloadPath;
				}
			}
			return false;	// not found
		} else {
			return false;	// only video has a preview
		}
		
	}
	
	/**
	 * returns the url to the original file.
	 * 
	 * @return string
	 */
	public function getDownloadUrl()
	{
		$params = array(
				'extension' => $this->fileExtension,
				);
		if ($this->_downloadUrl) {
			return $this->_downloadUrl.$this->filename($params);
		}
		return $this->resourceUrl.$this->filename($params);						
	}
	/**
	 * return the fysical path to the resource including filename
	 * @return string
	 */
	public function getDownloadPath()
	{
		$params = array(
				'extension' => $this->fileExtension,
		);		
		return $this->resourcePath.$this->filename($params);								
	}
	
	/**
	 * returns the type of the resource stored in by this record
	 */
	public function getStoredResourceType()
	{
		if ($this->_resource === null) {
			$this->_resource = Resource::model()->findByPk($this->_pk);
			if ($this->_resource === null) {
				return 'none';
				// throw new CDbException('The Resource could not be found.');
			}
		}
		$typeId = $this->_resource->resource_type;
		// we need the Text version of this.
		$type = ResourceType::model()->findByPk($typeId);
		if (! $type)
			throw new CDbException('The Resource type is not defined.');
		return ucfirst(Yii::t('fields', $type->name));
	}
	
	
	
	public function logging()
	{
		$count = Yii::app()->db->createCommand('SELECT count(CONCAT_WS("", l.date, l.type, l.user)) FROM resource_log l WHERE l.resource='.$this->id)->queryScalar();
		$sql = 'SELECT distinct l.date, l.type, l.user as user_id, u.fullname, concat_ws("", l.date, l.type, l.user) as id FROM resource_log l LEFT JOIN user u ON l.user = u.ref WHERE l.resource='.$this->id.' ORDER BY l.date DESC';
		$dataProvider = new CSqlDataProvider($sql, array(
	    'totalItemCount'=>$count,
		  'sort'=>array(
        'attributes'=>array(
            'date ASC',
        ),
    ),
    'pagination'=>array(
        'pageSize'=>30,
			),
		));		
		return $dataProvider;
	}
	
	/**
	 * The slow boat to get more infomation for a log entry
	 * 
	 * @param date $date the date of the log
	 * @param int $userId the userid
	 * @param max fields to show $count
	 */
	public function loggingFields($date, $userId, $count = 2) 
	{
		
		$sql = 'SELECT l.resource_type_field as field_id, f.title as fieldname, l.diff, l.notes FROM resource_log l LEFT JOIN resource_type_field f ON l.resource_type_field = f.ref WHERE l.date="'.$date.'" AND user="'.$userId.'" ORDER BY fieldname';

		$list = Yii::app()->db->createCommand($sql)->queryAll();

		$rs = array();
		$l = 0;
		foreach($list as $item){				
			// $rs[$item['fieldname']] = $item['diff'];
			if ($item['diff'] != '+ ,') {
				$rs[$this->idToName($item['field_id'])] = $this->diffToHtml($item['diff']).' '.$item['notes'];
			}	
			if ($l == $count) break;
		}
		return $rs;				
	}
	
	private function diffToHtml($text)
	{
		$lines = explode("\n", $text);
		$result = '';
		$add = '';
		$remove = '';
		foreach ($lines as $line) {
			if (substr($line, 0, 1) == '+') {
				$add .= trim(substr($line, 1)).' ';
			} elseif (substr($line, 0, 1) == '-') {
				//		$result .= '<span class="diff-remove col-sm-6 glyphicon glyphicon-minus">'.trim(substr($line, 1)).'</span>';
				$remove .= trim(substr($line, 1)). ' ';
			} else {
				$result .= '<span class="diff-unknown">?? '.trim(substr($line, 1)).'</span><br/>';
			}
		}
		return '<div class="col-sm-1 '.($add != '' ?    'glyphicon glyphicon-plus' : '').'"></div><div class="col-sm-5">'.$add.'</div>'.
					 '<div class="col-sm-1 '.($remove != '' ? 'glyphicon glyphicon-minus' : '').'"></div><div class="col-sm-5">'.$remove.'</div>';
	}
	
	
	/**
	 * test if the attribute is stored with , on the first position.
	 * I think it's a bug in Resource Space, but to be compatible in searching and
	 * ordering we should place this comma to
	 * 
	 * FOUND IN THE SOURCE
				<option value="0" selected="">Text box (single line)</option>
				<option value="1">Text box (multi-line)</option>
				<option value="5">Text box (large multi-line)</option>
				<option value="8">Text box (formatted / CKeditor)</option>
				<option value="2">Check box list</option>
				<option value="3">Drop down list</option>
				<option value="10">Date</option>
				<option value="4">Date and optional time</option>
				<option value="6">Expiry date</option>
				<option value="7">Category tree</option>
				<option value="9">Dynamic keywords list</option>
				<option value="11">Dynamic tree (in development)</option>
	 * 
	 * 
	 * 
	 * @param string $attribute
	 * @return boolean
	 */
	public function hasDataComma($attribute)
	{
		if (isset($this->_fieldInfo[$attribute])) {
			$f = $this->_fieldInfo[$attribute];
			return $f['typeId'] == '2' || $f['typeId'] == '3' || $f['typeId'] == '9';
		} else {
			throw new CDbException(Yii::t('app', 'Attribute not found: {name} ', array('{name}' => $attribute)));
		}					
	}
	
	/**
	 * return the unfinished job that is processing this resource
	 * @return CActiveRecord
	 */
	protected function getProcessingJob()
	{
	  if ($this->_processingJob === false) {
			$this->_processingJob = ProcessingJob::model()->find('resource_id=:id AND alternate_id is null AND is_finished=0', array(':id' => $this->id));
		}	
		return $this->_processingJob;
	}	
	/**
	 * return true is the resource is being processed
	 * @return boolean
	 */
	public function getIsProcessing()
	{
		return !empty($this->processingJob);
	}
	
	public function isVisible($fieldname)
	{
		$id = $this->nameToId($fieldname);
		if ($id > 0) {	// should exist
			return Yii::app()->user->isFieldVisible($id);
		}
		Yii::log('The field '.$fieldname.' does not exist in resource '.get_class(), CLogger::LEVEL_WARNING, 'toxus.RSRecordModel.isVisible');
		return false;
	}
	
	public function isEditable($fieldname)
	{
		$id = $this->nameToId($fieldname);
		if ($id > 0) {	// should exist
			return Yii::app()->user->isFieldEditable($id);
		}
		Yii::log('The field '.$fieldname.' does not exist in resource '.get_class(), CLogger::LEVEL_WARNING, 'toxus.RSRecordModel.isEditable');
		return false;
	}

	/**
	 * List all transaction 
	 * 
	 * @return array of UndoTransaction
	 */
	public function getModerations()
	{
		if (!isset($this->_moderations)) {
			$this->_moderations = UndoTransaction::model()->findAll(array(
				'condition' => 'resource_id = :id',
				'params' => array(
						':id' => $this->id,
				),
				'order' => 'creation_date DESC'				
			));
		}
		return $this->_moderations;
	}
	
	public function moderationsView($path)
	{
		$moderations = UndoTransaction::model()->findAll(array(
			'condition' => 'resource_id = :id AND path=:path',
			'params' => array(
					':id' => $this->id,
					':path' => $path
			),
			'order' => 'creation_date DESC'				
		));		
		return $moderations;
		
	}
	
	/**
	 * returns an RSRecordModel that hold the data of version
	 * defined by transactionId.
	 * All changes done are marked and 10 levels are set
	 * 
	 * @param type $transactionId
	 */
	public function previousVersion($transactionId, $path=null)
	{
		if ($transactionId == 0) return array();
		// get all our values
		$values = new CMap($this->_originalValues);
		$level = 1;
		$moderations = isset($path) ? $this->moderationsView($path) : $this->moderations;
		foreach ($moderations as $transaction) {
			foreach ($transaction->steps as $step) {
				$name = $this->idToName($step->field_id); // RC8 $name can be empty if field definition has been deleted without deleting the field
				if (!isset($values[$name])) {
					$values[$name]	= array(
							'value' => trim($step->original_value) == ',' ? null: $step->original_value,
							'id' => $step->id,
							'level' => $level < 11 ? $level : 10,
					);		
				}	
			}
			if ($transaction->id == $transactionId) {
				break;	// done it
			}
			$level++;
		}
		if (isset($transaction) && $transaction->id == $transactionId) {
			return $values;
		} else {
			$err = Yii::t('app', 'The transaction id {transactionId} is not part of resource {id}', array('{transactionId}' => $transactionId, '{id}' => $this->id));
			Yii::log($err, CLogger::LEVEL_ERROR, 'toxus.RSRecordModel.previewVersion');
			throw new CDbException($err);
		}
	}
	/**
	 * list all changes to the fields and in which transaction it was changed.
	 * The array returned is:
	 *   array[fieldname][transaction]
	 *			with the element: value, id, level, transaction
	 * 
	 * @param string $path the url to check
	 * @return array
	 */
	public function fieldChanges($path = null)
	{
		$values = new CMap(); 
		$level = 1;
		$moderations = isset($path) ? $this->moderationsView($path) : $this->moderations;
		foreach ($moderations as $transaction) {
			foreach ($transaction->steps as $step) {
				$name = $this->idToName($step->field_id); 
				if (!isset($values[$name])) {
					$values[$name] = new CMap();
				}
				$values[$name][$transaction->id] = array(
					'value' => substr($step->original_value,0,1) == ',' ? substr($step->original_value, 1) : $step->original_value,
					'id' => $step->id,	
					'level' => $level,
					'transaction' => $transaction->id,	
				);		
			}
			$level++;
		}
		return $values;
	}
	
	public function getModeration()
	{
		return $this->_undoTrans;
	}
	
	/**
	 * call before converting the the $criteria into to RSDataProvider.
	 * 
	 * @param RSCriteria $criteria
	 */
	public function beforeSearch($criteria) 
	{
	}
	
	/** 
	 * the MD5 for the files used by this resource
	 * if MD5 does not exist this is an isNewRecord
	 * @return FileInfo Description
	 */
	public function getFileCheck() 
	{
		if ($this->_fileCheck === false) {
			$this->_fileCheck = FileCheck::model()->find(
					'resource_id=:id', array(':id' => $this->id)		
			);
			if (empty($this->_fileCheck)) {
				$this->_fileCheck = new FileCheck();
				$this->_fileCheck->resource_id = $this->id;
			}
		}
		return $this->_fileCheck;
	}
}
