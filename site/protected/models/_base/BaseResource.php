<?php

/**
 * This is the model base class for the table "resource".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Resource".
 *
 * Columns in table "resource" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $ref
 * @property string $title
 * @property integer $resource_type
 * @property integer $has_image
 * @property integer $is_transcoding
 * @property integer $hit_count
 * @property integer $new_hit_count
 * @property string $creation_date
 * @property integer $rating
 * @property integer $user_rating
 * @property integer $user_rating_count
 * @property integer $user_rating_total
 * @property string $country
 * @property string $file_extension
 * @property string $preview_extension
 * @property integer $image_red
 * @property integer $image_green
 * @property integer $image_blue
 * @property integer $thumb_width
 * @property integer $thumb_height
 * @property integer $archive
 * @property integer $access
 * @property string $colour_key
 * @property integer $created_by
 * @property string $file_path
 * @property string $file_modified
 * @property string $file_checksum
 * @property integer $request_count
 * @property integer $expiry_notification_sent
 * @property string $preview_tweaks
 * @property double $geo_lat
 * @property double $geo_long
 * @property integer $mapzoom
 * @property integer $disk_usage
 * @property string $disk_usage_last_updated
 * @property string $field12
 * @property string $field8
 * @property string $field3
 * @property integer $file_size
 * @property integer $preview_attempts
 * @property string $field90
 * @property string $field88
 *
 */
