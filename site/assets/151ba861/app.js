/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

var app = angular.module('app', ['dynform', 'ngSanitize'])
		.config(['$httpProvider', function($httpProvider) {
			$httpProvider.defaults.useXDomain = true;
			delete $httpProvider.defaults.headers.common['X-Requested-With'];
		}
]);
/**
 * add any variable to every controller
 */

app.run(function($rootScope, $log)
{
	$rootScope.config = {
		isLoaded : false
	};  
	if (typeof localStorage.deviceGuid === 'undefined') {
		localStorage.deviceGuid = guidGenerator();
	}
	$rootScope.config.deviceGuid = localStorage.deviceGuid;
	$rootScope.config.serverUrl = serverUrl;
	$log.info('Running',$rootScope.config);
	$rootScope.selectionChanged = false;			// called when something change to refresh the shown records (should be event
	$rootScope.config.isLoaded = true;
	$rootScope.errorMessage = '';
});
