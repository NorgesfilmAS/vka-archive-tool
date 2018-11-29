<?php

class ResourceSpaceSelectableBehavior extends SelectableBehavior
{
	public $calculatedNames = array();
	
	/**
	 * translate a formula field to an field id
	 * @param string $attribute
	 */
	public function attribute2name($attribute)
	{
		if (isset( $this->calculatedNames[$attribute])) {
			return $this->calculatedNames[$attribute];
		}
		return false;
	}
}
