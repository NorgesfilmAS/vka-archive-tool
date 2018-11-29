<?php


class LocalConfig 
{
	public static $processUrl = 'http://www.pnek.localhost/site/index.php/job/run/';
	public static $db = array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=pnek_rs_6',							
			// 'connectionString' => 'mysql:host=www.pnek.eu;dbname=pnek_rs4',							
			'username' => 'pnek_rs',	
			'emulatePrepare' => true,
			'password' => '!z11doen',
			'charset' => 'utf8',
		);
	// v1.00.07
	public static $firePhp = 0;
	public static $uploadPath = '/Users/Jaap/Sites/pnek/public_html/site/upload';

}	
