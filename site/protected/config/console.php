<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
YiiBase::setPathOfAlias('toxus', dirname(dirname(__FILE__)).'/vendors/toxus');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Archive Tool - Application',

	// preloading 'log' component
	'preload'=>array('config','log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'toxus.extensions.giix-components.*', // giix components			
		'toxus.components.*',	
		'application.runtime.resourcespace.*'	// the models for resource space generated	
	),
		
	// application components
	'components'=>array(
		'db'=> 	array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=pnek_rs_6',							
			'username' => 'pnek_rs',	
			'emulatePrepare' => true,
			'password' => '!z11doen',
			'charset' => 'utf8',
		), 
		// callabel through php yiic migrate --connectionID=dbSite	
		'dbSite'=>  array(
			'class' => 'CDbConnection', 		
			'connectionString' => 'mysql:host=www.pnek.eu;dbname=pnek_rs4',							
			'username' => 'pnek_rs',	
			'emulatePrepare' => true,
			'password' => '!z11doen',
			'charset' => 'utf8',
		),			
			
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error,warning,info',
					'categories'=>'toxus.*',
					'logFile'=>'toxus.process.log',
					'enabled' => true,						
				),
			),
		),
			
		'fixture' => array(
			'class' => 'system.test.CDbFixtureManager',	
		),
		'config' => array(
			'class' => 'PnekConfig',	
		),			
	),		
	'commandMap' => array(
		'fixture' => array(
				'class' => 'toxus.extensions.fixtureHelper.FixtureHelperCommand',
		),
		'message' => array(
			'class' => 'toxus.components.MessageExtCommand'
		)				
	),
/*		
	'params'=>array(
		'processUrl' => LocalConfig::$processUrl
	),		
 * 
 */
);
