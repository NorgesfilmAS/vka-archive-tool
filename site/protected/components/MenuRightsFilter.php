<?php

/**
 * checks that the action is allowed by checking the hasMenu of the current user
 * 
 */
class MenuRightsFilter extends CFilter
{
	
	protected function preFilter($filterChain)
	{
    return true;
		$route = $filterChain->controller->route;
		$p = strpos($route, '/');
		if ($p) { // pages that have a - in the name are dialog pages of the main page
			if ($p == 'help') return true;
		}	
		if (Yii::app()->user->hasMenu($route)) {
			return true;
		} 
		throw new CHttpException(403,'Access denied');
		return false; // false if the action should not be executed
	}
}
