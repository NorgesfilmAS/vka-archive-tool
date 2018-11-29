<?php

Yii::import('application.models._base.BaseUsergroup');

class Usergroup extends BaseUsergroup
{
	
	const READ_ACCESS = 'f';
	const EDIT_ACCESS = 'F-';
	/**
	 * the id => true for editable fields
	 * @var array
	 */
	private $_editableById = false;
	private $_viewableById = false;
		
	/**
	 * the array version of the permission field
	 * @var array
	 */
	private $_permissions;
	
	private $_group = false;
	
	CONST RIGHT_NONE = 0;
	const RIGHT_READ = 1;
	const RIGHT_UPDATE = 2;
	
	/**
	 * the rights converted from the json_rights. NEVER SAVED
	 * is array of fieldId => rights type [NONE | READ | UPDATE]
	 * @var array
	 */
	private $_rights = false;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
		
	public function afterFind() {
		$this->visible_items = explode(',', $this->visible_items);
		if ($this->rights_json) {
			$this->_rights = CJSON::decode($this->rights_json);
		} else {
			$this->_rights = array();
		}
		return parent::afterFind();
	}
	
	public function rules() {
		return array_merge(
				array(		
					array('edit_access,read_access', 'safe', 'on'=>'rights'),		
					array('readAccessAll, editAccessAll', 'safe', 'on' => 'rights'),		
				),		
				parent::rules()
		);
	}
	
	/**
	 * rights won't save the RIGHTS_NONE fields, so children can add rights
	 * but not remove rights
	 * 
	 */
	public function compileRights()
	{
		$this->convertPermissions();
		if ($this->parentGroup) {
			$r = $this->parentGroup->rights;
		} else {
			$r = array(
				'fields' => array(),
				'menus' => array(),	
			);
		}	
		// merge the rights
		foreach ($this->_viewableById as $fieldId => $value) {
			$r['fields'][$fieldId] = self::RIGHT_READ;
		}
		foreach ($this->_editableById as $fieldId => $value) {
			$r['fields'][$fieldId] = self::RIGHT_UPDATE;
		}
		
		$cfg = Yii::app()->config->sections();
		foreach ($cfg['menus']['items'] as $key => $def) {
			$result[$key] = $def['label'];
		}
		foreach ($this->visible_items as $menu) {
			if ($menu != '') {
				// check for submenu items with the same right
				if (isset($cfg['menus']['items'][$menu])) {
					$item = $cfg['menus']['items'][$menu];
					if ($item['value'] != 1) { // does is have subitems
						$a = explode(',', $item['value']);
						foreach ($a as $subMenu) {
							$r['menus'][$subMenu] = 1;
						}
					}
				}					
				$r['menus'][$menu] = 1;
			}	
		}
		$this->rights_json = CJSON::encode($r);
	}
	
	public function getRights()
	{
		return $this->_rights;
	}
	
	/**
	 * we need to compile the right_json
	 * 
	 * @return boolean 
	 */
	public function beforeSave() 
	{
		$this->compileRights();
		$this->visible_items = implode(',', $this->visible_items);
		return parent::beforeSave();
	}
	public function afterSave() 
	{
		$children = Usergroup::model()->findAll(array(				
			'condition' => 'parent=:id',
			'params' => array(
				':id' => $this->id,	
		)));
		foreach($children as $child) {
			$child->save(); // this will compile the rights
		}
	}
	/**
	 * changes the _permission so all fields are visible
	 * remove the f* of F* from the permissions
	 * 
	 * @param $state F (editable) | f (visible
	 */
	private function makeAll($state = 'F')
	{
		$flds = ResourceTypeField::model()->with('resource')->findAll();
		$key = array_search($state.'*', $this->_permissions);
		if ($key !== false) {
			unset($this->_permissions[$key]);
		}
		if ($state == 'F') ($state = 'F-');
		foreach ($flds as $field) {
			$def = $state.$field->ref;
			if (!in_array($def, $this->_permissions) && $field->resourceName)
				$this->_permissions[] = $def;
		}
	}
	
	/**
	 * converts the $permissions into searchable arrays.

	 * 
	 * 
	 */
	private function convertPermissions()
	{
		if ($this->_editableById === false) {
			$this->_permissions = explode(',', $this->permissions);			
			if (count($this->_permissions) == 0) { // empty array means all is visible
				$this->makeAll();
			} elseif (in_array('F*', $this->_permissions)) { 
				$this->makeAll('F');
			} elseif (in_array(self::READ_ACCESS.'*', $this->_permissions)){
				$this->makeAll();
			}			
			
			$this->_editableById = array();
			$this->_viewableById = array();
			foreach ($this->_permissions as $perm) {
				$fieldId = 0;
				$chr = substr($perm,0,1);
				$next = substr($perm, 1, 1);
				switch ($chr) {
					case 'f' :	// viewable f1234 
						if (is_numeric($next)) {
							$fieldId = substr($perm, 1);
							$this->_viewableById[$fieldId] = true;
						} 
						break;
					case 'F' :										// editable F-1234
						if ($next == '-') {
							$fieldId = substr($perm, 2);
							$this->_editableById[$fieldId] = true;
						} 
						break;
					default :
						break;
				}
			}
		}		
	}
	/**
	 * returns the list of editable fields
	 * @return array array of id => true
	 */
	public function getEditableById()
	{
		$this->convertPermissions();
		return $this->_editableById;
	}
	
