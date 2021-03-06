<?php
/**
	* Generated by ResourceSpace model
	* do not changes this file, update the modelFile
 */

class ArtBase extends RSRecordModel {


	protected $_modelName = 'Art';
	protected $_typeId = 3;
	protected $_defaultSearchOrder = null;

	public function getTypeId() {
		return $this->_typeId;
	}

	protected $_fieldDefs = array(
		'3' => 'production_country',
		'8' => 'title',
		'87' => 'external_id',
		'88' => 'agent',
		'89' => 'agent_group',
		'90' => 'year',
		'92' => 'format',
		'93' => 'aspect_ratio',
		'94' => 'length',
		'95' => 'is_color',
		'96' => 'is_sound',
		'97' => 'multi_channel_sound',
		'99' => 'multi_channel_picture',
		'100' => 'production_period',
		'101' => 'sound',
		'102' => 'subtitles',
		'103' => 'is_installation',
		'104' => 'is_loop',
		'105' => 'edition',
		'106' => 'is_serie',
		'107' => 'producer',
		'109' => 'content',
		'111' => 'tags_gama',
		'112' => 'credits',
		'114' => 'screening_instructions',
		'115' => 'distributor',
		'116' => 'purchased_by',
		'117' => 'screenings',
		'118' => 'reviews',
		'119' => 'awards',
		'120' => 'reference_materials',
		'121' => 'impact_history',
		'122' => 'notes',
		'123' => 'delivered_by',
		'124' => 'received_date',
		'125' => 'received_by',
		'126' => 'contact_person_digitization',
		'127' => 'digital_masterformat',
		'128' => 'file_size',
		'129' => 'date_send_to_digitization',
		'130' => 'received_at_digitizing',
		'131' => 'digitization_notes',
		'132' => 'digitization_date',
		'133' => 'return_date_agent',
		'134' => 'archive_date',
		'135' => 'internal_notes',
		'140' => 'is_digitized',
		'141' => 'is_vka',
		'142' => 'collection',
		'148' => 'digitizing_location',
		'151' => 'agent_id',
		'152' => 'title_no',
		'153' => 'content_no',
		'155' => 'type',
		'156' => 'type_id',
		'157' => 'master_id',
		'164' => 'co_artist',
		'165' => 'original_md5',
		'166' => 'storage_md5',
		'167' => 'uploaded_md5',
	);

