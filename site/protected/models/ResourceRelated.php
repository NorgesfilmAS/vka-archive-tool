<?php

Yii::import('application.models._base.BaseResourceRelated');

class ResourceRelated extends BaseResourceRelated
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function rules()
	{
		return array_merge(
				parent::rules(),
				array(
					array('resource, related', 'required','message' => Yii::t('app', 'The artwork should be set.')),
					array('resource+related', 'application.extensions.validators.uniqueMultiColumnValidator' )						
				)		
		);
	}
}
