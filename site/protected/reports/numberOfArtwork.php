<?php
/**
 * simple report that counts the number of selected works
 * 
 * version 1.0
 */
class NumberOfArt extends ReportBase {
	public $caption = 'Number of Artworks';

	public function init()
	{
		$this->columnCount = 2;
	}
	
	public function body()
	{
	
	}
	public function format()
	{
	  $repNumberArtwork = array(  
			'caption' => 'Art in Archive Tool',
			'selection' => 'Just a list of works',	
			'report' => array(
				'fields' => array(
					'label' => array(
						'type' => 'label',	
						'caption' => 'Number of art in Archive Tool'	
					),
					'count' => array(
						'type'				=> 'calculate',
						'instruction' => 'count',						// count the number of elements	
					)	
				)	
			)
		);	
		$repNumberArtist = array( // 
			'caption' => 'Artist in Archive Tool',
			'selection' => 'List of works grouped on Artist',	
			'report' => array(
				'fields' => array(
					'label' => array(
						'type' => 'label',	
						'caption' => 'Number of artist in Archive Tool'	
					),
					'count' => array(
						'type'				=> 'calculate',
						'instruction' => 'groupcount',						// count the number of elements	
						'field'			  => 1												// which order field to use	
					)	
				)	
			)				
		);
		
		//  L of works made before 1988? after 2002?
		$repListOfArt = array( // 
			'caption' => 'List of art',
			'selection' => 'List of Art ungrouped',	
			'report' => array(
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
				'fields' => array(
					'decenia' => array(
						'type' => 'field',
						'attribute' => 'decennia'	
					)	
				)	
			)				
		);
		$repListOfArtDecennia = array( // 
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
		);		
	}
	
}
