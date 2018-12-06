<?php
/**
 * the configuration file used by the developer to set options
 *
 */
return array(
	'security' => array(
		'label' => 'System security setup definitions',
		'group' => 'setup',
		'items' => array(
			'password' => array(
				'value' => 'password',
				'info' => 'Password used for entering the system setup',
				/**
				 * states of isLocked:
				 *    - 0 : not locked
				 *    - 1 : locked from this level, so this level can unlock
				 *		- 2 : locked on lower level
				 */
			),
		),
	),
	'system' => array(
		'label' => 'Setup of the system',
		'group' => 'setup',
		'items' => array(
				'version' => array(
						'value' => '1.80.00',
						'info' => 'The version number of the application',
						'readOnly' => true,
				),
        'versionText' => array(
						'value' => 'Name changed',
						'readOnly' => true,
        ),
        'rsDirectory' => array(
            'label' => 'RS directory',
            'value' => 'resourcespace7',
            'info' => 'location of resource space directory relative to site. No slashes!'
        ),
        'rsVersion' => array(
            'label' => 'RS version',
            'value' => 'v7',
            'type' => 'dropdown',
            'info' => 'Which resource space version is installed for upgrading',
            'items' => array(
              'v6' => 'Version 6',
              'v7' => 'Version 7'
            ),
        )

		)
  ),
	'db' => array(
		'label' => 'Database used by system',
		'group' => 'setup',
		'items' => array(
			'connectionString' => array(
				'value' => 'mysql:host=127.0.0.1;dbname=vka_db',
				'label' => 'Connection string',
				'bound' => true,
				'info' => 'type of dbconnector (default mysql)=host (default:127.0.0.1);dbname=xxx'
			),
			'username' => array(
				'value' => 'vka',
				'bound' => true,
				'label' => 'Username',
			),
			'password' => array(
				'value' => '!z11doen',
				'bound' => true,
			),
      'artStruct' => array(
        'value' => 0,
        'caption' => 'Generate Database structure',
        'label' => '  ',
        'type' => 'button',
        'info' => 'Generate the structure depending on the Resource Space Field definition',
        'script' => 'window.location = "'.Yii::app()->createUrl('resourceSpace/models').'"',
      ),
		),
	),
	'meta'=> array(
		'label' => 'Page Meta Tags',
    'group' => 'meta',
    'items' => array(
			'productName' => array(
				'value' => 'Archive Tool',
        'label' => 'Product name',
        'info' => 'The name used for the application',
			),
			'description' => array(
        'value' => 'Videokunsarchivet',
        'label' => 'Description',
        'info' => 'The meta description in the header of all pages',
			),
			'keywords' => array(
        'value' => 'Videokunst archive Norge',
        'label' => 'Keywords',
        'info' => 'The meta keywords in the header of all pages',
			),
			'language' => array(
        'value' => 'english',
        'label' => 'Language',
        'info' => 'The meta Language in the header of all pages',
			),
			'languageShort' => array(
        'value' => 'EN',
        'label' => 'Language shortcode',
        'info' => 'The meta Language in the header of all pages',
			),
		),
  ),
	'fixedValues' => array(
		'label' => 'Values fixed to the database (id, etc)',
		'group' => 'setup values',
		'items' => array(
			'artId' => array(
				'value' => 8,
				'label' => 'Type Id Art',
				'info' => 'The id in the Resource_type_field table of the field explaining Art'
			),
			'agentId' => array(
				'value' => 143,
				'label' => 'Type Id Artist',
				'info' => 'The id in the Resource_type_field table of the field explaining Artist'
			),
			'administrator_id' => array(
				'value' => 1,
				'label' => 'Administrator group',
				'info' => 'The is of the Usergroup that holds the administrators (admin interface)',
			),
			'moderator_id' => array(
				'value' => 4,
				'label' => 'Moderator group',
				'info' => 'The is of the Usergroup that holds the moderators (admin interface)',
			),
			'application_name' => array(
				'value' => 'Videokunstarkivet',
				'label' => 'Application name',
				'info' => 'The default name shown in the header of the application',
			),
			'upload_path'	=> array(
				'value' => '/Users/Jaap/Sites/pnek/public_html/site/upload',
				'label' => 'Upload path',
				'info' => 'The path to the FTP upload directory',
			),
			'temp_storage_path' => array(
				'value' => '/Users/Jaap/Sites/pnek/public_html/site/runtime/temp',
				'label' => 'Temp storage path',
				'info' => 'The path where the uploaded files are temporary stored for the processing queue',
			),
			'process_url' => array(
				'value' => 'http://localhost/site/index.php/job/run/',
				'label' => 'Process url',
				'info' => 'The url used by the CRON job to start the process in Resource Space'
			),
			'minAltFileSize' => array(
				'value' => '15000',
				'label' => 'Alt file min size',
				'info' => 'The minimum size of an alternate file'
			),
      'artistGeneral' => array(
				'value' => '11',
				'label' => 'Artist General',
				'info' => 'The id of the group that holds the view rights for the artist'
      ),
      'artistPersonal' => array(
				'value' => '12',
				'label' => 'Artist Group',
				'info' => 'The id of the group that holds the edit rights for the artist'
      )

		)
	),
  'transfer' => array(
		'label' => 'Transfer',
		'group' => 'setup values',
		'items' => array(
			'expire_days' => array(
				'value' => 14,
				'label' => 'Expire in days',
				'info' => 'The number of days it takes to expire a transfer',
			),
      'allow_master' => array(
				'value' => 0,
				'label' => 'Allow masterfile',
				'info' => 'Allow the master file to be transfered',
        'type' => 'checkbox'
      ),
			'mail_subject' => array(
				'value' => 'Videokunst Archivet',
				'label' => 'Mail subject',
				'info' => 'The subject line for the mail send',
			),
      'mail_header' => array(
				'value' => 'Video Kunst Archivet',
				'label' => 'Mail header',
				'info' => 'The header of the mail',
      ),
      'mail_footer' => array(
				'value' => 'Power by the Archive Tool',
				'label' => 'Mail footer',
				'info' => 'The footer of the mail',
      )
    ),
  ),
	'mail' => array(
		'label' => 'Mail system defaults',
		'group' => 'message',
		'items' => array(
			'isBlocked' => array(
				'value' => 0,
				'label' => 'Mail is blocked',
				'info' => 'If true no mail is send by the system. Message are logged',
				'type' => 'checkbox'
			),
			'mailDomains' => array(
				'value' => '',
				'label' => 'Allowed mail domains',
				'info' => 'A , separate list of domains to send to'
			),
			'collector' => array(
				'value' => '',
				'label' => 'Mail collector addr',
				'info' => 'The email address to send all message to who are not part of the mail Domain'
			),
			'mailer' => array(
				'value' => 'MailMessage',
				'label' => 'Mail class',
				'type' => 'dropdown',
				'items' => array(
					'MailMessage' => 'Local server',
					'MailPostmark' => 'Postmark'
				),
				'info' => 'Which mail class to use to send the mail message (MailMessage, MailPostmark)',
			),
			'bounceKey' => array(
				'value' => 'urie3lub-hh0x-lcjm-daln-yfcgx41d',
				'label' => 'Bounce API key',
				'info' => 'The key send by Postmark to indentify the call is real (site/bounce?key=xxxx). If empty: not used.',
			),
			'invite_message_html' => array(
				'value' => '<p>Hi</p><p>This is the invitation to use the Videokunstarkivet.</p><p>You can login using the following information</p><p>{signin}</p><p>Regards<br/>Per Platou</p>',
				'label' => 'Invite message Html',
				'info' => 'The default message to invite an user. Include the {signin} link',
				'type' => 'html',
			),
			'invite_message' => array(
				'value' => "Hi\n\nThis is the invitation to use the Videokunstarkivet.\nYou can login using the following information.\n\n{signin}\n\nRegards\nPer Platou\n",
				'label' => 'Invite message text',
				'info' => 'The default message to invite an user. Include the {signin} link',
				'type' => 'textarea',
			),
      'artist_invite_message' => array(
				'value' => "Hi\n\nThis is the invitation to use the Videokunstarkivet.\nYou can login using the following information.\n\n{signin}\n\nRegards\nPer Platou\n",
				'label' => 'Artist Invitation',
				'info' => 'The default message to invite an artist. Include the {signin} link',
				'type' => 'textarea',
      ),
			'invite_bcc' => array(
				'value' => 'videokunstarkivet@pnek.org',
				'label' => 'Send bcc to',
				'info' => 'Send a bcc of the message to an address',
			),

			'invite_subject' => array(
				'value' => 'Invitation to the Videokunstarkivet',
				'label' => 'Invite subject line',
				'info' => 'The default subject for an invitation',
			),

			'lost_password' => array(
				'value' => "Hi\n\nYou have reset your password. Your password has NOT been changed yet.\n".
									 "Please use the link below to set the new password\n\n{signin}\n\nThe webmaster",
				'label' => 'Password reset body',
				'info' => 'The message send to the user when the password is lost',
				'type' => 'textarea',
			),
      'header' => array (
				'value' => 'Videokunstarkivet',
				'label' => 'Mail header',
				'info' => 'The header send in every mail',
			),
			'footer' => array (
				'value' => 'Videokunst Archive Norway',
				'label' => 'Mail footer',
				'info' => 'The footer send in every mail',
			),
		),
	),
	'postmark' => array(
		'label' => 'Postmark',
		'group' => 'message',
		'items' => array(
			'apiKey'=> array(
				'value' => '',
				'info' => 'Api key given by Postmark',
				'label' => 'Api key'
			),
			'debug' => array(
				'value' => '0',
				'info' => 'Show debug',
				'label' => 'Debug the connection',
				'type' => 'checkbox',
			),
			'from'=> array(
				'value' => '',
				'info' => 'The user sending the mail',
				'label' => 'From person'
			),
			'fromEmail'=> array(
				'value' => 'info@toxus.nl',
				'info' => 'The email adres used for sending the mail',
				'label' => 'From email'
			),
		),
	),
	'help'	 => array(
		'label' => 'Help default',
		'group' => 'message',
		'items' => array(
			'store_system'=> array(
				'value' => 0,
				'type' => 'checkbox',
				'info' => 'Store the help text in the program system directory',
				'label' => 'This is the developement machine. The file  is stored in config.'
			),
		),
	),
	'debug' => array(
		'label' => 'System debug information',
		'group' => 'debug',
		'items' => array(
			'isDevelop' => array(
				'label' => 'Is develop',
				'type' => 'checkbox',
				'info' => 'If 1 the machine does not use any cache',
				'value' => 0,
			),
			'fullError' => array(
				'label' => 'Full error message',
				'type' => 'checkbox',
				'info' => 'Show the full stacktrace to the user',
				'value' => 0,
			),
			'firePHP' => array(
				'label' => 'Use FireBug',
				'type' => 'checkbox',
				'info' => 'Send messages to the browser using the phpFireBug extension',
				'value' => 0,
			),
			'logErrors' => array(
				'label' => 'Log Errors',
				'type' => 'checkbox',
				'info' => 'Log all errors in the database',
				'value' => 0,
			),
			'showAllJobs' => array(
				'label' => 'Show all jobs',
				'type' => 'checkbox',
				'info' => 'Show all jobs even the deleted ones',
				'value' => 0,
			)
		),
	),
	'menus' => array(
		'label' => 'Access to the menus',
		'isEditable' => false,
		'items' => array(
			'art/create' => array(
				'label' => 'Art - Create',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/view' => array(
				'label' => 'Art - Overview',
				'type' => 'checkbox',
				'value' => 'site/lastDigitized',
			),
			'art/agent' => array(
				'label' => 'Art - Artist information',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/artworkInfo' => array(
				'label' => 'Art - Artwork information',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/masterart' => array(
				'label' => 'Art - Master Artwork',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/channels' => array(
				'label' => 'Art - Channels',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/related' => array(
				'label' => 'Art - Related',
				'type' => 'checkbox',
				'value' => 'art/relatedAdd,relatedDelete,art/lookup,art/relatedRemove',
			),
			'art/description' => array(
				'label' => 'Art - Description',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/history' => array(
				'label' => 'Art - History',
				'type' => 'checkbox',
				'value' => 1,
			),
			'art/files' => array(										/* the menu for the file visible */
				'label' => 'Art - Files - menu',
				'type' => 'checkbox',
				'value' => 'art/altcheck',
			),
			'art/files/view' => array(							/* must be set to see anything from the master files */
				'label' => 'Art - Files - Master view',
				'type' => 'checkbox',
				'value' => 'art/master/view,art/preview',
			),
			'art/files/master' => array(						/* on gets extra rights to change the master files */
				'label' => 'Art - Files - Master add',
				'type' => 'checkbox',
				'value' => 'art/download,art/upload,job/reprocess',
			),
			'art/files/master/change' => array(						/* on gets extra rights to change the master files */
				'label' => 'Art - Files - Master change',
				'type' => 'checkbox',
				'value' => 'art/file/change',
			),
			'art/files/owner' => array(
				'label' => 'Art - Files - Artist Files',
				'type' => 'checkbox',
  			'value' => 'art/download,art/upload,art/md5,art/alt-files,art/alt-edit,art/altcheck,art/alternative',
                    // art/changerequest,
      ),
			'art/files/alt' => array(											/* the menu to show the alternate files */
				'label' => 'Art - Files - Alternate files',
				'type' => 'checkbox',
				'value' => 'art/alt-files,art/alternative',
			),
			'art/files/alt/edit' => array(								/* add, delete, download */
				'label' => 'Art - Files - Alternate files edit',
				'type' => 'checkbox',
				'value' => 'art/alt-download,art/alternative,art/altcheck,art/alt-edit',
			),
			'art/files/md5'	=> array(
				'label' => 'Art - Files - MD5 info',
				'type' => 'checkbox',
				'value' => 'art/md5,art/md5generate',
			),
      'art/files/transfer' => array(
				'label' => 'Art - Files - Transfer',
				'type' => 'checkbox',
				'value' => 'transfer/listFiles,art/transfer',
			),
			'art/digitization' => array(
				'label' => 'Art - Ditigitazation',
				'type' => 'checkbox',
				'value' => 'art/attributeLookup',
			),
			'art/logging' => array(
				'label' => 'Art - Logging',
				'type' => 'checkbox',
				'value' => 'art/loggingDialog',
			),
			'agent/view' => array(
				'label' => 'Artist - Overview',
				'type' => 'checkbox',
				'value' => 1,
			),
			'agent/create' => array(
				'label' => 'Artist - Create',
				'type' => 'checkbox',
				'value' => 1,
			),
			'agent/general' => array(
				'label' => 'Artist - General',
				'type' => 'checkbox',
				'value' => 1,
			),
			'agent/description' => array(
				'label' => 'Artist - Description',
				'type' => 'checkbox',
				'value' => 1,
			),
			'agent/biography' => array(
				'label' => 'Artist - Biography',
				'type' => 'checkbox',
				'value' => 1,
			),
			'agent/works' => array(
				'label' => 'Artist - Artworks',
				'type' => 'checkbox',
				'value' => 'art/preview',
			),
			'agent/files' => array(										/* the menu for the file visible */
				'label' => 'Artist - Files - menu',
				'type' => 'checkbox',
				'value' => 'agent/files',
			),
			'agent/files/view' => array(							/* must be set to see anything from the master files */
				'label' => 'Artist - Files - Master view',
				'type' => 'checkbox',
				'value' => 'agent/master/view',
			),
			'agent/files/master' => array(						/* on gets extra rights to change the master files */
				'label' => 'Artist - Files - Master add',
				'type' => 'checkbox',
				'value' => 'agent/download,agent/upload,job/reprocess',
			),
			'agent/files/master/change' => array(						/* on gets extra rights to change the master files */
				'label' => 'Artist - Files - Master change',
				'type' => 'checkbox',
				'value' => 'agent/file/change',
			),
			'agent/files/alt' => array(											/* the menu to show the alternate files */
				'label' => 'Artist - Files - Alternate files',
				'type' => 'checkbox',
				'value' => 'agent/alt-files,agent/alternative',
			),
			'agent/files/alt/edit' => array(								/* add, delete, download */
				'label' => 'Artist - Files - Alternate files edit',
				'type' => 'checkbox',
				'value' => 'agent/alt-download,agent/alternative,agent/altcheck,agent/alt-edit',
			),
			'agent/notes' => array(
				'label' => 'Artist - Notes',
				'type' => 'checkbox',
				'value' => 1,
			),
			'agent/logging' => array(
				'label' => 'Artist - Logging',
				'type' => 'checkbox',
				'value' => 1,
			),
      'agent/artistLogin' => array(   /* invite artist to handle it's own profile */
				'label' => 'Artist - Configure login',
				'type' => 'checkbox',
				'value' => 'agent/artistLogin,agent/sendartistinvitation',
      ),
			'site/search' => array(
				'label' => 'Site - Search',
				'type' => 'checkbox',
				'value' => 1,
			),
			'moderation' => array(
				'label' => 'Moderation - Main menu',
				'type' => 'checkbox',
				'value' => 1,
			),
			'moderation/toggle' => array(
				'label' => 'Moderation - Toggle',
				'type' => 'checkbox',
				'value' => 1,
			),
			'moderation/index' => array(
				'label' => 'Moderation - Overview',
				'type' => 'checkbox',
				'value' => 1,
			),
			'system' => array(
				'label' => 'System - Main menu',
				'type' => 'checkbox',
				'value' => 1,
			),
			'job/index' => array(
				'label' => 'System - Processing queue',
				'type' => 'checkbox',
				'value' => 1,
			),
			'job/endprocess' => array(
				'label' => 'System - Manual end processing job',
				'type' => 'checkbox',
				'value' => 1,
			),
			'logging/index' => array(
				'label' => 'System - General logging',
				'type' => 'checkbox',
				'value' => 1,
			),
			'site/systemInfo' => array(
				'label' => 'System - System info',
				'type' => 'checkbox',
				'value' => 1,
			),
			'site/deleteFiles' => array(
				'label' => 'System - Deleted files',
				'type' => 'checkbox',
				'value' => 1,
			),
			'site/uploadedFiles' => array(
				'label' => 'System - Uploaded files',
				'type' => 'checkbox',
				'value' => 1,
			),
			'site/resourcespace' => array(
				'label' => 'System - Resource Space',
				'type' => 'checkbox',
				'value' => 1,
			),
			'site/testFtp' => array(
				'label' => 'System - Test FTP access',
				'type' => 'checkbox',
				'value' => 1,
			),
			'job/run' => array(
				'label' => 'Job - Run direct',
				'type' => 'checkbox',
				'value' => 1,
			),
			'access/index'	=> array(
				'label' => 'System - Access control',
				'type' => 'checkbox',
				'value' => 1,
			),
		)
	)
);