	/**
	 * returns the parent record or null / false if no parent
	 * 
	 * @return Usergroup
	 */
	public function getParentGroup()
	{
		if ($this->_group === false &&  $this->parent > 0) {
			$this->_group = Usergroup::model()->findByPk($this->parent);
		}
		return $this->_group;
	}
	
	public function getChildren()
	{
		$children = Usergroup::model()->findAll(array(				
			'condition' => 'parent=:id',
			'params' => array(
				':id' => $this->id,	
			),		
			'order' => 'name'		
		));
		return $children;
	}
	public function getUsers()
	{
		return User::model()->findAll(array(
			'condition' => 'usergroup=:id',
			'params' => array(
				':id' => $this->ref	
			),
			'order' => 'username'	
		));
	}
	
	public function getParentGroups()
	{
		return Usergroup::model()->findAll(array(
				'order' => 'name', 
				'condition' => 'ref <> :id', 
				'params' => array(
						':id' => $this->id)));		
	}
	public function parentGroupsOptions()
	{
		return 
				array(0 => Yii::t('app', '(none)')) + 
				CHtml::listData($this->parentGroups, 'id', 'name');
	}
	/**
	 * return true if the field is visible or editabe
	 * 
	 * @param integer $fieldId the id of the field
	 * @return boolean
	 */
	public function isVisible($fieldId)
	{
		$this->convertPermissions();
		return (isset($this->_viewableById[$fieldId]) || isset($this->_editableById[$fieldId]));
	}
	/**
	 * return true if field is editabel
	 * 
	 * @param integer $fieldId
	 * @return boolean
	 */
	public function isEditable($fieldId)
	{
		$this->convertPermissions();
		return (isset($this->_editableById[$fieldId]));
		
	}
	
	/**
	 * returns an array of Usergroups
	 */
	public function getActiveGroups()
	{
		return Usergroup::model()->findAll(array('order' => 'name'));
	}
	
	public function getId()
	{
		return $this->ref;
	}

	/**
	 * list all field with read access
	 * 
	 * @return array of ResourceTypeField
	 */
	public function getReadAccess()
	{
		$this->convertPermissions();
		$fields = array();
		$editAccess = $this->editAccess;
		foreach ($this->_viewableById as $id => $val) {
			$rec = ResourceTypeField::model()->findByPk($id);
			$order = $rec->resourceName.' - '.$rec->fieldname;
			if (!isset($editAccess[$order])) {
				$fields[$order] = $rec; 
			}	
		}
		uksort($fields, 'strcasecmp');
		return $fields;
	}
	
	/**
	 * list all field with edit access
	 * 
	 * @return array of ResourceTypeField
	 */		
	public function getEditAccess()
	{
		$this->convertPermissions();
		$fields = array();
		foreach ($this->_editableById as $id => $val) {
			$rec = ResourceTypeField::model()->findByPk($id);
			if ($rec) {
				$fields[$rec->resourceName.' - '.$rec->fieldname] = $rec; 
			}	
		}
		uksort($fields, 'strcasecmp');
		return $fields;
	}
	
	
	/**
	 * set the read access to the fields
	 * $access is a , seperate list of id that have read access
	 * @param string $access
	 */
	public function setread_access($access)
	{
		$newRead = explode(',', $access);
		$props = explode(',', $this->permissions);
		foreach ($props as $key => $prop) {
			if (substr($prop, 0,1) == self::READ_ACCESS) {
				unset($props[$key]);
			}
		}
		foreach ($newRead as $read) {
			$props[] = self::READ_ACCESS.$read;
		}
		$this->permissions = implode(',', $props);
		$this->_editableById = false;		// signal our access has changed.
	  $this->_permissions = $props;
	}
	public function getRead_access()
	{
		return implode(',', array_keys($this->_viewableById));
	}
	/**
	 * set the edit access to the fields
	 * $access is a , seperate list of id that have read access
	 * @param string $access
	 */
		
