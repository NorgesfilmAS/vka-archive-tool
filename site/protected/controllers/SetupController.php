<?php
Yii::import('toxus.controllers.BaseSetupController');
class SetupController extends BaseSetupController 
{
	/**
	 * test the read write access to the ftp server
	 */
	public function actionTestFTP()
	{
		$result = '';
		$result .= 'running a test to check the read / write availablity for the FTP directory.<br/>';
		$dir = Yii::app()->config->fixedValues['upload_path'];
		$result .= 'checking directory: <b>'.$dir.'</b><br/>';
		$file = 'test.bin';
		$filename =$dir.(substr($dir,-1) == '/' ?'' : '/').$file;
		$result .= 'creating / updating <b>'.$filename.'</b><br/>';
		$data = Util::generateRandomString(2000);
		$bytes = @file_put_contents($filename, $data);
		$err = array();
		if ($bytes !== false) {
			$result .= 'blocksize: '.strlen($data).', written: '.$bytes.'<br />';
			if ($bytes != strlen($data)) {
				$err[] = 'Not all data is written';
			}
			$result .= "reading file information<br/>";
			$data2 = @file_get_contents($filename);
			if ($data != $data2) {
				$err = 'The data is changed during read/write.';
			}
			$result .= "renaming file<br/>";
			$filename2 = $dir.(substr($dir,-1) == '/' ?'' : '/').$file.'.old';
			if (@rename($filename, $filename2)===false) {
				$err[] = 'The file.'.$filename.' could not be renamed to '.$filename;
			} elseif (file_exists($filename)) {
				$err[] = 'The original file still exists after rename';
			}
			$result .= "deleting file<br/>";
			if (file_exists($filename)) {
				if (@unlink($filename) == false) {
					$err[] = 'The file '.$filename.' could not be deleted';
				}
			}
			if (file_exists($filename2)) {
				if (@unlink($filename2) == false) {
					$err[] = 'The file '.$filename2.' could not be deleted';
				}
			}
		} else {
			$err[] = 'no data was written';
		}	
		if (count($err) > 0) {
			$result .= "<b>ERRORS:<br/>\n";
			foreach ($err as $e) {
				$result .= $e."<br/>\n";
			}
		} else {
			$result .= "no errors<br/>";
		}
		if (file_exists($filename)) {
			$result .= 'file rights: '.substr(sprintf('%o', fileperms('/etc/passwd')), -4).'<br/>';
		}
		$result .= "All test done<br/><br/>";
		Yii::app()->user->setFlash((count($err)>0 ? 'warning' : 'success'), $result);
		$this->redirect($this->createUrl('site/systemInfo'));
	}
	
	/**
	 * rebuild the ResourceRelated table from the perspective of Art
	 */
	public function actionRebuildRelations() 
	{
		Art::rebuildRelations();
		Yii::app()->user->setFlash('success', Yii::t('app', 'The relation between Art and Artist has been rebuild.'));
		$this->redirect($this->createUrl('site/systemInfo'));		
	}
}
