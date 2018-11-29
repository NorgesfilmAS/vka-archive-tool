<?php
###############################
## ResourceSpace
## Local Configuration Script
###############################

# All custom settings should be entered in this file.
# Options may be copied from config.default.php and configured here.

# MySQL database settings
$mysql_server = '127.0.0.1';
$mysql_username = 'rsvideokunstutf8';
$mysql_password = 'ULjHarj3bCw73ZFK';
$mysql_db = 'rsvideokunstutf8';

# Base URL of the installation
$baseurl = 'http://www.pnek.localhost/resourcespace7';

# Email settings
$email_from = 'info@toxus.nl';
$email_notify = 'info@toxus.nl';

$spider_password = 'A7ubyzU6y6Aq';
$scramble_key = 'ENytuVatA7EG';

$api_scramble_key = 'a9UXesYQe8Ym';

# Paths
$imagemagick_path = '/opt/local/bin';
$ghostscript_path = '/opt/local/bin';
$ffmpeg_path = '/opt/local/bin';
$pdftotext_path = '/opt/local/bin';


#Design Changes
$slimheader=true;



/*

New Installation Defaults
-------------------------

The following configuration options are set for new installations only.
This provides a mechanism for enabling new features for new installations without affecting existing installations (as would occur with changes to config.default.php)

*/
                                
$thumbs_display_fields = array(8,3);
$list_display_fields = array(8,3,12);
$sort_fields = array(12);

// Set imagemagick default for new installs to expect the newer version with the sRGB bug fixed.
$imagemagick_colorspace = "sRGB";

$slideshow_big=true;
$home_slideshow_width=1400;
$home_slideshow_height=900;

$homeanim_folder="gfx/homeanim";
