<?php
/**
 * class that search in the RS database
 */
class SearchModel extends CFormModel
{
	public $layout = 'large';
	public $agent=null;
	public $title=null;
	public $year=null;
	
	public function rules()
	{
		return array(
			// username and password are required
			array('agent, title, year, layout', 'safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'layout' => Yii::t('app', 'layout'),	
			'agent' => Yii::t('app', 'agent'),
			'title' => Yii::t('app', 'title'),
			'year'  => Yii::t('app', 'year'),
		);
	}
	
	public function search()
	{
		return new RSDataProvider();
	}
}
