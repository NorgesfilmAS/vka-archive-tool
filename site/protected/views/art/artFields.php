<?php
/**
 * called to create a new art
 */
return array(
	'title' => Yii::t('app','Create a new Artwork'),	
	'canModerate' => true,	
	'model' => 'Art',	
	'labelClass' => 'col-xs-3',
	'controlClass' => 'col-xs-9',	
	'elements' => array(	
		'title' => array(
			'type' => 'text',	
//			'hidden' => ! $this->model->visible('title'),
		),	
		'title_no' => array(
				
		),
	 'type' => array(
			'type' => 'radiobuttonlist',			// yes no unknown	
			'items' => $this->model->attributeOptions('type'),						
		),
		'master_id' => array(
      'type' => 'chosen',
      'items' => $this->model->masterArtList, 
		),	
    'agent_id' => array(
			'type' => 'chosen',	
			'items' => $this->model->getAgentOptions(true),
//			'multi' => 1
		),      
    'year'	 => array(
			'type' => 'mask',	
			'mask' => '9999',
			'width' => 'col-sm-3',					
		),  
		'length' => array(
			'type' => 'mask',
			'mask' => '99:99:99',	
			'width' => 'col-sm-3',	
		),			
		'production_country' => array(
			'type' => 'chosen',
			'items' => $this->model->attributeOptions('production_country', array('sorted' => true)),	
	//		'width' => 'col-lg-5',										
		),
	),
	'buttons' => 'default',		
		
	'onReady' => "
	$('.dia-type').on('change', function(event) {		
		type = $(this).val();
		if (type == 'Channel') {
			$('#dia-group-master_id').show();
		} else {
			$('#dia-group-master_id').hide();
		}
	});
	$('#dia-type-0').attr('checked', 'checked');;
	function hideDiaGroup() {
		$('#dia-group-master_id').hide();
	};
	setTimeout(hideDiaGroup,100);
"	
);
