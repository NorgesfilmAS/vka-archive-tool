<?php
/**
 * Resource Space Selection information
 * 
 * Selecting the resource the the resource_data table
 * version 1.0 JvK Aug 2014
 * version 1.1 JvK Sept 2014:  can handle one level relations so you can write agent_id.gender to select the gender of the agent_id relation
 * 
 * 
 */
class ResourceSpaceSelection extends Selection
{
	public $selectTable = 'resource';
	public $modelClass = 'Art';
	public $selectAttribute = 'ref';	// the attribute to select
	
	
	/**
	 * create the joins so we can select on multiple fields
	 * 
	 */
	protected function queryAdd($attribute, $definition)
	{		
		$fieldId = $this->model->nameToId($attribute);
		if ($fieldId == null) {
			if ($attribute == 'resource_type') {	// field in resource
				// $this->_fields[$attribute] = 't.resource_type';				
				parent::queryAdd($attribute, $definition);
				return;
			} else {
				$joins = explode('.', $attribute);
				if (count($joins) != 2) { throw new CDbException(Yii::t('app','Related fields can only be one level for field {attribute}.', array('{attribute}' => $attribute))); }
				if (($fieldId = $this->model->nameToId($joins[0])) == null) { throw new CDbException(Yii::t('app','Unknown related field: {attribute}', array('{attribute}' => $joins[0]))); }
				$relType = explode('_',$joins[0]);
				if (count($relType) < 2) {throw new CDbException(Yii::t('app', 'The base class of the relation could not be found ({class})', array('{class}' => $joins[0])));}
				try {
					$className = ucfirst($relType[0]);
					$rel =  new $className;
				} catch (Exception $e) {
					throw new CDbException(Yii::t('app', 'Unknown relation base type {type}', array('{type)' => $relType[0])));	
				}
				if (($relId = $rel->nameToId($joins[1])) == null) { throw new CDbException(Yii::t('app','Unknown related field: {attribute}', array('{attribute}' => $joins[1]))); }

				// $fieldId = the id for the relation, $relId = the Id of the field in the relation to compare
				// make the relation 'jump'
				$joinRef = 't'.(count($this->_selectJoin)+1);				
				$this->_selectJoin[$attribute] = array(
						'tablename' => 'resource_data',
						'joinRef' => $joinRef,
						'inner' => true,
						'alias' => $joinRef,
						'condition' => 't.ref = '.$joinRef.'.resource AND '.$joinRef.'.resource_type_field='.$fieldId
				);
				// now make the where clause for this resource
				$joinValueRef = 't'.(count($this->_selectJoin)+1);
				$attrName = ':value_'.$joinValueRef;
				$this->_selectJoin[$attribute.'Value'] = array(
						'tablename' => 'resource_data',
						'joinRef' => $joinValueRef,
						'inner' => true,
						'alias' => $joinRef,
						'condition' => $joinRef.'.value = '.$joinValueRef.'.resource AND '.$joinValueRef.'.resource_type_field='.$relId
				);
				$this->_fields[$attribute] = $joinValueRef.'.value'.' '.$this->sqlCompare($definition, $attrName); //.' '.$this->sqlValue($attrName, $definition);
				$this->_params[$attrName] = $this->sqlValue($joins[1], $definition['value'], $rel);	
				// solved so get out of here
				return;
			}	
		}	
		$joinRef = 't'.(count($this->_selectJoin)+1);
		$attrName = ':value_'.$joinRef;
		
		
		$this->_fields[$attribute] = 'value'.' '.$this->sqlCompare($definition, $attrName); //.' '.$this->sqlValue($attrName, $definition);
		//$this->_params[$attrName] = $definition['value'];		
		$this->_params[$attrName] = $this->sqlValue($attribute, $definition['value']);		
		$this->_selectJoin[$attribute] = array(
				'tablename' => 'resource_data',
				'joinRef' => $joinRef,
				'inner' => true,
				'alias' => $joinRef,
				'condition' => 't.ref = '.$joinRef.'.resource AND '.$joinRef.'.resource_type_field='.$fieldId
		);
		$this->_fields[$attribute] = $joinRef.'.'.$this->_fields[$attribute];
	}
	
