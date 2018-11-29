<?php
############################### 
## ResourceSpace
## Local Configuration Script
###############################
 
# All custom settings should be entered in this file.
# Options may be copied from config.default.php and configured here.

##  Hide the 'link' link on view.php (link is back to the same page)
$disable_link_in_view = false;

$use_mysqli=true;
# MySQL database settings
$mysql_server = 'localhost';
# $mysql_username = 'rsvideokunst';
$mysql_username = 'rsvideokunstutf8';
# $mysql_password = 'rtRhrMaHY8PU5BBad';
$mysql_password = 'ULjHarj3bCw73ZFK';
# $mysql_db = 'rsvideokunst';
$mysql_db = 'rsvideokunstutf8';
$mysql_charset = "utf8";

$use_temp_tables = false;
#$load_ubuntu_font = false;
#$cat_tree_singlebranch=false;
#$simple_search_reset_after_search=false;
#$swap_clear_and_search_buttons=false;
#$show_anonymous_login_panel=false;
#$recent_search_by_days=false;
#$recent_search_by_days_default=60;
$mysql_bin_path = '/usr/bin';
#$keyboard_navigation_toggle_thumbnails=true;

# Base URL of the installation
# $baseurl = 'http://rs.videokunstarkivet.org';
$baseurl = 'http://rs.videokunstarkivet.org/resourcespace'; 

# Email settings
$email_from = 'noreply@norgesfilm.no';
$email_notify = 'drift@norgesfilm.no';

$spider_password = '#&6x0DG8SGkR';
$scramble_key = 'B507UEboB*!v';

$api_scramble_key = '#B7pgØwH98h5';

# FFMpeg
$ffmpeg_preview_seconds=7200;
$ffmpeg_preview=true;
$ffmpeg_preview_extension="mp4";
$ffmpeg_min_width=32;
$ffmpeg_min_height=18;
$ffmpeg_max_width=480;
$ffmepg_max_height=270;
$ffmpeg_preview_options = "-threads 2 -vcodec libx264 -preset veryfast -vprofile main -pix_fmt yuv420p -crf 22 -x264opts threads=2 -acodec libfdk_aac -ab 128k";
$ffmpeg_snapshot_fraction=0.2;

$ffmpeg_alternatives[0]["name"] = "x264_HQ";
$ffmpeg_alternatives[0]["alt_type"] = "system";
$ffmpeg_alternatives[0]["filename"] = "x264_HQ";
$ffmpeg_alternatives[0]["extension"] = "mp4";
$ffmpeg_alternatives[0]["params"] = "-threads 1 -vcodec libx264 -preset fast -vprofile main -pix_fmt yuv420p -vf yadif -crf 22 -s 800x600 -x264opts threads=1 -acodec libfdk_aac -ac 2 -ab 128k";
$ffmpeg_alternatives[0]["lines_min"] = 48;

$ffmpeg_alternatives[1]["name"] = "webm_HQ";
$ffmpeg_alternatives[1]["alt_type"] = "system";
$ffmpeg_alternatives[1]["filename"] = "webm_HQ";
$ffmpeg_alternatives[1]["extension"] = "webm";
$ffmpeg_alternatives[1]["params"] = "-threads 1 -vcodec libvpx -b:v 2500k -s 800x600 -acodec libvorbis -ac 2 -ab 128k";
$ffmpeg_alternatives[1]["lines_min"] = 48;

$ffmpeg_alternatives[2]["name"] = "x264_LQ";
$ffmpeg_alternatives[2]["alt_type"] = "system";
$ffmpeg_alternatives[2]["filename"] = "x264_LQ";
$ffmpeg_alternatives[2]["extension"] = "mp4";
$ffmpeg_alternatives[2]["params"] = "-threads 1 -b:v 300k  -level 13 -vcodec libx264 -preset fast -vprofile baseline -pix_fmt yuv420p -s 256x144 -crf 20 -x264opts threads=1 -acodec libfdk_aac -ac 2 -ab 64k -ar 22050";
$ffmpeg_alternatives[2]["lines_min"] = 144;

$ffmpeg_alternatives[3]["name"] = "webm_LQ";
$ffmpeg_alternatives[3]["alt_type"] = "system";
$ffmpeg_alternatives[3]["filename"] = "webm_LQ";
$ffmpeg_alternatives[3]["extension"] = "webm";
$ffmpeg_alternatives[3]["params"] = "-threads 1 -vcodec libvpx -b:v 300k -s 256x144 -acodec libvorbis -ac 2 -ab 128k -ar 22050";
$ffmpeg_alternatives[3]["lines_min"] = 144;

# Paths
$imagemagick_path = '/usr/bin';
$ghostscript_path = '/usr/bin';
$ffmpeg_path = '/usr/bin';
$exiftool_path = '/usr/bin';
$ghostscript_executable='gs';
$qtfaststart_path="/usr/local/bin";
$qtfaststart_extensions=array("mp4","m4v","mov");

$exiftool_write=false;

# Application
$applicationname = 'Videokunstarkivet';

# FTP Server
$ftp_server = 'my.ftp.server';
$ftp_username = 'my_username';
$ftp_password = 'my_password';
$ftp_defaultfolder = 'temp/';


$thumbs_display_fields = array(8,3);
$list_display_fields = array(8,90,88);
$sort_fields = array(12);

# Languages
$defaultlanguage="no";

$userfixedtheme='videokunstarkiv';

$disable_geocoding = true;
$alternative_file_previews = true;
$alternative_file_previews_mouseover=false;

$metadata_read = false;
$enable_add_collection_on_upload = false;
#$custom_top_nav[0]["title"]="Last opp enkeltfil";
#$custom_top_nav[0]["link"]="$baseurl/pages/edit.php?ref=-2&single=true";

#$debug_log=true;
#$debug_log_location="/var/log/resourcespace/resourcespace.log";

$ffmpeg_preview_force=true;

#$ffmpeg_preview_async=true;
#$php_path="/usr/bin";
$simple_search_date=false;
$date_field=124;
$daterange_search=true;

$ffmpeg_supported_extensions = array(
		'aaf',
		'3gp',
		'asf',
		'avchd',
		'avi',
		'cam',
		'dat',
		'dsh',
		'flv',
		'm1v',
		'm2v',
		'm4v',
		'mkv',
		'wrap',
		'mov',
		'mpeg',
		'mpg',
		'mpe',
		'mp4',
		'mxf',
		'nsv',
		'ogm',
		'rm',
		'ram',
		'svi',
		'smi',
		'wmv',
		'divx',
		'webm',
		'xvid',
	
	);

# A list of extensions which will be ported to mp3 format for preview.
# Note that if an mp3 file is uploaded, the original mp3 file will be used for preview.
$ffmpeg_audio_extensions = array(
	'wav',
	'ogg',
	'aiff',
	'au',
	'cdda',
	'm4a',
	'wma',
	'mp2',
	'aac',
	'ra',
	'rm',
	'gsm'
	);
$image_extensions = array(
	'png',
	'gif',
	'tiff',
	'tif',
	'jpg',
	'jpeg',	
);
$doc_extensions = array(
	'pdf',
	'doc',
	'docx',
	'txt',
	'xsl',
	'xslt',	
);
$alt_types=array(
	"",
	"Images",
	"Media",
	"Misc",
        "pdf"
	);
