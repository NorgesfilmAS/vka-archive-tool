<?php

/**
 * export a report as htmp
 */
class ExportHtml extends CComponent
{
	/**
	 * the report using this export routine
	 * @var ReportBase
	 */
	public $report = false;
	
	private $_buffer='';


	public function text($part, $text, $options)
	{
		switch($part) {
			case ReportBase::REP_header :
				$start = '<tr><td colspan="'.$this->report->columnCount.'">';
				$end = '</td></tr>';
				break;
		}		
		$this->_buffer .= $start.$text.$end;
	}	
	
}
