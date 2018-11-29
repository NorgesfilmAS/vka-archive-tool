<?php
/*
 * the criteria for resource space
 * 
 * builds an array ($links) with all steps in the query. 
 * It overload the standard CDBCriteria and adjust the way the query is build.
 * 
 * 
 */
class RSCriteria extends CDbCriteria
{
	/**
	 * the steps to build the criteria
	 * it's an array of key and column
	 * 
	 * @var array
	 */	
	public $links = array();
	/**
	 * the currently active column in the call between compare and addCondition
	 * 
	 * @var string
	 */
	private $_column = null;
	/**
	 * the currently active table alias between the call compare and addCondition
	 * 
	 * @var string
	 */
	private $_key = 'a';	
	/**
	 * last key used. If null the a is assumed
	 * use by generateKey
	 *  
	 * @var string
	 */
	private $_previousKey = null;

	
	/**
	 * overloaded version of the base class
	 * It changes the 
	 */	
	public function addCondition($condition,$operator='AND')
	{				
		// store the link for the inner join
		$this->links[] = array('key' => $this->_key, 'column' => $this->_column);
		// mark key as used
		$this->_previousKey = $this->_key;
		
		return parent::addCondition($condition, $operator);
	}
	
	/**
	 * overloaded version of the base class
	 */
	public function compare($column, $value, $partialMatch=false, $operator='AND', $escape=true)
	{
		$this->_column = $column;
		$this->_key = $this->generateKey();
		$columnPart = $this->_key .'.value';
		
		return parent::compare($columnPart, $value,$partialMatch, $operator, $escape);
	}

	/**
	 * 
	 * @return string a unique key in the SQL represening an  table link
	 */
	public function generateKey()
  {					
		if ($this->_previousKey === null)
			return 'a';
		return chr(ord($this->_previousKey) + 1);
	}				
}