abstract class BaseResource extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'resource';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Resource|Resources', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('resource_type, has_image, is_transcoding, hit_count, new_hit_count, rating, user_rating, user_rating_count, user_rating_total, image_red, image_green, image_blue, thumb_width, thumb_height, archive, access, created_by, request_count, expiry_notification_sent, mapzoom, disk_usage, file_size, preview_attempts', 'numerical', 'integerOnly'=>true),
			array('geo_lat, geo_long', 'numerical'),
			array('title, country, field12, field8, field3, field90, field88', 'length', 'max'=>200),
			array('file_extension, preview_extension', 'length', 'max'=>10),
			array('colour_key', 'length', 'max'=>5),
			array('file_path', 'length', 'max'=>500),
			array('file_checksum', 'length', 'max'=>32),
			array('preview_tweaks', 'length', 'max'=>50),
			array('creation_date, file_modified, disk_usage_last_updated', 'safe'),
			array('title, resource_type, has_image, is_transcoding, hit_count, new_hit_count, creation_date, rating, user_rating, user_rating_count, user_rating_total, country, file_extension, preview_extension, image_red, image_green, image_blue, thumb_width, thumb_height, archive, access, colour_key, created_by, file_path, file_modified, file_checksum, request_count, expiry_notification_sent, preview_tweaks, geo_lat, geo_long, mapzoom, disk_usage, disk_usage_last_updated, field12, field8, field3, file_size, preview_attempts, field90, field88', 'default', 'setOnEmpty' => true, 'value' => null),
			array('ref, title, resource_type, has_image, is_transcoding, hit_count, new_hit_count, creation_date, rating, user_rating, user_rating_count, user_rating_total, country, file_extension, preview_extension, image_red, image_green, image_blue, thumb_width, thumb_height, archive, access, colour_key, created_by, file_path, file_modified, file_checksum, request_count, expiry_notification_sent, preview_tweaks, geo_lat, geo_long, mapzoom, disk_usage, disk_usage_last_updated, field12, field8, field3, file_size, preview_attempts, field90, field88', 'safe', 'on'=>'search'),
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
			'ref' => Yii::t('app', 'Ref'),
			'title' => Yii::t('app', 'Title'),
			'resource_type' => Yii::t('app', 'Resource Type'),
			'has_image' => Yii::t('app', 'Has Image'),
			'is_transcoding' => Yii::t('app', 'Is Transcoding'),
			'hit_count' => Yii::t('app', 'Hit Count'),
			'new_hit_count' => Yii::t('app', 'New Hit Count'),
			'creation_date' => Yii::t('app', 'Creation Date'),
			'rating' => Yii::t('app', 'Rating'),
			'user_rating' => Yii::t('app', 'User Rating'),
			'user_rating_count' => Yii::t('app', 'User Rating Count'),
			'user_rating_total' => Yii::t('app', 'User Rating Total'),
			'country' => Yii::t('app', 'Country'),
			'file_extension' => Yii::t('app', 'File Extension'),
			'preview_extension' => Yii::t('app', 'Preview Extension'),
			'image_red' => Yii::t('app', 'Image Red'),
			'image_green' => Yii::t('app', 'Image Green'),
			'image_blue' => Yii::t('app', 'Image Blue'),
			'thumb_width' => Yii::t('app', 'Thumb Width'),
			'thumb_height' => Yii::t('app', 'Thumb Height'),
			'archive' => Yii::t('app', 'Archive'),
			'access' => Yii::t('app', 'Access'),
			'colour_key' => Yii::t('app', 'Colour Key'),
			'created_by' => Yii::t('app', 'Created By'),
			'file_path' => Yii::t('app', 'File Path'),
			'file_modified' => Yii::t('app', 'File Modified'),
			'file_checksum' => Yii::t('app', 'File Checksum'),
			'request_count' => Yii::t('app', 'Request Count'),
			'expiry_notification_sent' => Yii::t('app', 'Expiry Notification Sent'),
			'preview_tweaks' => Yii::t('app', 'Preview Tweaks'),
			'geo_lat' => Yii::t('app', 'Geo Lat'),
			'geo_long' => Yii::t('app', 'Geo Long'),
			'mapzoom' => Yii::t('app', 'Mapzoom'),
			'disk_usage' => Yii::t('app', 'Disk Usage'),
			'disk_usage_last_updated' => Yii::t('app', 'Disk Usage Last Updated'),
			'field12' => Yii::t('app', 'Field12'),
			'field8' => Yii::t('app', 'Field8'),
			'field3' => Yii::t('app', 'Field3'),
			'file_size' => Yii::t('app', 'File Size'),
			'preview_attempts' => Yii::t('app', 'Preview Attempts'),
			'field90' => Yii::t('app', 'Field90'),
			'field88' => Yii::t('app', 'Field88'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('ref', $this->ref);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('resource_type', $this->resource_type);
		$criteria->compare('has_image', $this->has_image);
		$criteria->compare('is_transcoding', $this->is_transcoding);
		$criteria->compare('hit_count', $this->hit_count);
		$criteria->compare('new_hit_count', $this->new_hit_count);
		$criteria->compare('creation_date', $this->creation_date, true);
		$criteria->compare('rating', $this->rating);
		$criteria->compare('user_rating', $this->user_rating);
		$criteria->compare('user_rating_count', $this->user_rating_count);
		$criteria->compare('user_rating_total', $this->user_rating_total);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('file_extension', $this->file_extension, true);
		$criteria->compare('preview_extension', $this->preview_extension, true);
		$criteria->compare('image_red', $this->image_red);
		$criteria->compare('image_green', $this->image_green);
		$criteria->compare('image_blue', $this->image_blue);
		$criteria->compare('thumb_width', $this->thumb_width);
		$criteria->compare('thumb_height', $this->thumb_height);
		$criteria->compare('archive', $this->archive);
		$criteria->compare('access', $this->access);
		$criteria->compare('colour_key', $this->colour_key, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('file_path', $this->file_path, true);
		$criteria->compare('file_modified', $this->file_modified, true);
		$criteria->compare('file_checksum', $this->file_checksum, true);
		$criteria->compare('request_count', $this->request_count);
		$criteria->compare('expiry_notification_sent', $this->expiry_notification_sent);
		$criteria->compare('preview_tweaks', $this->preview_tweaks, true);
		$criteria->compare('geo_lat', $this->geo_lat);
		$criteria->compare('geo_long', $this->geo_long);
		$criteria->compare('mapzoom', $this->mapzoom);
		$criteria->compare('disk_usage', $this->disk_usage);
		$criteria->compare('disk_usage_last_updated', $this->disk_usage_last_updated, true);
		$criteria->compare('field12', $this->field12, true);
		$criteria->compare('field8', $this->field8, true);
		$criteria->compare('field3', $this->field3, true);
		$criteria->compare('file_size', $this->file_size);
		$criteria->compare('preview_attempts', $this->preview_attempts);
		$criteria->compare('field90', $this->field90, true);
		$criteria->compare('field88', $this->field88, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
