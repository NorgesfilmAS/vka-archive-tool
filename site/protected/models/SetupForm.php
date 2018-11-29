<?php

Yii::import('toxus.models.SetupFormModel');
class SetupForm extends SetupFormModel
{

	public function previousVersion($transactionId, $path=null)
	{
		return array();
	}
	
	public function fieldChanges($path = null)
	{
		return array();
	}
	public function moderationsView($path)
	{
		return array();
	}
	
	public function isVisible($fieldname)
	{
		return true;
	}
	
	public function isEditable($fieldname)
	{
		return true;
	}
}
