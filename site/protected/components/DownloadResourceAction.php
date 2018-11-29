<?php
/**
 * download a alternate file with a 'nice' name
 * 
 * if it's a resource: 
 *		art:		[artist.name].[resource.id].[artwork.title]
 *    agent:	[artist.name].[resource.id]
 *    other:	Resource.[resource.id]
 * if it's an alternate file:
 *		art:		[artist.name].[resource.id].[artwork.title].[altfile.name].[id]
 * 		agent:	[artist.name].[resource.id].[altfile.name].[id]
 *		other:  Resource.[resource.id].[altfile.name].[id]
 * 
 */
//Yii::import('toxus.actions.DownloadFileAction');
class DownloadResourceAction extends DownloadFileAction
{
	/**
	 * 
	 * @param string $name not used in this definition
	 * @throws CHttpException (Resource not found) 
	 */
	public function run($name = null)
	{
		$source = 'pnek.compontents.DownloadResourceAction';
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$isMaster = isset($_GET['isMaster']) ? $_GET['isMaster'] : true;
		if ($isMaster) {
			$masterId = $id;
			$this->controller->model = Art::model()->findByPk($id);
			if (!$this->controller->model) {
				throw new CHttpException('Resource '.$id.' not found');
			}	
			$type = $this->controller->model->modelName;
			if ($type =='Art') {
				$filename = $this->sanitize($this->controller->model->agent, false).'.'.$id.'.'.
										$this->sanitize($this->controller->model->title, false);
			} elseif ($type == 'Agent') {
				$filename = $this->sanitize($this->controller->model->name).'.'.$id;	// artist
			}	else {
				Yii::log("Unknown type ($type) for export", CLogger::LEVEL_WARNING, $source);
				$filename = 'Resource-'.$id;
			}
			$ext = $this->controller->model->fileExtension;
		} else {
			$this->controller->model = ResourceAltFiles::model()->findByPk($id);
			if (!$this->controller->model) {
				throw new CHttpException('Alternate Resource '.$id.' not found');
			}
			$masterId = $this->controller->model->resource;		
			$type = $this->controller->model->ParentResource->modelName;
			if ($type == 'Art') {
				$filename = $this->sanitize($this->controller->model->art->agent, false).'.'.$masterId.'.'.
										$this->sanitize($this->controller->model->art->title, false).'.'.
										$this->sanitize($this->controller->model->name, false).'.'.$id;			
			} elseif ($type == 'Agent') {
				$filename = $this->sanitize($this->controller->model->art->agent, false).'.'.$masterId.'.'.
										$this->sanitize($this->controller->model->name, false).'.'.$id;							
			} else {
				$filename = 'Resource-'.$id.
				$this->sanitize($this->controller->model->name, false).'.'.$id;							
			}	
			$ext = $this->controller->model->file_extension;
		}
		$filename = Util::normalizeStr($filename).'.'.$ext;
		Yii::log('Filename for user: '.$filename,  CLogger::LEVEL_INFO, $source);
		
		$this->path = '';
		$name = $this->controller->model->downloadPath;
		Yii::log('Filename on disk: '.$filename,  CLogger::LEVEL_INFO, $source);		
		$this->forceDownload = true;
		$this->userFilename = $filename;
		parent::run($name);
	}
	
	/**
   * generate a filename out of a string
   * 
   * @param string $string
   * @param bool $force_lowercase
   * @param bool $anal If set to *true*, will remove all non-alphanumeric characters.
   * @return string
   */
  private function sanitize($string, $force_lowercase = true, $anal = false) {
		
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);    //tx: add the +
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
  }
}
