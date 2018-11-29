<?php
/**
 * create the undo information in the db to restore (partially) the changes 
 * made
 * 
 * version 1.0 jvk 26 feb 2014
 */
class Moderation extends CComponent
{
	public $transactionClass = 'UndoTransaction';
	public $transactionStepClass = 'UndoStep';

	/**
	 * the changes to record
	 * @var array
	 */
	private $_changes;
	/**
	 *
	 * @var integer the resource we are working on
	 */
	private $_resourceId;
	/**
	 * the current transaction
	 * 
	 * @var UndoTransaction
	 */
	private $_transaction;
	public function init()
	{
		$this->_changes = array();
		$this->_resourceId = null;
	}
	
	/**
	 * the transaction is started
	 * 
	 * @param integer $resourceId the resource that is about to change
	 */
	public function begin($resourceId)
	{
		$this->_resourceId = $resourceId;
		$this->_changes = array();			
	}
	/**
	 * the transaction has ended we can store it
	 * 
	 * $options array 
	 *    'isRollback' 0|1 to set the type of transaction
	 *		'path' the path used to store
	 */
	public function commit($options=array())
	{
		if ($this->_resourceId == null) {
			throw new CDbException(Yii::t('app', 'There is no resource id defined.'));
		}
		if (count($this->_changes) == 0) {
			return true;
		}
		$tc = $this->transactionClass;
		$this->_transaction = new $tc();
		$this->_transaction->resource_id = $this->_resourceId;
		$this->_transaction->path =  isset($options['path']) ? $options['path'] : (isset(Yii::app()->controller) ? Yii::app()->controller->route : '');
		$this->_transaction->is_rollback = isset($options['isRollback']) ? $options['isRollback'] : 0;
		if (!$this->_transaction->save()) {
			throw new CDbException(Yii::t('app', 'The UndoTransaction could not be created'));
		}
		$ts = $this->transactionStepClass;
		foreach ($this->_changes as $fieldId => $value) {
			$step = new $ts();
			$step->transaction_id = $this->_transaction->id;
			$step->field_id = $fieldId;
			$step->original_value = $value;
			if (!$step->save()) {
				throw new CDbException(Yii::t('app', 'The UndoStep could not be saved.'));
			}
		}
		$this->_changes = array();
	}
	private function stripComma($text)
	{
		if ($text == ',')
			return '';
		return $text;
	}
	
	/**
	 * stores the changes of a field. It remember the previous value
	 * 
	 * @param integer $fieldId	the id of the field
	 * @param string $originalValue 
	 * @param string $newValue
	 */
	public function change($fieldId, $originalValue, $newValue)
	{
		if ($this->stripComma($originalValue) != $this->stripComma($newValue)) {
			$this->_changes[$fieldId] = $originalValue;
		}
	}
	/**
	 * return the current undo transaction or null
	 * 
	 * @return UndoTransaction
	 */
	public function getTransaction()
	{
		return $this->_transaction;
	}
						
}