	protected function queryAddOrder($attribute, $definition)
	{
		if ($attribute == 'resource_type') { // internal field
			parent::queryAddOrder($attribute, $definition);
			return;
		} elseif (isset($this->_selectJoin[$attribute])) {
			$joinRef = $this->_selectJoin[$attribute]['joinRef'];
			$definition['attribute'] = $joinRef.'.value';
		} else {
			$joinRef = 't'.(count($this->_selectJoin)+1);
			$fieldId = $this->model->nameToId($attribute);			
			if ($fieldId == null) { // field not found. Check if it's calculated
				$name = $this->model->attribute2name($attribute);
				if (empty($name)) {
					// sort on related field
					$joins = explode('.', $attribute);
					if (count($joins) != 2) { throw new CDbException(Yii::t('app','Related fields can only be one level for field {attribute}.', array('{attribute}' => $attribute))); }
					if (($fieldId = $this->model->nameToId($joins[0])) == null) { throw new CDbException(Yii::t('app','Unknown related field: {attribute}', array('{attribute}' => $joins[0]))); }
					$relType = explode('_',$joins[0]);
					if (count($relType) < 2) {throw new CDbException(Yii::t('app', 'The base class of the relation could not be found ({class})', array('{class}' => $joins[0])));}
					try {
						$className = ucfirst($relType[0]);
						$rel =  new $className;
					} catch (Exception $e) {
						throw new CDbException(Yii::t('app', 'Unknown relation base type {type}', array('{type)' => $relType[0])));	
					}
					if (($relId = $rel->nameToId($joins[1])) == null) { throw new CDbException(Yii::t('app','Unknown related field: {attribute}', array('{attribute}' => $joins[1]))); }

					// $fieldId = the id for the relation, $relId = the Id of the field in the relation to compare
					// make the relation 'jump'
					$joinRef = 't'.(count($this->_selectJoin)+1);				
					$this->_selectJoin[$attribute] = array(
							'tablename' => 'resource_data',
							'joinRef' => $joinRef,
							'inner' => true,
							'alias' => $joinRef,
							'condition' => 't.ref = '.$joinRef.'.resource AND '.$joinRef.'.resource_type_field='.$fieldId
					);
					// now make the where clause for this resource
					$joinValueRef = 't'.(count($this->_selectJoin)+1);
					$attrName = ':value_'.$joinValueRef;
					$this->_selectJoin[$attribute.'Value'] = array(
							'tablename' => 'resource_data',
							'joinRef' => $joinValueRef,
							'inner' => true,
							'alias' => $joinRef,
							'condition' => $joinRef.'.value = '.$joinValueRef.'.resource AND '.$joinValueRef.'.resource_type_field='.$relId
					);
					$definition['attribute'] = $joinValueRef.'.value';
					// solved so get out of here
					parent::queryAddOrder($definition['attribute'], $definition);		

					return;					
					// end sort
				}
				$fieldId = $this->model->nameToId($name);			
				$definition['attribute'] = $this->model->translateField($attribute, $joinRef);
			} else {
				$definition['attribute'] = $joinRef.'.value';
			}

			$this->_selectJoin[$attribute] = array(
					'tablename' => 'resource_data',
					'joinRef' => $joinRef,
					'inner' => true,
					'alias' => $joinRef,
					'condition' => 't.ref = '.$joinRef.'.resource AND '.$joinRef.'.resource_type_field='.$fieldId
			);			
		}
		//parent::queryAddOrder($attribute, $definition);
		//$this->_orderFields[$attribute]['attribute'] = $definition['attribute'];						
		parent::queryAddOrder($definition['attribute'], $definition);		
	}
	
	protected function sqlValue($attribute, $value, $model = null) {
		if ($model == null) {
			$model = $this->model;
		}
		return ($model->hasDataComma($attribute) ? ',' : ''). $value;
	}

}
