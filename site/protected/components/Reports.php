<?php

class Reports extends CComponent
{
	public $reports = array(
			'ArtPerDecennia' => array( // 
			'caption' => 'List of art',
			'selection' => 'List of Art grouped',	
			'model' => 'Art',
			'order' => array(
					0 => array(
							'attribute' => 'decennia',
							'order' => 'asc'
					),
 			),	
			'report' => array(
				'groupHeader' => false,
				'layout' => 'fold',
				'textRaw' => 'Decennia {decennia}, number of artwork <b>{count}</b>',	
				'fields' => array(
					'{decennia}' => 'decennia',
					'{count}'	
				),						
				'groupBody' => array(							
					'groupHeader' => false,
					'groupBody'  => array(
						'layout' => 'column',
						'fields' => array(
							1 => 'year',
							2	=> 'title',
							3	=> 'artist'
						),
					),	
					'groupFooter' => false,	
				),
				'groupFooter' => false,	
			)				
		)
	);
	
	public function open($name) 
	{
		if (!isset($this->reports[$name])) {
			return false;
		}
		$report = new ReportBase();
		$report->definition = $this->reports[$name];
		return $report;
	}
	
}
