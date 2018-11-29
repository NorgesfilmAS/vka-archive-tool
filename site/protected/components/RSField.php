<?php

class RSField extends CComponent
{
	public $id;
	public $name;
	public $typeId;
	public $options;
	public $order;
	public $keywordIndex;
	
	private $_caption;
	
	/**
	 * defines the options as an array.
	 * if no elements given null will be set
	 * @param string $options
	 */
	public function defineOptions($options)
	{
		if ($options == null) {
			$this->options = null;
		} else {
			$opt = explode(',', $options);
			$this->options = array();
			foreach ($opt as $element)
				$this->options[] = trim($element);
		}
	}
	public function getOptionText()
	{
		if ($this->options == null)
			return 'null';
		$s = '';
		foreach ($this->options as $option) {
			$s .= ', \''.str_replace(array("'", "\n", "\r"), array("\'", '-', ''), $option)."'";
		}
		return 'array('.substr($s, 2).")";
	}
	
	public function getCaption()
	{
		return $this->_caption;
	}
	public function setCaption($value)
	{
		$this->_caption = $value;
		$this->name = Yii::t('fields', $value);
		if (strpos($this->name, ' ') >= 0) {
			$this->name = strtolower(str_replace(' ', '_', $this->name));
		}
	}
}
