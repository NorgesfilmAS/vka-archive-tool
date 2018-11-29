<?php

Yii::import('application.models._base.BaseUndoStep');

class UndoStep extends BaseUndoStep
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function relations()
	{
		return array(
				'transaction' => array(self::BELONGS_TO, 'UndoTransaction', 'transaction_id'),
				'field' => array(self::BELONGS_TO, 'ResourceTypeField', 'field_id'),
		);
	}	
	/**
	 * undo's this step
	 */
	public function undo($url = null)
	{
		$moderation = new Moderation();
		$moderation->begin($this->transaction->resource_id);
		
		$resourceData = ResourceData::model()->find(array(
			'condition' => 'resource = :resource_id AND resource_type_field = :type_id',
			'params' => array(
				':resource_id' => $this->transaction->resource_id,
				':type_id' => $this->field_id,	
			),	
		));
		if ($resourceData && empty($this->original_value)) {
			$moderation->change($this->field_id, $resourceData->value, $this->original_value);
			$resourceData->delete();
		} else {
			if (!$resourceData) {
				$resourceData = new ResourceData();
				$resourceData->resource = $this->transaction->resource_id;
				$resourceData->resource_type_field = $this->field_id;
			}
			$moderation->change($this->field_id, $resourceData->value, $this->original_value );			
			$resourceData->value = $this->original_value;
			$resourceData->save();
		}	
		$moderation->commit(array(
				'isRollback' => 1, 
				'path'=>isset($url) ? $url : $moderation->transaction->path
		));
		return true;
	}
	
	/**
	 * removes the irritating , a the beginning
	 */
	public function getDisplayValue()
	{
		return substr($this->original_value,0,1) == ',' ? substr($this->original_value,1) : $this->original_value;
	}
}
