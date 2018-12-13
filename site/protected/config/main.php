<?php
YiiBase::setPathOfAlias('toxus', dirname(dirname(__FILE__)).'/vendors/toxus');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR . '..',
	'name' => 'Home',
	'language' => 'en',
	'import' => array(
		'application.models.*',
		'application.components.*',
		'toxus.extensions.giix-components.*',
		'toxus.components.*',
		'toxus.models.*',
		'application.runtime.resourcespace.*'
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'2bad4u',
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'toxus.extensions.giix-core',
			),
		),
	),
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
            'transfer/index',
            'transfer/view',
            'transfer/download',
            'resourcespace/models',
						'gii*'
				),
    )
	),
	'preload'=>array('config','log'),
	'components'=>array(
		'user'=>array(
			'class' => 'PnekUser',
			'allowAutoLogin' => true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => true, //,
			'rules'=>array(
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
			'connectionString' => 'mysql:host=127.0.0.1;dbname=vka_dbXXXX',
			'username' => 'pnek_rs',
			'emulatePrepare' => true,
			'password' => '!z11doen',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
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
					'categories'=>'toxus.rights.*',
					'logFile'=>'toxus.rights.log',
					'enabled' => true,
				),
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
			'returnUrl' => 'paypal/confirm/',
			'cancelUrl' => 'paypal/cancel/',
		),
		'clientScript' => array(
				'class' => 'ClientScript',
				'combineScriptFiles' => false,
				'combineCssFiles' => false,
				'optimizeScriptFiles' => true,
				'optimizeCssFiles' => true,
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
  	'params'=>array(
		'adminEmail'=>'pnek.eu',
		'appName' => 'VKA Archive Tool',
		'company-server' => $_SERVER['SERVER_NAME'],
		'company' => 'Toxus',
		'companyAddress' => 'Lange Herenvest 20, 2011 BS Haarlem, NL',
		'companyEmail' => 'info@toxus.nl',
		'description' => 'The userinterface for PNEK',
		'debug' => true,
		'mail-blocked' => false,
		'mail-domains' => '',
		'mail-collector' => 'jaap@toxus.nl',
		'userRoot' => YiiBase::getPathOfAlias('webroot.users'),
		'image-large-filter' => array('fileTypes' => array('png','jpg','gif')),
		'editor' => 'Jaap van der Kreeft',
		'editor-email' => 'info@toxus.nl',
		'resourceSpacePath' =>  '../resourcespace',
		'resourceSpaceUrl' => 'resourcespace',
		'fileExtensions' => 'jpg,tif,gif,png,jpeg,avi,mp2,mp4,mp3,pdf,flv',
		'videojs' => 1,
		'processUrl' => 'http://www.pnek.localhost/site/index.php/job/run/',
	),
);
