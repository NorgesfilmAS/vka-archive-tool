<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
// version: 1.x. Template are suckers
// next to config

YiiBase::setPathOfAlias('toxus', dirname(dirname(__FILE__)).'/vendors/toxus');
// require_once('local.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Home',
	'language' => 'en',		

//	'catchAllRequest' => $_SERVER['REMOTE_ADDR'] == /* '83.98.251.68' */ '127.0.0.1' ? null : array('site/maintenance'),
		
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'toxus.extensions.giix-components.*', // giix components
		'toxus.components.*',	
		'toxus.models.*',		
		'application.runtime.resourcespace.*'	// the models for resource space generated	
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'2bad4u',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'toxus.extensions.giix-core', // giix generators
			),								
		),		
	),
	// security definition:	
	//http://www.larryullman.com/2010/07/20/forcing-login-for-all-pages-in-yii/		
	'behaviors' => array(
    'onBeginRequest' => array(
        'class' => 'toxus.components.RequireLogin',
				'allowedUrl' => array(
						'job/run',
						'site/invitation',
						'setup/*',
						'setup',
						'debug/log',
						'site/info',
						'site/bounce',
						'gii*'
				),
    )
	),			

	'preload'=>array('config','log'),	
		
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class' => 'PnekUser',
			'allowAutoLogin' => true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => true, //,	
			'rules'=>array(

					/* needed to run gii in the wordpress enviroment */	
        'gii'=>'gii',
        'gii/<controller:\w+>'=>'gii/<controller>',
        'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',	
					
				'page/a/<file:.*?>' => 'page/index',	
				'download/<filename:.*?>' => 'site/download',	
				'<controller:\w+>/<id:\d+>'=>'<controller>/index',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',				
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			),
		),

		'db'=> array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=pnek_rs4',							
			'username' => 'pnek_rs',	
			'emulatePrepare' => true,
			'password' => '!z11doen',
			'charset' => 'utf8',
		), // LocalConfig::$db, //include(dirname(__FILE__).'/local.db.php'),
			
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			//'class' => 'LogErrorHandler',
			//'logUrl' => 'debug/log',
			//'appIdent'  => 'pnek',			
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(					
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'error, warning, trace, info',
					'filter'=>'CLogFilter',	
					'enabled' => false,
				),				
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
					'categories'=>'toxus.mail.*',
					'logFile'=>'toxus.info.log',
					'enabled' => true,
				),
				
				// uncomment the following to show log messages on web pages			
        array(
            'class' => 'toxus.extensions.firephp.SFirePHPLogRoute', 
            'levels' => 'error, warning, info, trace',
        ),				
			),
		),
			
		'template' => array(
			'class' => 'application.templates.PnekBaseTemplate',	
		),	
		'pageLog' => array(
			'class' => 'PageLog',
		),	
		'viewRenderer' => array(
			'class' => 'TwigViewRenderer',
			'fileExtension' => '.twig',
			'options' => array(
					'autoescape' => true,
			),
			'extensions' => array(
					//'My_Twig_Extension',
			),
			'globals' => array(
					'html' => 'CHtml',
					'util' => 'Util',
				  'content' => 'ArticleController',
					'user' => 'Yii::app()->user',
					'format' => 'FormatDef',
					'yii' => 'Yii'
			),
			'functions' => array(
					'rot13' => 'str_rot13',
					'file_exists' => 'file_exists',
					'Yii_t' => 'YiiTranslate',
			),
			'filters' => array(
					'jencode' => 'CJSON::encode',
			),
		),
			
		'config' => array(
			'class' => 'PnekConfig',	
		),	
			
		'Paypal' => array(
			'class'=>'ext.paypal.Paypal',
			'apiUsername' => 'chordtrick@toxus.nl',
			'apiPassword' => '12345678',
			'apiSignature' => 'Aeo3fRBVio4Pwo9R_Mb19D3uyhrGJ6B25mX50hw5tfMvMpJGYVBx7sJno0tF',
			'apiLive' => false,
			
			'returnUrl' => 'paypal/confirm/', //regardless of url management component
			'cancelUrl' => 'paypal/cancel/', //regardless of url management component
		),
		'clientScript' => array(
				'class' => 'ClientScript', // 'toxus.extensions.minify.EClientScript',
				'combineScriptFiles' => false, //false, // !YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the script files
				'combineCssFiles' => false, //false, //!YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the css files
				'optimizeScriptFiles' => true, // !YII_DEBUG,	// @since: 1.1
				'optimizeCssFiles' => true, //!YII_DEBUG, // @since: 1.1
		),
		
		'imageCache' => array(
			'class' => 'toxus.components.ImageCache',	
		),	
		
		'curl' => array(
			'class' => 'application.extensions.curl.Curl',	
			'options' => array(
				'timeout' => 0,	
			),	
		),	
		'uploadFileList' => array(
			'class' => 'FileLister',	
		),	
		'diff' => array(
			'class' => 'RSDiff',	
		),
		'queue' => array(	
			'class' => 'QueueStatus',
			'userId' => 15,
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'pnek.eu',
		'appName' => 'PNEK',
		'company-server' => $_SERVER['SERVER_NAME'],	
		'company' => 'Toxus',	
		'companyAddress' => 'Lange Herenvest 20, 2011 BS Haarlem, NL',
		'companyEmail' => 'info@toxus.nl',
		'description' => 'The userinterface for PNEK',	
		'debug' => true,	
		// if mail-blocked = true no mail is send	
		'mail-blocked' => false,
		// only these server are allowed to send to
		'mail-domains' => '', //'toxus.nl,example.com', 	
		// all other mail is send to this address	
		'mail-collector' => 'jaap@toxus.nl',	
			
		'userRoot' => YiiBase::getPathOfAlias('webroot.users'),			
		'image-large-filter' => array('fileTypes' => array('png','jpg','gif')),
		'editor' => 'Jaap van der Kreeft',
		'editor-email' => 'info@toxus.nl',	
		'resourceSpacePath' =>  '../resourcespace', // relative to our webroot
		'resourceSpaceUrl' => 'resourcespace',			// the server / resourcespaceUrl / fileUrl in the page	
		'fileExtensions' => 'jpg,tif,gif,png,jpeg,avi,mp2,mp4,mp3,pdf,flv',	
			
		'firePHP' => 0, //LocalConfig::$firePhp,	
		'videojs' => 1, /* use video.js as player */
		'processUrl' => 'http://www.pnek.localhost/site/index.php/job/run/',	
//		'upload' => '/Users/Jaap/Sites/pnek/public_html/site/upload', /LocalConfig::$uploadPath	
	),
);
