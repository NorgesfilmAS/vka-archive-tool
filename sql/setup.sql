# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.14)
# Database: vka_db
# Generation Time: 2016-08-04 15:05:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table collection
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection`;

CREATE TABLE `collection` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `public` int(11) DEFAULT '0',
  `theme` varchar(100) DEFAULT NULL,
  `theme2` varchar(100) DEFAULT NULL,
  `theme3` varchar(100) DEFAULT NULL,
  `allow_changes` int(11) DEFAULT '0',
  `cant_delete` int(11) DEFAULT '0',
  `keywords` text,
  `savedsearch` int(11) DEFAULT NULL,
  `home_page_publish` int(11) DEFAULT NULL,
  `home_page_text` text,
  `home_page_image` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `theme` (`theme`),
  KEY `public` (`public`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table collection_keyword
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection_keyword`;

CREATE TABLE `collection_keyword` (
  `collection` int(11) DEFAULT NULL,
  `keyword` int(11) DEFAULT NULL,
  KEY `collection` (`collection`),
  KEY `keyword` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table collection_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection_log`;

CREATE TABLE `collection_log` (
  `date` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `collection` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `resource` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table collection_resource
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection_resource`;

CREATE TABLE `collection_resource` (
  `collection` int(11) DEFAULT NULL,
  `resource` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text,
  `rating` int(11) DEFAULT NULL,
  `use_as_theme_thumbnail` int(11) DEFAULT NULL,
  `purchase_size` varchar(10) DEFAULT NULL,
  `purchase_complete` int(11) DEFAULT '0',
  `purchase_price` decimal(10,2) DEFAULT '0.00',
  `sortorder` int(11) DEFAULT NULL,
  KEY `collection` (`collection`),
  KEY `resource_collection` (`collection`,`resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table collection_savedsearch
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection_savedsearch`;

CREATE TABLE `collection_savedsearch` (
  `collection` int(11) DEFAULT NULL,
  `search` text,
  `restypes` text,
  `archive` int(11) DEFAULT NULL,
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `starsearch` int(11) DEFAULT NULL,
  `result_limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `ref_parent` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `collection_ref` int(11) DEFAULT NULL,
  `resource_ref` int(11) DEFAULT NULL,
  `user_ref` int(11) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website_url` text,
  `body` text,
  `hide` int(1) DEFAULT '0',
  PRIMARY KEY (`ref`),
  KEY `ref_parent` (`ref_parent`),
  KEY `collection_ref` (`collection_ref`),
  KEY `resource_ref` (`resource_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table daily_stat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daily_stat`;

CREATE TABLE `daily_stat` (
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `usergroup` int(11) DEFAULT '0',
  `activity_type` varchar(50) DEFAULT NULL,
  `object_ref` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `external` tinyint(1) DEFAULT NULL,
  KEY `stat_day` (`year`,`month`,`day`),
  KEY `stat_month` (`year`,`month`),
  KEY `stat_usergroup` (`usergroup`),
  KEY `stat_day_activity` (`year`,`month`,`day`,`activity_type`),
  KEY `stat_day_activity_ref` (`year`,`month`,`day`,`activity_type`,`object_ref`),
  KEY `activity_type` (`activity_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table dash_tile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dash_tile`;

CREATE TABLE `dash_tile` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `txt` text,
  `all_users` tinyint(1) DEFAULT NULL,
  `default_order_by` int(11) DEFAULT NULL,
  `url` text,
  `link` text,
  `reload_interval_secs` int(11) DEFAULT NULL,
  `resource_count` int(11) DEFAULT NULL,
  `allow_delete` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table dynamic_tree_node
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dynamic_tree_node`;

CREATE TABLE `dynamic_tree_node` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `resource_type_field` int(11) DEFAULT '0',
  `parent` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `parent` (`parent`),
  KEY `resource_type_field` (`resource_type_field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table external_access_keys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `external_access_keys`;

CREATE TABLE `external_access_keys` (
  `resource` int(11) DEFAULT NULL,
  `access_key` char(10) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `collection` int(11) DEFAULT NULL,
  `request_feedback` int(11) DEFAULT '0',
  `email` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `lastused` datetime DEFAULT NULL,
  `access` int(11) DEFAULT '-1',
  `expires` datetime DEFAULT NULL,
  `usergroup` int(11) DEFAULT NULL,
  KEY `resource` (`resource`),
  KEY `resource_key` (`resource`,`access_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table file_check
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file_check`;

CREATE TABLE `file_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `md5` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `last_checked_date` datetime DEFAULT NULL,
  `resource_id` int(11) NOT NULL DEFAULT '0',
  `alternate_files_json` text,
  `is_valid` tinyint(4) NOT NULL DEFAULT '1',
  `info_json` text,
  `error_json` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_file_check_resource` (`resource_id`),
  KEY `ix_file_check_error` (`is_valid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table info_text
# ------------------------------------------------------------

DROP TABLE IF EXISTS `info_text`;

CREATE TABLE `info_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL DEFAULT '',
  `text` text,
  `html` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_info_text_key` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `info_text` WRITE;
/*!40000 ALTER TABLE `info_text` DISABLE KEYS */;

INSERT INTO `info_text` (`id`, `code`, `text`, `html`)
VALUES
	(1,'Atopia','Atopia (Artist run space for development of Film & Video Art in Norway)\n\nThis is a collection of artists who participated in \"Retrospective – Film and Video Art in \nNorway 1960-90\" (exhibition and book 2011) and other related activities. \nhttp://www.atopia.no','<h4>Atopia</h4>\n<p><i>Artist run space for development of Film &amp; Video Art in Norway</i></p>\n<p>\nThis is a collection of artists who participated in \"Retrospective – Film and Video Art in \nNorway 1960-90\" (exhibition and book 2011) and other related activities. \n</p>\n<a href=\'http://www.atopia.no\' target=\'_blank\'>http://www.atopia.no</a>'),
	(2,'Atelier Nord',NULL,'<h4>Atelier Nord</h4>\n<p>This collection was an early attempt to make a national archive, and consists mainly of works produced or curated by by Atelier Nord 1995-2002.</p>\n<p><a href=\'http://videoarkiv.anart.no\' target=\'_blank\'>videoarkiv.anart.no</a></p>'),
	(3,'HOK','','<h4>HOK</h4>\n<p><i>Henie Onstad Art Center</i></p>\n<p>This institution played a significant role in Norway for the development of a new/inter- disciplinary art scene. The collection consists of video works and documentation of events.</p> \n<p><a href=\'http://www.hok.no\' target=\'_blank\'>www.hok.no</a></p>'),
	(4,'Høstutstillingen',NULL,'<h4>Høstutstillingen</h4>\n<p><i>the Annual Autumn Exhibition</i></p>\n<p>This collection is a list of artists and video works participating in this annual, curated exhibition.</p>\n<p><a href=\'http://hostutstillingen.no\' target=\'_blank\'>hostutstillingen.no</a></p>'),
	(5,'KIK',NULL,'<h4>KIK</h4>\n<p><i>the Artists\' Information Office</i></p>\n<p>List of works that were registered in their database, until the office was terminated in 2010.</p>\n<p><a href=\'http://no.wikipedia.org/wiki/Kunstnernes_Informasjonskontor#KIK-arkivet\' target=\'_blank\'>no.wikipedia.org/wiki/Kunstnernes_Informasjonskontor#KIK-arkivet</a></p>'),
	(6,'Kunstcentralen',NULL,'<h4>Kunstcentralen</h4>\n<p><i>made.no</i></p>\n<p>Private entity who started an initiative to map Electronic Art i Norway 1970 - 2000. This collection contains the list of works registered there before the project was terminated in 2004.</p>\n<p><a href=\'http://kunstcentralen.no\' target=\'_blank\'>kunstcentralen.no</a></p>'),
	(7,'Nasjonalmuseet',NULL,'<h4>Nasjonalmuseet</h4>\n<p><i>the National Museum of Art, Architecture and Design</i></p>\n<p>This is the official list of video works in their collection, plus works included in the exhibition \"Paradox - Positions in Norwegian Video Art 1980 – 2010\" (2013).</p>\n<p><a href=\'http://www.nasjonalmuseet.no\' target=\'_blank\'>www.nasjonalmuseet.no</a></p>\r\r'),
	(8,'Zoolounge',NULL,'<h4>Zoo Lounge</h4>\n<p>Artist bar in Oslo showcasing contemporary video art and performance in the late 1990s.</p>'),
	(9,'Sceneweb',NULL,'<h4>Sceneweb</h4>\n<p><i>Norwegian Performing Arts database</i></p>\n<p><a href=\'http://sceneweb.no\' target=\'_blank\'>sceneweb.no</a></p>'),
	(10,'KHIO',NULL,'<h4>KHIO</h4>'),
	(11,'Bergen kunstmuseum',NULL,'<h4>Bergen kunstmuseum</h4>');

/*!40000 ALTER TABLE `info_text` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ip_lockout
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ip_lockout`;

CREATE TABLE `ip_lockout` (
  `ip` varchar(40) NOT NULL DEFAULT '',
  `tries` int(11) DEFAULT '0',
  `last_try` datetime DEFAULT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ip_lockout` WRITE;
/*!40000 ALTER TABLE `ip_lockout` DISABLE KEYS */;

INSERT INTO `ip_lockout` (`ip`, `tries`, `last_try`)
VALUES
	('127.0.0.1',11,'2016-08-04 16:59:17');

/*!40000 ALTER TABLE `ip_lockout` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table keyword
# ------------------------------------------------------------

DROP TABLE IF EXISTS `keyword`;

CREATE TABLE `keyword` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) DEFAULT NULL,
  `soundex` varchar(50) DEFAULT NULL,
  `hit_count` int(11) DEFAULT '0',
  PRIMARY KEY (`ref`),
  KEY `keyword` (`keyword`),
  KEY `keyword_hit_count` (`hit_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table keyword_related
# ------------------------------------------------------------

DROP TABLE IF EXISTS `keyword_related`;

CREATE TABLE `keyword_related` (
  `keyword` int(11) DEFAULT NULL,
  `related` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table logging
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logging`;

CREATE TABLE `logging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_date` datetime DEFAULT NULL,
  `profile_id` int(11) DEFAULT '0',
  `controller` varchar(255) DEFAULT NULL,
  `model_id` int(11) NOT NULL DEFAULT '0',
  `processing_time` varchar(255) NOT NULL DEFAULT '0',
  `message` text,
  `url` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `error_state` text,
  PRIMARY KEY (`id`),
  KEY `ix_logging_create` (`creation_date`),
  KEY `ix_logging_profile` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table mail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mail`;

CREATE TABLE `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `to` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `message` text,
  `log` text,
  `html_message` text,
  `from_address` varchar(255) DEFAULT NULL,
  `to_address` varchar(255) DEFAULT NULL,
  `reply_to` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message_id` varchar(255) DEFAULT NULL,
  `error_code` varchar(255) DEFAULT NULL,
  `error_curl` varchar(255) DEFAULT NULL,
  `bounce_json` text,
  `is_bounced` tinyint(4) NOT NULL DEFAULT '0',
  `open_json` text,
  `is_inbound` tinyint(4) NOT NULL DEFAULT '0',
  `inbound_json` text,
  `spam_status` text,
  `spam_score` text,
  `spam_tests` text,
  `is_reply_text` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ix_mail_profile_id` (`profile_id`),
  KEY `ix_mail_message_id` (`message_id`),
  KEY `ix_mail_is_bounced` (`is_bounced`),
  KEY `ix_mail_to_address` (`to_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `message` text,
  `url` text,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table plugins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plugins`;

CREATE TABLE `plugins` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `descrip` text,
  `author` varchar(100) DEFAULT NULL,
  `update_url` varchar(100) DEFAULT NULL,
  `info_url` varchar(100) DEFAULT NULL,
  `inst_version` float DEFAULT NULL,
  `config` longblob,
  `config_json` longtext,
  `config_url` varchar(100) DEFAULT NULL,
  `enabled_groups` varchar(200) DEFAULT NULL,
  `priority` int(11) DEFAULT '999',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `plugins` WRITE;
/*!40000 ALTER TABLE `plugins` DISABLE KEYS */;

INSERT INTO `plugins` (`name`, `descrip`, `author`, `update_url`, `info_url`, `inst_version`, `config`, `config_json`, `config_url`, `enabled_groups`, `priority`)
VALUES
	('api_import','Import existing files API','Jaap van der Kreeft (Toxus)','','',0.1,NULL,NULL,'',NULL,999),
	('embedvideo','Provides a function to generate HTML for embeddable video on remote sites.','Dan Huby','','',1,NULL,NULL,'/plugins/embedvideo/pages/setup.php',NULL,999),
	('resourceoftheday','Resource Of The Day - replaces the home page slideshow with a selected resource for the current day.','Montala Limited','','http://www.montala.com',1,NULL,NULL,'/plugins/resourceoftheday/pages/setup.php','',999),
	('videojs','HTML5 Video integration','Tom Gleason','','',1,NULL,NULL,'/plugins/videojs/pages/setup.php',NULL,999);

/*!40000 ALTER TABLE `plugins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table preview_size
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preview_size`;

CREATE TABLE `preview_size` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `id` char(3) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `padtosize` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `internal` int(11) DEFAULT '0',
  `allow_preview` int(11) DEFAULT '0',
  `allow_restricted` int(11) DEFAULT '0',
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `preview_size` WRITE;
/*!40000 ALTER TABLE `preview_size` DISABLE KEYS */;

INSERT INTO `preview_size` (`ref`, `id`, `width`, `height`, `padtosize`, `name`, `internal`, `allow_preview`, `allow_restricted`)
VALUES
	(1,'thm',150,150,0,'Thumbnail',1,1,0),
	(2,'pre',350,350,1,'Preview',1,1,1),
	(3,'scr',850,850,1,'Screen',0,1,0),
	(4,'lpr',2000,2000,0,'Low resolution print',0,0,0),
	(5,'hpr',999999,999999,0,'High resolution print',0,0,0),
	(6,'col',75,75,0,'Collection',1,0,0),
	(7,'mp4',NULL,NULL,0,'mp4',0,0,0);

/*!40000 ALTER TABLE `preview_size` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table processing_job
# ------------------------------------------------------------

DROP TABLE IF EXISTS `processing_job`;

CREATE TABLE `processing_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `creation_date` datetime DEFAULT NULL,
  `started_date` datetime DEFAULT NULL,
  `ended_date` datetime DEFAULT NULL,
  `is_finished` tinyint(4) NOT NULL DEFAULT '0',
  `priority` int(11) DEFAULT '50',
  `job_type_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `alternate_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `original_filename` varchar(255) DEFAULT NULL,
  `new_filename` varchar(255) DEFAULT NULL,
  `action` text,
  `error` int(11) DEFAULT NULL,
  `error_message` text,
  `logging` text,
  `is_send_mail` tinyint(4) NOT NULL DEFAULT '0',
  `is_hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table report
# ------------------------------------------------------------

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `query` text,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;

INSERT INTO `report` (`ref`, `name`, `query`)
VALUES
	(1,'Keywords used in resource edits','select k.keyword \'Keyword\',sum(count) \'Entered Count\' from keyword k,daily_stat d where k.ref=d.object_ref and d.activity_type=\'Keyword added to resource\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\n\ngroup by k.ref order by \'Entered Count\' desc limit 100;\n'),
	(2,'Keywords used in searches','select k.keyword \'Keyword\',sum(count) Searches from keyword k,daily_stat d where k.ref=d.object_ref and d.activity_type=\'Keyword usage\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\n\ngroup by k.ref order by Searches desc\n'),
	(3,'Resource download summary','select r.ref \'Resource ID\',r.view_title_field \'Title\',count(*) Downloads \n\nfrom\n\nresource_log rl\njoin resource r on rl.resource=r.ref\nwhere\nrl.type=\'d\'\nand rl.date>=date(\'[from-y]-[from-m]-[from-d]\') and rl.date<=adddate(date(\'[to-y]-[to-m]-[to-d]\'),1)\ngroup by r.ref order by \'Downloads\' desc'),
	(4,'Resource views','select r.ref \'Resource ID\',r.view_title_field \'Title\',sum(count) Views from resource r,daily_stat d where r.ref=d.object_ref and d.activity_type=\'Resource view\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\n\ngroup by r.ref order by Views desc;\n'),
	(5,'Resources sent via e-mail','select r.ref \'Resource ID\',r.view_title_field \'Title\',sum(count) Sent from resource r,daily_stat d where r.ref=d.object_ref and d.activity_type=\'E-mailed resource\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\n\ngroup by r.ref order by Sent desc;\n'),
	(6,'Resources added to collection','select r.ref \'Resource ID\',r.view_title_field \'Title\',sum(count) Added from resource r,daily_stat d where r.ref=d.object_ref and d.activity_type=\'Add resource to collection\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\n\ngroup by r.ref order by Added desc;\n'),
	(7,'Resources created','select\nrl.date \'Date / Time\',\nconcat(u.username,\' (\',u.fullname,\' )\') \'Created By User\',\ng.name \'User Group\',\nr.ref \'Resource ID\',\nr.view_title_field \'Resource Title\'\n\nfrom\nresource_log rl\njoin resource r on r.ref=rl.resource\nleft outer join user u on rl.user=u.ref\nleft outer join usergroup g on u.usergroup=g.ref\nwhere\nrl.type=\'c\'\nand\nrl.date>=date(\'[from-y]-[from-m]-[from-d]\') and rl.date<=adddate(date(\'[to-y]-[to-m]-[to-d]\'),1)\norder by rl.date'),
	(8,'Resources with zero downloads','select ref \'Resource ID\',view_title_field \'Title\' from resource where ref not in \n\n(\n#Previous query to fetch resource downloads\nselect r.ref from resource r,daily_stat d where r.ref=d.object_ref and d.activity_type=\'Resource download\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\n\ngroup by r.ref\n)'),
	(9,'Resources with zero views','select ref \'Resource ID\',view_title_field \'Title\' from resource where ref not in \n\n(\n#Previous query to fetch resource views\nselect r.ref from resource r,daily_stat d where r.ref=d.object_ref and d.activity_type=\'Resource view\'\n\n# --- date ranges\n# Make sure date is greater than FROM date\nand \n(\nd.year>[from-y]\nor \n(d.year=[from-y] and d.month>[from-m])\nor\n(d.year=[from-y] and d.month=[from-m] and d.day>=[from-d])\n)\n# Make sure date is less than TO date\nand\n(\nd.year<[to-y]\nor \n(d.year=[to-y] and d.month<[to-m])\nor\n(d.year=[to-y] and d.month=[to-m] and d.day<=[to-d])\n)\n\ngroup by r.ref\n)'),
	(10,'Resource downloads by group','select\ng.name \'Group Name\',\ncount(rl.resource) \'Resource Downloads\'\n\nfrom\nresource_log rl\nleft outer join user u on rl.user=u.ref\nleft outer join usergroup g on u.usergroup=g.ref\nwhere\nrl.type=\'d\'\nand rl.date>=date(\'[from-y]-[from-m]-[from-d]\') and rl.date<=adddate(date(\'[to-y]-[to-m]-[to-d]\'),1)\ngroup by g.ref order by \'Resource Downloads\' desc'),
	(11,'Resource download detail','select\nrl.date \'Date / Time\',\nconcat(u.username,\' (\',u.fullname,\' )\') \'Downloaded By User\',\ng.name \'User Group\',\nr.ref \'Resource ID\',\nr.view_title_field \'Resource Title\'\nfrom\nresource_log rl\njoin resource r on r.ref=rl.resource\nleft outer join user u on rl.user=u.ref\nleft outer join usergroup g on u.usergroup=g.ref\nwhere\nrl.type=\'d\'\nand\nrl.date>=date(\'[from-y]-[from-m]-[from-d]\') and rl.date<=adddate(date(\'[to-y]-[to-m]-[to-d]\'),1)\norder by rl.date'),
	(12,'User details including group allocation','select \nu.username \'Username\',\nu.email \'E-mail address\',\nu.fullname \'Full Name\',\nu.created \'Created\',\nu.last_active \'Last Seen\',\ng.name \'Group name\'\n\nfrom user u join usergroup g on u.usergroup=g.ref\n\norder by username;'),
	(13,'Expired Resources','select distinct resource.ref \'Resource ID\',resource.field8 \'Resource Title\',resource_data.value \'Expires\' from resource join resource_data on resource.ref=resource_data.resource join resource_type_field on resource_data.resource_type_field=resource_type_field.ref where resource_type_field.type=6 and value>=date(\'[from-y]-[from-m]-[from-d]\') and value<=adddate(date(\'[to-y]-[to-m]-[to-d]\'),1) and length(value)>0 and resource.ref>0 order by resource.ref;'),
	(14,'Metadata for resources with files','SELECT\r\nrd.resource\r\n,(SELECT GROUP_CONCAT(rdTitle.value SEPARATOR \', \')\r\n FROM resource_data rdTitle\r\n WHERE rdTitle.resource_type_field = 8 and rdTitle.resource = rd.resource) AS \'Tittel\'\r\n\r\n,(SELECT GROUP_CONCAT(rdArtist.value SEPARATOR \', \')\r\n FROM resource_data rdArtist\r\n WHERE rdArtist.resource_type_field = 88 and rdArtist.resource = rd.resource) AS \'Kunstner\'\r\n\r\n,(SELECT GROUP_CONCAT(rdYear.value SEPARATOR \', \')\r\n FROM resource_data rdYear\r\n WHERE rdYear.resource_type_field = 90 and rdYear.resource = rd.resource) AS \'Årstall\'\r\n\r\n ,(SELECT GROUP_CONCAT(rdFormat.value SEPARATOR \', \')\r\n FROM resource_data rdFormat\r\n WHERE rdFormat.resource_type_field = 92 and rdFormat.resource = rd.resource) AS \'Format\'\r\n \r\n ,(SELECT GROUP_CONCAT(rdCol.value SEPARATOR \', \')\r\n FROM resource_data rdCol\r\n WHERE rdCol.resource_type_field = 142 and rdCol.resource = rd.resource) AS \'Collection\'\r\n \r\n\r\n FROM `resource_data` rd\r\nINNER JOIN resource_alt_files rdFiles ON rd.resource = rdFiles.resource\r\nWHERE rd.resource > 0\r\nGROUP BY rd.resource');

/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table report_periodic_emails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `report_periodic_emails`;

CREATE TABLE `report_periodic_emails` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `email_days` int(11) DEFAULT NULL,
  `last_sent` datetime DEFAULT NULL,
  `send_all_users` int(11) DEFAULT NULL,
  `user_groups` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table report_periodic_emails_unsubscribe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `report_periodic_emails_unsubscribe`;

CREATE TABLE `report_periodic_emails_unsubscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `periodic_email_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table request
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `collection` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `request_mode` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `comments` text,
  `expires` date DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `reason` text,
  `reasonapproved` text,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table research_request
# ------------------------------------------------------------

DROP TABLE IF EXISTS `research_request`;

CREATE TABLE `research_request` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `deadline` datetime DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `finaluse` text,
  `resource_types` varchar(50) DEFAULT NULL,
  `noresources` int(11) DEFAULT NULL,
  `shape` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `collection` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `research_collections` (`collection`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource`;

CREATE TABLE `resource` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `resource_type` int(11) DEFAULT NULL,
  `has_image` int(11) DEFAULT '0',
  `is_transcoding` int(11) DEFAULT '0',
  `hit_count` int(11) DEFAULT '0',
  `new_hit_count` int(11) DEFAULT '0',
  `creation_date` datetime DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `user_rating` int(11) DEFAULT NULL,
  `user_rating_count` int(11) DEFAULT NULL,
  `user_rating_total` int(11) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `preview_extension` varchar(10) DEFAULT NULL,
  `image_red` int(11) DEFAULT NULL,
  `image_green` int(11) DEFAULT NULL,
  `image_blue` int(11) DEFAULT NULL,
  `thumb_width` int(11) DEFAULT NULL,
  `thumb_height` int(11) DEFAULT NULL,
  `archive` int(11) DEFAULT '0',
  `access` int(11) DEFAULT '0',
  `colour_key` varchar(5) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `file_modified` datetime DEFAULT NULL,
  `file_checksum` varchar(32) DEFAULT NULL,
  `request_count` int(11) DEFAULT '0',
  `expiry_notification_sent` int(11) DEFAULT '0',
  `preview_tweaks` varchar(50) DEFAULT NULL,
  `geo_lat` double DEFAULT NULL,
  `geo_long` double DEFAULT NULL,
  `mapzoom` int(11) DEFAULT NULL,
  `disk_usage` bigint(20) DEFAULT NULL,
  `disk_usage_last_updated` datetime DEFAULT NULL,
  `field12` varchar(200) DEFAULT NULL,
  `field8` varchar(200) DEFAULT NULL,
  `field3` varchar(200) DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `preview_attempts` int(11) DEFAULT NULL,
  `field90` varchar(200) DEFAULT NULL,
  `field88` varchar(200) DEFAULT NULL,
  `field124` varchar(200) DEFAULT NULL,
  `tmp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `hit_count` (`hit_count`),
  KEY `resource_archive` (`archive`),
  KEY `resource_access` (`access`),
  KEY `resource_type` (`resource_type`),
  KEY `resource_creation_date` (`creation_date`),
  KEY `rating` (`rating`),
  KEY `colour_key` (`colour_key`),
  KEY `has_image` (`has_image`),
  KEY `file_checksum` (`file_checksum`),
  KEY `geo_lat` (`geo_lat`),
  KEY `geo_long` (`geo_long`),
  KEY `disk_usage` (`disk_usage`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_alt_files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_alt_files`;

CREATE TABLE `resource_alt_files` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `resource` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `unoconv` int(11) DEFAULT NULL,
  `alt_type` varchar(100) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_custom_access
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_custom_access`;

CREATE TABLE `resource_custom_access` (
  `resource` int(11) DEFAULT NULL,
  `usergroup` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  `user_expires` date DEFAULT NULL,
  KEY `resource` (`resource`),
  KEY `usergroup` (`usergroup`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_data`;

CREATE TABLE `resource_data` (
  `resource` int(11) DEFAULT NULL,
  `resource_type_field` int(11) DEFAULT NULL,
  `value` mediumtext,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `resource` (`resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_dimensions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_dimensions`;

CREATE TABLE `resource_dimensions` (
  `resource` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT '0',
  `height` int(11) DEFAULT '0',
  `file_size` int(11) DEFAULT '0',
  `resolution` int(11) DEFAULT '0',
  `unit` varchar(11) DEFAULT '0',
  `page_count` int(11) DEFAULT NULL,
  KEY `resource` (`resource`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_keyword
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_keyword`;

CREATE TABLE `resource_keyword` (
  `resource` int(11) DEFAULT NULL,
  `keyword` int(11) DEFAULT NULL,
  `hit_count` int(11) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  `resource_type_field` int(11) DEFAULT '0',
  `new_hit_count` int(11) DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `resource_keyword` (`resource`,`keyword`),
  KEY `resource` (`resource`),
  KEY `keyword` (`keyword`),
  KEY `resource_type_field` (`resource_type_field`),
  KEY `rk_all` (`resource`,`keyword`,`resource_type_field`,`hit_count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_log`;

CREATE TABLE `resource_log` (
  `date` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `resource` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `resource_type_field` int(11) DEFAULT NULL,
  `notes` text,
  `diff` text,
  `usageoption` int(11) DEFAULT NULL,
  `purchase_size` varchar(10) DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT '0.00',
  `access_key` char(50) DEFAULT NULL,
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `previous_value` text,
  PRIMARY KEY (`ref`),
  KEY `resource` (`resource`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_related
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_related`;

CREATE TABLE `resource_related` (
  `resource` int(11) DEFAULT NULL,
  `related` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `resource_related` (`resource`),
  KEY `related` (`related`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table resource_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_type`;

CREATE TABLE `resource_type` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `allowed_extensions` text,
  `order_by` int(11) DEFAULT NULL,
  `config_options` text,
  `tab_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `resource_type` WRITE;
/*!40000 ALTER TABLE `resource_type` DISABLE KEYS */;

INSERT INTO `resource_type` (`ref`, `name`, `allowed_extensions`, `order_by`, `config_options`, `tab_name`)
VALUES
	(3,'Tittel/kunstverk',NULL,NULL,NULL,NULL),
	(4,'Kunstner',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `resource_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resource_type_field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resource_type_field`;

CREATE TABLE `resource_type_field` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(400) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `options` text,
  `order_by` int(11) DEFAULT '0',
  `keywords_index` int(11) DEFAULT '0',
  `partial_index` int(11) DEFAULT '0',
  `resource_type` int(11) DEFAULT '0',
  `resource_column` varchar(50) DEFAULT NULL,
  `display_field` int(11) DEFAULT '1',
  `use_for_similar` int(11) DEFAULT '1',
  `iptc_equiv` varchar(20) DEFAULT NULL,
  `display_template` text,
  `tab_name` varchar(50) DEFAULT NULL,
  `required` int(11) DEFAULT '0',
  `smart_theme_name` varchar(200) DEFAULT NULL,
  `exiftool_field` varchar(200) DEFAULT NULL,
  `advanced_search` int(11) DEFAULT '1',
  `simple_search` int(11) DEFAULT '0',
  `help_text` text,
  `display_as_dropdown` int(11) DEFAULT '0',
  `external_user_access` int(11) DEFAULT '1',
  `autocomplete_macro` text,
  `hide_when_uploading` int(11) DEFAULT '0',
  `hide_when_restricted` int(11) DEFAULT '0',
  `value_filter` text,
  `exiftool_filter` text,
  `omit_when_copying` int(11) DEFAULT '0',
  `tooltip_text` text,
  `regexp_filter` varchar(400) DEFAULT NULL,
  `sync_field` int(11) DEFAULT NULL,
  `display_condition` varchar(400) DEFAULT NULL,
  `onchange_macro` text,
  PRIMARY KEY (`ref`),
  KEY `resource_type` (`resource_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `resource_type_field` WRITE;
/*!40000 ALTER TABLE `resource_type_field` DISABLE KEYS */;

INSERT INTO `resource_type_field` (`ref`, `name`, `title`, `type`, `options`, `order_by`, `keywords_index`, `partial_index`, `resource_type`, `resource_column`, `display_field`, `use_for_similar`, `iptc_equiv`, `display_template`, `tab_name`, `required`, `smart_theme_name`, `exiftool_field`, `advanced_search`, `simple_search`, `help_text`, `display_as_dropdown`, `external_user_access`, `autocomplete_macro`, `hide_when_uploading`, `hide_when_restricted`, `value_filter`, `exiftool_filter`, `omit_when_copying`, `tooltip_text`, `regexp_filter`, `sync_field`, `display_condition`, `onchange_macro`)
VALUES
	(3,'Produksjonsland','Production Country',9,',Afghanistan, Aland Islands, Albania, Algeria, American Samoa, Andorra, Angola, Anguilla, Antarctica, Antigua And Barbuda, Argentina, Armenia, Aruba, Australia, Austria, Azerbaijan, Bahamas, Bahrain, Bangladesh, Barbados, Belarus, Belgium, Belize, Benin, Bermuda, Bhutan, Bolivia, Bosnia And Herzegovina, Botswana, Bouvet Island, Brazil, British Indian Ocean Territory, Brunei Darussalam, Bulgaria, Burkina Faso, Burundi, Cambodia, Cameroon, Canada, Cape Verde, Cayman Islands, Central African Republic, Chad, Chile, China, Christmas Island, Cocos (Keeling) Islands, Colombia, Comoros, Congo, Congo - The Democratic Republic Of The, Cook Islands, Costa Rica, CÃ´te D\'ivoire, Croatia, Cuba, Cyprus, Czech Republic, Denmark, Djibouti, Dominica, Dominican Republic, Ecuador, Egypt, El Salvador, Equatorial Guinea, Eritrea, Estonia, Ethiopia, Falkland Islands (Malvinas), Faroe Islands, Fiji, Finland, France, French Guiana, French Polynesia, French Southern Territories, Gabon, Gambia, Georgia, Germany, Ghana, Gibraltar, Greece, Greenland, Grenada, Guadeloupe, Guam, Guatemala, Guernsey, Guinea, Guinea-Bissau, Guyana, Haiti, Heard Island And Mcdonald Islands, Holy See (Vatican City State), Honduras, Hong Kong, Hungary, Iceland, India, Indonesia, Iran - Islamic Republic Of, Iraq, Ireland, Isle Of Man, Israel, Italy, Jamaica, Japan, Jersey, Jordan, Kazakhstan, Kenya, Kiribati, Korea - Democratic People\'s Republic Of, Korea - Republic Of, Kuwait, Kyrgyzstan, Lao People\'s Democratic Republic, Latvia, Lebanon, Lesotho, Liberia, Libyan Arab Jamahiriya, Liechtenstein, Lithuania, Luxembourg, Macao, Macedonia - The Former Yugoslav Republic Of, Madagascar, Malawi, Malaysia, Maldives, Mali, Malta, Marshall Islands, Martinique, Mauritania, Mauritius, Mayotte, Mexico, Micronesia - Federated States Of, Moldova - Republic Of, Monaco, Mongolia, Montenegro, Montserrat, Morocco, Mozambique, Myanmar, Namibia, Nauru, Nepal, Netherlands, Netherlands Antilles, New Caledonia, New Zealand, Nicaragua, Niger, Nigeria, Niue, Norfolk Island, Northern Mariana Islands, Norway, Oman, Pakistan, Palau, Palestinian Territory - Occupied, Panama, Papua New Guinea, Paraguay, Peru, Philippines, Pitcairn, Poland, Portugal, Puerto Rico, Qatar, RÃ©union, Romania, Russian Federation, Rwanda, Saint BarthÃ©lemy, Saint Helena, Saint Kitts And Nevis, Saint Lucia, Saint Martin, Saint Pierre And Miquelon, Saint Vincent And The Grenadines, Samoa, San Marino, Sao Tome And Principe, Saudi Arabia, Senegal, Serbia, Seychelles, Sierra Leone, Singapore, Slovakia, Slovenia, Solomon Islands, Somalia, South Africa, South Georgia And The South Sandwich Islands, Spain, Sri Lanka, Sudan, Suriname, Svalbard And Jan Mayen, Swaziland, Sweden, Switzerland, Syrian Arab Republic, Taiwan - Province Of China, Tajikistan, Tanzania - United Republic Of, Thailand, Timor-Leste, Togo, Tokelau, Tonga, Trinidad And Tobago, Tunisia, Turkey, Turkmenistan, Turks And Caicos Islands, Tuvalu, Uganda, Ukraine, United Arab Emirates, United Kingdom, United States, United States Minor Outlying Islands, Uruguay, Uzbekistan, Vanuatu, Venezuela - Bolivarian Republic Of, Viet Nam, Virgin Islands - British, Virgin Islands - U.S., Wallis And Futuna, Western Sahara, Yemen, Zambia, Zimbabwe, USA, Norge,  ',180,1,0,3,'country',1,1,'2#101',NULL,NULL,0,NULL,'category,country',1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(8,'title','Title',0,NULL,30,1,0,3,'title',0,1,'2#005',NULL,NULL,1,NULL,'Title',1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(52,'camera','Camera Make / Model',0,NULL,1600,0,0,1,NULL,1,0,NULL,NULL,NULL,0,NULL,'Model',1,0,NULL,0,1,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(54,'source','Source',3,',Digital Camera, Scanned Negative, Scanned Photo',1601,0,0,1,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(71,NULL,'Image Size',0,NULL,1602,0,0,1,NULL,1,1,NULL,NULL,NULL,0,NULL,'imagesize',1,0,NULL,0,1,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(74,NULL,'Internt notat',NULL,NULL,20,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(75,NULL,'Arkivert Statsarkivet',NULL,NULL,10,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(76,NULL,'Avlevert av',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(77,NULL,'Tidspunkt',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(78,NULL,'Mottatt av',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(79,NULL,'Kontaktperson',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(80,NULL,'Digitalt masterformat',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(81,'field81','Filstørrelse',0,NULL,0,0,0,0,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(82,NULL,'Sendt til Norgesfilm',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(83,NULL,'Mottatt av Norgesfilm',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(84,NULL,'Digitaliseringsnotat',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(85,NULL,'Digitalisert dato',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(86,NULL,'Retur kunstner/eier',NULL,NULL,0,0,0,2,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(87,NULL,'External ID',0,NULL,160,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(88,'Kunstner','Artist',9,NULL,80,1,0,3,NULL,1,1,NULL,NULL,NULL,1,NULL,NULL,1,0,'kunstnere(e) / Kunstnergruppe',1,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(89,NULL,'Artist group',0,NULL,100,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(90,NULL,'Year',3,',\r\nUnknown\r\nBefore 1965,\r\n1965,\r\n1966,\r\n1967,\r\n1968,\r\n1969,\r\n1970,\r\n1971,\r\n1972,\r\n1973,\r\n1974,\r\n1975,\r\n1976,\r\n1977,\r\n1978,\r\n1979,\r\n1980,\r\n1981,\r\n1982,\r\n1983,\r\n1984,\r\n1985,\r\n1986,\r\n1987,\r\n1988,\r\n1989,\r\n1990,\r\n1991,\r\n1992,\r\n1993,\r\n1994,\r\n1995,\r\n1996,\r\n1997,\r\n1998,\r\n1999,\r\n2000,\r\n2001,\r\n2002,\r\n2003,\r\n2004,\r\n2005,\r\n2006,\r\n2007,\r\n2008,\r\n2009,\r\n2010,\r\n2011,\r\n2012,\r\n2013,\r\n2014,\r\n2015,',130,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(92,NULL,'Format',3,',\r\nBorn digital,\r\nDVCPRO,\r\nU-matic,\r\n1 inch,\r\n1/2 inch,\r\nBetacam,\r\nBetacam SP,\r\nDigibeta,\r\nVHS,\r\nVideo2000,\r\nBetamax,\r\nHi-8,\r\nVideo8,\r\nmini-DV,\r\nDVCam,\r\nHDV,\r\nDVD,\r\nSuper 8,\r\n16mm,\r\n35 mm, \r\nU-matic Hi-band, \r\nU-matic Lo-band, \r\nVHS Secam\r\nAnnet,',120,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(93,NULL,'Aspect Ratio',3,',\r\n16:9,\r\n4:3,\r\n5:4,\r\n3:2,',240,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(94,NULL,'Length',0,NULL,110,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,'TT:MM:SS eksempel 00:05:10',0,1,NULL,0,0,NULL,NULL,0,NULL,'^([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9])$',NULL,NULL,NULL),
	(95,NULL,'Is Color',3,',\r\nColor,\r\nBlack and White,',250,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(96,NULL,'Is_sound',2,'Yes,\r\nNo,',210,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(97,NULL,'Multi Channel Sound',3,',\r\nOne Channel sound,\r\nMultichannel sound\r\n',220,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(99,NULL,'Multi Channel Picture',3,',\r\nOne Channel picture,\r\nMulti Channel picture',230,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(100,NULL,'Production Period',0,NULL,140,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(101,NULL,'Sound',0,NULL,190,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(102,NULL,'Subtitles',0,NULL,200,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(103,NULL,'Is Installation',2,',\r\nJa,\r\nNei,',280,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(104,NULL,'Loop',2,',\r\nJa,\r\nNei,',260,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(105,NULL,'Edition',0,NULL,290,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(106,NULL,'Is Serie',0,NULL,270,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(107,NULL,'Producer',0,NULL,350,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(109,NULL,'Content',1,NULL,320,0,0,3,NULL,1,1,NULL,'<div class=\"item\" style=\"width:500px;padding:5px;\"><h3>[title]</h3><p>[value]</p></div>\r\n<div class=\"clearerleft\"> </div>',NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(111,'Cat01','Tags (Gama)',2,',\r\nAnimation,\r\nComputerGraphics,\r\nDance,\r\nDocumentary,\r\nFiction,\r\nFilmArt,\r\nHybridArt,\r\nInstallationArt,\r\nInteractiveArt,\r\nMusic,\r\nNetworkArt,\r\nPerformanceArt,\r\nPortrait,\r\nSoftwareArt,\r\nSoundArt,\r\nTelevisionArt,\r\nVideoArt,\r\nConcert,\r\nDiscussion,\r\nExhibition,\r\nFestival,\r\nPresentation,\r\nSeminar,\r\nWorkshop,\r\nBroadcast,\r\nDocumentation,\r\nEssay,\r\nInterview,\r\nThesis,\r\nFeminism,\r\n',330,1,0,3,NULL,1,1,NULL,NULL,NULL,0,'Tags (Gama)',NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(112,NULL,'Credits',1,NULL,340,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(114,NULL,'Screening Instructions',0,NULL,360,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(115,NULL,'Distributor',0,NULL,370,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(116,NULL,'Purchased By',1,NULL,380,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(117,NULL,'Screenings',1,NULL,530,0,0,3,NULL,1,1,NULL,'<div class=\"item\" style=\"width:500px;padding:5px;\"><h3>[title]</h3><p>[value]</p></div>\r\n<div class=\"clearerleft\"> </div>',NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(118,NULL,'Reviews',1,NULL,540,0,0,3,NULL,1,1,NULL,'<div class=\"item\" style=\"width:500px;padding:5px;\"><h3>[title]</h3><p>[value]</p></div>\r\n<div class=\"clearerleft\"> </div>',NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(119,NULL,'Awards',1,NULL,550,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(120,NULL,'Reference Materials',1,NULL,560,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(121,NULL,'Impact History',1,NULL,570,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(122,NULL,'Notes',5,NULL,300,0,0,3,NULL,1,1,NULL,'<div class=\"item\"><h3>[title]</h3><p>[value]</p></div>\r\n\r\n<div class=\"clearerleft\"> </div>',NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(123,NULL,'Delivered By',0,NULL,400,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(124,NULL,'Received Date',10,NULL,410,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(125,NULL,'Received By',0,NULL,420,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(126,NULL,'Contact Person Digitization',0,NULL,480,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(127,NULL,'Digital Masterformat',0,NULL,500,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(128,NULL,'File Size',0,NULL,510,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(129,NULL,'Date Send To Digitization',4,NULL,440,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(130,NULL,'Received At Digitizing',4,NULL,430,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(131,NULL,'Digitization Notes',1,NULL,520,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(132,NULL,'Digitization Date',10,NULL,490,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(133,NULL,'Return Date Agent',10,NULL,460,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(134,NULL,'Archive Date',10,NULL,470,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(135,NULL,'Internal Notes',5,NULL,310,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(136,NULL,'Arkivert Statsarkivet',0,NULL,30,0,0,5,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(137,NULL,'Notater',5,NULL,40,0,0,5,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(138,NULL,'Avlevert av',0,NULL,10,0,0,5,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(139,NULL,'Tidspunkt',4,NULL,20,0,0,5,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(140,'Digitalisering','Is Digitized',3,'Unknown,\r\nWill be digitized, \r\nWill not be digitized,\r\nIs Digitized',390,1,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,1,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(141,NULL,'Is_VKA',2,',\r\nYes,\r\nNo,\r\n',170,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(142,'museer/ samlinger/ kilde','Collection',2,',\r\nAtopia,\r\nAtelier Nord,\r\nHOK,\r\nHøstutstillingen,\r\nSceneweb,\r\nKIK,\r\nKunstcentralen,\r\nNasjonalmuseet,\r\nZoolounge,\r\n',150,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,1,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(143,NULL,'Name',0,NULL,10,1,0,4,NULL,1,1,NULL,NULL,NULL,1,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(144,NULL,'Born',10,NULL,20,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(145,NULL,'Bio',1,NULL,40,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(146,NULL,'Internal Notes',1,NULL,70,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(147,NULL,'Contact Information',1,NULL,50,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(148,NULL,'Digitizing Location',NULL,NULL,450,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(149,NULL,'Notes',1,NULL,60,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(151,NULL,'Agent_id',2,NULL,60,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(152,NULL,'Title_no',NULL,NULL,40,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(153,NULL,'Content_no',NULL,NULL,70,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(155,NULL,'Type',2,'Video,Installation,Documentation,Channel',10,0,0,3,NULL,1,1,NULL,NULL,NULL,1,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(156,NULL,'Type_id',NULL,NULL,20,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(157,NULL,'Master_id',NULL,NULL,50,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(158,NULL,'Deceased',0,NULL,30,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(159,NULL,'Email',NULL,NULL,80,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(160,NULL,'Url',NULL,NULL,90,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(161,NULL,'Address',NULL,NULL,120,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(162,NULL,'Telephone',NULL,NULL,110,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(163,NULL,'Gender',3,',Male,Female',100,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(164,NULL,'Co Artist',9,NULL,90,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(165,NULL,'original_md5',0,NULL,0,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(166,NULL,'storage_md5',0,NULL,0,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(167,NULL,'uploaded_md5',NULL,NULL,0,0,0,3,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(168,NULL,'Is_login_active',2,'No,Yes',140,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(169,NULL,'artist_login_id',2,NULL,141,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(170,NULL,'artist_invite_message',5,NULL,142,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(171,NULL,'login_name',1,NULL,143,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),
	(172,NULL,'login_email',1,NULL,144,0,0,4,NULL,1,1,NULL,NULL,NULL,0,NULL,NULL,1,0,NULL,0,1,NULL,0,0,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `resource_type_field` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table selected_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `selected_item`;

CREATE TABLE `selected_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_1` varchar(255) DEFAULT NULL,
  `order_2` varchar(255) DEFAULT NULL,
  `order_3` varchar(255) DEFAULT NULL,
  `order_4` varchar(255) DEFAULT NULL,
  `order_5` varchar(255) DEFAULT NULL,
  `order_6` varchar(255) DEFAULT NULL,
  `order_7` varchar(255) DEFAULT NULL,
  `order_8` varchar(255) DEFAULT NULL,
  `order_9` varchar(255) DEFAULT NULL,
  `order_10` varchar(255) DEFAULT NULL,
  `field_1` varchar(255) DEFAULT NULL,
  `field_2` varchar(255) DEFAULT NULL,
  `field_3` varchar(255) DEFAULT NULL,
  `field_4` varchar(255) DEFAULT NULL,
  `field_5` varchar(255) DEFAULT NULL,
  `field_6` varchar(255) DEFAULT NULL,
  `field_7` varchar(255) DEFAULT NULL,
  `field_8` varchar(255) DEFAULT NULL,
  `field_9` varchar(255) DEFAULT NULL,
  `field_10` varchar(255) DEFAULT NULL,
  `field_11` varchar(255) DEFAULT NULL,
  `field_12` varchar(255) DEFAULT NULL,
  `field_13` varchar(255) DEFAULT NULL,
  `field_14` varchar(255) DEFAULT NULL,
  `field_15` varchar(255) DEFAULT NULL,
  `field_16` varchar(255) DEFAULT NULL,
  `field_17` varchar(255) DEFAULT NULL,
  `field_18` varchar(255) DEFAULT NULL,
  `field_19` varchar(255) DEFAULT NULL,
  `field_20` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_selected_unique` (`guid`,`item_id`),
  KEY `ix_selected_item` (`guid`,`order_1`,`order_2`,`order_3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table site_text
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_text`;

CREATE TABLE `site_text` (
  `page` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `text` text,
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) DEFAULT NULL,
  `ignore_me` int(11) DEFAULT NULL,
  `specific_to_group` int(11) DEFAULT NULL,
  `custom` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_text` WRITE;
/*!40000 ALTER TABLE `site_text` DISABLE KEYS */;

INSERT INTO `site_text` (`page`, `name`, `text`, `ref`, `language`, `ignore_me`, `specific_to_group`, `custom`)
VALUES
	('collection_public','introtext','Public collections are created by other users.',1,'en',NULL,NULL,NULL),
	('all','searchpanel','Search using descriptions, keywords and resource numbers',2,'en',NULL,NULL,NULL),
	('home','themes','The very best resources, hand picked and grouped.',3,'en',NULL,NULL,NULL),
	('home','mycollections','Organise, collaborate & share your resources. Use these tools to help you work more effectively.',4,'en',NULL,NULL,NULL),
	('home','help','Help and advice to get the most out of ResourceSpace.',5,'en',NULL,NULL,NULL),
	('home','welcometitle','Welcome to Archive Tool',6,'en',NULL,NULL,NULL),
	('home','welcometext','Videokunstarkivet is a pilot project initiated by Arts Council Norway in 2011. The archive is developed by PNEK (Production Network for Electronic Art) in the years 2012-2015',7,'en',NULL,NULL,NULL),
	('themes','introtext','Themes are groups of resources that have been selected by the administrators to provide an example of the resources available in the system.',8,'en',NULL,NULL,NULL),
	('edit','multiple','Please select which fields you wish to overwrite. Fields you do not select will be left untouched.',9,'en',NULL,NULL,NULL),
	('team_archive','introtext','To edit individual archive resources, simply search for the resource, and click edit in the �??Resource Tool�?? panel on the resource screen. All resources that are ready to be archived are listed Resources Pending list. From this list it is possible to add further information and transfer the resource record into the archive. ',10,'en',NULL,NULL,NULL),
	('research_request','introtext','Our professional researchers are here to assist you in finding the very best resources for your projects. Complete this form as thoroughly as possible so we�??re able to meet your criteria accurately. <br><br>A member of the research team will be assigned to your request. We�??ll keep in contact via email throughout the process, and once we�??ve completed the research you�??ll receive an email with a link to all the resources that we recommend.  ',11,'en',NULL,NULL,NULL),
	('collection_manage','introtext','Organise and manage your work by grouping resources together. Create �??Collections�?? to suit your way of working. You may want to group resources under projects that you are working on independently, share resources amongst a project team or simply keep your favourite resources together in one place. All the collections in your list appear in the �??My Collections�?? panel at the bottom of the screen.',12,'en',NULL,NULL,NULL),
	('collection_manage','findpublic','Public collections are groups of resources made widely available by users of the system. Enter a collection ID, or all or part of a collection name or username to find public collections. Add them to your list of collections to access the resources.',13,'en',NULL,NULL,NULL),
	('team_home','introtext','Welcome to the team centre. Use the links below to administer resources, respond to resource requests, manage themes and alter system settings.',14,'en',NULL,NULL,NULL),
	('help','introtext','Get the most out of ResourceSpace. These guides will help you use the system and the resources more effectively. </p>\n\n\n\n<p>Use \"Themes\" to browse resources by theme or use the simple search box to search for specific resources.</p>\n\n\n<p><a href=\"http://www.montala.net/downloads/resourcespace-GettingStarted.pdf\">Download the user guide (PDF file)</a>\n\n\n<p><a target=\"_blank\" href=\"http://wiki.resourcespace.org/index.php/Main_Page\">Online Documentation (Wiki)</a>',15,'en',NULL,NULL,NULL),
	('terms and conditions','terms and conditions','Your terms and conditions go here.',16,'en',NULL,NULL,NULL),
	('contribute','introtext','You can contribute your own resources. When you initially create a resource it is in the \"Pending Submission\" status. When you have uploaded your file and edited the fields, set the status field to \"Pending Review\". It will then be reviewed by the resources team.',17,'en',NULL,NULL,NULL),
	('done','user_password','An e-mail containing your username and password has been sent.',18,'en',NULL,NULL,NULL),
	('user_password','introtext','Enter your e-mail address and your username and password will be sent to you.',19,'en',NULL,NULL,NULL),
	('edit','batch',NULL,20,'en',NULL,NULL,NULL),
	('team_copy','introtext','Enter the ID of the resource you would like to copy. Only the resource data will be copied - any uploaded file will not be copied.',21,'en',NULL,NULL,NULL),
	('delete','introtext','Please enter your password to confirm that you would like to delete this resource.',22,'en',NULL,NULL,NULL),
	('team_report','introtext','Please choose a report and a date range. The report can be opened in Microsoft Excel or similar spreadsheet application.',23,'en',NULL,NULL,NULL),
	('terms','introtext','Before you proceed you must accept the terms and conditions.\n\n',24,'en',NULL,NULL,NULL),
	('download_progress','introtext','Your download will start shortly. When your download completes, use the links below to continue.',25,'en',NULL,NULL,NULL),
	('view','storyextract','Story extract:',26,'en',NULL,NULL,NULL),
	('contact','contact','Your contact details here.',27,'en',NULL,NULL,NULL),
	('search_advanced','introtext','<strong>Search Tip</strong><br>Any section that you leave blank, or unticked will include ALL those terms in the search. For example, if you leave all the country boxes empty, the search will return results from all those countries. ',28,'en',NULL,NULL,NULL),
	('all','researchrequest','Let our resources team find the resources you need.',29,'en',NULL,NULL,NULL),
	('done','research_request','A member of the research team will be assigned to your request. We�??ll keep in contact via email throughout the process, and once we�??ve completed the research you�??ll receive an email with a link to all the resources that we recommend.',30,'en',NULL,NULL,NULL),
	('done','collection_email','An email containing a link to the collection has been sent to the users you specified. The collection has been added to their \'Collections\' list.',31,'en',NULL,NULL,NULL),
	('done','resource_email','An email containing a link to the resource has been sent to the users you specified.',32,'en',NULL,NULL,NULL),
	('themes','manage','Organise and edit the themes available online. Themes are specially promoted collections. <br><br> <strong>1 To create a new entry under a Theme -  build a collection</strong><br> Choose <strong>My Collections</strong> from the main top menu and set up a brand new <strong>public</strong> collection. Remember to include a theme name during the setup. Use an existing theme name to group the collection under a current theme (make sure you type it exactly the same), or choose a new title to create a brand new theme. Never allow users to add/remove resources from themed collections. <br> <br><strong>2 To edit the content of an existing entry under a theme </strong><br> Choose <strong>edit collection</strong>. The items in that collection will appear in the <strong>My Collections</strong> panel at the bottom of the screen. Use the standard tools to edit, remove or add resources. <br> <br><strong>3 To alter a theme name or move a collection to appear under a different theme</strong><br> Choose <strong>edit properties</strong> and edit theme category or collection name. Use an existing theme name to group the collection under an current theme (make sure you type it exactly the same), or choose a new title to create a brand new theme. <br> <br><strong>4 To remove a collection from a theme </strong><br> Choose <strong>edit properties</strong> and delete the words in the theme category box. ',33,'en',NULL,NULL,NULL),
	('terms','terms','Your terms and conditions go here.',34,'en',NULL,NULL,NULL),
	('done','resource_request','Your request has been submitted and we will be in contact shortly.',35,'en',NULL,NULL,NULL),
	('user_request','introtext','Please complete the form below to request a user account.',36,'en',NULL,NULL,NULL),
	('themes','findpublic','Public collections are collections of resources that have been shared by other users.',37,'en',NULL,NULL,NULL),
	('done','user_request','Your request for a user account has been sent. Your login details will be sent to you shortly.',38,'en',NULL,NULL,NULL),
	('about','about','Videokunstarkivet',39,'en',NULL,NULL,NULL),
	('team_content','introtext',NULL,40,'en',NULL,NULL,NULL),
	('done','deleted','The resource has been deleted.',41,'en',NULL,NULL,NULL),
	('upload','introtext',NULL,42,'en',NULL,NULL,NULL),
	('home','restrictedtitle','<h1>Video Art Archive</h1>',43,'en',NULL,NULL,NULL),
	('home','restrictedtext','Please click on the link that you were e-mailed to access the resources selected for you.',44,'en',NULL,NULL,NULL),
	('resource_email','introtext','Quickly share this resource with other users by email. A link is automatically sent out. You can also include any message as part of the email.',45,'en',NULL,NULL,NULL),
	('team_resource','introtext','Add individual resources or batch upload resources. To edit individual resources, simply search for the resource, and click edit in the �??Resource Tool�?? panel on the resource screen.',46,'en',NULL,NULL,NULL),
	('team_user','introtext','Use this section to add, remove and modify users.',47,'en',NULL,NULL,NULL),
	('team_research','introtext','Organise and manage �??Research Requests�??. <br><br>Choose �??edit research�?? to review the request details and assign the research to a team member. It is possible to base a research request on a previous collection by entering the collection ID in the �??edit�?? screen. <br><br>Once the research request is assigned, choose �??edit collection�?? to add the research request to �??My collection�?? panel. Using the standard tools, it is then possible to add resources to the research. <br><br>Once the research is complete, choose �??edit research�??,  change the status to complete and an email is automatically  sent to the user who requested the research. The email contains a link to the research and it is also automatically added to their �??My Collection�?? panel.',48,'en',NULL,NULL,NULL),
	('collection_edit','introtext','Organise and manage your work by grouping resources together. Create �??Collections�?? to suit your way of working.\n\n<br>\n\nAll the collections in your list appear in the �??My Collections�?? panel at the bottom of the screen\n\n<br><br>\n\n<strong>Private Access</strong> allows only you and and selected users to see the collection. Ideal for grouping resources under projects that you are working on independently and share resources amongst a project team.\n\n<br><br>\n\n<strong>Public Access</strong> allows all users of the system to search and see the collection. Useful if you wish to share collections of resources that you think others would benefit from using.\n\n<br><br>\n\nYou can choose whether you allow other users (public or users you have added to your private collection) to add and remove resources or simply view them for reference.',49,'en',NULL,NULL,NULL),
	('team_stats','introtext','Charts are generated on demand based on live data. Tick the box to print all charts for your selected year.',50,'en',NULL,NULL,NULL),
	('resource_request','introtext','The resource you requested is not available online. The resource information is automatically included in the email but you can add additional comments if you wish.',51,'en',NULL,NULL,NULL),
	('team_batch','introtext',NULL,52,'en',NULL,NULL,NULL),
	('team_batch_upload','introtext',NULL,53,'en',NULL,NULL,NULL),
	('team_batch_select','introtext',NULL,54,'en',NULL,NULL,NULL),
	('download_click','introtext','To download the resource file, right click the link below and choose \"Save As...\". You will then be asked where you would like to save the file. To open the file in your browser simply click the link.',55,'en',NULL,NULL,NULL),
	('collection_manage','newcollection','To create a new collection, enter a short name.',56,'en',NULL,NULL,NULL),
	('collection_email','introtext','Complete the form below to e-mail this collection. The user(s) will receive a link to the resource rather than file attachments so they can choose and download the appropriate resources.',57,'en',NULL,NULL,NULL),
	('all','footer','Powered by <a target=\"_top\" href=\"http://www.resourcespace.org/\">ResourceSpace</a>: Open Source Digital Asset Management',58,'en',NULL,NULL,NULL),
	('change_language','introtext','Please select your language below.',59,'en',NULL,NULL,NULL),
	('all','searchpanel','Search using descriptions, keywords and resource numbers',60,'es',NULL,NULL,NULL),
	('all','footer','Accionado por el <a href=\"http://www.resourcespace.org/\">ResourceSpace</a>',61,'es',NULL,NULL,NULL),
	('all','researchrequest','Let our resources team find the resources you need.',62,'es',NULL,NULL,NULL),
	('delete','introtext',NULL,68,'es',NULL,NULL,NULL),
	('contribute','introtext','You can contribute your own resources. When you initially create a resource it is in the \"Pending Submission\" status. When you have uploaded your file and edited the fields, set the status field to \"Pending Review\". It will then be reviewed by the resources team.',69,'es',NULL,NULL,NULL),
	('done','deleted','The resource has been deleted.',70,'es',NULL,NULL,NULL),
	('change_password','introtext','Enter a new password below to change your password.',71,'en',NULL,NULL,NULL),
	('collection_manage','findpublic','Public collections are groups of resources made widely available by users of the system. Enter a collection ID, or all or part of a collection name or username to find public collections. Add them to your list of collections to access the resources.',72,'es',NULL,NULL,NULL),
	('themes','findpublic','Powered by <a href=\"http://www.resourcespace.org/\">ResourceSpace</a>',73,'es',NULL,NULL,NULL),
	('login','welcomelogin','Welcome to ResourceSpace, please log in...',74,'en',NULL,NULL,NULL),
	('all','footer','Desarrollado por <a href=\"http://www.resourcespace.org/\">ResourceSpace</a>',75,'es',NULL,NULL,NULL),
	('all','researchrequest','Pídenos fotografías, vídeos o testimonios.',76,'es',NULL,NULL,NULL),
	('contact','contact','Introduce aquí tus datos de contacto.',77,'es',NULL,NULL,NULL),
	('collection_manage','newcollection','Para crear una nueva colección, introduce un nombre.',78,'es',NULL,NULL,NULL),
	('delete','introtext','Por favor, introduce tu contraseña para confirmar que quieres borrar este contenido.',79,'es',NULL,NULL,NULL),
	('done','deleted','El contenido ha sido borrado.',80,'es',NULL,NULL,NULL),
	('done','research_request','Un miembro del equipo del SERGI se asignará a tu petición. Te mantendremos informado durante el proceso. Una vez tengamos los resultados de tu petición te enviaremos un correo electrónico con un enlace a los contenidos seleccionados.',81,'es',NULL,NULL,NULL),
	('all','searchpanel','Busca por descripciones, palabras clave y códigos de contenido.',82,'es',NULL,NULL,NULL),
	('about','about','Imágenes y Palabras pretende ser un lugar...',83,'es',NULL,NULL,NULL),
	('collection_edit','introtext','Organiza tu trabajo agrupando recursos. Crea tantas colecciones como necesites.\n\n<br>\n\nTodas la colecciones aparecerán en tu panel \"Mis colecciones\" en la parte inferior de la pantalla.\n\n<br><br>\n\n<strong>Acceso privado</strong> sólo permite a ti y a los usuarios que selecciones a visualizar la colección. <br><br>\n\n<strong>Accesos público</strong> permite a todos los usuarios de la aplicación a visualizar la colección.\n\n<br><br>\n\nTambién puedes elegir qué usuarios podrán modificar la colección o simplemente podrán visualizarla.',84,'es',NULL,NULL,NULL),
	('collection_email','introtext','Completa el formulario adjunto para enviar por mail esta colección. Recibirás un link con todo el material y podrás elegir lo que más se adapte a tus necesidades.',85,'es',NULL,NULL,NULL),
	('collection_manage','findpublic','Las colecciones públicas son grupos de material disponible para los usuarios del sistema. Para encontrarlas debes introducir un identificador. �?ste puede ser el nombre completo o parcial de la colección que te interese o bien el ID de usuario de la misma. Añádelo a tu lista de colecciones para acceder al material.\n\n\n\n',86,'es',NULL,NULL,NULL),
	('home','restrictedtitle','<h1>Bienvenido al Panel de Control</h1>',87,'es',NULL,NULL,NULL),
	('home','themes','Aquí encontrarás los materiales recogidos recientemente.',88,'es',NULL,NULL,NULL),
	('home','welcometext',NULL,92,'es',NULL,NULL,NULL),
	('help','introtext','Obtén el máximo rendimiento del Espacio de Material. Estas guías te ayudarán a usar el sistema con mayor efectividad.',93,'es',NULL,NULL,NULL),
	('home','welcometitle','Bienvenida/o a Imágenes y Palabras, una herramienta que te permitirá buscar fotografías, vídeos y testimonios entre sus más de xxx materiales.',94,'es',NULL,NULL,NULL),
	('team_batch','introtext','Puedes subir varios archivos al mismo tiempo colgándolos en un servidor FTP válido. Una vez hayas terminado, los archivos se pueden borrar de este servidor.',95,'es',NULL,NULL,NULL),
	('team_home','introtext','Bienvenido al Panel de Control. Utiliza los enlaces siguientes para gestionar materiales, responder a peticiones de materiales, gestionar temas o modificar configuraciones del sistema.',96,'es',NULL,NULL,NULL),
	('user_password','introtext','Introduce tu dirección de e-mail y te enviaremos tu nombre de usuario y contraseña.',97,'es',NULL,NULL,NULL),
	('team_user','introtext','Utiliza esta sección para añadir, eliminar o modificar usuarios.',98,'es',NULL,NULL,NULL),
	('collection_public','introtext','Encuentra una colección pública',99,'es',NULL,NULL,NULL),
	('home','mycollections','Esta herramienta te permite seleccionar, organizar y compartir tu material. ',100,'es',NULL,NULL,NULL),
	('collection_manage','introtext','Organiza y controla tu trabajo agrupando material. Crea \"Colecciones\" que se ajusten a tus necesidades de trabajo. Podrías querer agrupar colecciones en proyectos con los que trabajas independientemente, compartirlas con un equipo o simplemente guardar tu material favorito en un sitio concreto. Todas estas opciones aparecerán en la pestaña \"Mis colecciones\" en un botón de tu pantalla.',101,'es',NULL,NULL,NULL),
	('done','collection_email','Los usuarios que quieras pueden recibir un correo con un enlace a la colección que les envíes. Esta recopilación se añade a su \"Lista de Colecciones\"',102,'es',NULL,NULL,NULL),
	('done','resource_request','Tu petición ha sido enviada y en breve nos pondremos en contacto contigo',103,'es',NULL,NULL,NULL),
	('done','user_password','Te hemos envíado un correo electrónico con tu ID de usuario y tu contraseña',104,'es',NULL,NULL,NULL),
	('done','user_request','Tu solicitud para obtener una cuenta de usuario ha sido enviada. Muy pronto te enviaremos los detalles.',105,'es',NULL,NULL,NULL),
	('download_click','introtext','Para bajar el archivo adjunto pincha en el enlace de abajo y elige \"Guardar como\". Te preguntarán dónde quieres guardar el archivo. Para abrir el archivo en tu navegador sólo tienes que pinchar el enlace.',106,'es',NULL,NULL,NULL),
	('download_progress','introtext','La descarga comenzará en pocos segundos',107,'es',NULL,NULL,NULL),
	('edit','batch','Por favor, especifica el datos comunes a todas las imágenes que vas a cargar en lote.<br><br>\n\n<b>Atención:</b> El proceso de carga de imágenes por lote requiere muchos recursos de CPU. Por este motivo es aconsejable no hacer cargas simultáneas.',108,'es',NULL,NULL,NULL),
	('edit','multiple','Selecciona los campos que desees editar de la lista de abajo. Los que selecciones se sobreescribirán sobre el material que estés editando. Cualquier campo no selecciónado será ignorado.',109,'es',NULL,NULL,NULL),
	('home','help',NULL,110,'es',NULL,NULL,NULL),
	('home','restrictedtext','Por favor, pincha en el enlace que te envíamos a tu correo para acceder a los materiales seleccionados para ti',111,'es',NULL,NULL,NULL),
	('login','welcomelogin','Bienvenido a Palabras y Fotografías',112,'es',NULL,NULL,NULL),
	('research_request','introtext','Podemos ayudarte a encontrar el material que mejor se ajuste a tus necesidades. Completa el cuestionario tan minuciosamente como sea posible para que evaluemos los criterios que más te interesan. Estaremos en contacto por correo electrónico sobre la evolución del proceso y una vez hayamos completado la busqueda recibirás un mail con un enlace al material que te recomendamos',113,'es',NULL,NULL,NULL),
	('resource_email','introtext','Comparte este material rápidamente vía mail. Se enviará automáticamente un enlace. Además puedes incluir texto informativo como parte del correo electrónico.',114,'es',NULL,NULL,NULL),
	('resource_request','introtext','El material que has solicitado no esta disponible en Internet. La información que has requerido se incluirá automáticamente en el correo electrónico, si quieres puedes añadir cualquier comentario adicional.',115,'es',NULL,NULL,NULL),
	('search_advanced','introtext','Búsqueda por Campos. Cualquier sección que dejes en blanco o no selecciones, incluirá todos esos términos en la búsqueda. Por ejemplo, si dejas todas las opciones de un país vacías, la búsqueda te dará resultados de todos esos países. Si seleccionas sólo África entonces los resultados sólo contendrán material de África.\n\n',116,'es',NULL,NULL,NULL),
	('team_archive','introtext','Para editar materiales de archivo individualmente, simplemente busca por el material y pincha en \"Herramienta de Material\" en la misma pantalla. Todos los materiales listos para ser archivados serán listados en Material Pendiente de Lista. Desde esta lista es posible añadir información posteriormente y transferir el material grabado al archivo\n\n',117,'es',NULL,NULL,NULL),
	('view','storyextract','Estracto de historia:',118,'es',NULL,NULL,NULL),
	('user_request','introtext','Por favor completa el formulario adjunto para solicitar una cuenta de usuario.',119,'es',NULL,NULL,NULL),
	('team_research','introtext','Organiza y controla �??Criterios de Búsqueda�?�. Elige �??Editar búsqueda�?� para examinar los detalles de la búsqueda y asignarle la investigación a un miembro del equipo. Es posible basar una búsqueda en una colección previa introduciendo el nombre de la misma en �??Edit�?�. Una vez sean asignados los criterios de búsqueda, selecciona �??Editar Colección�?� para añadir los criterios al panel �??Mi colección�?�. Usando las herramientas estándar es posible añadir material a la búsqueda. Una vez se ha completado, selecciona �??Editar búsqueda�?� y cambia el estado para recibir automáticamente un correo electrónico con la información solicitada. El mail contendrá un enlace a la búsqueda y además se añadirá automáticamente al panel �??Mi colección�?�.',120,'es',NULL,NULL,NULL),
	('team_batch_select','introtext','Puedes subir varios archivos al mismo tiempo colgándolos en un servidor FTP válido. Una vez hayas terminado, los archivos se pueden borrar de este servidor.',121,'es',NULL,NULL,NULL),
	('team_batch_upload','introtext','Puedes subir varios archivos al mismo tiempo colgándolos en un servidor FTP válido. Una vez hayas terminado, los archivos se pueden borrar de este servidor.',122,'es',NULL,NULL,NULL),
	('team_resource','introtext','Añade material individual o sube varios materiales simultáneamente. Para editar materiales individuales sólo tienes que buscar el material, y pinchar en editar en \"Herramienta de Material\" de la pantalla de material.',123,'es',NULL,NULL,NULL),
	('team_stats','introtext','Los gráficos son generados a bajo demanda. Marca la casilla para imprimir todos los gráficos del años seleccionado.',124,'es',NULL,NULL,NULL),
	('terms','introtext','Antes de iniciar el proceso de descarga debes aceptar los siguientes términos y condiciones de uso.\n\n',125,'es',NULL,NULL,NULL),
	('themes','findpublic','Encuentra una colección pública introduciendo un término de búsqueda',126,'es',NULL,NULL,NULL),
	('upload','introtext','Sube un archivo empleando el formulario adjunto',127,'es',NULL,NULL,NULL),
	('themes','manage','Organiza y edita los temas disponibles en la red. Los temas aparecen organizados en colecciones. Para crear una nueva entrada e incluirla en un tema, debes pinchar en \"Construye una colección\" y elegir \"Mis Colecciones\" del menú principal. Recuerda incluir el nombre de un tema durante la configuración y crear una nueva colección. Puedes usar un nombre ya existente para agrupar la nueva colección en un apartado ya establecido (es importante asegurarse de que el nombre es exactamente el mismo) o elegir un nuevo título para crear una nueva categoría de temas. Nunca permitas a los usuarios que añadan o cambien materiales de las colecciones ya establecidas. Para editar el contenido de una entrada existente bajo un tema, elige �??Editar una Colección�?�. Los iconos de esta colección aparecerán en el botón de la pantalla �??Mis Colecciones�?�. Emplea las herramientas estándar para editar, mover o añadir material. Para cambiar el  nombre de un tema o mover una colección y que ésta aparezca ubicada en un tema diferente. Elige: �??Editar Propiedades�?� y edita la categoría del tema o el nombre de la colección. Selecciona un nombre existente para el tema y así agruparlo en de las categorías existentes (asegúrate de que lo escribes exactamente igual), o elige un nuevo título para crear un nuevo tipo de tema. Para borrar una selección del tema. Elige: �??Editar Propiedades�?� y borra las palabras de la caja de categorías del tema.',128,'es',NULL,NULL,NULL),
	('themes','introtext','Los temas están formados por grupos con nuestros mejores materiales',129,'es',NULL,NULL,NULL),
	('team_copy','introtext','Introduce el identificador del material que te gustaría copiar. Sólo se copiará el material señalado -no se copiará ningún archivo adjunto.',130,'es',NULL,NULL,NULL),
	('change_language','introtext','Por favor, selecciona el idioma en el que deseas trabajar.',131,'es',NULL,NULL,NULL),
	('team_content','introtext',NULL,133,'es',NULL,NULL,NULL),
	('team_report','introtext','Por favor, elige un informe y un rango de fecha. El informe podrá abrirse en un documento de Excel o un documento de características similares.',134,'es',NULL,NULL,NULL),
	('change_password','introtext','Por favor introduzca una nueva contraseña.',135,'es',NULL,NULL,NULL),
	('upload_swf','introtext',NULL,136,'en',NULL,NULL,NULL),
	('tag','introtext','Help to improve search results by tagging resources. Say what you see, separated by spaces or commas... for example: dog, house, ball, birthday cake. Enter the full name of anyone visible in the photo and the location the photo was taken if known.',137,'en',NULL,NULL,NULL),
	('about','about','�??�?��?��??の説�??�??�?述�?てくだ�?�?�??',138,'jp',NULL,NULL,NULL),
	('download_click','introtext','�??�?��?��?��??�??�?��?��?��?��??�?�??には�?��?��?��?��?で右�?��?��??�?��?\"名�?��??�?�?て�?��?��?��??�??保�?\"�??選�??�?ま�?�?? �??�?��?��?�の保�?�??�??�?�?�??ま�?�??�??�?��?��?��??�??くには�??�?��?��?�の�??�?��?��?��??�??くの�?��?��?��??�?��?��??�?��?ま�?�??',139,'jp',NULL,NULL,NULL),
	('home','restrictedtitle','<h1>�??�?��?��??の名称�??�?述�?てくだ�?�?�??</h1>',140,'jp',NULL,NULL,NULL),
	('home','welcometitle','�??�?��?��?��?��?��?��??�?��?��?�の�?��?��??�?��??�?述�?てくだ�?�?�??',141,'jp',NULL,NULL,NULL),
	('home','welcometext','�??�?��?��?��?��?��?��??�?��?��?��??�?述�?てくだ�?�?�??',142,'jp',NULL,NULL,NULL),
	('all','researchrequest','�?な�?�?�?�?�て�?�??�??�??�?��?��??調�?�依頼�?てみてくだ�?�?�??',143,'jp',NULL,NULL,NULL),
	('all','searchpanel','説�??�??�?��?��?��?��?��??�?��?��?��?��?��?��??�?��?��?��??使って�?索�?てくだ�?�?�??',144,'jp',NULL,NULL,NULL),
	('change_language','introtext','�?�?�?�??�?�?�??選�??�?てくだ�?�?�??',145,'jp',NULL,NULL,NULL),
	('change_password','introtext','�?な�?の�??�?��?��?��??�??�?�?��?�??�?�?�に以�?に�?��?�?�??�?��?��?��??�??�?��??�?てくだ�?�?�??',146,'jp',NULL,NULL,NULL),
	('collection_edit','introtext','�?��?��?��?��??�??�?�?�??�?とに�??って�?��?�?��??�?�?�??�?�?�管�?�?てくだ�?�?�??�?な�?の流�??で�?�?�に適�?�?�?��?��?��?��?��?��??�?�?��?てくだ�?�?�??<br>�?�面の�?�?�の�??�?��?��?��?��?��?��?��?��??�?��?�に�?覧�?表示�?�??ま�?�??<br><br>�?な�?と選ば�??�?人だ�?�?�?�?�でき�??<strong>�??�?��?��??�?��??�?��?��?��?��?�</strong>の�?��?��?��?��?��?�で�?�??�?な�?�?�?�?��?�??�?は�??�?��?��?��?��??�?��?��?��??で�?��?��?��?��??�?��??�?て�?業�?�??�?で�?��?��?��?�の�?��?��?��??�??に�??適で�?�??<br><br><strong>�?��??�?��?��?��?�</strong>の�?��?��?��?��?��?�は�?��?��?��?��?�?索と�?�?��?できま�?�??�?な�?�?�?��?��?��?�の�?��?��?��?��?��?��??�?��??�?�??と�?��?の人は�?��??�??�?�??で�?�??�?�??<br><br>�?な�?は�?��?の�?��?��?�(�?な�?の�??�?��?��??�?��??�?��?��?��?��?��?��?��??�?��??�??�?くは追�?��?�?�?��?��?�)に�?��?��?��?��??追�?��?��??�?�可�?�と�?�??�?�?�ま�?は�?�?�のみと�?�??�?�??選�??できま�?�??',147,'jp',NULL,NULL,NULL),
	('contact','contact','�??�?ち�??には�?な�?の�?�絡�??�??�?�?��?てくだ�?�?�??',148,'jp',NULL,NULL,NULL),
	('search_advanced','introtext','<strong>�?索の�??</strong><br>�?索で空�?�のままに�?�??�?�?�ま�?は�?��?��??�?��??�?��??な�?っ�?�?��?��?��?��?�は�?べての�?��?�??含�??だ�??のと�?て�?索�?ま�?�?? �?�?ば�?��?��??空�?�に�?�??と�?��?索は�?べての�?��?�??結�??�??�?�?で�?�??�?�?? �?な�?�?�?��??�?��?�だ�?�??選�??�?�??と�?�結�??は�?��??�?��?��?�??の�?��?��?��?�だ�?�??含�??で�?�??�?�??',149,'jp',NULL,NULL,NULL),
	('collection_email','introtext','以�?の�??�?��?��?�に�?�?��?て�?��?の�?��?��?��?��?��?��??�?��?��?��?てくだ�?�?�?? �?��?��?��?適�??な�?��?��?��?��??選�??で�?��??�?��?��?��?��??でき�??�??�?に�?��??�?��?��?�添�?�??�??�??�?�?��?��?��?��?�への�?��?��?��??�?�?�?�??で�?�??�?�??',150,'jp',NULL,NULL,NULL),
	('collection_manage','findpublic','�?��??の�?��?��?��?��?��?�は�?��?��??�?�の�?��?��?�に�??って�?く�?��?�可�?�に�?�??�?�?��?��?��?�の�?��?��?��??で�?�?? �?��?��?��?��?��?�ID�?�?��?��?��?��?��?�名ま�?は�?��?��?�名の�?べてま�?は�?�?��??�?��??�?て�?��?��??の�?��?��?��?��?��?��??�?つ�?てくだ�?�?�?? �?な�?の�?��?��?��?��?��?�の�?��?��??にそ�??�??�??追�?��?て�?��?��?��?��?�に�?��?��?��?��?てくだ�?�?�??',151,'jp',NULL,NULL,NULL),
	('collection_manage','introtext','�?��?��?��?��??�??�?�?�??�?とに�??って�?��?�?��??�?�?�??�?て�?�管�?�?てくだ�?�?�?? �?な�?の�??�??�?�に�?っ�?�?��?��?��?��?��?��??�?�?��?てくだ�?�?�?? �?な�?は�?��?な�?�?�?�?�で�?�??�?�??で�?�??�??�?��?��?��?��??の�?で�?��?��?��?��??�??�?�?�?�??�?��??�?��?��?��?��??�?��?��?��?�で�?��?��?��?��??�?��??�?�?�??�?�ま�?は1つの場�??で�?に�?�?に�?��??の�?��?��?��?��??�?�??�?�??�?と�?できま�?�?? �?な�?の�?べての�?��?��?��?��?��?��?�?��?��?��?��?��?�?�の�??�?��?��?��?��?��?��?��?��??�?��?�に表示�?�??ま�?�??',152,'jp',NULL,NULL,NULL),
	('home','help','�?��?��?��??�??�??大�?�に活�?��?�??�?�?�の�??�?��??と�?��?�??',153,'jp',NULL,NULL,NULL),
	('home','mycollections','�?��?��?��?�の�?�?�??�?��?��?�??�?��?��??�??�?てくだ�?�?�?? �??�??�?��??�??に�?��?�??�??�?に�?�??�??の�??�?��?��??活�?��?てくだ�?�?�??',154,'jp',NULL,NULL,NULL),
	('home','restrictedtext','�?な�?の�?�?�に選�??�?�??�?�?��?��?��?�に�?��?��?��?��?�??�?�?�に�?��?��?��?�??�?�?��?��?��??�?��?��??�?��?てくだ�?�?�??',155,'jp',NULL,NULL,NULL),
	('login','welcomelogin','�??�?��?��?��?��?��?��??�?��?��?��??�?�?��?てくだ�?�?�??',156,'jp',NULL,NULL,NULL),
	('themes','findpublic','�?��??�?��?��?��?��?��?�は�?の�?��?��?�に�??って�?��??�?�??�?�?��?��?��?�の�?��?��?��?��?��?�で�?�??',157,'jp',NULL,NULL,NULL),
	('user_password','introtext','E�?��?��?��?��??�?��?��??�?��??�?てくだ�?�?�??そ�?�?�??ば�?��?な�?の�?��?��?�名と�??�?��?��?��??�?�?な�?に�?�信�?�??�??で�?�??�?�??',158,'jp',NULL,NULL,NULL),
	('user_request','introtext','以�?の�??�?��?��?�に�?�?��?て�?��?��?��?��?��?��?��?��??�??要�?�?てくだ�?�?�??',159,'jp',NULL,NULL,NULL),
	('view','storyextract','�?��??�?��?��?��?�:',160,'jp',NULL,NULL,NULL),
	('collection_manage','newcollection','�?�規�?��?��?��?��?��?��??�?�?��?�??�?�?�に�?�名称�??�?��??�?てくだ�?�?�??',161,'jp',NULL,NULL,NULL),
	('collection_public','introtext','�?の�?��?��?�に�??って�?�?��?�??�?�?��??�?��?��?��?��?��?��??',162,'jp',NULL,NULL,NULL),
	('contribute','introtext','�?な�?は�?な�?�?�身の�?��?��?��?��??�??稿できま�?�?? �?な�?�?�?��?��?��?��??�?�?��?�?�?��?は�?��?��?ち�?��??に�?�??ま�?�?? �?な�?の�??�?��?��?��??�?��??�??�?��?��??�?て�?��??�?��?��?��??�??編�??�?には�?��??�?��?��?ち�?��??に設�?�?�??ま�?�?? 次に�?��?��?��?��?��?��?�に�??って�?��??�?��?��?�??�??で�?�??�?�??',163,'jp',NULL,NULL,NULL),
	('delete','introtext','�?の�?��?��?��?��??�??�?��?�??には�??�?��?��?��??�??�?��??�?て�?�確認�?てくだ�?�?�??',164,'jp',NULL,NULL,NULL),
	('done','collection_email','�?��?��?��?��?��?�への�?��?��?��??含�??�?��?��?��??�?な�?�?�??�?�?�?�?��?��?�に�?��??ま�?�?�?? �?��?��?��?��?��?�は\'�?��?��?��?��?��?�\'�?��?��??に�?��?�??�??ま�?�??',165,'jp',NULL,NULL,NULL),
	('done','deleted','�?��?��?��?�は�??�?��?�??ま�?�?�??',166,'jp',NULL,NULL,NULL),
	('done','research_request','調�?��?��?��?�の�?��?��?��?��?�?な�?の要�?に�?��?��?��?��?�??�??で�?�??�?�?? �?��?��?�で私�?ちは�??中�?�?�??�?�?��??�?�?ま�?�??そ�?て�?�私�?ち�?調�?��??�?�?�?�??と�?��?な�?は私�?ち�?�?��?��?�??�?べての�?��?��?��?�への�?��?��?��??�?��?��?�で�?�?�?�??ま�?�??',167,'jp',NULL,NULL,NULL),
	('done','resource_email','�?��?��?��?�への�?��?��?��??含�??�?��?��?��??�?な�?�?�??�?�?�?�?��?��?�に�?��??ま�?�?�??',168,'jp',NULL,NULL,NULL),
	('done','resource_request','�?な�?の要�?は�?�?�?ま�?�?ので�?�私�?ちはま�??なく�?��?�絡�?�??で�?�??�?�??',169,'jp',NULL,NULL,NULL),
	('done','user_password','�?な�?の�?��?��?�名と�??�?��?��?��??�??含�??�?��?��?��??�?��??ま�?�?�??',170,'jp',NULL,NULL,NULL),
	('done','user_request','�?��?��?��?��?��?��?��??�??�?�?��??�?な�?の要�?�??�?��??ま�?�?�?? ま�??なく�?��?な�?の�?��?��?��?�詳細�?�?��??�??�??で�?�??�?�??',171,'jp',NULL,NULL,NULL),
	('download_progress','introtext','�?な�?の�??�?��?��?��?��??はま�??なく�?��?ま�??で�?�??�?�?? �??�?��?��?��?��??�?�?�?�?��?�?�?�??には以�?の�?��?��?��??使�?��?てくだ�?�?�??',172,'jp',NULL,NULL,NULL),
	('edit','batch','�?な�?�?�?��??�??�?��?��??�?�??�?と�?て�?�??�?��?��?��?�の�?�?�の�??�??�?��?��??の説�??と�?��?��?��?��??�??�??�?�?てくだ�?�?�??',173,'jp',NULL,NULL,NULL),
	('edit','multiple','どの�??�?��?��?��??�??�?�?�き�?�?�?�?�??選�??�?てくだ�?�?�?? �?な�?�?選�??�?な�?�??�?��?��?��??はそのままの�?��??で�?�?�??�??で�?�??�?�??',174,'jp',NULL,NULL,NULL),
	('help','introtext','�?��?��?��??�??�??大�?�に活�?��?てくだ�?�?�?? �?�??�??の�?��?��??は�?��?な�?�?�?��??�??�?��??�??に�?��?��??�?�と�?��?��?��?��??使�?��?�??の�??�?��?�??で�?�??�?�?? </p>    <p>�??�?��??�??使�?��?て�?��??�?��??で�?��?��?��?��??�??�?��?��?��?�??�?�?�ま�?は�?�?�?索�??使�?��?て�?��?��?の�?��?��?��?��??�?索�?てくだ�?�?�??</p>   <p><a href=http://www.montala.net/downloads/ResourceSpace-GettingStarted.pdf>Download the user guide (PDF file)</a>   <p><a target=_blank href=http://wiki.resourcespace.org/index.php/Main_Page>Online Documentation (Wiki)</a>',175,'jp',NULL,NULL,NULL),
	('home','themes','精選�?�??�??�?�?�??�?�??�?�の�?��?��?��?�',176,'jp',NULL,NULL,NULL),
	('research_request','introtext','�?な�?の�??�?��?��?��?��??に�?��??�??�?��?�?��?��?��?��??�?つ�?�??の�??�?��?�?�??�?�?�に�?�私�?ちの�??�?�の調�?��??�?�?�?に�?ま�?�?? 私�?ち�?正確に�?価�?��?�??�?�?�?�?と�?でき�??�??�?に�?��?の�??�?��?��?�にでき�??だ�?�?�てに�?�?��?てくだ�?�?�?? <br><br>調�?��?��?��?�の�?��?��?��?��?�?な�?の要�?に�?��?��?��?��?�??�??で�?�??�?�?? �??中�?�?�??�?��?��?�で報�??�?ま�?�?�そ�?て�?�私�?ち�?調�?��??�?�?�?�?�?�?�私�?ち�?�?��?��?�??�?べての�?��?��?��?�への�?��?��?��??�?��?��?�で�?�?�?ってくだ�?�?�??',177,'jp',NULL,NULL,NULL),
	('resource_email','introtext','�?��?��?�で素�?�く�?の�?��?��?�と�?の�?��?��?��?��??�?��??できま�?�?? �?��??�??に�?��?��?��??�?�信�?ま�?�?? ま�?�?��?な�?は�?��?��?�の�?�?�と�?て任�?�の�?��??�?��?��?��??�?��??�??�?と�?できま�?�??',178,'jp',NULL,NULL,NULL),
	('resource_request','introtext','�?要�??の�?��?��?��?�は�?��?��?��?��?�で�?��?�可�?�では�?�??ま�?�??�?? �?��?��?��?��??報は�?��?��?�に�?��??�??に含ま�??て�?ま�?�?�?��??�??な�??�?��?な�?は追�?��?��?��?��??�??�?��?�??�?と�?できま�?�??',179,'jp',NULL,NULL,NULL),
	('tag','introtext','�?��?��?��?�に�?��?��?�?�??�?�??�?とに�??って�?索結�??�??�?��??できま�?�?? �?�?ば�?�空�?��?�?��?��??に�??って�??�?��?�??�?: �?�,家,�??�?��?�,�?��?��?��??�?��?��?��?��?? �??�??に�??って�?�??人の�??�?��?��?��?��??�??�?って�?�??�?�名�??�?��??てくだ�?�?�??',180,'jp',NULL,NULL,NULL),
	('team_archive','introtext','�??�??の�?��?��?��?��??�?��?��?��?��??編�??�?�??�?�?�に�?��?��?��?��?��??�?�?�?索�?てくだ�?�?�?�そ�?て�?��?��?��?��?��?��?��?��?��?�の�?の�?��?��?��?��?��??�?��?� �??�?��?�の編�??�??�?��?��??�?��?てくだ�?�?�?? �?��?��?��?��??�?�??�??�?�??�?できて�?�??�?��?��?��?��?�?�?�?�??�?�?��?��?��?��?��??�?��??�?��?��?� �?��?��??で�?�?? �?の�?��?��??�?�??�?��?��?��?��?��??に詳細�??報の追�?�と�?��?��?��?��?��?��?��?��?��??�??移�?のは可�?�で�?�??',181,'jp',NULL,NULL,NULL),
	('team_batch','introtext','�?な�?は�?�適�??なFTP�?��?��?�に�??�?��?��?��??置く�?とに�??って�?��?��?��?��?��??�?��?��?��??�?��??�?�で�?��??�??�?��?��??できま�?�?? �?�?�?�?�FTP�?��?��?��?�??�??�?��?��?��??�??�?�できま�?�??',182,'jp',NULL,NULL,NULL),
	('team_batch_select','introtext','�?な�?は�?�適�??なFTP�?��?��?�に�??�?��?��?��??置く�?とに�??って�?��?��?��?��?��??�?��?��?��??�?��??�?�で�?��??�??�?��?��??できま�?�?? �?�?�?�?�FTP�?��?��?��?�??�??�?��?��?��??�??�?�できま�?�??',183,'jp',NULL,NULL,NULL),
	('team_batch_upload','introtext','�?な�?は�?�適�??なFTP�?��?��?�に�??�?��?��?��??置く�?とに�??って�?��?��?��?��?��??�?��?��?��??�?��??�?�で�?��??�??�?��?��??できま�?�?? �?�?�?�?�FTP�?��?��?��?�??�??�?��?��?��??�??�?�できま�?�??',184,'jp',NULL,NULL,NULL),
	('team_copy','introtext','�?な�?�?�?��??�?��?�?�?�?��?��?��?�のID�??�?��??�?てくだ�?�?�?? �?��?��?��?��??�?��?�だ�?�?�?��??�?��?�??�??で�?�??�?--�?��??�??�?��?��??�?�??�?�??�?��?��?�は�?��??�?��?�??な�?で�?�??�?�??',185,'jp',NULL,NULL,NULL),
	('team_home','introtext','�?��?��?��?��?��?��?�へ�??�?�?そ�?? 以�?の�?��?��?��??使�?��?て�?��?��?��?��?�の管�?�?��?��?��?��?�の要�?へ対�?�?��??�?��??の管�?�?��?��?��??�?�設�?の�?�?��??�?てくだ�?�?�??',186,'jp',NULL,NULL,NULL),
	('team_report','introtext','�?��?��?��??と�?��?の�?�?��??選�??でくだ�?�?�?? Microsoft Excel�?�?�?の�?��??�?��??�??�?��?��??�?��??�?��?��?��?��?��?�で�?��?��?��??�??�??く�?と�?できま�?�??',187,'jp',NULL,NULL,NULL),
	('team_research','introtext','調�?�要�?の�?�?�??と管�?�?? <Br><Br>調�?�の編�??�??選�??で�?�要�?の詳細�??�?��?�?�?て�?�調�?��??�?��?��?��?��?��?��?�に�?��??�?ててくだ�?�?�?? 編�??�?�面に�?��?��?��?��?��?�ID�??�?��??�?�??�?とに�??って調�?�要�?�??以�?�の�?��?��?��?��?��?�に�?��?づ�?�??のは可�?�で�?�?? <Br><Br>調�?�要�?�?�?っ�?�??�?��??�?て�??�??�?�?�?��?��?��?��?��?��?�編�??�??選�??で�?��??�?��?��?��?��?��?��?��??�?��?�に調�?�要�?�??�?��?てくだ�?�?�?? �?�?の�??�?��?��??使�?��?て�?�そ�?て�?��?��?��?��?��??調�?�に追�?��?�??のは可�?�で�?�?? <Br><Br>調�?��?�?っ�?�??�?�?�?�??と調�?�編�??�??選�??で�?��?��??�?��?��?��??�?�?に�?�?てくだ�?�?�??そ�?�?�??ば�?��?��??�??に調�?��??要�?�?�?�?��?��?�に�?��?��?��??�?��??ま�?�?? �?��?��?�は調�?�への�?��?��?��??含�??で�?ま�?�?�そ�?て�?�ま�?�?�そ�??は�?��??�??に彼�??の�??�?��?��?��?��?��?��?��??�?��?�に�?��?�??�??ま�?�??',188,'jp',NULL,NULL,NULL),
	('team_resource','introtext','�??�?�に�?��?��?��?�追�?��?�?��?��?��?��??�?��??�?�で�?��??�??�?��?��??�?てくだ�?�?�?? �??�??の�?��?��?��?��??編�??�?�??には�?��?�?�?索で�?��?��?��?��??�?索�?て�?��?��?��?��?��?��?��?��?��?��?の�?��?��?��?��??�?��?��??�?��?�の編�??�??�?��?��??�?��?ま�? �??',189,'jp',NULL,NULL,NULL),
	('team_stats','introtext','�?��?��?��??は�?��?��??�??�?��?��?�??要�?に�?�?て�?�??�??ま�?�?? 選�??�?�??�?年の�?べての�?��?��?��??�??印�?��?�??には�?��?��??�?��??�??�?��?��??�?��?�に�?ま�?�??',190,'jp',NULL,NULL,NULL),
	('team_user','introtext','�?��?��?�の追�?��?��??�?��?��?�?��??�?�??には�?の�?��?��?��?��?��??使�?��?てくだ�?�?�??',191,'jp',NULL,NULL,NULL),
	('terms','introtext','�??に�?��?��??�?�?�には�?な�?は条件に�?�?��?な�?�??ばな�??ま�?�??�??',192,'jp',NULL,NULL,NULL),
	('terms','terms','�??使�?�条件�??�?�?��?てくだ�?�?�??',193,'jp',NULL,NULL,NULL),
	('terms and conditions','terms and conditions','�??使�?�条件�??�?�?��?てくだ�?�?�??',194,'jp',NULL,NULL,NULL),
	('themes','introtext','�??�?��??は�?��?��?��?�の�?��?��?��??で�?�??',195,'jp',NULL,NULL,NULL),
	('themes','manage','�?��?��?��?��?�で�?��?�可�?�な�??�?��??�??�?�?�??�?�?�編�??�?てくだ�?�?�?? �??�?��??は�?�に�?��?��?��?�??�?�?��?��?��?��?��?�で�?�?? <br><br> <strong>1 �??�?��??の�?に�?�規�?��?��??�?��?��?�?� -  �?��?��?��?��?��?��?�?</strong><br> �?��?��?�の�??�??�??�?��??�?��?��?�??<strong>�??�?��?��?��?��?��?��?�</strong>�??選�??�?�?� �?�規の<strong>�?��??</strong> �?��?��?��?��?��?��??設�?�?? �?��??�??�?��??�??の�??�?��?�??�?に�??�?��??名�??含�??でくだ�?�?�?? 現�?�の�??�?��??の�?で�?��?��?��?��?��?��??�??�?�?�??のに�?��?の�??�?��??名�??使�?��?�??�?(�?�く�?�?)�?�ま�?は�?��?�?�?��?��??�?��??選�??で�?��??�?��?�?�??�?��??�??�?�?��?てくだ�?�?�?? �?��?��?�に�??�?��??�??�?�??�?�?��?��?��?��?��?��?�??�?��?��?��?��??追�?�/�??�?��?�?な�?�??�?に�?てくだ�?�?�??<br> <br><strong>2 �??�?��??の�?の�?��?の�?��?��??�?��?�の�??容�??編�??</strong><br><strong>�?��?��?��?��?��?�編�??</strong>�??選�??�?? �?��?��?��?��?��?�の�?��?��??�?�は�?�面�?�?�の<strong>�??�?��?��?��?��?��?��?�</strong> �??�?��?�に表示�?�??ま�?�??�?��?��?��?�の編�??�?��??�?��?�追�?�の�?�?�に�?�?�??�?��?��??使�?��??<br> <br><strong>3 �??�?��??名の�?�?��??�?�の�??�?��??の�?に表示�?�??�??�??�?�?��?��?��?��?��?��??移�??</strong><br><strong>�??�?��??�??�?�編�??</strong>�??選�??�?�??�?��??�?��??�?��?��??�?��?��?��?��?��?�名�??編�??�??現�?�の�??�?��??の�?で�?��?��?��?��?��?��??�??�?�?�??のに�?��?の�??�?��??名�??使�?��?�??�?(�?�く�?�?)�?�ま�?は�?��?�?�?��?��??�?��??選�??で�?��??�?��?�?�??�?��??�??�?�?��?てくだ�?�?�?? <br> <br><strong>4 �??�?��??�?�??�?��?��?��?��?��?��??�?�</strong><br><strong>�??�?��??�??�?�編�??</strong>�??選�??�?�??�?��??�?��??�?��?��?の�??�?�??�??�?��??',196,'jp',NULL,NULL,NULL),
	('upload','introtext','以�?の�??�?��?��?��??使って�??�?��?��?��??�?��??�??�?��?��??�??',197,'jp',NULL,NULL,NULL),
	('upload_swf','introtext','以�?の�??�?��?��??�?��?��??�?��?て�?��??�?��?��?��??�?��??�??�?��?��??�?てくだ�?�?�??\'shift\'�?��?��??�?��?�?とに�??って�??�?��?��?��?�??とき�?��?な�?は�?�?�の�??�?��?��?��??選�??できま�?�??',198,'jp',NULL,NULL,NULL),
	('collection_public','introtext','Les collections publiques sont créées par d\'autres utilisateurs',199,'fr',NULL,NULL,NULL),
	('all','searchpanel','Recherchez en utilisant les descriptions, mots clés et numéros de documents',200,'fr',NULL,NULL,NULL),
	('home','themes','Les meilleurs documents, sélectionnés et regroupés',201,'fr',NULL,NULL,NULL),
	('home','mycollections','Organisez et échangez vos documents. Ces outils vous aident à travailler plus efficacement.',202,'fr',NULL,NULL,NULL),
	('home','help','Aide et conseils pour obtenir le meilleur de ResourceSpace.',203,'fr',NULL,NULL,NULL),
	('home','welcometitle','Bienvenue dans ResourceSpace',204,'fr',NULL,NULL,NULL),
	('home','welcometext','Votre texte d\'introduction ici.',205,'fr',NULL,NULL,NULL),
	('themes','introtext','Les thèmes sont des groupes de ressources.',206,'fr',NULL,NULL,NULL),
	('edit','multiple','Veuillez choisir les champs que vous souhaitez écraser. Les champs non sélectionnés resteront inchangés.',207,'fr',NULL,NULL,NULL),
	('team_archive','introtext','Pour modifier un document archivé, recherchez simplement le document, et cliquez sur Modifier dans le panneau \'Outils de document\' sur l\'écran du document. Tous les documents qui sont prêts à être archivés sont listés dans la liste des documents en attente. Depuis cette liste, il est possible d\'ajouter des informations supplémentaires et d\'archiver le document.',208,'fr',NULL,NULL,NULL),
	('research_request','introtext','Nos professionnels sont là pour vous assister dans la recherche des meilleurs documents pour vos projets. Remplissez ce formulaire aussi précisément que possible pour que nous soyons capables de répondre précisément à votre requête. <br/><br/> Un membre de notre équipe de recherche sera assigné à votre requête. Nous garderons le contact via e-mail tout au long du processus. Et une fois la recherche terminée, vous recevrez par e-mail un lien vers tous les documents que nous recommandons.  ',209,'fr',NULL,NULL,NULL),
	('collection_manage','introtext','Organisez et gérez votre travail en groupant les documents. Créez des \'Collections\' selon votre méthode de travail. Vous pouvez grouper les documents par projet, les partager avec l\'équipe du projet, ou simplement conserver vos documents préférés en un seul endroit. Toutes vos collections sont listées dans le panneau \'Mes collections\' en bas de l\'écran.',210,'fr',NULL,NULL,NULL),
	('collection_manage','findpublic','Les collections publiques sont des groupes de documents rendus disponibles pour tous par d\'autres utilisateurs du système. Saisissez un numéro de collection, ou tout ou partie d\'un nom de collection ou d\'utilisateur pour trouver une collection publique. Ajoutez-les à votre liste de collections pour accéder à leur contenu.',211,'fr',NULL,NULL,NULL),
	('team_home','introtext','Bienvenue dans l\'espace équipe. Utilisez les liens ci-dessous pour administrer les documents, répondre aux requêtes de documents, gérer les thèmes et modifier les réglages du système.',212,'fr',NULL,NULL,NULL),
	('help','introtext','Obtenez le meilleur de ResourceSpace. Ces guides vous aideront à utiliser le système et les documents plus efficacement. </p>\n\n\n\n<p>Utilisez le menu \"Thèmes\" pour parcourir les ressources par thème ou utilisez la recherche simple pour trouver des ressources spécifiques.</p>\n\n\n<p><a href=\"http://www.montala.net/downloads/ResourceSpace-GettingStarted.pdf\">Téléchargez le guide utilisateur (fichier PDF) (anglais)</a>\n\n\n<p><a target=\"_blank\" href=\"http://wiki.resourcespace.org/index.php/Main_Page\">Documentation en ligne (Wiki) (anglais)</a>',213,'fr',NULL,NULL,NULL),
	('terms and conditions','terms and conditions','Placez ici vos termes et conditions.',214,'fr',NULL,NULL,NULL),
	('contribute','introtext','Vous pouvez proposer vos propres documents. Quand vous créez un nouveau document, son statut est \"En attente de soumission\". Quand vous avez déposé votre fichier et modifié les champs, affectez la valeur \"En attente de validation\" au champ statut. Votre document sera alors vérifié par l\'équipe ressources.',215,'fr',NULL,NULL,NULL),
	('done','user_password','Un mél contenant vos identifiant et mot de passe a été envoyé.',216,'fr',NULL,NULL,NULL),
	('user_password','introtext','Saisissez votre adresse électronique pour recevoir vos identifiant et mot de passe.',217,'fr',NULL,NULL,NULL),
	('edit','batch','Veuillez préciser le contenu par défaut et les mots clés des documents que vous êtes sur le point de déposer.',218,'fr',NULL,NULL,NULL),
	('team_copy','introtext','Spécifiez le numéro du document que vous voulez copier. Seules les données du document seront copiées �?? aucun fichier ne sera copié.',219,'fr',NULL,NULL,NULL),
	('delete','introtext','Veuillez saisir votre mot de passe afin de confirmer la suppression de ce document.',220,'fr',NULL,NULL,NULL),
	('team_report','introtext','Veuillez choisir un type de rapport et une plage de dates. Le rapport peut être ouvert avec Microsoft Excel ou tout tableur similaire.',221,'fr',NULL,NULL,NULL),
	('terms','introtext','Avant de continuer, vous devez accepter les termes et conditions.',222,'fr',NULL,NULL,NULL),
	('download_progress','introtext','Votre téléchargement va démarrer rapidement. Quand le téléchargement sera terminé, utilisez les liens ci-dessous pour continuer.',223,'fr',NULL,NULL,NULL),
	('view','storyextract','Historique d\'extraction:',224,'fr',NULL,NULL,NULL),
	('contact','contact','Placez les détails pour vous contacter ici.',225,'fr',NULL,NULL,NULL),
	('search_advanced','introtext','<strong>Astuce de recherche</strong><br>Toute section que vous laissez vide ou décochée inclura TOUS les documents dans la recherche. Par exemple, si vous laissez vide le choix du pays, la recherche renverra des résultats de tous les pays. Si vous choisissez seulement \'Afrique\' alors les résultats contiendront SEULEMENT des documents de l\'\'Afrique\'.',226,'fr',NULL,NULL,NULL),
	('all','researchrequest','Laissez notre équipe documents trouver les documents dont vous avez besoin.',227,'fr',NULL,NULL,NULL),
	('done','research_request','Un membre de l\'équipe documents sera assigné à votre demande. Nous resterons en contact par mél au cours du processus, et une fois la recherche terminée, vous recevrez par mél un lien vers tous les documents que nous recommandons.',228,'fr',NULL,NULL,NULL),
	('done','collection_email','Un mél contenant un lien vers la collection a été envoyé aux utilisateurs spécifiés. La collection a été ajoutée à leur liste de \'Collections\'.',229,'fr',NULL,NULL,NULL),
	('done','resource_email','Un mél contenant un lien vers le document a été envoyé aux utilisateurs spécifiés.',230,'fr',NULL,NULL,NULL),
	('themes','manage','Organiser et gérer les thèmes disponibles. Les thèmes sont des collections particulièrement mises en avant.<br/><br/><strong>1. Pour créer une nouvelle entrée dans un thème �?? constuire une collection</strong><br/> Choisissez <strong>Mes collections</strong> depuis le menu principal et créez une nouvelle collection <strong>publique</strong>. Rapellez-vous d\'inclure un nom de thème durant la création de la collection. Utilisez un nom de thème existant pour grouper la collection dans un thème déjà présent (assurez-vous de le saisir à l\'identique), ou choisissez un nouveau nom pour créer un nouveau thème. N\'autorisez jamais vos utilisateurs à ajouter / retirer des documents de collections thématiques.<br/><br/><strong>2. Pour modifier le contenu d\'une collection thématique</strong><br/> Choisissez <strong>Modifier la collection</strong>. Les éléments dans cette collection apparaîtront dans le panneau <strong>Mes collections</strong> en bas de l\'écran. Utilisez les outils standard pour modifier, retirer ou ajouter des documents.<br/><br/><strong>3. Pour modifier un nom de thème ou déplacer une collection pour qu\'elle apparaisse dans un autre thème</strong><br/> Choisissez <strong>Modifier les propriétés</strong> et modifiez la catégorie du thème ou le nom de la collection. Utilisez un nom de thème existant pour grouper la collection dans un thème déjà présent (assurez-vous de le saisir à l\'identique), ou choisissez un nouveau nom pour créer un nouveau thème.<br/><br/><strong>4. Pour retirer une collection d\'un thème</strong><br/> Choisissez <strong>Modifier les propriétés</strong>et supprimez les mots dans le champ de catégorie du thème.',231,'fr',NULL,NULL,NULL),
	('terms','terms','Placez ici vos termes et conditions.',232,'fr',NULL,NULL,NULL),
	('done','resource_request','Votre requête a été soumise et vous serez contacté rapidement.',233,'fr',NULL,NULL,NULL),
	('user_request','introtext','Veuillez compléter le formulaire ci-dessous pour demander un compte utilisateur.',234,'fr',NULL,NULL,NULL),
	('themes','findpublic','Les collections publiques sont des collections de documents qui ont été partagées par d\'autres utilisateurs.',235,'fr',NULL,NULL,NULL),
	('done','user_request','Votre demande de compte utilisateur a été envoyée. Vos identifiant et mot de passe vous seront envoyés prochainement.',236,'fr',NULL,NULL,NULL),
	('about','about','Placez ici votre texte d\'à propos.',237,'fr',NULL,NULL,NULL),
	('team_content','introtext',NULL,238,'fr',NULL,NULL,NULL),
	('done','deleted','Le document a été supprimé.',239,'fr',NULL,NULL,NULL),
	('upload','introtext','Déposez un fichier en utilisant le formulaire ci-dessous.',240,'fr',NULL,NULL,NULL),
	('home','restrictedtitle','<h1>Bienvenue dans ResourceSpace</h1>',241,'fr',NULL,NULL,NULL),
	('home','restrictedtext','Veuillez cliquer sur le lien qui vous a été envoyé par mél pour accéder aux documents sélectionnés pour vous.',242,'fr',NULL,NULL,NULL),
	('resource_email','introtext','Partagez rapidement par mél ce document avec d\'autres utilisateurs. Un lien sera automatiquement envoyé. Vous pouvez aussi inclure un message dans le mél.',243,'fr',NULL,NULL,NULL),
	('team_resource','introtext','Ajoutez un document individuel ou un ensemble de documents. Pour modifier individuellement les documents, rechercher simplement le document et cliquez sur Modifier dans le panneau \'Outils de document\' sur l\'écran du document..',244,'fr',NULL,NULL,NULL),
	('team_user','introtext','Utilisez cette section pour ajouter, supprimer et modifier les utilisateurs.',245,'fr',NULL,NULL,NULL),
	('team_research','introtext','Organisez et gérer les \'requêtes de recherche\'. <br/><br/> Choisir \'Modifier la recherche\' pour vérifier les détails de la requête et assigner la recherche à un membre de l\'équipe. Il est possible de baser une requête de recherche sur une collection existante en saisissant le numéro de cette collection dans l\'écran de modification.<br/><br/> Une fois la requête assignée, choisissez \'Modifier la collection\' pour ajouter la requête de recherche au panneau \'Mes collections\'. En utilisant les outils standard, il est alors possible d\'ajouter des documents à la recherche. <br/><br/> Une fois que la recherche est terminée, choisissez \'Modifier la recherche\', changez le statut pour \'terminée\' ; un mél sera automatiquement envoyé à l\'utilisateur qui a demandé la recherche. Le mél contient un lien vers la recherche et la recherche est automatiquement ajoutée aux collections de l\'utilisateur.',246,'fr',NULL,NULL,NULL),
	('collection_edit','introtext','Organisez et gérez votre travail en groupant les documents. Créez des \'Collections\' pour correspondre à votre méthode de travail.<br/> Toutes vos collections apparaissent dans le panneau \'Mes Collections\' en bas de l\'écran <br/><br/> L\'<strong>accès privé</strong> vous autorise, vous et les utilisateurs sélectionnés, à voir la collection. Idéal pour grouper les documents par projet sur lesquels vous travaillez et partager les documetns avec les membres de l\'équipe. <br/><br/> L\'<strong>accès public</strong> autorise tous les utilisateurs du système à voir et rechercher dans la collection. C\'est utile si vous souhaitez partager des collections de documents que vous pensez bénéfiques pour d\'autres utilisateurs. <br/><br/> Vous pouvez choisir si vous souhaitez ou non autoriser d\'autres utilisateurs (tous, ou uniquement ceux que vous avez ajoutés à votre collection privée) à ajouter et retirer des documents ou simplement les visualiser pour référence.',247,'fr',NULL,NULL,NULL),
	('team_stats','introtext','Les graphiques sont créés à la demande en fonction de données temps réel. Cochez la case pour imprimer tous les graphiques de l\'année sélectionnée.',248,'fr',NULL,NULL,NULL),
	('resource_request','introtext','La ressource que vous avez demandée n\'est pas disponible en ligne. Les informations sur la ressource sont automatiquement insérées dans le mél, mais vous pouvez ajouter des commentaires additionnels si vous le souhaitez.',249,'fr',NULL,NULL,NULL),
	('team_batch','introtext','Vous pouvez déposer un ensemble de fichiers ressources en placant les fichiers sur un serveur FTP adéquat. Une fois que vous avez terminé, les fichiers peuvent être supprimés du serveur FTP.',250,'fr',NULL,NULL,NULL),
	('team_batch_upload','introtext','Vous pouvez déposer un ensemble de fichiers ressources en placant les fichiers sur un serveur FTP adéquat. Une fois que vous avez terminé, les fichiers peuvent être supprimés du serveur FTP.',251,'fr',NULL,NULL,NULL),
	('team_batch_select','introtext','Vous pouvez déposer un ensemble de fichiers ressources en placant les fichiers sur un serveur FTP adéquat. Une fois que vous avez terminé, les fichiers peuvent être supprimés du serveur FTP.',252,'fr',NULL,NULL,NULL),
	('download_click','introtext','Pour télécharger le fichier ressource, cliquez droit sur le lien ci-dessous et choisissez \"Enregistrer sous...\". Il vous sera alors demandé l\'emplacement où vous souhaitez sauvegarder le fichier. Pour ouvrir le fichier dans votre navigateur, cliquez simplement sur le lien.',253,'fr',NULL,NULL,NULL),
	('collection_manage','newcollection','Pour créer une nouvelle collection, entrez un nom court.',254,'fr',NULL,NULL,NULL),
	('collection_email','introtext','Remplissez le formulaire ci-dessous pour envoyer cette collection par mél. Les utilisateurs recevront un lien vers la ressource plutôt que des fichiers attachés pour qu\'ils puissent choisir et télécharger les ressources appropriées.',255,'fr',NULL,NULL,NULL),
	('all','footer','Ce site utilise le système de gestion des actifs numériques <a href=\"http://www.resourcespace.org/\">ResourceSpace</a>.',256,'fr',NULL,NULL,NULL),
	('change_language','introtext','Veuillez sélectionner votre langue ci-dessous.',257,'fr',NULL,NULL,NULL),
	('change_password','introtext','Saisissez un nouveau mot de passe ci-dessous pour changer votre mot de passe.',258,'fr',NULL,NULL,NULL),
	('login','welcomelogin','Bienvenue dans ResourceSpace, veuillez vous identifier...',259,'fr',NULL,NULL,NULL),
	('all','emailresource','[img_../gfx/whitegry/titles/title.gif]<br>\n[fromusername] [lang_hasemailedyouaresource]<br><br>\n[message]<br><br>\n<a href=\"[url]\">[embed_thumbnail]</a><br><br>\n[lang_clicktoviewresource]<br><a href=\"[url]\">[resourcename] - [url]</a><br><br>\n[text_footer]\n',260,'en',NULL,NULL,1),
	('all','emailnewresearchrequestwaiting','[img_../gfx/whitegry/titles/title.gif]<br>\n[username] ([userfullname] - [useremail])\n[lang_haspostedresearchrequest]<br><br>\n[lang_nameofproject]:[name]<br><br>\n[lang_descriptionofproject]:[description]<br><br>\n[lang_deadline]:[deadline]<br><br>\n[lang_contacttelephone]:[contact]<br><br>\n[lang_finaluse]: [finaluse]<br><br>\n[lang_shaperequired]: [shape]<br><br>\n[lang_noresourcesrequired]: [noresources]<br><br>\n<a href=\"[url]\">[url]</a><br><br>\n<a href=\"[teamresearchurl]\">[teamresearchurl]</a><br><br>\n[text_footer]\n',261,'en',NULL,NULL,1),
	('all','emailresearchrequestassigned','[img_../../gfx/whitegry/titles/title.gif]<br>\n[lang_researchrequestassignedmessage]<br><br>\n[text_footer]\n',262,'en',NULL,NULL,1),
	('all','emailresearchrequestcomplete','[img_../../gfx/whitegry/titles/title.gif]<br>\n[lang_researchrequestcompletemessage] <br><br> \n[lang_clicklinkviewcollection] <br><br> \n<a href=\"[url]\">[url]</a><br><br>\n[text_footer]\n',263,'en',NULL,NULL,1),
	('all','emailnotifyresourcessubmitted','[img_../gfx/whitegry/titles/title.gif]<br>\n[lang_userresourcessubmitted]\n[list] <br>\n[lang_viewalluserpending] <br><br> \n<a href=\"[url]\">[url]</a><br><br>\n[text_footer]\n',264,'en',NULL,NULL,1),
	('all','emailnotifyresourcesunsubmitted','[img_../gfx/whitegry/titles/title.gif]<br>\n[lang_userresourcesunsubmitted]\n[list] <br>\n[lang_viewalluserpending] <br><br> \n<a href=\"[url]\">[url]</a><br><br>\n[text_footer]\n',265,'en',NULL,NULL,1),
	('all','emaillogindetails','[img_../../gfx/whitegry/titles/title.gif]<br>\n[welcome]<br><br> \n[lang_newlogindetails]<br><br> \n[lang_username] : [username] <br><br>\n[lang_password] : [password]<br><br>\n<a href=\"[url]\">[url]</a><br><br>\n[text_footer]\n',266,'en',NULL,NULL,1),
	('all','emailreminder','[img_../gfx/whitegry/titles/title.gif]<br>\n[lang_newlogindetails] <br><br>\n[lang_username] : [username] <br> \n[lang_password]  : [password] <br><br>\n<a href=\"[url]\">[url]</a><br><br>\n[text_footer]\n',267,'en',NULL,NULL,1),
	('all','emailresourcerequest','[img_../gfx/whitegry/titles/title.gif]<br>\n[lang_username] : [username] <br>\n[list] <br>\n[details]<br><br>\n[lang_clicktoviewresource] <br><br>\n<a href=\"[url]\">[url]</a>\n',268,'en',NULL,NULL,1),
	('all','emailcollection','[img_../gfx/whitegry/titles/title.gif]<br>\n[fromusername] [lang_emailcollectionmessage] <br><br> \n[lang_message] : [message]<br><br> \n[lang_clicklinkviewcollection] [list]\n',269,'en',NULL,NULL,1),
	('all','emailbulk','[img_../../gfx/whitegry/titles/title.gif]<br><br>\n[text]<br><br>\n[text_footer]\n',270,'en',NULL,NULL,1),
	('change_language','introtext','Bitte wählen Sie Ihre Sprache aus:',271,'de',NULL,NULL,0),
	('all','researchrequest','Lassen Sie unser Team nach den benötigten Resourcen suchen.',272,'de',NULL,NULL,0),
	('all','searchpanel','Suche nach Beschreibung, Schlagworten und Ressourcen IDs',273,'de',NULL,NULL,0),
	('about','about','Ihr Text zu \"�?ber uns\" hier.',274,'de',NULL,NULL,0),
	('change_password','introtext','Neues Passwort unten eingeben, um es zu ändern.',275,'de',NULL,NULL,0),
	('collection_edit','introtext','Organisieren und verwalten Sie Ihre Arbeit, indem Sie Ressourcen in Gruppen zusammenstellen. Erstellen Sie Kollektionen wie Sie sie benötigen.\n\n<br>\n\nAlle Kollektionen in Ihrer Liste erscheinen im \"Meine Kollektionen\" Menü am unteren Ende des Fensters.\n\n<br><br>\n\n<strong>Privater Zugriff</strong> erlaubt nur Ihnen und ausgewählten Benutzern, die Kollektion zu anzusehen. Ideal, um Ressourcen für die eigene Arbeit zusammenzustellen und im Team weiterzugeben.\n\n<br><br>\n\n<strong>�?ffentlicher Zugriff</strong> erlaubt allen Benutzern, die Kollektion zu finden und anzusehen.\n\n<br><br>\n\nSie können aussuchen, ob Sie anderen Benutzern (öffentlicher Zugriff oder ausgewählte Benutzer beim privaten Zugriff) erlauben, Ressourcen hinzuzufügen oder zu löschen.',276,'de',NULL,NULL,0),
	('collection_email','introtext','Bitte füllen Sie das untenstehende Formular aus, um die Kollektion per E-Mail weiterzugeben. Der/die Benutzer werden statt eines Dateianhangs einen Link zu dieser Kollektion erhalten und können dann die passenden Ressourcen auswählen und herunterladen.',277,'de',NULL,NULL,0),
	('collection_manage','findpublic','�?ffentliche Kollektionen sind für alle Benutzer zugängliche Gruppen von Ressourcen. Um öffentliche Kollektionen zu finden, geben Sie die ID, oder einen Teil des Kollektions- bzw. Benutzernamens ein. Fügen Sie dann die Kollektion zu Ihren Kollektionen hinzu, um auf die Ressourcen zuzugreifen.',278,'de',NULL,NULL,0),
	('collection_manage','introtext','Organisieren und verwalten Sie Ihre Arbeit, indem Sie Ressourcen in Gruppen zusammenstellen. Erstellen Sie Kollektionen wie Sie sie benötigen. Sie können Kollektionen an andere weitergeben oder einfach Gruppen von Ressourcen zusammen halten. Alle Kollektionen in Ihrer Liste finden Sie im \"Meine Kollektionen\" Menü am unteren Ende des Fensters.',279,'de',NULL,NULL,0),
	('collection_manage','newcollection','Um eine neue Kollektion zu erstellen, geben Sie bitte einen Kurznamen an.',280,'de',NULL,NULL,0),
	('collection_public','introtext','�?ffentliche Kollektionen werden von anderen Benutzern erstellt und freigegeben.',281,'de',NULL,NULL,0),
	('contact','contact','Ihre Kontaktdaten hier.',282,'de',NULL,NULL,0),
	('contribute','introtext','Sie können Ihre eigenen Ressourcen hochladen. Wenn Sie eine Ressource erstellen, wird diese zunächst durch uns geprüft. Nachdem Sie die Datei hochgeladen und die Felder ausgefüllt haben, setzen Sie bitte den Status auf \"Benutzer-Beiträge: �?berprüfung noch nicht erledigt\".',283,'de',NULL,NULL,0),
	('delete','introtext','Bitte geben Sie Ihr Passwort ein, um zu bestätigen, dass Sie diese Ressource löschen wollen.',284,'de',NULL,NULL,0),
	('done','collection_email','Eine E-Mail mit Link zur Kollektion wurde an die angegebenen Benutzer gesendet. Die Kollektion wurde zur Liste Ihrer Kollektionen hinzugefügt.',285,'de',NULL,NULL,0),
	('done','deleted','Die Ressource wurde gelöscht.',286,'de',NULL,NULL,0),
	('done','research_request','Ein Mitglied unseres Teams wird sich um Ihre Anfrage kümmern. Wir werden Sie per e-mail über den aktuellen Stand informieren. Wenn Ihre Anfrage bearbeitet ist, erhalten Sie eine e-mail mit einem Link zu den Ressourcen, die wir für Ihre Anfrage empfehlen.',287,'de',NULL,NULL,0),
	('done','resource_email','Eine E-Mail mit Link zur Ressource wurde an die angegebenen Benutzer gesendet.',288,'de',NULL,NULL,0),
	('done','resource_request','Ihre Anfrage wurde abgeschickt und wird in Kürze bearbeitet.',289,'de',NULL,NULL,0),
	('done','user_password','Eine E-Mail mit Ihrem Benutzernamen und Passwort wurde an Sie gesendet.',290,'de',NULL,NULL,0),
	('done','user_request','Ihre Anfrage nach einem Zugang wurde abgeschickt und wird in Kürze bearbeitet.',291,'de',NULL,NULL,0),
	('download_click','introtext','Um die Datei herunterzuladen, clicken Sie bitte mit der rechten Maustaste auf den untenstehenden Link und wählen Sie \"Speichern unter...\". Sie können dann auswählen an welchem Ort Sie die Datei abspeichern wollen. Um die Datei im Browser zu öffnen, clicken Sie den Link bitte mit der linken Maustaste.',292,'de',NULL,NULL,0),
	('download_progress','introtext','Ihr Download wird in Kürze starten. Nachdem der Download abgeschlossen ist, wählen Sie bitte einen der folgenden Links.',293,'de',NULL,NULL,0),
	('edit','batch','Bitte geben Sie die gemeinsamen Inhalte und Stichworte für die Dateien, die Sie hochladen.',294,'de',NULL,NULL,0),
	('edit','multiple','Bitte wählen Sie die Felder aus, die Sie verändern wollen. Felder, die Sie nicht anwählen, werden nicht verändert.',295,'de',NULL,NULL,0),
	('help','introtext','Diese Anleitungen helfen Ihnen, ResourceSpace und Ihre Medien effektiv zu nutzen.</p>\n<p>Benutzen Sie \"Themen\", um Ressourcen nach Themen zu erkunden oder nutzen Sie die Suche um spezifische Ressourcen zu finden.</p>\n<p><a href=\"http://www.montala.net/downloads/resourcespace-GettingStarted.pdf\">User Guide</a> (PDF, englisch)<br /><a target=\"_blank\" href=\"http://wiki.resourcespace.org/index.php/Main_Page\">Online Dokumentation</a> (Wiki)</p>',296,'de',NULL,NULL,0),
	('home','help','Hilfe für die Arbeit mit ResourceSpace',297,'de',NULL,NULL,0),
	('home','mycollections','Hier können Sie Ihre Kollektionen organisieren, verwalten und weitergeben.',298,'de',NULL,NULL,0),
	('home','restrictedtext','Bitte klicken Sie auf den Link, den Sie per E-Mail erhalten haben, um auf die für Sie ausgesuchten Ressourcen zuzugreifen.',299,'de',NULL,NULL,0),
	('home','restrictedtitle','<h1>Willkommen bei ResourceSpace</h1>',300,'de',NULL,NULL,0),
	('home','themes','Von unserem Team vorausgewählte Bilder',301,'de',NULL,NULL,0),
	('home','welcometext','Ihr Einleitungstext hier',302,'de',NULL,NULL,0),
	('home','welcometitle','Willkommen bei ResourceSpace',303,'de',NULL,NULL,0),
	('login','welcomelogin','Willkommen bei ResourceSpace. Bitte loggen Sie sich ein...',304,'de',NULL,NULL,0),
	('research_request','introtext','Unser Team unterstützt Sie dabei, die optimalen Ressourcen für Ihre Projekte zu finden. Füllen Sie dieses Formular bitte möglichst vollständig aus, damit wir Ihre Anforderungen erfüllen können.\n<br /><br />\nWir werden Sie kontinuierlich informieren. Sobald wir Ihre Anfrage bearbeitet haben, werden Sie eine E-Mail mit einem Link zu den von uns empfohlenen Bildern erhalten.',305,'de',NULL,NULL,0),
	('resource_email','introtext','Geben Sie dieses Bild per E-Mail weiter. Es wird ein Link versendet. Sie können au�?erdem eine persönliche Nachricht in die E-Mail einfügen.',306,'de',NULL,NULL,0),
	('resource_request','introtext','Die Ressource, die Sie herunterladen möchten, ist nicht online verfügbar. Die Informationen zur Ressource werden automatisch per E-Mail versendet. Zusätzlich können Sie weitere Bemerkungen hinzufügen.',307,'de',NULL,NULL,0),
	('search_advanced','introtext','<strong>Suchtipp</strong><br>\nJeder Bereich, den Sie nicht ausfüllen / anclicken, liefert alle Resultate aus dem Bereich.',308,'de',NULL,NULL,0),
	('tag','introtext','Verbessern Sie die Suchergebnisse, indem Sie Ressourcen taggen. Sagen Sie, was Sie sehen, getrennt durch Leerzeichen oder Komma... z.B.: Hund, Haus, Ball, Geburtstag, Kuchen. Geben Sie den vollen Namen von Personen in Fotos und die Ort der Aufnahme an, wenn bekannt.',309,'de',NULL,NULL,0),
	('terms','introtext','Sie müssen zuerst die Nutzungsbedingungen akzeptieren.\n\n',310,'de',NULL,NULL,0),
	('terms','terms','Ihre Nutzungsbedingungen hier.',311,'de',NULL,NULL,0),
	('terms and conditions','terms and conditions','Ihre Nutzungsbedingungen hier.',312,'de',NULL,NULL,0),
	('themes','findpublic','�?ffentliche Kollektionen sind Kollektionen, die von anderen Benutzern freigegeben wurden.',313,'de',NULL,NULL,0),
	('themes','introtext','Themen sind von unserem Team zusammengestellte Gruppen von Ressourcen.',314,'de',NULL,NULL,0),
	('user_password','introtext','Bitte geben Sie Ihre E-Mail Adresse ein. Ihre Zugangsdaten werden dann an per E-Mail an Sie versendet.',315,'de',NULL,NULL,0),
	('user_request','introtext','Um einen Zugang anzufordern, füllen Sie bitte das untenstehende Formular aus.',316,'de',NULL,NULL,0),
	('team_archive','introtext','Um einzelne Ressourcen im Archiv zu bearbeiten, suchen Sie einfach nach den Ressourcen und klicken auf \"bearbeiten\" unter \"Ressourcen-Werkzeuge\". Alle Ressourcen, die archiviert werden sollen, werden in der Liste \"Archivierung noch nicht erledigt\" angezeigt. Von dieser Liste aus können Sie weitere Informationen ergänzen und die Ressource ins Archiv verschieben.',317,'de',NULL,NULL,0),
	('team_batch','introtext','Sie können einen Stapel Ressourcen hochladen, indem Sie sie auf einen FTP Server legen. Nachdem die Dateien importiert wurden, können sie vom FTP Server gelöscht werden.',318,'de',NULL,NULL,0),
	('team_batch_select','introtext','Sie können einen Stapel Ressourcen hochladen, indem Sie sie auf einen FTP Server legen. Nachdem die Dateien importiert wurden, können sie vom FTP Server gelöscht werden.',319,'de',NULL,NULL,0),
	('team_batch_upload','introtext','Sie können einen Stapel Ressourcen hochladen, indem Sie sie auf einen FTP Server legen. Nachdem die Dateien importiert wurden, können sie vom FTP Server gelöscht werden.',320,'de',NULL,NULL,0),
	('team_copy','introtext','Geben Sie die ID der Ressource ein, die Sie kopieren möchten. Nur die Metadaten der Ressource werden kopiert �?? hochgeladene Dateien werden nicht kopiert.',321,'de',NULL,NULL,0),
	('team_home','introtext','Willkommen in der Administration. Bitte benutzen Sie die untenstehenden Links, um die Ressourcen zu verwalten, auf Ressourcenanfragen zu antworten, Themen zu verwalten und die Systemeinstellungen zu bearbeiten.',322,'de',NULL,NULL,0),
	('team_report','introtext','Bitte wählen Sie einen Bericht und einen Zeitraum. Der Bericht kann in Microsoft Excel oder einer anderen Tabellenkalkulation geöffnet werden.',323,'de',NULL,NULL,0),
	('team_research','introtext','Organisieren und verwalten Sie Ihre \"Ressourcenanfragen\".<br /><br />Wählen Sie \"Anfrage bearbeiten\", um die Details der Anfrage zu sehen und sie einem Teammitglied zuzuweisen. Es ist möglich, eine Antwort auf einer existierenden Kollektion aufzubauen. Geben Sie dazu die Kollektions-ID in der Ansicht zur Bearbeitung ein.<br /><br />Wenn die Ressourcenanfrage zugewiesen ist, wählen Sie \"Kollektion bearbeiten\", um die Anfrage zu Ihren Kollektionen hinzuzufügen. So können Sie Ressourcen zu dieser Kollektion hinzufügen.<br /><br />Wenn die Kollektion vollständig ist, wählen Sie \"Anfrage bearbeiten\", stellen Sie den Status auf \"abgeschlossen\" und eine E-Mail wird automatisch an den Anfrager geschickt. Diese E-Mail enthält einen Link zur erstellten Kollektion, welche au�?erdem automatisch zu den Kollektionen des Benutzers hinzugefügt wird.',324,'de',NULL,NULL,0),
	('view','storyextract','Story:',325,'de',NULL,NULL,0),
	('team_resource','introtext','Fügen Sie einzelne Ressourcen hinzu oder nutzen Sie den Stapelupload. Um einzelne Ressourcen zu bearbeiten, suchen Sie nach der Ressource und wählen Sie \"bearbeiten\" unter den \"Ressourcen-Werkzeugen\".',326,'de',NULL,NULL,0),
	('team_stats','introtext','Statistiken werden auf Basis der aktuellsten Daten erstellt. Aktivieren Sie die Checkbox, um alle Statistiken für das gewählte Jahr auszugeben.',327,'de',NULL,NULL,0),
	('team_user','introtext','In diesem Bereich können Sie Benutzer hinzufügen, löschen und verändern.',328,'de',NULL,NULL,0),
	('themes','manage','Organisieren und bearbeiten Sie Ihre Themen. Themen sind besonders hervorgehobene Kollektionen. <br /><br /><strong>1 Um einen neuen Eintrag in einem Thema anzulegen, müssen Sie zuerst eine neue Kollektion anlegen</strong><br />Wählen Sie <strong>Meine Kollektionen</strong> aus der oberen Navigation und legen Sie eine neue <strong>öffentliche</strong> Kollektion an. Stellen Sie sicher, dass Sie einen Namen für Ihr Thema eingeben. Um die aktuelle Kollektion einem bestehenden Thema zuzuordnen, nutzen Sie einen bestehenden Themennamen. Wenn Sie einen noch nicht vergebenen Themennamen angeben, erstellen Sie ein neues Thema. <br /><br /><strong>2 Um den Inhalt eines bestehenden Themas zu ändern, </strong><br>wählen Sie <strong>\'Kollektion bearbeiten\'</strong>. Die Ressourcen in dieser Kollektion erscheinen unten im <strong>\'Meine Kollektionen\'</strong> Bereich. Nutzen Sie die Standardwerkzeuge um Resourcen zu bearbeiten, hizuzufügen oder zu löschen.<br /><br /><strong>3 Um eine Kollektion umzubenennen oder unter einem anderen Thema anzuzeigen,</strong><br />wählen Sie <strong>\'bearbeiten\'</strong> und bearbeiten Sie die Themenkategorie oder die Kollektionsnamen. <br /><br /><strong>4 Um eine Kollektion aus einem Thema zu entfernen,</strong><br>wählen Sie<strong> \'bearbeiten\'</strong> und löschen Sie den Eintrag im Feld \"Themen-Kategorie\".',329,'de',NULL,NULL,0),
	('upload','introtext','Nutzen Sie das untenstehende Formular, um eine Datei hochzuladen.',330,'de',NULL,NULL,0),
	('upload_swf','introtext','Klicken Sie auf die Schaltfläche unten, um Dateien hochzuladen. Sie können mehrere Dateien hochladen, wenn Sie beim Markieren die \'Shift\'-Taste gedrückt halten.',331,'de',NULL,NULL,0),
	('home','welcometitle','Välkommen till ResourceSpace',332,'sv',NULL,NULL,0),
	('home','welcometext','Skriv en introduktion här �?�',333,'sv',NULL,NULL,0),
	('all','footer','<a target=\"_top\" href=\"http://www.resourcespace.org/\">ResourceSpace</a>: Digital materialförvaltning (dam) med öppen källkod',334,'sv',NULL,NULL,0),
	('all','searchpanel','Sök efter material genom att ange beskrivning, nyckelord eller materialnr.',335,'sv',NULL,NULL,0),
	('resource_email','introtext','Dela snabbt och enkelt material med andra. Ett e-postmeddelande innehållande en webblänk till materialen skapas och skickas automatiskt. Du kan även lägga till ett eget meddelande.',336,'sv',NULL,NULL,0),
	('home','themes','De bästa materialen, speciellt utvalda och sorterade.',337,'sv',NULL,NULL,0),
	('home','restrictedtitle','<h1>Välkommen till ResourceSpace</h1>',338,'sv',NULL,NULL,0),
	('about','about','Din egen text för �??Om oss�?? �?�',339,'sv',NULL,NULL,0),
	('home','help','Hjälp och tips som ser till att du får ut det mesta möjliga av ResourceSpace.',340,'sv',NULL,NULL,0),
	('home','mycollections','Organisera dina material och samarbeta med andra. De här verktygen hjälper dig att arbeta mer effektivt.',341,'sv',NULL,NULL,0),
	('terms','terms','Dina regler �?�',342,'sv',NULL,NULL,0),
	('terms and conditions','terms and conditions','Dina regler och villkor �?�',343,'sv',NULL,NULL,0),
	('home','restrictedtext','Klicka på webblänken som skickades till dig om du vill komma åt materialen som är utvalda för dig.',344,'sv',NULL,NULL,0),
	('change_language','introtext','Välj ditt önskade språk nedan.',345,'sv',NULL,NULL,0),
	('all','researchrequest','Låt vårt team hitta materialen du är ute efter.',346,'sv',NULL,NULL,0),
	('change_password','introtext','Skriv in ett nytt lösenord nedan om du vill byta lösenord.',347,'sv',NULL,NULL,0),
	('contact','contact','Dina kontaktuppgifter �?�',348,'sv',NULL,NULL,0),
	('view','storyextract','Textutdrag:',349,'sv',NULL,NULL,0),
	('team_home','introtext','Välkommen till sidan Administration. Använd länkarna nedan om du vill administrera material, svara på förfrågningar, hantera teman och ändra systeminställningar.',350,'sv',NULL,NULL,0),
	('themes','introtext','Teman är grupper av material som har valts ut av administratörerna som exempel på vilka material som finns i systemet.',351,'sv',NULL,NULL,0),
	('collection_manage','findpublic','Gemensamma samlingar är grupper av material som har gjorts allmänt tillgängliga av användare i systemet. Skriv in ett samlingsnr, hela eller delar av samlingsnamnet, eller ett användarnamn när du vill söka efter en gemensam samling. Lägg till den hittade samlingen till din lista över samlingar om du vill kunna nå materialen enkelt.',352,'sv',NULL,NULL,0),
	('collection_public','introtext','Gemensamma samlingar är skapade av andra användare.',353,'sv',NULL,NULL,0),
	('themes','findpublic','Gemensamma samlingar är samlingar med material som har delats ut av andra användare.',354,'sv',NULL,NULL,0),
	('help','introtext','Få ut det mesta möjliga av ResourceSpace. Instruktionerna nedan hjälper dig att använda systemet och materialen effektivare.</p>\n\n<p>Använd Teman om du vill bläddra bland material per tema eller använd Enkel sökning om du vill söka efter specifikt material.</p>\n\n<p><a target=\"_blank\" href=\"http://www.montala.net/downloads/resourcespace-GettingStarted.pdf\">Hämta den engelska användarhandboken (pdf-fil)</a>\n\n<p><a target=\"_blank\" href=\"http://wiki.resourcespace.org/index.php/Main_Page\">Dokumentation på webben (engelskspråkig wiki)</a>',355,'sv',NULL,NULL,0),
	('collection_email','introtext','Dela snabbt och enkelt materialet i denna samling med andra. Ett e-postmeddelande innehållande en webblänk till materialet skapas och skickas automatiskt. Du kan även lägga till ett eget meddelande.',356,'sv',NULL,NULL,0),
	('collection_edit','introtext','Organisera och hantera dina material genom att dela upp dem i samlingar.\n\n<br>\n\nDu når alla dina samlingar från panelen <b>Mina&nbsp;samlingar</b> i nederkant av skärmen.\n\n<br><br>\n\n<strong>Privat åtkomst</strong> tillåter endast dig och dina utvalda användare att se samlingen. Idealiskt om du vill samla material i projekt som du jobbar med enskilt eller i en grupp.\n\n<br><br>\n\n<strong>Gemensam åtkomst</strong> tillåter alla interna användare att söka efter och se samlingen. Användbart om du vill dela materialet med andra som skulle kunna ha nytta av det. \n\n<br><br>\n\nDu kan välja om du vill att de andra användarna ska kunna lägga till och ta bort material eller bara kunna visa materialen.',357,'sv',NULL,NULL,0),
	('edit','multiple','Markera de fält du vill uppdatera med ny information. Omarkerade fält lämnas oförändrade.',358,'sv',NULL,NULL,0),
	('collection_manage','introtext','Organisera och hantera ditt material genom att dela upp det i samlingar. Skapa samlingar för ett eget projekt, om du vill underlätta samarbetet i en projektgrupp eller om du vill samla dina favoriter på ett ställe. Du når alla dina samlingar från panelen <b>Mina&nbsp;samlingar</b> i nederkant av skärmen.',359,'sv',NULL,NULL,0),
	('delete','introtext','Du måste ange ditt lösenord för att bekräfta att du vill ta bort det här materialet.',360,'sv',NULL,NULL,0),
	('done','deleted','Materialet har tagits bort.',361,'sv',NULL,NULL,0),
	('collection_manage','newcollection','Fyll i ett samlingsnamn om du vill skapa en ny samling.',362,'sv',NULL,NULL,0),
	('contribute','introtext','Du kan bidra med eget material. När du först skapar materialet får det statusen �??Under registrering�??. �?verför en eller flera filer och fyll i fälten med relevant metadata. Sätt statusen till �??Väntande på granskning�?? när du är klar.',363,'sv',NULL,NULL,0),
	('done','collection_email','Ett e-postmeddelande innehållande en webblänk har skickats till användarna du specificerade. Samlingen har lagts till i respektive användares panel <b>Mina&nbsp;samlingar</b>.',364,'sv',NULL,NULL,0),
	('done','research_request','En medlem av researchteamet kommer att få i uppdrag att besvara din researchförfrågan. Vi kommer att hålla kontakt genom e-post under arbetets gång. När vi har slutfört arbetet kommer du att få ett e-postmeddelande med en webblänk till alla material vi rekommenderar.',365,'sv',NULL,NULL,0),
	('done','resource_email','Ett e-postmeddelande innehållande en webblänk till materialen har skickats till användarna du specificerade.',366,'sv',NULL,NULL,0),
	('done','resource_request','Din begäran har mottagits och vi kommer att höra av oss inom kort.',367,'sv',NULL,NULL,0),
	('done','user_password','Ett e-postmeddelande innehållande ditt användarnamn och lösenord har skickats.',368,'sv',NULL,NULL,0),
	('done','user_request','Din ansökan om ett användarkonto har skickats. Dina inloggningsuppgifter kommer att skickas till dig inom kort.',369,'sv',NULL,NULL,0),
	('download_click','introtext','Högerklicka på länken nedan och välj <b>Spara&nbsp;som</b> om du vill hämta materialet. Du kommer att få frågan var du vill spara filen. �?ppna filen i din webbläsare genom att klicka på webblänken.',370,'sv',NULL,NULL,0),
	('download_progress','introtext','Din hämtning startas inom kort. När hämtningen är klar kan du fortsätta genom att klicka på länkarna nedan.',371,'sv',NULL,NULL,0),
	('edit','batch',NULL,372,'sv',NULL,NULL,0),
	('team_resource','introtext','Lägg till material ett och ett eller i grupp. Om du vill redigera ett material kan du enklast söka efter det och sedan klicka på <b>Redigera</b> på sidan som visar materialet.',373,'sv',NULL,NULL,0),
	('login','welcomelogin','Välkommen till ResourceSpace',374,'sv',NULL,NULL,0),
	('user_request','introtext','Fyll i formuläret nedan om du vill ansöka om ett användarkonto.',375,'sv',NULL,NULL,0),
	('research_request','introtext','Researchteamet hjälper dig att finna de bästa materialen till dina projekt. Fyll i formuläret nedan så noggrant som möjligt så att vi kan ge dig ett relevant svar. <br><br>En medlem av teamet kommer att få i uppdrag att besvara din researchförfrågan. Vi kommer att hålla kontakt genom e-post under arbetets gång. När vi har slutfört arbetet kommer du att få ett e-postmeddelande med en webblänk till alla material vi rekommenderar.',376,'sv',NULL,NULL,0),
	('resource_request','introtext','Materialet du begärde finns inte tillgängligt. Information om materialet infogas automatiskt i e-postmeddelandet, och du kan även lägga till en egen kommentar om du vill.',377,'sv',NULL,NULL,0),
	('search_advanced','introtext','<strong>Söktips</strong><br>Ett avsnitt som du lämnar tomt eller omarkerat medför att <i>allt</i> inkluderas i sökningen. Om du till exempel lämnar alla länders kryssrutor omarkerade, begränsas sökningen inte med avseende på land. Om du däremot sedan markerar kryssrutan �??Sverige�?? ger sökningen endast material från just Sverige.',378,'sv',NULL,NULL,0),
	('tag','introtext','Hjälp till att förbättra framtida sökresultat genom att förse materialen med relevant metadata. Ange till exempel nyckelord som beskrivning av vad du ser på en bild: kanin, hus, boll, födelsedagstårta. Separera nyckelorden med kommatecken eller mellanslag. Ange fullständiga namn på alla personer som förekommer på ett fotografi. Ange platsen för ett fotografi om den är känd.',379,'sv',NULL,NULL,0),
	('user_password','introtext','Fyll i din e-postadress och ditt användarnamn så kommer ett nytt lösenord att skickas till dig.',380,'sv',NULL,NULL,0),
	('upload_swf','introtext',NULL,381,'sv',NULL,NULL,0),
	('upload','introtext',NULL,382,'sv',NULL,NULL,0),
	('themes','manage','Organisera och redigera tillgängliga teman. Teman är grupper av material som har valts ut av administratörerna som exempel på vilka material som finns i systemet.<br><br><strong>Skapa teman</strong><br><Om du vill skapa ett nytt tema måste du först skapa en samling.<br>Gå till <b>Mina&nbsp;samlingar</b> och skapa en ny <strong>gemensam samling</strong>. Välj en temakategori från listan om du vill lägga till samlingen i en existerande temakategori eller ange ett nytt namn om du vill skapa en ny temakategori. Tillåt inte användare att lägga till/ta bort material från teman.<br><br><strong>Redigera teman</strong><br>Om du vill redigera materialen i ett existerande tema väljer du verktyget <strong>Välj samling</strong>. Materialen i samlingen blir då åtkomliga i panelen <b>Mina&nbsp;samlingar</b> i nederkanten av skärmen. Använd de vanliga verktygen om du vill redigera, lägga till eller ta bort material.<br><br><strong>Byta namn på teman och flytta samlingar</strong><br>Välj verktyget <strong>Redigera samling</strong>. Ange ett nytt namn i fältet Namn om du vill byta namn på temat. Välj en temakategori från listan om du vill flytta samlingen till en existerande temakategori eller ange ett nytt namn om du vill skapa en ny temakategori och flytta samlingen dit.<br><br><strong>Ta bort en samling från ett tema</strong><br>Välj verktyget <strong>Redigera samling</strong> och rensa fältet Temakategori och fältet där nya temakategorinamn anges.',383,'sv',NULL,NULL,0),
	('terms','introtext','Innan du kan fortsätta måste du acceptera reglerna och villkoren.',384,'sv',NULL,NULL,0),
	('team_user','introtext','Använd den här delen om du vill lägga till, ta bort eller redigera användare.',385,'sv',NULL,NULL,0),
	('team_stats','introtext','En statistikrapport kan skapas vid behov, baserad på aktuell data. Markera kryssrutan om du vill skriva ut all statistik för det valda året.',386,'sv',NULL,NULL,0),
	('team_research','introtext','Organisera och hantera researchförfrågningar.<br><br>Välj verktyget <b>Redigera researchförfrågan</b> om du vill granska förfrågan och tilldela en medlem i researchteamet uppdraget att besvara förfrågan. Med samma verktyg kan du lägga till en befintlig samling till researchen genom att ange samlingens nummer.<br><br>När en medlem har tilldelats researchen blir den tillgänglig för medlemmen i panelen <b>Mina&nbsp;samlingar</b>. Använd de vanliga verktygen om du vill lägga till material till researchen.<br><br>När researchen är slutförd väljer du återigen verktyget <b>Redigera researchförfrågan</b> och ändrar status till �??Besvarad�??. När du klickar på <b>Spara</b> skickas automatiskt ett e-postmeddelande till användaren som skickade researchförfrågan. Meddelandet innehåller en webblänk som leder till researchen och den läggs också till i användarens panel<b>Mina&nbsp;samlingar</b>.',387,'sv',NULL,NULL,0),
	('team_report','introtext','Välj en rapport och en period. Rapporten kan öppnas i till exempel MS Excel eller LibreOffice Calc.',388,'sv',NULL,NULL,0),
	('team_copy','introtext','Ange numret för materialet du vill kopiera. Endast materialets metadata kommer att kopieras &ndash; eventuella filer kommer inte att kopieras.',389,'sv',NULL,NULL,0),
	('team_batch_upload','introtext',NULL,390,'sv',NULL,NULL,0),
	('team_batch_select','introtext',NULL,391,'sv',NULL,NULL,0),
	('team_batch','introtext',NULL,392,'sv',NULL,NULL,0),
	('team_archive','introtext','Om du vill redigera ett arkiverat material gör du det enklast genom att söka efter det här och sedan klicka på <b>Redigera</b> på sidan som visar materialet. Alla material som väntar på arkivering kan enkelt nås från länken nedan. Lägg till eventuell relevant information innan du flyttar materialet till arkivet.',393,'sv',NULL,NULL,0),
	('all','emailcollectionexternal','[img_../gfx/whitegry/titles/title.gif]<br>\n[fromusername] [lang_emailcollectionmessageexternal] <br><br> \n[lang_message] : [message]<br><br> \n[lang_clicklinkviewcollection] [list]\n',100123,'en',NULL,NULL,1),
	('all','footer','Powered by <a target=\"_top\" href=\"http://www.norgesfilm.no/\">Norgesfilm</a>: Open Source Digital Asset Management',100124,'no',NULL,NULL,0),
	('all','researchrequest','Søk for å finne et verk!',100125,'no',NULL,NULL,0),
	('all','searchpanel','Søk ved bruk av beskrivelse, nøkkelord eller videokunst ID',100126,'no',NULL,NULL,0),
	('about','about','Videokunstarkivet er et treårig pilotprosjekt initiert og støttet av Norsk  kulturråd som skal drives av PNEK i årene 2012 til 2014. <br>\r\n<br>\r\nProsjektet går ut på å lage et arkiv og kompetansesenter for norsk videokunst og består av flere elementer:<br>\r\n<br>\r\n- Kartlegging og innsamling <br>\r\n- Digitalisering<br>\r\n- Arkivering<br>\r\n- Forskning<br>\r\n- Formidling<br>\r\n<br>\r\nModellen for gjennomføringen bygger på en nettverkstruktur med en ressursgruppe som faglig råd. Prosjektet skal tilfredsstille kunstfaglige, arkivfaglige, praktiske og tekniske krav og vil følge internasjonale og åpne standarder. Av bevaringsmessige hensyn er PNEK pålagt av Kulturrådet å starte innsamlingen av materiale med det eldste først. Registrering og innsamling av materiale vil starte for fullt høsten 2012.<br>\r\n<br>\r\nTeknisk hovedsamarbeidspartner er Norgesfilm A/S i Kristiansand.<br>',100127,'no',NULL,NULL,0),
	('change_language','introtext','Velg meny språk',100128,'no',NULL,NULL,0),
	('change_password','introtext','Opprette nytt passord',100129,'no',NULL,NULL,0),
	('collection_edit','introtext','Organise and manage your work by grouping resources together. Create Collections to suit your way of working.\r\n\r\n<br>\r\n\r\nAll the collections in your list appear in the My Collections panel at the bottom of the screen\r\n\r\n<br><br>\r\n\r\n<strong>Private Access</strong> allows only you and and selected users to see the collection. Ideal for grouping resources under projects that you are working on independently and share resources amongst a project team.\r\n\r\n<br><br>\r\n\r\n<strong>Public Access</strong> allows all users of the system to search and see the collection. Useful if you wish to share collections of resources that you think others would benefit from using.\r\n\r\n<br><br>\r\n\r\nYou can choose whether you allow other users (public or users you have added to your private collection) to add and remove resources or simply view them for reference.',100130,'no',NULL,NULL,0),
	('collection_email','introtext','Complete the form below to e-mail this collection. The user(s) will receive a link to the resource rather than file attachments so they can choose and download the appropriate resources.',100131,'no',NULL,NULL,0),
	('contact','contact','Videokunstarkivet <br>\r\nPostboks 2181 Grünerløkka <br>\r\n0505 Oslo <br>\r\n <br>\r\nKontortelefon: 47955376 <br>\r\nepost: pnek@pnek.org <br>\r\n <br>\r\nBesøksadresse: <br>\r\nOlaf Ryes plass 2 <br>\r\n0552 Oslo <br>\r\n <br>\r\nPERSONER <br>\r\nProsjektleder: Per Platou <br>\r\nKoordinator: Ida Lykken Ghosh <br>\r\n <br>\r\nRessursgruppe: <br>\r\nMarit Paasche (forskning) <br>\r\nIvar Smedstad (eldre teknikker) <br>\r\nAnne Marthe Dyvi (formidling) <br>\r\n <br>\r\nKontaktperson Norsk kulturråd: Birgit Bærøe <br>',100132,'no',NULL,NULL,0),
	('contribute','introtext','You can contribute your own resources. When you initially create a resource it is in the \"Pending Submission\" status. When you have uploaded your file and edited the fields, set the status field to \"Pending Review\". It will then be reviewed by the resources team.',100133,'no',NULL,NULL,0),
	('done','collection_email','An email containing a link to the collection has been sent to the users you specified. The collection has been added to their \'Collections\' list.',100134,'no',NULL,NULL,0),
	('done','deleted','filen er nå slettet',100135,'no',NULL,NULL,0),
	('done','resource_email','An email containing a link to the resource has been sent to the users you specified.',100136,'no',NULL,NULL,0),
	('help','introtext','Norgesfilm teknisk support: <br>\r\n <br> \r\n<br>\r\nTlf:                +47 38 12 41 00 <br>\r\nepost             support@norgesfilm.no <br>\r\n <br>\r\nDirekte kontakt: <br>\r\n <br>\r\nRoger Flatebø <br>\r\nTlf:               +47 41 40 10 35 <br>\r\nepost:          roger@norgesfilm.no <br>',100137,'no',NULL,NULL,0),
	('home','restrictedtitle','<h1>Videokunstarkivet</h1>',100138,'no',NULL,NULL,0),
	('home','help','Hjelp',100139,'no',NULL,NULL,0),
	('home','mycollections','Organiser og del dine verk',100140,'no',NULL,NULL,0),
	('home','restrictedtext','Please click on the link that you were e-mailed to access the resources selected for you.',100141,'no',NULL,NULL,0),
	('home','welcometext','Videokunstarkivet er et treårig pilotprosjekt initiert og støttet av Norsk kulturråd som skal drives av PNEK i årene 2012 til 2014.',100142,'no',NULL,NULL,0),
	('home','welcometitle','Velkommen til videokunstarkivet',100143,'no',NULL,NULL,0),
	('login','welcomelogin','Logg inn her',100144,'no',NULL,NULL,0),
	('research_request','introtext','Our professional researchers are here to assist you in finding the very best resources for your projects. Complete this form as thoroughly as possible so we�??re able to meet your criteria accurately. <br><br>A member of the research team will be assigned to your request. We�??ll keep in contact via email throughout the process, and once we�??ve completed the research you�??ll receive an email with a link to all the resources that we recommend.  ',100145,'no',NULL,NULL,0),
	('tag','introtext','Help to improve search results by tagging resources. Say what you see, separated by spaces or commas... for example: dog, house, ball, birthday cake. Enter the full name of anyone visible in the photo and the location the photo was taken if known.',100146,'no',NULL,NULL,0),
	('home','themes','Kategori oversikt',100147,'no',NULL,NULL,0),
	('themes','introtext','Klikk for å vise filmene fordelt pr Tags!',100148,'no',NULL,NULL,0),
	('search_advanced','introtext','<strong>Søke tips</strong><br>Enhver del som du lar stå tomt, eller unticked vil omfatte alle disse ordene i søket. For eksempel, hvis du lar alle landets boksene tom, vil søket returnere resultater fra alle disse landene. Hvis du velger bare \"kunstner\" vil resultatene bare inneholde ressurser fra \'Kjell Bjørgeengen\'.',100149,'no',NULL,NULL,0),
	('collection_manage','introtext','Organise and manage your work by grouping resources together. Create Collections to suit your way of working. You may want to group resources under projects that you are working on independently, share resources amongst a project team or simply keep your favourite resources together in one place. All the collections in your list appear in the  My Collections  panel at the bottom of the screen.',100150,'no',NULL,NULL,0),
	('done','research_request','A member of the research team will be assigned to your request. Well keep in contact via email throughout the process, and once we have completed the research you will receive an email with a link to all the resources that we recommend.',100151,'no',NULL,NULL,0),
	('team_research','introtext','Organise and manage Research Requests. <br><br>Choose edit research to review the request details and assign the research to a team member. It is possible to base a research request on a previous collection by entering the collection ID in the edit  screen. <br><br>Once the research request is assigned, choose edit collection to add the research request to My collection panel. Using the standard tools, it is then possible to add resources to the research. <br><br>Once the research is complete, choose edit research,  change the status to complete and an email is automatically  sent to the user who requested the research. The email contains a link to the research and it is also automatically added to their My Collection panel.',100152,'no',NULL,NULL,0);

/*!40000 ALTER TABLE `site_text` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sysvars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sysvars`;

CREATE TABLE `sysvars` (
  `name` varchar(50) DEFAULT NULL,
  `value` text,
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sysvars` WRITE;
/*!40000 ALTER TABLE `sysvars` DISABLE KEYS */;

INSERT INTO `sysvars` (`name`, `value`)
VALUES
	('last_sent_stats','2016-05-27 03:15:02'),
	('last_cron','2016-05-30 03:16:01');

/*!40000 ALTER TABLE `sysvars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table transfer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transfer`;

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_id` int(11) NOT NULL DEFAULT '0',
  `sender_id` int(11) NOT NULL DEFAULT '0',
  `creation_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `is_expired` tinyint(1) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `message` text,
  `recipients_json` text,
  `files_json` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix-transfer-key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table undo_step
# ------------------------------------------------------------

DROP TABLE IF EXISTS `undo_step`;

CREATE TABLE `undo_step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) DEFAULT NULL,
  `field_id` int(11) NOT NULL DEFAULT '0',
  `original_value` text,
  PRIMARY KEY (`id`),
  KEY `ix_undo_step_user` (`transaction_id`,`id`),
  KEY `ix_undo_step_transaction` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table undo_transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `undo_transaction`;

CREATE TABLE `undo_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `resource_id` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `is_rollback` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ix_undo_transaction_user` (`user_id`,`creation_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `usergroup` int(11) DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `logged_in` int(11) DEFAULT NULL,
  `last_browser` text,
  `last_ip` varchar(100) DEFAULT NULL,
  `current_collection` int(11) DEFAULT NULL,
  `accepted_terms` int(11) DEFAULT '0',
  `account_expires` datetime DEFAULT NULL,
  `comments` text,
  `session` varchar(50) DEFAULT NULL,
  `ip_restrict` text,
  `password_last_change` datetime DEFAULT NULL,
  `login_tries` int(11) DEFAULT '0',
  `login_last_try` datetime DEFAULT NULL,
  `approved` int(11) DEFAULT '1',
  `lang` varchar(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation_key` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `address` text,
  `hidden_collections` text,
  `password_reset_hash` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  UNIQUE KEY `ix_user_key` (`activation_key`),
  KEY `session` (`session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`ref`, `username`, `password`, `fullname`, `email`, `usergroup`, `last_active`, `logged_in`, `last_browser`, `last_ip`, `current_collection`, `accepted_terms`, `account_expires`, `comments`, `session`, `ip_restrict`, `password_last_change`, `login_tries`, `login_last_try`, `approved`, `lang`, `created`, `activation_key`, `telephone`, `address`, `hidden_collections`, `password_reset_hash`)
VALUES
	(1,'admin','179026592ba41c477a908c75b5d68b4eead6328890315803328ba0dbbc2796c9','Admin @ VKA','info@pnek.org',1,'2016-08-04 17:02:18',1,'','127.0.0.1',260,1,NULL,NULL,'e8f5076c32df95a0c7b7f04b917fbd93','','2016-08-04 16:44:48',0,NULL,1,'en-US','2016-08-04 16:07:20',NULL,'','',NULL,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_collection
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_collection`;

CREATE TABLE `user_collection` (
  `user` int(11) DEFAULT NULL,
  `collection` int(11) DEFAULT NULL,
  `request_feedback` int(11) DEFAULT '0',
  KEY `collection` (`collection`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_collection` WRITE;
/*!40000 ALTER TABLE `user_collection` DISABLE KEYS */;

INSERT INTO `user_collection` (`user`, `collection`, `request_feedback`)
VALUES
	(1,1,0);

/*!40000 ALTER TABLE `user_collection` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_dash_tile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_dash_tile`;

CREATE TABLE `user_dash_tile` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `dash_tile` int(11) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_message`;

CREATE TABLE `user_message` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL DEFAULT '0',
  `message` int(11) NOT NULL DEFAULT '0',
  `seen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ref`,`user`,`message`,`seen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table user_preferences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_preferences`;

CREATE TABLE `user_preferences` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `parameter` varchar(150) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table user_profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_profile`;

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_md5` varchar(255) DEFAULT NULL,
  `login_key` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_to_confirm` varchar(255) DEFAULT NULL,
  `is_confirmed` tinyint(1) DEFAULT '0',
  `rights_id` int(11) NOT NULL DEFAULT '1',
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `has_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `newsletter_key` varchar(255) DEFAULT NULL,
  `accepted_terms` tinyint(4) DEFAULT NULL,
  `derestrict_filter` text,
  `group_specific_logo` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix-user-profile-username` (`username`),
  UNIQUE KEY `ix_user_profile_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_rating
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_rating`;

CREATE TABLE `user_rating` (
  `user` int(11) DEFAULT '0',
  `rating` int(11) DEFAULT '0',
  `ref` int(11) DEFAULT '0',
  KEY `ref` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_userlist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_userlist`;

CREATE TABLE `user_userlist` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `userlist_name` varchar(50) DEFAULT NULL,
  `userlist_string` text,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table usergroup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usergroup`;

CREATE TABLE `usergroup` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `permissions` text,
  `fixed_theme` varchar(50) DEFAULT NULL,
  `parent` varchar(50) DEFAULT NULL,
  `search_filter` text,
  `edit_filter` text,
  `ip_restrict` text,
  `resource_defaults` text,
  `config_options` text,
  `welcome_message` text,
  `request_mode` int(11) DEFAULT '0',
  `allow_registration_selection` int(11) DEFAULT '0',
  `moderator_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `is_moderation_active` tinyint(4) NOT NULL DEFAULT '1',
  `interval` varchar(255) DEFAULT NULL,
  `down_time_start` varchar(255) DEFAULT NULL,
  `down_time_end` varchar(255) DEFAULT NULL,
  `last_checked` datetime DEFAULT NULL,
  `rights_json` text,
  `visible_items` text,
  `application_title` varchar(255) DEFAULT NULL,
  `derestrict_filter` text,
  `group_specific_logo` text,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;

INSERT INTO `usergroup` (`ref`, `name`, `permissions`, `fixed_theme`, `parent`, `search_filter`, `edit_filter`, `ip_restrict`, `resource_defaults`, `config_options`, `welcome_message`, `request_mode`, `allow_registration_selection`, `moderator_id`, `email`, `is_moderation_active`, `interval`, `down_time_start`, `down_time_end`, `last_checked`, `rights_json`, `visible_items`, `application_title`, `derestrict_filter`, `group_specific_logo`)
VALUES
	(1,'Administrators','s,v,g,q,e-2,e-1,e0,e1,e3,c,i,n,b,j*,t,r,R,Ra,Rb,m,u,k,e,f,F-161,F-168,F-170,F-169,F-145,F-172,F-171,F-144,F-147,F-158,F-159,F-163,F-146,F-143,F-149,F-162,F-160,F-88,F-89,F-151,F-134,F-93,F-119,F-142,F-126,F-109,F-153,F-112,F-129,F-123,F-127,F-132,F-131,F-148,F-115,F-105,F-87,F-128,F-92,F-121,F-135,F-95,F-140,F-103,F-104,F-106,F-96,F-141,F-94,F-157,F-99,F-97,F-122,F-107,F-3,F-100,F-116,F-130,F-125,F-124,F-120,F-133,F-118,F-114,F-117,F-101,F-102,F-111,F-8,F-152,F-155,F-156,F-90',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,'now',NULL,NULL,NULL,'{\"fields\":{\"161\":2,\"168\":2,\"170\":2,\"169\":2,\"145\":2,\"172\":2,\"171\":2,\"144\":2,\"147\":2,\"158\":2,\"159\":2,\"163\":2,\"146\":2,\"143\":2,\"149\":2,\"162\":2,\"160\":2,\"88\":2,\"89\":2,\"151\":2,\"134\":2,\"93\":2,\"119\":2,\"142\":2,\"126\":2,\"109\":2,\"153\":2,\"112\":2,\"129\":2,\"123\":2,\"127\":2,\"132\":2,\"131\":2,\"148\":2,\"115\":2,\"105\":2,\"87\":2,\"128\":2,\"92\":2,\"121\":2,\"135\":2,\"95\":2,\"140\":2,\"103\":2,\"104\":2,\"106\":2,\"96\":2,\"141\":2,\"94\":2,\"157\":2,\"99\":2,\"97\":2,\"122\":2,\"107\":2,\"3\":2,\"100\":2,\"116\":2,\"130\":2,\"125\":2,\"124\":2,\"120\":2,\"133\":2,\"118\":2,\"114\":2,\"117\":2,\"101\":2,\"102\":2,\"111\":2,\"8\":2,\"152\":2,\"155\":2,\"156\":2,\"90\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/channels\":1,\"art\\/create\":1,\"art\\/description\":1,\"art\\/attributeLookup\":1,\"art\\/digitization\":1,\"art\\/alt-files\":1,\"art\\/alternative\":1,\"art\\/files\\/alt\":1,\"art\\/alt-download\":1,\"art\\/altcheck\":1,\"art\\/alt-edit\":1,\"art\\/files\\/alt\\/edit\":1,\"art\\/download\":1,\"art\\/upload\":1,\"job\\/reprocess\":1,\"art\\/files\\/master\":1,\"art\\/file\\/change\":1,\"art\\/files\\/master\\/change\":1,\"art\\/master\\/view\":1,\"art\\/preview\":1,\"art\\/files\\/view\":1,\"transfer\\/listFiles\":1,\"art\\/transfer\":1,\"art\\/files\\/transfer\":1,\"art\\/files\":1,\"art\\/history\":1,\"art\\/masterart\":1,\"site\\/lastDigitized\":1,\"art\\/view\":1,\"art\\/relatedAdd\":1,\"relatedDelete\":1,\"art\\/lookup\":1,\"art\\/relatedRemove\":1,\"art\\/related\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/artistLogin\":1,\"agent\\/sendartistinvitation\":1,\"agent\\/create\":1,\"agent\\/alt-files\":1,\"agent\\/alternative\":1,\"agent\\/files\\/alt\":1,\"agent\\/alt-download\":1,\"agent\\/altcheck\":1,\"agent\\/alt-edit\":1,\"agent\\/files\\/alt\\/edit\":1,\"agent\\/files\":1,\"agent\\/general\":1,\"agent\\/notes\":1,\"agent\\/view\":1,\"job\\/run\":1,\"moderation\":1,\"moderation\\/index\":1,\"moderation\\/toggle\":1,\"site\\/search\":1,\"access\\/index\":1,\"logging\\/index\":1,\"system\":1,\"job\\/index\":1,\"site\\/resourcespace\":1,\"site\\/systemInfo\":1}}',',art/agent,art/artworkInfo,art/channels,art/create,art/description,art/digitization,art/files/alt,art/files/alt/edit,art/files/master,art/files/master/change,art/files/view,art/files/transfer,art/files,art/history,art/masterart,art/view,art/related,agent/works,agent/biography,agent/artistLogin,agent/create,agent/files/alt,agent/files/alt/edit,agent/files,agent/general,agent/notes,agent/view,job/run,moderation,moderation/index,moderation/toggle,site/search,access/index,logging/index,system,job/index,site/resourcespace,site/systemInfo','VKA Archive Tool: Admin',NULL,NULL),
	(2,'General Users','s,g,q,f*,e-2,e-1,d,n,b,j*',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,'Super Admin','s,v,g,q,f*,e-2,e-1,e0,e1,e2,e3,c,i,n,j*,t,r,R,Ra,o,m,u,k,a,e',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,1,'now',NULL,NULL,NULL,'{\"fields\":{\"161\":2,\"168\":2,\"170\":2,\"169\":2,\"145\":2,\"172\":2,\"171\":2,\"144\":2,\"147\":2,\"158\":2,\"159\":2,\"163\":2,\"146\":2,\"143\":2,\"149\":2,\"162\":2,\"160\":2,\"88\":2,\"89\":2,\"151\":2,\"134\":2,\"93\":2,\"119\":2,\"142\":2,\"126\":2,\"109\":2,\"153\":2,\"112\":2,\"129\":2,\"123\":2,\"127\":2,\"132\":2,\"131\":2,\"148\":2,\"115\":2,\"105\":2,\"87\":2,\"128\":2,\"92\":2,\"121\":2,\"135\":2,\"95\":2,\"140\":2,\"103\":2,\"104\":2,\"106\":2,\"96\":2,\"141\":2,\"94\":2,\"157\":2,\"99\":2,\"97\":2,\"122\":2,\"107\":2,\"3\":2,\"100\":2,\"116\":2,\"130\":2,\"125\":2,\"124\":2,\"120\":2,\"133\":2,\"118\":2,\"114\":2,\"117\":2,\"101\":2,\"102\":2,\"111\":2,\"8\":2,\"152\":2,\"155\":2,\"156\":2,\"90\":2,\"164\":2,\"165\":2,\"166\":2,\"167\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/channels\":1,\"art\\/create\":1,\"art\\/description\":1,\"art\\/attributeLookup\":1,\"art\\/digitization\":1,\"art\\/alt-files\":1,\"art\\/alternative\":1,\"art\\/files\\/alt\":1,\"art\\/alt-download\":1,\"art\\/altcheck\":1,\"art\\/alt-edit\":1,\"art\\/files\\/alt\\/edit\":1,\"art\\/download\":1,\"art\\/upload\":1,\"job\\/reprocess\":1,\"art\\/files\\/master\":1,\"art\\/file\\/change\":1,\"art\\/files\\/master\\/change\":1,\"art\\/master\\/view\":1,\"art\\/preview\":1,\"art\\/files\\/view\":1,\"transfer\\/listFiles\":1,\"art\\/transfer\":1,\"art\\/files\\/transfer\":1,\"art\\/files\":1,\"art\\/history\":1,\"art\\/masterart\":1,\"site\\/lastDigitized\":1,\"art\\/view\":1,\"art\\/relatedAdd\":1,\"relatedDelete\":1,\"art\\/lookup\":1,\"art\\/relatedRemove\":1,\"art\\/related\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/artistLogin\":1,\"agent\\/sendartistinvitation\":1,\"agent\\/create\":1,\"agent\\/alt-files\":1,\"agent\\/alternative\":1,\"agent\\/files\\/alt\":1,\"agent\\/alt-download\":1,\"agent\\/altcheck\":1,\"agent\\/alt-edit\":1,\"agent\\/files\\/alt\\/edit\":1,\"agent\\/files\":1,\"agent\\/general\":1,\"agent\\/notes\":1,\"agent\\/view\":1,\"job\\/run\":1,\"moderation\":1,\"moderation\\/index\":1,\"moderation\\/toggle\":1,\"site\\/search\":1,\"access\\/index\":1,\"logging\\/index\":1,\"system\":1,\"job\\/index\":1,\"site\\/resourcespace\":1,\"site\\/systemInfo\":1,\"art\\/md5\":1,\"art\\/md5generate\":1,\"art\\/files\\/md5\":1,\"site\\/deleteFiles\":1,\"job\\/endprocess\":1,\"site\\/testFtp\":1,\"site\\/uploadedFiles\":1}}',',art/files/md5,art/files/transfer,agent/artistLogin,access/index,site/deleteFiles,logging/index,system,job/endprocess,job/index,site/resourcespace,site/systemInfo,site/testFtp,site/uploadedFiles',NULL,NULL,NULL),
	(4,'Archivists','s,g,c,e,t,h,r,u,i,e1,e2,e3,v,q,n,f*,j*',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,'VKA - Research','s,q,b,j*,f152,f126,f163,f151,f157,f134,f130,f133,f124,f125,f141,f128,f87,f148,f131,f132,f129,f123,F-161,F-145,F-144,F-147,F-158,F-159,F-143,F-149,F-162,F-160,F-88,F-89,F-93,F-119,F-142,F-109,F-153,F-112,F-127,F-115,F-105,F-92,F-121,F-95,F-140,F-103,F-104,F-106,F-96,F-94,F-99,F-97,F-122,F-107,F-3,F-100,F-116,F-120,F-118,F-114,F-117,F-101,F-102,F-111,F-8,F-155,F-156,F-90',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,1,'now',NULL,NULL,NULL,'{\"fields\":{\"152\":1,\"126\":1,\"163\":1,\"151\":1,\"157\":1,\"134\":1,\"130\":1,\"133\":1,\"124\":1,\"125\":1,\"141\":1,\"128\":1,\"87\":1,\"148\":1,\"131\":1,\"132\":1,\"129\":1,\"123\":1,\"161\":2,\"145\":2,\"144\":2,\"147\":2,\"158\":2,\"159\":2,\"143\":2,\"149\":2,\"162\":2,\"160\":2,\"88\":2,\"89\":2,\"93\":2,\"119\":2,\"142\":2,\"109\":2,\"153\":2,\"112\":2,\"127\":2,\"115\":2,\"105\":2,\"92\":2,\"121\":2,\"95\":2,\"140\":2,\"103\":2,\"104\":2,\"106\":2,\"96\":2,\"94\":2,\"99\":2,\"97\":2,\"122\":2,\"107\":2,\"3\":2,\"100\":2,\"116\":2,\"120\":2,\"118\":2,\"114\":2,\"117\":2,\"101\":2,\"102\":2,\"111\":2,\"8\":2,\"155\":2,\"156\":2,\"90\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/channels\":1,\"art\\/create\":1,\"art\\/description\":1,\"art\\/attributeLookup\":1,\"art\\/digitization\":1,\"art\\/download\":1,\"art\\/upload\":1,\"art\\/alt-download\":1,\"art\\/files\":1,\"art\\/files\\/alt\":1,\"art\\/alternative\":1,\"art\\/files\\/alt\\/edit\":1,\"art\\/history\":1,\"art\\/masterart\":1,\"art\\/view\":1,\"art\\/relatedAdd\":1,\"relatedDelete\":1,\"art\\/lookup\":1,\"art\\/relatedRemove\":1,\"art\\/related\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/general\":1,\"agent\\/files\":1,\"agent\\/files\\/alt\":1,\"agent\\/notes\":1,\"agent\\/view\":1,\"art\\/preview\":1,\"agent\\/preview\":1,\"site\\/search\":1}}',',art/agent,art/artworkInfo,art/channels,art/create,art/description,art/digitization,art/files,art/files/alt,art/files/alt/edit,art/history,art/masterart,art/view,art/related,agent/works,agent/biography,agent/general,agent/files,agent/files/alt,agent/notes,agent/view,site/search','Videokunstarkivet - Research (BETA)',NULL,NULL),
	(6,'VKA - Research - Moderated','s,q,b,j*,f125,f129,f123,f87,f148,f131,f132,f127,f128,f140,f141,f157,f130,f133,F-161,F-145,F-144,F-147,F-158,F-159,F-163,F-146,F-143,F-149,F-162,F-160,F-88,F-89,F-151,F-134,F-93,F-119,F-142,F-126,F-109,F-153,F-112,F-115,F-105,F-92,F-121,F-135,F-95,F-103,F-104,F-106,F-96,F-94,F-99,F-97,F-122,F-107,F-3,F-100,F-116,F-124,F-120,F-118,F-114,F-117,F-101,F-102,F-111,F-8,F-152,F-155,F-156,F-90',NULL,'5',NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'jaap@toxus.nl',0,'+2 hour',NULL,NULL,NULL,'{\"fields\":{\"152\":2,\"126\":2,\"163\":2,\"151\":2,\"157\":1,\"134\":2,\"130\":1,\"133\":1,\"124\":2,\"125\":1,\"141\":1,\"128\":1,\"87\":1,\"148\":1,\"131\":1,\"132\":1,\"129\":1,\"123\":1,\"161\":2,\"145\":2,\"144\":2,\"147\":2,\"158\":2,\"159\":2,\"143\":2,\"149\":2,\"162\":2,\"160\":2,\"88\":2,\"89\":2,\"93\":2,\"119\":2,\"142\":2,\"109\":2,\"153\":2,\"112\":2,\"127\":1,\"115\":2,\"105\":2,\"92\":2,\"121\":2,\"95\":2,\"140\":1,\"103\":2,\"104\":2,\"106\":2,\"96\":2,\"94\":2,\"99\":2,\"97\":2,\"122\":2,\"107\":2,\"3\":2,\"100\":2,\"116\":2,\"120\":2,\"118\":2,\"114\":2,\"117\":2,\"101\":2,\"102\":2,\"111\":2,\"8\":2,\"155\":2,\"156\":2,\"90\":2,\"146\":2,\"135\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/channels\":1,\"art\\/create\":1,\"art\\/description\":1,\"art\\/attributeLookup\":1,\"art\\/digitization\":1,\"art\\/download\":1,\"art\\/upload\":1,\"art\\/alt-download\":1,\"art\\/files\":1,\"art\\/files\\/alt\":1,\"art\\/alternative\":1,\"art\\/files\\/alt\\/edit\":1,\"art\\/history\":1,\"art\\/masterart\":1,\"art\\/view\":1,\"art\\/relatedAdd\":1,\"relatedDelete\":1,\"art\\/lookup\":1,\"art\\/relatedRemove\":1,\"art\\/related\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/general\":1,\"agent\\/files\":1,\"agent\\/files\\/alt\":1,\"agent\\/notes\":1,\"agent\\/view\":1,\"art\\/preview\":1,\"agent\\/preview\":1,\"site\\/search\":1,\"art\\/loggingDialog\":1,\"art\\/logging\":1,\"agent\\/create\":1,\"agent\\/alternative\":1,\"agent\\/files\\/alt\\/edit\":1}}',',art/agent,art/artworkInfo,art/channels,art/create,art/description,art/digitization,art/files,art/files/alt,art/files/alt/edit,art/history,art/logging,art/masterart,art/view,art/related,agent/works,agent/biography,agent/create,agent/general,agent/files,agent/files/alt,agent/files/alt/edit,agent/notes,agent/view,site/search',NULL,NULL,NULL),
	(7,'Restricted User - Payment Immediate','s,q,f*,b,j*',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,2,0,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(8,'Restricted User - Payment Invoice','s,q,f*,b,j*',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(9,'Digitalisering','s,g,f*,F*,X4,e0,c,i,b',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(10,'VKA Kurator','s,g,q,X4,X3,e-2,e-1,d,D,n,b,j*,f144,f147,f159,f163,f143,f149,f88,f89,f151,f93,f142,f112,f127,f131,f148,f92,f95,f103,f104,f106,f96,f94,f157,f97,f3,f114,f102,f111,f8,f155,f90,F-145,F-158,F-160,F-119,F-109,F-153,F-115,F-121,F-122,F-120,F-117,F-118',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,0,0,4,NULL,1,NULL,NULL,NULL,NULL,'{\"fields\":{\"144\":1,\"147\":1,\"159\":1,\"163\":1,\"143\":1,\"149\":1,\"88\":1,\"89\":1,\"151\":1,\"93\":1,\"142\":1,\"112\":1,\"127\":1,\"131\":1,\"148\":1,\"92\":1,\"95\":1,\"103\":1,\"104\":1,\"106\":1,\"96\":1,\"94\":1,\"157\":1,\"97\":1,\"3\":1,\"114\":1,\"102\":1,\"111\":1,\"8\":1,\"155\":1,\"90\":1,\"145\":2,\"158\":2,\"160\":2,\"119\":2,\"109\":2,\"153\":2,\"115\":2,\"121\":2,\"122\":2,\"120\":2,\"117\":2,\"118\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/create\":1,\"art\\/description\":1,\"art\\/alt-files\":1,\"art\\/alternative\":1,\"art\\/files\\/alt\":1,\"art\\/altcheck\":1,\"art\\/files\":1,\"art\\/history\":1,\"art\\/masterart\":1,\"site\\/lastDigitized\":1,\"art\\/view\":1,\"art\\/relatedAdd\":1,\"relatedDelete\":1,\"art\\/lookup\":1,\"art\\/relatedRemove\":1,\"art\\/related\":1,\"art\\/preview\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/create\":1,\"agent\\/general\":1,\"agent\\/alt-files\":1,\"agent\\/alternative\":1,\"agent\\/files\\/alt\":1,\"agent\\/files\":1,\"agent\\/notes\":1,\"agent\\/view\":1,\"site\\/search\":1}}',',art/agent,art/artworkInfo,art/create,art/description,art/files/alt,art/files,art/history,art/masterart,art/view,art/related,agent/works,agent/biography,agent/create,agent/general,agent/files/alt,agent/files,agent/notes,agent/view,site/search','VKA Archive Tool: Curator (beta v.2)',NULL,NULL),
	(11,'Artist',',f145,f143,f160,f144,f88,f158,f89,f163,f151,f134,f93,f119,f142,f109,f153,f112,f121,f94,f107,f3,f118,f117,f111,f8,f152,f155,f90,F-',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,1,NULL,NULL,NULL,NULL,'{\"fields\":{\"145\":1,\"143\":1,\"160\":1,\"144\":1,\"88\":1,\"158\":1,\"89\":1,\"163\":1,\"151\":1,\"134\":1,\"93\":1,\"119\":1,\"142\":1,\"109\":1,\"153\":1,\"112\":1,\"121\":1,\"94\":1,\"107\":1,\"3\":1,\"118\":1,\"117\":1,\"111\":1,\"8\":1,\"152\":1,\"155\":1,\"90\":1,\"0\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/channels\":1,\"art\\/description\":1,\"art\\/master\\/view\":1,\"art\\/preview\":1,\"art\\/files\\/view\":1,\"site\\/lastDigitized\":1,\"art\\/view\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/view\":1,\"site\\/search\":1,\"system\":1}}',',art/agent,art/artworkInfo,art/channels,art/description,art/files/view,art/view,agent/works,agent/biography,agent/view,site/search,system','VKA - Artist',NULL,NULL),
	(12,'Artist Personal Works',',f,F-161,F-145,F-144,F-147,F-158,F-159,F-163,F-143,F-88,F-89,F-151,F-149,F-162,F-160,F-93,F-119,F-164,F-109,F-153,F-112,F-105,F-121,F-95,F-106,F-94,F-99,F-97,F-107,F-116,F-120,F-118,F-114,F-117,F-101,F-102,F-111,F-8,F-152,F-155,F-90',NULL,'11',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,1,NULL,NULL,NULL,NULL,'{\"fields\":{\"145\":2,\"143\":2,\"160\":2,\"144\":2,\"88\":2,\"158\":2,\"89\":2,\"163\":2,\"151\":2,\"134\":1,\"93\":2,\"119\":2,\"142\":1,\"109\":2,\"153\":2,\"112\":2,\"121\":2,\"94\":2,\"107\":2,\"3\":1,\"118\":2,\"117\":2,\"111\":2,\"8\":2,\"152\":2,\"155\":2,\"90\":2,\"0\":2,\"161\":2,\"147\":2,\"159\":2,\"149\":2,\"162\":2,\"164\":2,\"105\":2,\"95\":2,\"106\":2,\"99\":2,\"97\":2,\"116\":2,\"120\":2,\"114\":2,\"101\":2,\"102\":2},\"menus\":{\"art\\/agent\":1,\"art\\/artworkInfo\":1,\"art\\/channels\":1,\"art\\/description\":1,\"art\\/master\\/view\":1,\"art\\/preview\":1,\"art\\/files\\/view\":1,\"site\\/lastDigitized\":1,\"art\\/view\":1,\"agent\\/works\":1,\"agent\\/biography\":1,\"agent\\/view\":1,\"site\\/search\":1,\"system\":1,\"art\\/download\":1,\"art\\/upload\":1,\"art\\/md5\":1,\"art\\/alt-files\":1,\"art\\/alt-edit\":1,\"art\\/altcheck\":1,\"art\\/alternative\":1,\"art\\/files\\/owner\":1,\"transfer\\/listFiles\":1,\"art\\/transfer\":1,\"art\\/files\\/transfer\":1,\"art\\/files\":1,\"agent\\/description\":1,\"agent\\/general\":1}}',',art/files/owner,art/files/transfer,art/files,art/view,agent/biography,agent/description,agent/general',NULL,NULL,NULL);

/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usergroup_collection
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usergroup_collection`;

CREATE TABLE `usergroup_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup` int(11) NOT NULL DEFAULT '0',
  `collection` int(11) NOT NULL DEFAULT '0',
  `request_feedback` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_usergroup` (`usergroup`,`collection`),
  KEY `usergroup` (`usergroup`),
  KEY `collection` (`collection`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
