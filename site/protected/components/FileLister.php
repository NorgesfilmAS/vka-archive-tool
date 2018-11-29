<?php

/**
 * the class that lists all files in the upload directory
 */
class FileLister extends CComponent
{
	public $moreFiles = false;
	public function init()
	{
		
	}
	
	/**
	 * a list of files in the uploadDirectory
	 * 
	 * @return array
	 */
	public function files($isArtist=false)
	{
		$files = array();
		$path = Yii::app()->config->fixedValues['upload_path'].($isArtist ? 'artist/' : '') ;
    if (!is_dir($path)) {
      $files[] = Yii::t('app', 'The directory {path} does not exists.', array('{path}' => $path));
    } else {
			foreach (new DirectoryIterator($path) as $fileInfo) {
				if (!$fileInfo->isDot()) {
					if ($fileInfo->isFile()) {
						$name = $fileInfo->getFilename();
						$files[] = iconv(mb_detect_encoding($name, mb_detect_order(), true), "UTF-8", $name);
					} else if ($fileInfo->isDir()) {
						//  no subdirs yet
					}	
				}
			}	
		}	
		return $files;		
	}
	/**
	 * list the new files in the directory
	 * returns an array key = date (yyyy-mm-dd hh:mm:ss) value => array(name, size, extension, time, date); 
	 * 
	 * @param integer $count
	 * @returns array or false
	 */
	public function filesByDate($count = 20)
	{
		$files = array();
		$path = Yii::app()->config->fixedValues['upload_path'];
    $result = array();		
    if (!is_dir($path)) {
      $files[] = array('name' => Yii::t('app', 'The directory {path} does not exists.', array('{path}' => $path)));
    } else {
      $a = 0;
      foreach (new DirectoryIterator($path) as $fileInfo) {
        if (!$fileInfo->isDot()) {
          if ($fileInfo->isFile()) {
            $a++;
						$name = $fileInfo->getFilename();
						try {
							$encoding = mb_detect_encoding($name, mb_detect_order(), true);
							if ($encoding) {
								$name = iconv($encoding, 'UTF-8', $name);
							} else {
								$name .= ' (illegal character)';
							}
							$files[$fileInfo->getCTime()] = array(
									'name' => $name,							
									'size' => $fileInfo->getSize(),		
									'ext' => $fileInfo->getExtension(),
									'time' => $fileInfo->getCTime(),
									'date' => date('Y-m-d H:i:s', $fileInfo->getCTime()),
							);
						} catch(Exception $e) {
							throw new CException('Error in filename: '.$name);
						}
          } else if ($fileInfo->isDir()) {
            //  no subdirs yet
          }	
        }
      }	
      // sort the file by Key desc
      krsort($files);
      $i = 0;
      foreach ($files as $file) {
        if ($i >= $count) break;
        $result[$file['date'].'-'.  $file['name']] = $file;
        $i++;
      }

      $this->moreFiles = (count($files) > $i);
    }  
    return $result; 		
	}
					
		
}
