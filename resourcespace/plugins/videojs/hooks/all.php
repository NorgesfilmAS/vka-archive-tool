<?php
function HookVideojsAllAdditionalheaderjs(){
	global $baseurl,$videojs_cdn;
	if ($videojs_cdn){?>
		<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
		<script src="http://vjs.zencdn.net/c/video.js"></script>
	<?php } else { ?>
		<link href="<?php echo $baseurl?>/plugins/videojs/lib/video-js.css" rel="stylesheet" type="text/css">
		<script src="<?php echo $baseurl?>/plugins/videojs/lib/video.js"></script>
	<?php } ?>
	<?php }

function HookVideojsAllSwfplayer(){
	global $ref,$baseurl,$flashpath, $width,$height,$thumb,$pagename,$userfixedtheme,$ffmpeg_preview_max_width,$ffmpeg_preview_max_height,$mime_type_by_extension,$ffmpeg_preview_extension,$ffmpeg_preview_force;
	if ($pagename=="search"){global $result,$n;$resource=$result[$n];} else {global $resource;}
	
	$flashpath=str_replace(urlencode($baseurl),"",$flashpath);

	$flashpath=urldecode($baseurl.$flashpath);
	$width=$ffmpeg_preview_max_width;
	$height=$ffmpeg_preview_max_height;
	if ($pagename=="search"){$width="355";$height=355/$ffmpeg_preview_max_width*$ffmpeg_preview_max_height;}
	?>
	
	
	
<div class="Picture" id="videoContainer" style="width:<?php echo $width?>px;height:<?php echo $height?>px;">
	<video id="vid<?php echo $ref?>" class="video-js vjs-default-skin" width="<?php echo $width?>" height="<?php echo $height?>" poster="<?php echo urldecode($thumb);?>" data-setup="{}" controls preload=none>
	<?php 
	/*
	// experimental code for multiple sources
	* theoretically requires an additional column of comma-separated filenames on table resource:
	* ffmpeg_alt_previews,text,YES,,,
	* and the addition of this column to the $select variable in search_functions.php
	* and more handling in ffmpeg_processing. 
	* The reason for the column in resource is that we can't do new queries for 
	* every video file in a search result (as xlarge thumbs can be video displays).
	* The logic behind this becomes complex considering that there may or may not
	* be a default preview depending on $ffmpeg_preview_force.
	* If $ffmpeg_preview_force=false, then no alternatives are made either!
	* If true, then would be a default mp4 preview for an mp4 file, 
	* but you'd still need to create and alt file for non-mp4 resources, 
	* which then needs to be conditional or else you end up with too many transcodes for 
	* the mp4 resources.
	* I'm leaving this here as basic idea for including multiple sources, but
	* exactly how to handle all this best and back-compatibly is still in question.
	if (isset($resource['ffmpeg_alt_previews']) && $resource['ffmpeg_alt_previews']!=''){
		$alt_files=explode(",",$resource['ffmpeg_alt_previews']);
		foreach ($alt_files as $alt_file){ 
			$alt_file_path=dirname($flashpath)."/".$alt_file;
			?><source src="<?php echo $alt_file_path;?>" type="video/<?php echo substr(strrchr($alt_file, '.'), 1)?>"/><?php 
		}
	}
	else {  // the default preview, should be mp4 in this case, whether the original or not.
	*/
	?>
	<source src="<?php echo $flashpath;?>" type="video/<?php echo strtolower(substr(strrchr($flashpath, '.'), 1));?>"/>
	</video>
</div>

	<?php
	return true;
}
/*	Embed codes are going to be a problem for HTML5 players.
 *  You can only offer a video tag and sources, but these player libs rely on
 *  JS to restyle or fall back to flash.
 * 
function HookVideojsViewReplaceembedcode(){
	global $baseurl,$ffmpeg_preview_max_height,$ffmpeg_preview_max_width, $flashpath, $thumb,$colour,$height,$width,$alt_file_path,$resource;
	echo htmlspecialchars('<video style="background-color:black;" controls poster="'.urldecode($thumb).'" style="width:'.$width.'px;height:'.$height.'px;" >');
	echo htmlspecialchars('<source src="'.$flashpath.'" ></video>');
return true;
}
*/
