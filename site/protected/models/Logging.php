<?php

Yii::import('application.vendors.toxus.models.LoggingModel');

class Logging extends LoggingModel
{
	
	public function relations() {
		return array_merge(
			parent::relations(),
			array(
				'article' => array(self::BELONGS_TO, 'Article', 'model_id'),
				)
		);
	}	
	
	public function uniqueList()
	{
		$criteria = new CDbCriteria;
		$criteria->distinct = true;
		$criteria->limit = $options['limit'];
		$criteria->order = 'creation_date DESC';
		$criteria->select = 'model_id';
		
		$criteria->compare('controller', $this->controller, true);
		$criteria->compare('profile_id', Yii::app()->user->id, true);
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
