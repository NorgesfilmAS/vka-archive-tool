<?php

return  array(
	'model' => 'ResourceRelated',	
	'title' => $this->te('Add related work'),	
	'elements' => array(	
		'related' => array(
			'type' => 'typeahead',
			'url' => $this->createUrl('art/lookup', array('q' => '')),	
			'label' => $this->te('art work'),	
			'width' => 'col-sm-8',	
			'onChange' => '$("#dia-explain").load("'.$this->createUrl('art/info').'/"+$("#dia-related").val());',	
			// displayKey => 'value', 
		),
/*			
		'explain' => array(
			'type' => 'panel',	
			'caption' => '	', //$this->te('	'),	
			'label' => 'Selected art',
		),	
 * 
 */
		'resource' => array(
			'type' => 'hidden',
			'value' => $this->model->id,	
		),				
	),
	'buttons' => 'default',	
);
