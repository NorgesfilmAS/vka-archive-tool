<?php

/**
 * This is the model base class for the table "resource_data".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ResourceData".
 *
 * Columns in table "resource_data" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $resource
 * @property integer $resource_type_field
 * @property string $value
 * @property integer $id
 *
 */
abstract class BaseResourceData extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'resource_data';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ResourceData|ResourceDatas', $n);
	}

	public static function representingColumn() {
		return 'value';
	}

	public function rules() {
		return array(
			array('resource, resource_type_field', 'numerical', 'integerOnly'=>true),
			array('value', 'safe'),
			array('resource, resource_type_field, value', 'default', 'setOnEmpty' => true, 'value' => null),
			array('resource, resource_type_field, value, id', 'safe', 'on'=>'search'),
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
			'resource_type_field' => Yii::t('app', 'Resource Type Field'),
			'value' => Yii::t('app', 'Value'),
			'id' => Yii::t('app', 'ID'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('resource', $this->resource);
		$criteria->compare('resource_type_field', $this->resource_type_field);
		$criteria->compare('value', $this->value, true);
		$criteria->compare('id', $this->id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
