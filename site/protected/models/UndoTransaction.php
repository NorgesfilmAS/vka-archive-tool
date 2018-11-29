<?php

Yii::import('application.models._base.BaseUndoTransaction');

class UndoTransaction extends BaseUndoTransaction
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function beforeSave() {
		if ($this->isNewRecord) {
			$this->creation_date = new CDbExpression('NOW()');
			if ($this->user_id == null) {
				$this->user_id = Yii::app()->user->id;
			}
		}
		return parent::beforeSave();
	}
	
	public function relations() {
		return array(
				'user' => array(self::BELONGS_TO, 'User', 'user_id'),
				'steps' => array(self::HAS_MANY, 'UndoStep', 'transaction_id'),
		);
	}
	
	/**
	 * restores an transaction
	 * 
	 * @param string $route
	 */
	public function undo()
	{
		$trans = Yii::app()->db->beginTransaction();
		try {
			$moderation = new Moderation();
			$moderation->begin($this->resource_id);

			foreach ($this->steps as $step) {
				$resourceData = ResourceData::model()->find(array(
					'condition' => 'resource = :resource_id AND resource_type_field = :type_id',
					'params' => array(
						':resource_id' => $this->resource_id,
						':type_id' => $step->field_id,	
					),	
				));
				if ($resourceData && empty($step->original_value)) {
					$moderation->change($step->field_id, $resourceData->value, $step->original_value);
					$resourceData->delete();
				} else {
					if (!$resourceData) {
						$resourceData = new ResourceData();
						$resourceData->resource = $this->resource_id;
						$resourceData->resource_type_field = $step->field_id;
					}
					$moderation->change($step->field_id, $resourceData->value, $step->original_value );			
					$resourceData->value = $step->original_value;
					$resourceData->save();
				}	
			}	
			$moderation->commit(array(
					'isRollback' => 1, 
					'path'=>isset($this->path) ? $this->path : $moderation->transaction->path
			));
			$trans->commit();
		} catch (Exception $e) {
			Yii::log('Error in undo.'.$e->getMessage(), CLogger::LEVEL_ERROR, 'application.UndoTransaction.undo');
			$trans->rollback();
		}	
		return true;
	}
		
}
