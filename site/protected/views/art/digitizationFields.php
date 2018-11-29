<?php
return array(
	'model' => 'Art',	
	'canModerate' => true,	
	'caption' => $this->t('digitalization', true),
		
	'elements' => array(	
		'is_digitized' => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			//'items' => $this->model->isDigitizedOptions,	
      'items' => $this->model->attributeOptions('is_digitized'),	
		),
		'delivered_by' => array(
			'type' => 'typeahead',
			'associative'	 => 0,
			'url' => $this->createUrl('art/attributeLookup', array('field' => 'delivered_by', 'query' => ''))
		),	
		'received_date' => array(
			'type' => 'date',
		),
		'received_by' => array(
			'type' => 'typeahead',
			'associative'	 => 0,
			'url' => $this->createUrl('art/attributeLookup', array('field' => 'received_by', 'query' => ''))				
		),
   'digitizing_location' => array(
			'type' => 'typeahead',
			'associative'	 => 0,
			'url' => $this->createUrl('art/attributeLookup', array('field' => 'digitizing_location', 'query' => ''))				
		),
		'contact_person_digitization' => array(
			'type' => 'typeahead',
			'associative'	 => 0,
			'url' => $this->createUrl('art/attributeLookup', array('field' => 'contact_person_digitization', 'query' => ''))				
		),	   
		'date_send_to_digitization' => array(
			'type' => 'date'	
		),
		
		'return_date_agent' => array(
			'type' => 'date',	
		),
		'archive_date' => array(				
			'type' => 'date',	
		),	
		'digital_masterformat' => array(
			'type' => 'typeahead',
			'associative'	 => 0,
			'url' => $this->createUrl('art/attributeLookup', array('field' => 'digital_masterformat', 'query' => ''))				
		),				
		'digitization_date' => array(
			'type' => 'date',	
		),	
		'file_size' => array(
			'width' => 'col-sm-5',	
		),	
		'digitization_notes' => array(
			'type' => 'textarea',
			'rows' => 1,	
		),
	),	
	'buttons' => 'default',			
);
