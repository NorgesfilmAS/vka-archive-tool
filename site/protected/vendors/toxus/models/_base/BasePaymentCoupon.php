<?php

/**
 * This is the model base class for the table "payment_coupon".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PaymentCoupon".
 *
 * Columns in table "payment_coupon" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $caption
 * @property string $slug
 * @property integer $is_active
 * @property string $amount
 * @property string $percentage
 * @property string $start_date
 * @property string $end_date
 * @property integer $max_use_count
 * @property integer $used_count
 *
 */
abstract class BasePaymentCoupon extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'payment_coupon';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PaymentCoupon|PaymentCoupons', $n);
	}

	public static function representingColumn() {
		return 'caption';
	}

	public function rules() {
		return array(
			array('caption, slug', 'required'),
			array('is_active, max_use_count, used_count', 'numerical', 'integerOnly'=>true),
			array('caption, slug, amount, percentage', 'length', 'max'=>255),
			array('start_date, end_date', 'safe'),
			array('is_active, amount, percentage, start_date, end_date, max_use_count, used_count', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, caption, slug, is_active, amount, percentage, start_date, end_date, max_use_count, used_count', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app', 'ID'),
			'caption' => Yii::t('app', 'Caption'),
			'slug' => Yii::t('app', 'Slug'),
			'is_active' => Yii::t('app', 'Is Active'),
			'amount' => Yii::t('app', 'Amount'),
			'percentage' => Yii::t('app', 'Percentage'),
			'start_date' => Yii::t('app', 'Start Date'),
			'end_date' => Yii::t('app', 'End Date'),
			'max_use_count' => Yii::t('app', 'Max Use Count'),
			'used_count' => Yii::t('app', 'Used Count'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('caption', $this->caption, true);
		$criteria->compare('slug', $this->slug, true);
		$criteria->compare('is_active', $this->is_active);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('percentage', $this->percentage, true);
		$criteria->compare('start_date', $this->start_date, true);
		$criteria->compare('end_date', $this->end_date, true);
		$criteria->compare('max_use_count', $this->max_use_count);
		$criteria->compare('used_count', $this->used_count);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
