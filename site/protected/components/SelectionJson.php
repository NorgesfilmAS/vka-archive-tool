<?php
/**
 * generates the request layout for the selection
 * 
 */
class SelectionJson extends JsonGenerate 
{
	
	public function layout($model, $fields) {
		return $this->run($model, $fields);
	}
	
	public function Art($model, $layout)
	{
		return $this->run($model, array(
			'id', 
			'title',
			'year',	
		));		
	}
}	