	protected $_fieldInfo = array(
		'production_country' => array(
			'typeId' => '9',
			'options' => array('', 'Afghanistan', 'Aland Islands', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua And Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia And Herzegovina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo', 'Congo - The Democratic Republic Of The', 'Cook Islands', 'Costa Rica', 'CÃ´te D\'ivoire', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard Island And Mcdonald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran - Islamic Republic Of', 'Iraq', 'Ireland', 'Isle Of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea - Democratic People\'s Republic Of', 'Korea - Republic Of', 'Kuwait', 'Kyrgyzstan', 'Lao People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macao', 'Macedonia - The Former Yugoslav Republic Of', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia - Federated States Of', 'Moldova - Republic Of', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestinian Territory - Occupied', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'RÃ©union', 'Romania', 'Russian Federation', 'Rwanda', 'Saint BarthÃ©lemy', 'Saint Helena', 'Saint Kitts And Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre And Miquelon', 'Saint Vincent And The Grenadines', 'Samoa', 'San Marino', 'Sao Tome And Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia And The South Sandwich Islands', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard And Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Taiwan - Province Of China', 'Tajikistan', 'Tanzania - United Republic Of', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad And Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks And Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela - Bolivarian Republic Of', 'Viet Nam', 'Virgin Islands - British', 'Virgin Islands - U.S.', 'Wallis And Futuna', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe', 'USA', 'Norge', ''),
		),
		'title' => array(
			'typeId' => '0',
			'options' => null,
		),
		'external_id' => array(
			'typeId' => '0',
			'options' => null,
		),
		'agent' => array(
			'typeId' => '9',
			'options' => null,
		),
		'agent_group' => array(
			'typeId' => '0',
			'options' => null,
		),
		'year' => array(
			'typeId' => '3',
			'options' => array('', 'Unknown-Before 1965', '1965', '1966', '1967', '1968', '1969', '1970', '1971', '1972', '1973', '1974', '1975', '1976', '1977', '1978', '1979', '1980', '1981', '1982', '1983', '1984', '1985', '1986', '1987', '1988', '1989', '1990', '1991', '1992', '1993', '1994', '1995', '1996', '1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', ''),
		),
		'format' => array(
			'typeId' => '3',
			'options' => array('', 'Born digital', 'DVCPRO', 'U-matic', '1 inch', '1/2 inch', 'Betacam', 'Betacam SP', 'Digibeta', 'VHS', 'Video2000', 'Betamax', 'Hi-8', 'Video8', 'mini-DV', 'DVCam', 'HDV', 'DVD', 'Super 8', '16mm', '35 mm', 'U-matic Hi-band', 'U-matic Lo-band', 'VHS Secam-Annet', ''),
		),
		'aspect_ratio' => array(
			'typeId' => '3',
			'options' => array('', '16:9', '4:3', '5:4', '3:2', ''),
		),
		'length' => array(
			'typeId' => '0',
			'options' => null,
		),
		'is_color' => array(
			'typeId' => '3',
			'options' => array('', 'Color', 'Black and White', ''),
		),
		'is_sound' => array(
			'typeId' => '2',
			'options' => array('Yes', 'No', ''),
		),
		'multi_channel_sound' => array(
			'typeId' => '3',
			'options' => array('', 'One Channel sound', 'Multichannel sound'),
		),
		'multi_channel_picture' => array(
			'typeId' => '3',
			'options' => array('', 'One Channel picture', 'Multi Channel picture'),
		),
		'production_period' => array(
			'typeId' => '0',
			'options' => null,
		),
		'sound' => array(
			'typeId' => '0',
			'options' => null,
		),
		'subtitles' => array(
			'typeId' => '0',
			'options' => null,
		),
		'is_installation' => array(
			'typeId' => '2',
			'options' => array('', 'Ja', 'Nei', ''),
		),
		'is_loop' => array(
			'typeId' => '2',
			'options' => array('', 'Ja', 'Nei', ''),
		),
		'edition' => array(
			'typeId' => '0',
			'options' => null,
		),
		'is_serie' => array(
			'typeId' => '0',
			'options' => null,
		),
		'producer' => array(
			'typeId' => '0',
			'options' => null,
		),
		'content' => array(
			'typeId' => '1',
			'options' => null,
		),
		'tags_gama' => array(
			'typeId' => '2',
			'options' => array('', 'Animation', 'ComputerGraphics', 'Dance', 'Documentary', 'Fiction', 'FilmArt', 'HybridArt', 'InstallationArt', 'InteractiveArt', 'Music', 'NetworkArt', 'PerformanceArt', 'Portrait', 'SoftwareArt', 'SoundArt', 'TelevisionArt', 'VideoArt', 'Concert', 'Discussion', 'Exhibition', 'Festival', 'Presentation', 'Seminar', 'Workshop', 'Broadcast', 'Documentation', 'Essay', 'Interview', 'Thesis', 'Feminism', ''),
		),
		'credits' => array(
			'typeId' => '1',
			'options' => null,
		),
		'screening_instructions' => array(
			'typeId' => '0',
			'options' => null,
		),
		'distributor' => array(
			'typeId' => '0',
			'options' => null,
		),
		'purchased_by' => array(
			'typeId' => '1',
			'options' => null,
		),
		'screenings' => array(
			'typeId' => '1',
			'options' => null,
		),
		'reviews' => array(
			'typeId' => '1',
			'options' => null,
		),
		'awards' => array(
			'typeId' => '1',
			'options' => null,
		),
		'reference_materials' => array(
			'typeId' => '1',
			'options' => null,
		),
		'impact_history' => array(
			'typeId' => '1',
			'options' => null,
		),
		'notes' => array(
			'typeId' => '5',
			'options' => null,
		),
		'delivered_by' => array(
			'typeId' => '0',
			'options' => null,
		),
		'received_date' => array(
			'typeId' => '10',
			'options' => null,
		),
		'received_by' => array(
			'typeId' => '0',
			'options' => null,
		),
		'contact_person_digitization' => array(
			'typeId' => '0',
			'options' => null,
		),
		'digital_masterformat' => array(
			'typeId' => '0',
			'options' => null,
		),
		'file_size' => array(
			'typeId' => '0',
			'options' => null,
		),
		'date_send_to_digitization' => array(
			'typeId' => '4',
			'options' => null,
		),
		'received_at_digitizing' => array(
			'typeId' => '4',
			'options' => null,
		),
		'digitization_notes' => array(
			'typeId' => '1',
			'options' => null,
		),
		'digitization_date' => array(
			'typeId' => '10',
			'options' => null,
		),
		'return_date_agent' => array(
			'typeId' => '10',
			'options' => null,
		),
		'archive_date' => array(
			'typeId' => '10',
			'options' => null,
		),
		'internal_notes' => array(
			'typeId' => '5',
			'options' => null,
		),
		'is_digitized' => array(
			'typeId' => '3',
			'options' => array('Unknown', 'Will be digitized', 'Will not be digitized', 'Is Digitized'),
		),
		'is_vka' => array(
			'typeId' => '2',
			'options' => array('', 'Yes', 'No', ''),
		),
		'collection' => array(
			'typeId' => '2',
			'options' => array('', 'Atelier Nord', 'Atopia', 'Fotogalleriet', 'HOK', 'Høstutstillingen', 'KIK', 'Kunstcentralen', 'Nasjonalmuseet', 'Oslo Open', 'Sceneweb', 'Zoolounge', ''),
		),
		'digitizing_location' => array(
			'typeId' => '',
			'options' => null,
		),
		'agent_id' => array(
			'typeId' => '2',
			'options' => null,
		),
		'title_no' => array(
			'typeId' => '',
			'options' => null,
		),
		'content_no' => array(
			'typeId' => '',
			'options' => null,
		),
		'type' => array(
			'typeId' => '2',
			'options' => array('Video', 'Installation', 'Documentation', 'Channel'),
		),
		'type_id' => array(
			'typeId' => '',
			'options' => null,
		),
		'master_id' => array(
			'typeId' => '',
			'options' => null,
		),
		'co_artist' => array(
			'typeId' => '9',
			'options' => null,
		),
		'original_md5' => array(
			'typeId' => '0',
			'options' => null,
		),
		'storage_md5' => array(
			'typeId' => '0',
			'options' => null,
		),
		'uploaded_md5' => array(
			'typeId' => '',
			'options' => null,
		),
	);

	/**
	 *
	 * fields stored in the Keyword, ResourceKeyword tables
	 */
	protected $_keywordFields = array(
		'production_country' => true,
		'title' => true,
		'agent' => true,
		'tags_gama' => true,
		'is_digitized' => true,
	);

	public function rules() {
		return array(
			array('production_country,title,external_id,agent,agent_group,year,format,aspect_ratio'.
			',length,is_color,is_sound,multi_channel_sound,multi_channel_picture,production_period,sound,subtitles,is_installation,is_loop'.
			',edition,is_serie,producer,content,tags_gama,credits,screening_instructions,distributor,purchased_by,screenings'.
			',reviews,awards,reference_materials,impact_history,notes,delivered_by,received_date,received_by,contact_person_digitization,digital_masterformat'.
			',file_size,date_send_to_digitization,received_at_digitizing,digitization_notes,digitization_date,return_date_agent,archive_date,internal_notes,is_digitized,is_vka'.
			',collection,digitizing_location,agent_id,title_no,content_no,type,type_id,master_id,co_artist,original_md5'.
			',storage_md5,uploaded_md5', 'safe'));
	}

	public function search()
	{
		$criteria = new RSCriteria;

		$criteria->compare('production_country', $this->production_country, true);

		$criteria->compare('title', $this->title, true);

		$criteria->compare('external_id', $this->external_id, true);

		$criteria->compare('agent', $this->agent, true);

		$criteria->compare('agent_group', $this->agent_group, true);

		$criteria->compare('year', $this->year, true);

		$criteria->compare('format', $this->format, true);

		$criteria->compare('aspect_ratio', $this->aspect_ratio, true);

		$criteria->compare('length', $this->length, true);

		$criteria->compare('is_color', $this->is_color, true);

		$criteria->compare('is_sound', $this->is_sound, true);

		$criteria->compare('multi_channel_sound', $this->multi_channel_sound, true);

		$criteria->compare('multi_channel_picture', $this->multi_channel_picture, true);

		$criteria->compare('production_period', $this->production_period, true);

		$criteria->compare('sound', $this->sound, true);

		$criteria->compare('subtitles', $this->subtitles, true);

		$criteria->compare('is_installation', $this->is_installation, true);

		$criteria->compare('is_loop', $this->is_loop, true);

		$criteria->compare('edition', $this->edition, true);

		$criteria->compare('is_serie', $this->is_serie, true);

		$criteria->compare('producer', $this->producer, true);

		$criteria->compare('content', $this->content, true);

		$criteria->compare('tags_gama', $this->tags_gama, true);

		$criteria->compare('credits', $this->credits, true);

		$criteria->compare('screening_instructions', $this->screening_instructions, true);

		$criteria->compare('distributor', $this->distributor, true);

		$criteria->compare('purchased_by', $this->purchased_by, true);

		$criteria->compare('screenings', $this->screenings, true);

		$criteria->compare('reviews', $this->reviews, true);

		$criteria->compare('awards', $this->awards, true);

		$criteria->compare('reference_materials', $this->reference_materials, true);

		$criteria->compare('impact_history', $this->impact_history, true);

		$criteria->compare('notes', $this->notes, true);

		$criteria->compare('delivered_by', $this->delivered_by, true);

		$criteria->compare('received_date', $this->received_date, true);

		$criteria->compare('received_by', $this->received_by, true);

		$criteria->compare('contact_person_digitization', $this->contact_person_digitization, true);

		$criteria->compare('digital_masterformat', $this->digital_masterformat, true);

		$criteria->compare('file_size', $this->file_size, true);

		$criteria->compare('date_send_to_digitization', $this->date_send_to_digitization, true);

		$criteria->compare('received_at_digitizing', $this->received_at_digitizing, true);

		$criteria->compare('digitization_notes', $this->digitization_notes, true);

		$criteria->compare('digitization_date', $this->digitization_date, true);

		$criteria->compare('return_date_agent', $this->return_date_agent, true);

		$criteria->compare('archive_date', $this->archive_date, true);

		$criteria->compare('internal_notes', $this->internal_notes, true);

		$criteria->compare('is_digitized', $this->is_digitized, true);

		$criteria->compare('is_vka', $this->is_vka, true);

		$criteria->compare('collection', $this->collection, true);

		$criteria->compare('digitizing_location', $this->digitizing_location, true);

		$criteria->compare('agent_id', $this->agent_id, true);

		$criteria->compare('title_no', $this->title_no, true);

		$criteria->compare('content_no', $this->content_no, true);

		$criteria->compare('type', $this->type, true);

		$criteria->compare('type_id', $this->type_id, true);

		$criteria->compare('master_id', $this->master_id, true);

		$criteria->compare('co_artist', $this->co_artist, true);

		$criteria->compare('original_md5', $this->original_md5, true);

		$criteria->compare('storage_md5', $this->storage_md5, true);

		$criteria->compare('uploaded_md5', $this->uploaded_md5, true);

		$this->beforeSearch($criteria);
		if ($this->_defaultSearchOrder != null) {
			return new RSDataProvider($this, array(
				'criteria' => $criteria,
				'order'=>$this->_defaultSearchOrder,
				'pagination'=>array('pageSize'=>$this->pageSize)));
		 } else {
			return new RSDataProvider($this, array(
				'criteria' => $criteria,
				'pagination'=>array('pageSize'=>$this->pageSize)));
		}
	}

}