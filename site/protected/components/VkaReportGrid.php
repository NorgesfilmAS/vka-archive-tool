<?php

class VkaReportGrid extends ReportGrid
{
	protected function addReportHeader()
	{
		echo '<div class="table-responsive"><table class="table">';
	}
	
	protected function addReportFooter()
	{
		echo '</table></div>';
	}

	protected function addGroupHeader() {
		echo '<tr><td colspan="6"><h3>';
	}
	protected function addGroupField($caption, $value, $definition) {
		if (isset($definition['format'])) {
			switch ($definition['format']) {
				case 'time' :
					$hours = floor($value / (60 * 60));
					$minitues = str_pad(($value / 60) % 60, 2,'0', STR_PAD_LEFT);
					$seconds = str_pad($value % 60, 2, '0', STR_PAD_LEFT);
					$value = $hours.':'.$minitues.':'.$seconds;
					break;
				case 'bytes' :
					$value = Util::sizeText($value);
					break;
			}
		}
		if (isset($definition['label'])) {
			$caption = $definition['label'];
		}
		echo '<span class="field-label">'.CHtml::encode($caption).': </span>'.
				 '<span class="field-value">'.CHtml::encode($value).' </span>&nbsp;';		
	}
	protected function addGroupFooter() {
		echo '</h3></td></tr>';
	}
}
