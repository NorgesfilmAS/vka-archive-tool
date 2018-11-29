<?php

class ArtEx extends RSRecordModel
{
	protected $_fieldDefs = array(
		3		=> 'production_country',	
		8		=> 'title',	
		87	=> 'external_id',	
		88	=> 'agent',	
		89	=> 'agent_group',	
		90	=> 'year',	
		92	=> 'format',	
		93	=> 'aspect_ratio',	
		94	=> 'length',	
		95	=> 'color',	
		96	=> 'sound',	
		97	=> 'multi_channel',	
		98	=> 'video_bitrate',			
	);
	
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('production_country', $this->production_country);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('year', $this->year, true);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('title_internal', $this->title_internal, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('is_active', $this->is_active);
		$criteria->compare('max_male', $this->max_male);
		$criteria->compare('max_female', $this->max_female);
		$criteria->compare('max_couples', $this->max_couples);
		$criteria->compare('creation_date', $this->creation_date, true);
		$criteria->compare('modified_date', $this->modified_date, true);

		return new RSDataProvider($this, array(
			'criteria' => $criteria,
		));		
	}
	
}
