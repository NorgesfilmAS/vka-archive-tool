<?php

class ReportGrid extends CComponent 
{
	public $selection = false; // A Selection object
	
	
	protected $_data = array();
	protected $_current = 0;
	
	protected $_bodyFields = array();
	/**
	 * the names of the group fields
	 * @var array
	 */
	protected $_groupFieldNames = array();
	
	public function run()
	{
		if ($this->selection === false) {
			throw new CException(Yii::t('app', 'There is no selection active'));
		}
		ob_start();
		try {
			$this->_bodyFields = $this->selection->fieldDefinition;
			$this->addReportHeader();
			$data = $this->selection->selectionToArray(); 			// $data is an array of row with first column id and other colums used for grouping
			if (count($data) > 0) {
				$this->loadGroupFields($data);
				$this->processGroup(0, $data);
			}					
			$this->addReportFooter();
		} catch (Exception $e) {
//			ob_end_flush();
			throw $e;
		}	
		return ob_get_flush();
	}

	public function processGroup($currentLevel, &$rows)
	{
		$current = 0;
		if ($currentLevel < count($this->_groupFieldNames)) { // we have more groups
			ob_start();	// buffer all info
			do {
				$groupDef = $this->findGroupDefinition($currentLevel);
				
				$row = $rows[$current];				
				$curr = $row[$this->_groupFieldNames[$currentLevel]];
				$subGroupRows = array();
				while ($current < count($rows) && $curr == $rows[$current][$this->_groupFieldNames[$currentLevel]]) {
					$subGroupRows[] = $rows[$current];
					$current++;
				}
				// $rows is now the first level of the group.
				$this->processHeader($groupDef, $subGroupRows);
				$this->processGroup($currentLevel + 1, $subGroupRows);
				$this->processFooter($groupDef, $subGroupRows);
			} while ($current < count($rows));	
			$result = ob_get_contents();
			ob_end_clean();
			echo $result;
			
		} else {
			$this->processList($rows);
		}
	}
	
	/**
	 * echos the header of this group. It can process all the rows
	 * 
	 * @param type $fieldId the index into the $this->_groupFieldNames
	 * @param type $rows the rows in this group
	 */
	protected function processHeader($groupDef, $rows)
	{
		if (isset($groupDef['fields']) && count($groupDef['fields']) > 0) {
			reset($rows);
			$rowId = key($rows);			
			// it uses the first row as current row if a general field is requested
			$this->addGroupHeader();			
			foreach ($groupDef['fields'] as $field) {

				switch (isset($field['type'])? $field['type'] : 'text') {
					case 'recordcount' :
						$this->addGroupField(Yii::t('app', 'Count'),count($rows), $field);
						break;
					case 'sum' :
						$sum = 0;
						foreach ($rows as $row) {
							$sum += $this->valueFromRow($field['attribute'], $row);
						}
						$this->addGroupField(Yii::t('app', 'Total'), $sum, $field);
						break;
					default : 
						$this->addGroupField(Yii::t('app', $field['label']),$this->valueFromRow($field['attribute'], $rows[$rowId]), $field);
						break;
				}		
				echo $this->emptyRows(2);
			}
			$this->addGroupFooter();
		}
	}
	/**
	 * echos the footer of this group. It can process all the rows
	 * 
	 * @param type $fieldId the index into the $this->_groupFieldNames
	 * @param type $rows the rows in this group
	 */
	
	protected function processFooter($groupDef, $rows)
	{
		// no footer yet active
	}

	/**
	 * returns a string that hold the empty rows (td) for the unused grid items
	 * 
	 * @param type $countUsed
	 * @return string
	 */
	protected function emptyRows($countUsed)
	{
		return '';
	}
	
	/**
	 * process a list of rows. $rows[n][id] is the id of the record
	 * @param array $rows
	 */
	protected function processList($rows)
	{
		if (count($this->_bodyFields) > 0) {  // can be just the sums
			foreach ($rows as $row) {
				echo '<tr>';
				foreach ($this->_bodyFields as $field) {
					echo '<td>'.$this->valueFromRow($field, $row).'</td>';
				}
				$this->emptyRows(count($this->_bodyFields));
				echo "</tr>\n";
			}
		}	
	}
	
	/**
	 * returns the value of the $field in the row
	 * 
	 * @param type $field
	 * @param type $rows
	 */
	protected function valueFromRow($field, &$row)
	{
		if (!isset($row['model'])) {
			$row['model'] = $this->selection->createModel($row['id']);
			if ($row['model'] == null) { // there is no model for this id
				$row['id'] = 0;
				return '';
			}
		}
		$joins = explode('.', $field);
		if (count($joins) == 1) {
			$data = $row['model']->$field;		
			return is_array($data) ? implode(', ',$data) : $data;
		}	elseif (count($joins)==2) { // it's a relation
			if (!isset($row['model-'.$field])) {
				$joinField = $joins[0];
				$joinId = $row['model']->$joinField;	// the id of the record
				$namePart = explode('_', $joins[0]);
				if (count($namePart) != 2) { throw new CDbException(Yii::t('app', 'Could not find relation. ({relation})', array('{relation}'=> $joins[0]))); }
				$className = $namePart[0];
				try {
					if (is_array($joinId)) {
							$row['model-'.$field] = $className::model()->findByPk($joinId[0]);
					} else {
						$row['model-'.$field] = $className::model()->findByPk($joinId);
					}
				} catch (Exception $ex) {
					throw new CDbException(Yii::t('app', 'The relation to {class} could not be found.', array('{class}' => $className)));	
				}
			}
			if (! empty($row['model-'.$field])) {
				$localField = $joins[1];
				return $row['model-'.$field]->$localField;
			}
			return ''; // relation not set
		}
	}
	
	/**
	 * Find the order groups
	 * @returns the fieldnames for the order
	 */
	protected function loadGroupFields(&$data) 
	{
		$first = true;
		$this->_groupFieldNames = array();
		foreach ($data[0] as $fieldname => $value) {
			if ($first) {
				$first = false;
			} elseif (substr($fieldname, 0, 6) == 'order_') {
				$this->_groupFieldNames[] = $fieldname;
			} 
		}
		
	}
	
	protected function findGroupDefinition($level)
	{
		$index = 0;
		$orders = $this->selection->orderDefinition;
		foreach ($orders as $order) {		
			if ($order['order'] == 'group') {
				if ($index == $level) {
					return $order;
				}
				$index++;
			}
		}
		throw new CException('Order level not found');
	}
	
	protected function loadData()
	{
		$this->_data = $this->selection->search(0,array('grouped' => true));
	}

	

	protected function textClear()
	{
		$this->_text = '';
	}
	
	protected function textAppend($text)
	{
		$this->_text .= $text;
	}
	
	protected function addReportHeader()
	{
		echo '<table>';
	}
	protected function addReportFooter()
	{
		echo '</table>';
	}
	protected function addGroupHeader()
	{
		echo '<tr>';
	}
	protected function addGroupFooter()
	{
		echo '</tr>';
	}
	protected function addGroupField($caption, $value, $definition)
	{
		echo '<td class="label">'.$caption.'</td><td class="value">'.$value.'</td>';
	}
	
	
	
}

