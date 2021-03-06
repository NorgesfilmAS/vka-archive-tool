<?php

/**
 * This is the model base class for the table "collection_savedsearch".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CollectionSavedsearch".
 *
 * Columns in table "collection_savedsearch" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $collection
 * @property string $search
 * @property string $restypes
 * @property integer $archive
 * @property integer $ref
 * @property string $created
 * @property integer $starsearch
 * @property integer $result_limit
 *
 */
abstract class BaseCollectionSavedsearch extends TwigActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'collection_savedsearch';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CollectionSavedsearch|CollectionSavedsearches', $n);
	}

	public static function representingColumn() {
		return 'created';
	}

	public function rules() {
		return array(
			array('created', 'required'),
			array('collection, archive, starsearch, result_limit', 'numerical', 'integerOnly'=>true),
			array('search, restypes', 'safe'),
			array('collection, search, restypes, archive, starsearch, result_limit', 'default', 'setOnEmpty' => true, 'value' => null),
			array('collection, search, restypes, archive, ref, created, starsearch, result_limit', 'safe', 'on'=>'search'),
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
			'collection' => Yii::t('app', 'Collection'),
			'search' => Yii::t('app', 'Search'),
			'restypes' => Yii::t('app', 'Restypes'),
			'archive' => Yii::t('app', 'Archive'),
			'ref' => Yii::t('app', 'Ref'),
			'created' => Yii::t('app', 'Created'),
			'starsearch' => Yii::t('app', 'Starsearch'),
			'result_limit' => Yii::t('app', 'Result Limit'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('collection', $this->collection);
		$criteria->compare('search', $this->search, true);
		$criteria->compare('restypes', $this->restypes, true);
		$criteria->compare('archive', $this->archive);
		$criteria->compare('ref', $this->ref);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('starsearch', $this->starsearch);
		$criteria->compare('result_limit', $this->result_limit);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
