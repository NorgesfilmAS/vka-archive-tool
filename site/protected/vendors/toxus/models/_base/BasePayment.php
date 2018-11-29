<?php

/**
 * This is the model base class for the table "payment".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Payment".
 *
 * Columns in table "payment" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $profile_id
 * @property string $slug
 * @property string $description
 * @property string $reference
 * @property string $transaction_id
 * @property string $creation_date
 * @property integer $product_id
 * @property string $product_json
 * @property string $status_text
 * @property integer $status_id
 * @property string $url_to_open_on_success
 * @property string $document_id
 * @property string $document_url
 * @property string $confirmation_date
 * @property string $invoice_number
 * @property string $invoice_address
 * @property string $invoice_referer
 * @property string $invoice_body
 * @property string $caption
 * @property string $amount
 * @property integer $coupon_id
 * @property string $discount_code
 * @property string $amount_ex_vat
 * @property string $discount_amount_ex_vat
 * @property string $discount_amount
 * @property string $total_amount_ex_vat
 * @property string $vat_percentage
 * @property string $vat_amount
 * @property string $total_amount
 * @property string $payment_provider
 * @property string $currency
 * @property string $logging_json
 *
 */
abstract class BasePayment extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'payment';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Payment|Payments', $n);
	}

	public static function representingColumn() {
		return 'slug';
	}

	public function rules() {
		return array(
			array('profile_id, slug', 'required'),
			array('profile_id, product_id, status_id, coupon_id', 'numerical', 'integerOnly'=>true),
			array('slug, reference, transaction_id, status_text, url_to_open_on_success, document_id, document_url, invoice_number, invoice_referer, caption, amount, discount_code, amount_ex_vat, discount_amount_ex_vat, discount_amount, total_amount_ex_vat, vat_percentage, vat_amount, total_amount, payment_provider, currency', 'length', 'max'=>255),
			array('description, creation_date, product_json, confirmation_date, invoice_address, invoice_body, logging_json', 'safe'),
			array('description, reference, transaction_id, creation_date, product_id, product_json, status_text, status_id, url_to_open_on_success, document_id, document_url, confirmation_date, invoice_number, invoice_address, invoice_referer, invoice_body, caption, amount, coupon_id, discount_code, amount_ex_vat, discount_amount_ex_vat, discount_amount, total_amount_ex_vat, vat_percentage, vat_amount, total_amount, payment_provider, currency, logging_json', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, profile_id, slug, description, reference, transaction_id, creation_date, product_id, product_json, status_text, status_id, url_to_open_on_success, document_id, document_url, confirmation_date, invoice_number, invoice_address, invoice_referer, invoice_body, caption, amount, coupon_id, discount_code, amount_ex_vat, discount_amount_ex_vat, discount_amount, total_amount_ex_vat, vat_percentage, vat_amount, total_amount, payment_provider, currency, logging_json', 'safe', 'on'=>'search'),
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
			'profile_id' => Yii::t('app', 'Profile'),
			'slug' => Yii::t('app', 'Slug'),
			'description' => Yii::t('app', 'Description'),
			'reference' => Yii::t('app', 'Reference'),
			'transaction_id' => Yii::t('app', 'Transaction'),
			'creation_date' => Yii::t('app', 'Creation Date'),
			'product_id' => Yii::t('app', 'Product'),
			'product_json' => Yii::t('app', 'Product Json'),
			'status_text' => Yii::t('app', 'Status Text'),
			'status_id' => Yii::t('app', 'Status'),
			'url_to_open_on_success' => Yii::t('app', 'Url To Open On Success'),
			'document_id' => Yii::t('app', 'Document'),
			'document_url' => Yii::t('app', 'Document Url'),
			'confirmation_date' => Yii::t('app', 'Confirmation Date'),
			'invoice_number' => Yii::t('app', 'Invoice Number'),
			'invoice_address' => Yii::t('app', 'Invoice Address'),
			'invoice_referer' => Yii::t('app', 'Invoice Referer'),
			'invoice_body' => Yii::t('app', 'Invoice Body'),
			'caption' => Yii::t('app', 'Caption'),
			'amount' => Yii::t('app', 'Amount'),
			'coupon_id' => Yii::t('app', 'Coupon'),
			'discount_code' => Yii::t('app', 'Discount Code'),
			'amount_ex_vat' => Yii::t('app', 'Amount Ex Vat'),
			'discount_amount_ex_vat' => Yii::t('app', 'Discount Amount Ex Vat'),
			'discount_amount' => Yii::t('app', 'Discount Amount'),
			'total_amount_ex_vat' => Yii::t('app', 'Total Amount Ex Vat'),
			'vat_percentage' => Yii::t('app', 'Vat Percentage'),
			'vat_amount' => Yii::t('app', 'Vat Amount'),
			'total_amount' => Yii::t('app', 'Total Amount'),
			'payment_provider' => Yii::t('app', 'Payment Provider'),
			'currency' => Yii::t('app', 'Currency'),
			'logging_json' => Yii::t('app', 'Logging Json'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('profile_id', $this->profile_id);
		$criteria->compare('slug', $this->slug, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('reference', $this->reference, true);
		$criteria->compare('transaction_id', $this->transaction_id, true);
		$criteria->compare('creation_date', $this->creation_date, true);
		$criteria->compare('product_id', $this->product_id);
		$criteria->compare('product_json', $this->product_json, true);
		$criteria->compare('status_text', $this->status_text, true);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('url_to_open_on_success', $this->url_to_open_on_success, true);
		$criteria->compare('document_id', $this->document_id, true);
		$criteria->compare('document_url', $this->document_url, true);
		$criteria->compare('confirmation_date', $this->confirmation_date, true);
		$criteria->compare('invoice_number', $this->invoice_number, true);
		$criteria->compare('invoice_address', $this->invoice_address, true);
		$criteria->compare('invoice_referer', $this->invoice_referer, true);
		$criteria->compare('invoice_body', $this->invoice_body, true);
		$criteria->compare('caption', $this->caption, true);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('coupon_id', $this->coupon_id);
		$criteria->compare('discount_code', $this->discount_code, true);
		$criteria->compare('amount_ex_vat', $this->amount_ex_vat, true);
		$criteria->compare('discount_amount_ex_vat', $this->discount_amount_ex_vat, true);
		$criteria->compare('discount_amount', $this->discount_amount, true);
		$criteria->compare('total_amount_ex_vat', $this->total_amount_ex_vat, true);
		$criteria->compare('vat_percentage', $this->vat_percentage, true);
		$criteria->compare('vat_amount', $this->vat_amount, true);
		$criteria->compare('total_amount', $this->total_amount, true);
		$criteria->compare('payment_provider', $this->payment_provider, true);
		$criteria->compare('currency', $this->currency, true);
		$criteria->compare('logging_json', $this->logging_json, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
