<?php

/**
 * This is the model base class for the table "resource_related".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ResourceRelated".
 *
 * Columns in table "resource_related" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $resource
 * @property integer $related
 * @property integer $id
 *
 */
abstract class BaseResourceRelated extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'resource_related';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ResourceRelated|ResourceRelateds', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('resource, related', 'numerical', 'integerOnly'=>true),
			array('resource, related', 'default', 'setOnEmpty' => true, 'value' => null),
			array('resource, related, id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'resource' => Yii::t('app', 'Resource'),
			'related' => Yii::t('app', 'Related'),
			'id' => Yii::t('app', 'ID'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('resource', $this->resource);
		$criteria->compare('related', $this->related);
		$criteria->compare('id', $this->id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