	public function setEdit_access($access)
	{
		$newEdit = explode(',', $access);
		$props = explode(',', $this->permissions);
		foreach ($props as $key => $prop) {
			if (substr($prop, 0,2) == self::EDIT_ACCESS) {
				unset($props[$key]);
			}
		}
		foreach ($newEdit as $read) {
			$props[] = self::EDIT_ACCESS.$read;
		}
		$this->permissions = implode(',', $props);
		$this->_editableById = false;		// signal our access has changed.
	  $this->_permissions = $props;		
	}
	public function getEdit_access()
	{
		return implode(',', array_keys($this->_editableById));
	}
	
	/**
	 * List all fields use by this resource, which are not part of the editAccess 
	 * or readAccess
	 * 
	 * @return array
	 */
	public function getAllFields()
	{
		$flds = ResourceTypeField::model()->with('resource')->findAll();
		$fields = array();
		$editAccess = $this->editAccess;
		$readAccess = $this->readAccess;
		foreach ($flds as $field) {
			$order = $field->resourceName.' - '.$field->fieldname;
			if ($field->resourceName != '' && !isset($editAccess[$order]) && !isset($readAccess[$order])) {
				$fields[$order] = $field;
			}	
		}				
		ksort($fields);
		return $fields;
	}
	
	/**
	 * list all moderators in the system
	 * moderators are part of administrator or moderators
	 * return array id => username
	 */
	public function getModeratorOptions()
	{
		$adm = User::model()->findAll(array(
			'condition' => 'usergroup = :adm_id OR usergroup = :mod_id',
			'params' => array(
					':adm_id' => Yii::app()->config->fixedValues['administrator_id'],
					':mod_id' => Yii::app()->config->fixedValues['moderator_id'],
			),
			'order' => 'username',	
		));
		return array(0 => Yii::t('app', '(none)')) + CHtml::listData($adm, 'ref', 'username' );		
	}
	
	/**
	 * list the intervals definied
	 * possible are : http://nl3.php.net/manual/en/datetime.formats.relative.php
	 */
	public function getIntervalOptions()
	{
		return array(
			'now'			=> Yii::t('app', 'direct'),	
			'+1 hour' => Yii::t('app', 'Every hour'),
			'+2 hour' => Yii::t('app', 'Every 2 hours'),
			'noon'		=> Yii::t('app', 'At 12 o\'clock'),
			'=1 day'	=> Yii::t('app', 'Every day'),
			'+1 week'	=> Yii::t('app', 'Every week'),
		);
	}
	/**
	 * returns a list of all times allowed
	 * @return array
	 */
	public function getTimeOptions()
	{
		$return = array('' => Yii::t('app', '(none)'));
		for ($l=0 ; $l < 24; $l ++) {
			$return[str_pad($l, 2, '0', STR_PAD_LEFT).':00'] = str_pad($l, 2, '0', STR_PAD_LEFT).':00';
		}
		return $return;
	}
	
	/**
	 * list all menus defined in the Yii::app()->config->menus
	 * only used by the rights editor
	 * 
	 * @return array menu-key => caption
	 */
	public function getVisibleItemsOptions()
	{
		$result = array();
		$cfg = Yii::app()->config->sections();
		
		foreach ($cfg['menus']['items'] as $key => $def) {
			$result[$key] = $def['label'];
		}
		asort($result);
		return $result;
	}
	
	/**
	 * returns true if the menu is visible
	 * 
	 * @param string $route
	 * @return boolean
	 */
	public function hasMenu($route)
	{
		return isset($this->_rights['menus'][$route]);
	}
	/**
	 * returns true if the field is visible
	 * @param integer $fieldId
	 */
	public function isFieldVisible($fieldId)
	{
		return isset($this->_rights['fields'][$fieldId]) && $this->_rights['fields'][$fieldId] >= self::RIGHT_READ;
	}
	/**
	 * returns true if the field is editable
	 * @param integer $fieldId
	 */
	public function isFieldEditable($fieldId)
	{
		return isset($this->_rights['fields'][$fieldId]) && $this->_rights['fields'][$fieldId] >= self::RIGHT_UPDATE;
	}	
	public function fieldState($fieldId)
	{
		return isset($this->_rights['fields'][$fieldId]) ? $this->_rights['fields'][$fieldId] : self::RIGHT_NONE;
	}
	
	public function getApplicationTitle()
	{
		if(!isset($this->application_title) || strlen($this->application_title) == 0) {			
			if ($this->parentGroup) {
				return $this->parentGroup->applicationTitle;
			} else {
				return Yii::app()->config->fixedValues['application_name'];
			}
		} else {
			return $this->application_title;
		}
	}
	
	public function search() 
	{
		$search = parent::search();
		return new CActiveDataProvider($this, array(
			 'criteria' => $search->criteria,
			 'sort' => array(
					'defaultOrder' => array(
						 'name' => CSort::SORT_ASC
					),
			 ),
			'pagination'=>array(
          'pageSize'=>'30'
      ),
		));
	}
}
