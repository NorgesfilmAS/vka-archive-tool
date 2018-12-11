<?php
$mysql_server = '127.0.0.1';
$mysql_username = 'rsvideokunstutf8';
$mysql_password = 'ULjHarj3bCw73ZFK';
$mysql_db = 'rsvideokunstutf8';
$mysql_charset = "utf8";

$toxus=0;

if ($toxus) {
	$sa = explode('?',  $_SERVER['REQUEST_URI']);
  $baseurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($sa[0]);
} else {
	$baseurl = 'http://localhost/resourcespace7';
}

$email_from = 'noreply@norgesfilm.no';
$email_notify = 'drift@norgesfilm.no';

$spider_password = '#&6x0DG8SGkR';
$scramble_key = 'B507UEboB*!v';

$api_scramble_key = '#B7pgØwH98h5';
$enable_remote_apis = true;

$ffmpeg_preview_seconds=7200;
$ffmpeg_preview=true;
$ffmpeg_preview_extension="mp4";
$ffmpeg_min_width=32;
$ffmpeg_min_height=18;
$ffmpeg_max_width=480;
$ffmepg_max_height=270;
$ffmpeg_preview_options = "-threads 2 -vcodec libx264 -preset veryfast -vprofile main -pix_fmt yuv420p -crf 22 -x264opts threads=2 -acodec aac -ab 128k";
$ffmpeg_snapshot_fraction=0.2;

$ffmpeg_alternatives[0]["name"] = "X264_HQ";
$ffmpeg_alternatives[0]["alt_type"] = "system";
$ffmpeg_alternatives[0]["filename"] = "X264_HQ";
$ffmpeg_alternatives[0]["extension"] = "mp4";
$ffmpeg_alternatives[0]["params"] = "-threads 1 -vcodec libx264 -preset fast -vprofile main -pix_fmt yuv420p -vf yadif -crf 22 -x264opts threads=1 -acodec aac -ac 2 -ab 128k";
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
$ffmpeg_alternatives[2]["params"] = "-threads 1 -b:v 300k  -level 13 -vcodec libx264 -preset fast -vprofile baseline -pix_fmt yuv420p -vf scale=iw*.5:ih*.5 -crf 20 -x264opts threads=1 -acodec aac -ac 2 -ab 64k -ar 22050";
$ffmpeg_alternatives[2]["lines_min"] = 144;

$ffmpeg_alternatives[3]["name"] = "webm_LQ";
$ffmpeg_alternatives[3]["alt_type"] = "system";
$ffmpeg_alternatives[3]["filename"] = "webm_LQ";
$ffmpeg_alternatives[3]["extension"] = "webm";
$ffmpeg_alternatives[3]["params"] = "-threads 1 -vcodec libvpx -b:v 300k -s 256x144 -acodec libvorbis -ac 2 -ab 128k -ar 22050";
$ffmpeg_alternatives[3]["lines_min"] = 144;

$ffmpeg_alternatives[4]["name"] = "Mezzanine";
$ffmpeg_alternatives[4]["alt_type"] = "system";
$ffmpeg_alternatives[4]["filename"] = "Mezzanine";
$ffmpeg_alternatives[4]["extension"] = "mp4";
$ffmpeg_alternatives[4]["params"] = "-threads 2 -c:v libx264 -c:a aac -b:a 192k -crf 17 -maxrate 20000k -bufsize 40000k -profile:v high422 -preset medium";

$imagemagick_path = '/usr/bin';
$ghostscript_path = '/usr/bin';
$ffmpeg_path = '/usr/bin';
$exiftool_path = '/usr/bin';
$ghostscript_executable='gs';
$qtfaststart_path="/usr/local/bin";
$qtfaststart_extensions=array("mp4","m4v","mov");
$antiword_path = '/usr/bin';
$pdftotext_path = '/usr/bin';
$unoconv_path="/usr/bin";
$unoconv_extensions=array("doc","docx","odt","odp","html","rtf","txt","ppt","pptx","sxw","sdw","html","psw","rtf","sdw","pdb","bib","txt","ltx","sdd","sda","odg","sdc");
$exiftool_write=false;
$slimheader=true;
$defaultlanguage="no";
$userfixedtheme='videokunstarkiv';
$disable_geocoding = true;
$alternative_file_previews = true;
$alternative_file_previews_mouseover=false;
$metadata_read = false;
$enable_add_collection_on_upload = false;
$ffmpeg_preview_force=true;
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

$thumbs_display_fields = array(8,3);
$list_display_fields = array(8,3,12);
$sort_fields = array(12);
$imagemagick_colorspace = "sRGB";
$slideshow_big=true;
$home_slideshow_width=1400;
$home_slideshow_height=900;
$homeanim_folder="gfx/homeanim";
