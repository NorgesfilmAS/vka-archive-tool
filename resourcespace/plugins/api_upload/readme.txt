Import API

Usage:
http://url/plugins/api_import/  

Parameters:
id=[integer]						
		the resource ref used to connect the data to (required)

filename=[string]				
	the name of the file in the upload directory, 
		if starts with // relative to the resourceSpace root directory 
		if starts with a / the fysical path to the file
  if omitted the existing file is used and the preview are regenerated.

debug
  send messages about the progress to the console


IMPORTANT
  the plugin ONLY WORKS ON LOCALHOST
