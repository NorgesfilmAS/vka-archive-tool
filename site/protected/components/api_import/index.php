<?php
/**
 * import an existing file, replacing the file in the resource,
 * if the filename is ommited, the existing previews of the existing file are regenerated
 * 
 * paramters:
 *   id = the ref of the resource to update (required)
 *   filename = the filename to import. 
 *								If start with / it's the fysical path
 *								if starts with a // it is relative to the resourcespace directory
 *							if filename is ommited the existing file is previews are regenerated
 *   debug = if set messages are send to the console
 * 
 * 
 * version 0.1 JvK/Toxus 2013-08-14
 */


include(dirname(__FILE__)."/../../include/db.php");
include(dirname(__FILE__)."/../../include/general.php");
include(dirname(__FILE__)."/../../include/image_processing.php");
include(dirname(__FILE__)."/../../include/resource_functions.php");
$api=true;

/**
 * security is that it can only run from the localhost!
 * 
 * include(dirname(__FILE__)."/../../include/authenticate.php");
 */

if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
	die('Access only from the localhost');
// required: check that this plugin is available to the user
if (!in_array("api_import", $plugins)){
	die("no access");
}

if (isset( $_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	if (!is_numeric($id)) die('id must be a number');
	$debug = isset($_REQUEST['debug']);
	$filename = isset($_REQUEST['filename']) ? $_REQUEST['filename'] : null;	
	if ($filename) {
		$path_parts = pathinfo($filename);
		$extension = strtolower(isset($path_parts['extension']) ? $path_parts['extension'] : '');  	
		//$filePath = get_resource_path($id, true, "", true, $extension);
		// get our filename and generate the path if it does not exist.
		// id, copy name, size, generate
		$resourceFilename = get_resource_path($id, true, '', true, $extension);

		if (substr($filename, 0, 1) == '/') {
			/**
			 * location file is relative to the /resourcespace directrory
			 */
			if (substr($filename, 0, 2) == '//') {
				$path = realpath(dirname(__FILE__).'/../..');
				if ($debug) echo "ResourceSpace path: $path\n";
				$filename = $path.substr($filename,1);
			}	
			if (!rename($filename, $resourceFilename)) {
				die("Error: The file $filename could not be moved to $resourceFilename.");
			}
			if ($debug) echo "File moved resource space directory to: $resourceFilename\n";		
		} else {
			/**
			 * file is located in the upload directory
			 */
			if (! @move_uploaded_file($filename, $resourceFilename))
				die("Error: The file $filename could not be moved from the upload directory.");;
			if ($debug) echo "File moved from upload directory to: $resourceFilename\n";
		}

		// update the resource so it reflexs the new file
		$wait = sql_query("update resource set file_extension='$extension',preview_extension='jpg',file_modified=now() ,has_image=0 where ref='$id'");

		// Store original filename in field, if set
		global $filename_field;
		if (isset($filename_field))  {
			$wait = update_field($id, $filename_field, $filename);	
		}
	} else {
		/** 
		 * the filename is NOT set. So regenerate the previews
		 */
		$resource = sql_query('SELECT file_extension FROM resource WHERE ref='.$id);
		if ($resource) {
			$extension = $resource[0]['file_extension'];
		} else {
			die('Resource not found.');
		}
		if ($debug) echo "updating preview resources.\n";
	}	
	// extract metadata
	$wait = extract_exif_comment($id, $extension);

	//create previews
	$wait = create_previews($id, false, $extension);
	echo "File added / uplodate for resource $id";
}

 else {
	echo "ERROR: required parameter id is missing <a href=".$baseurl."/plugins/api_import/readme.txt>ReadMe</a>";
}



