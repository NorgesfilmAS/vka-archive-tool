<?php
/**
 * the control interface between the Resource Space definition and the class
 * to access the database
 * 
 * version 1.0
 */

class ResourceSpace extends CComponent
{
	private $_resourceModels = null;
	private $_isEnglish;
	
	public function __construct($isEnglish = true) {
		$this->_isEnglish = $isEnglish;
	}
	
	/**
	 * returns the base names of the resources defined.
	 * 
	 */
	public function resourceModels()
	{
		if ($this->_resourceModels == null) {
			$models = ResourceType::model()->findAll();
			$this->_resourceModels = array();
			foreach ($models as $model) {			
				$this->_resourceModels[$model->ref] = $this->_isEnglish ? Yii::t('fields', $model->name) : $model->name;
			}
		}
		return $this->_resourceModels;		
	}
	public function getModels()
	{
		return $this->resourceModels();
	}
	
	public function modelName($modelId)
	{
		return $this->models[$modelId];
	}
	public function modelId($modelName)
	{
		return array_search($modelName, $this->models);
	}
	
	public function listFields($modelId)
	{
	
		$fields = ResourceTypeField::model()->findAll('resource_type=:type', array(':type' => $modelId));
		$names = array();
		foreach ($fields as $field) {
			$def = new RSField();
			$def->id = $field->ref;
			$s = $field->title;
			$s2 = Yii::t('fields', $field->title);
			$def->caption = $this->_isEnglish ? Yii::t('fields', $field->title) : $field->title;
			$def->typeId = $field->type;
			$def->defineOptions($field->options);
			$def->order = $field->order_by;
			$def->keywordIndex = $field->keywords_index;
			$names[$def->id] = $def;
		}
		return $names;
	}
	
	public function generateModel($modelId)
	{
		$name = ucfirst($this->modelName($modelId));
		$fields = $this->listFields($modelId);
		$source = "<?php\n/**\n\t* Generated by ResourceSpace model\n\t* do not changes this file, update the modelFile\n */\n\n";
		$source .= "class ".$name."Base extends RSRecordModel {\n";
		$source .= "\n\n\tprotected \$_modelName = '".$name."';\n";
		$source .= "\tprotected \$_typeId = $modelId;\n";
		$source .= "\tprotected \$_defaultSearchOrder = null;\n\n";
		
		$source .= "\tpublic function getTypeId() {\n\t\treturn \$this->_typeId;\n\t}\n\n";
			
		$source .= "\tprotected \$_fieldDefs = array(\n";
		/**
		 * generate the field definition
		 */
		
		foreach ($fields as $field) {
			$source .= "\t\t'".$field->id."' => '".$field->name."',\n";
		}
		$source .= "\t);\n\n";
		
		/**
		 * generate the field options definition
		 */
		$source .= "\tprotected \$_fieldInfo = array(\n";
		foreach ($fields as $field) {
			$source .= "\t\t'".$field->name.'\' => array('."\n".
								"\t\t\t'typeId' => '".$field->typeId."',\n".
								"\t\t\t'options' => ". $field->optionText.",\n".
							"\t\t),\n";
		}
		$source .= "\t);\n\n";
		
		/**
		 * generate the keyword fields
		 */
		
		$source .= "\t/**\n\t *\n\t * fields stored in the Keyword, ResourceKeyword tables\n\t */\n\tprotected \$_keywordFields = array(\n";
		foreach ($fields as $field) {
			if ($field->keywordIndex) {
				$source .= "\t\t'".$field->name."' => true,\n";
			}
		}		
		$source .= "\t);\n\n";
		/**
		 * generate the rules (all is save)
		 */
		$source .= "\tpublic function rules() {\n\t\treturn array(\n\t\t\tarray('";
		$s = '';
		$l = 0;
		foreach ($fields as $field) {
			$l++;
			if (($l % 10) == 9)
				$s .= "'.\n\t\t\t'";
			$s .= ','.$field->name;		
		}	
		$source .= substr($s,1);
		$source .= "', 'safe'));\n\t}\n\n";
		/**
		 * generate the search definition
		 */
		
		$source .= "\tpublic function search()\n\t{\n\t\t\$criteria = new RSCriteria;\n\n";
		foreach ($fields as $field) {
			$source .= "\t\t\$criteria->compare('".$field->name."', \$this->".$field->name.", true);\n\n";
		}	
		$source .= "\t\t\$this->beforeSearch(\$criteria);\n";
		$source .= "\t\tif (\$this->_defaultSearchOrder != null) {\n";
		$source .= "\t\t\treturn new RSDataProvider(\$this, array(\n\t\t\t\t'criteria' => \$criteria,\n\t\t\t\t'order'=>\$this->_defaultSearchOrder,\n\t\t\t";
		$source .= "\t'pagination'=>array('pageSize'=>\$this->pageSize)));\n";
		$source .= "\t\t } else {\n";
		$source .= "\t\t\treturn new RSDataProvider(\$this, array(\n\t\t\t\t'criteria' => \$criteria,\n";
		$source .= "\t\t\t\t'pagination'=>array('pageSize'=>\$this->pageSize)));\n";
		$source .= "\t\t}\n\t}\n";
						
		$source .="\n}";
		// files are stored in 
		$path = Yii::getPathOfAlias('application.runtime.resourceSpace');
		if (!is_dir($path)) {
			mkdir($path);
		}
		file_put_contents($path.'/'.$name.'Base.php', $source);
		return true;
	}
	
}
