<?php

Yii::import('zii.widgets.CListView');

class BootstrapListView extends CListView
{
	public function init() {
		$this->pager = array('class' => 'BootstrapLinkPager');
		$this->summaryCssClass = 'hide-it';
		$this->pagerCssClass = 'pager-unseen';
		return parent::init();
	}
	
}
