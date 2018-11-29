<?php
/**
 * TransferController handles the moving of files to users outside the Archive Tool interface
 *
 * @author jaap
 */
class TransferController extends Controller {
  
  public function actions() {
    return array(
       'download' => array(
         'class' => 'toxus.actions.StreamAction',
         'onGetFilename' => array($this, 'viewGetFilename'),
         'forceDownload' => true
       ),
       'view' => array(
         'class' => 'toxus.actions.StreamAction',
         'onGetFilename' => array($this, 'viewGetFilename'),
         'forceDownload' => true
       )
      
    );
  }
   /**
   * returns the form to decide which files will be share to whom
   * @param integer $id
   */
  public function actionListFiles($id) {
    $this->model = $this->loadModel($id, 'Art');
    $transfer = new Transfer();
    $transfer->art_id = $id;
    $didSend = false;
    if (isset($_POST['Transfer'])) {
      $transfer->attributes = $_POST['Transfer'];
      if ($transfer->validate()) {
        if ($transfer->save()) {
          Yii::app()->user->setFlash('success', Yii::t('app', 'The message(s) have been send'));
          // we have to transfer our self to the files of this artwork, in a ajax call
          echo 'url';
          Yii::app()->end(200);
        }
      } else {
        $this->model->addErrors($transfer->errors);
      }
    }
    echo $this->renderPartial('form', array(
      'model' => $this->model,
      'transfer' => $transfer,
    ));
  }
  
  /**
   * Show a page to a not logged in user with the files to view / download
   * 
   * @param string $key
   */
  public function actionIndex() {
    if (count($_GET) > 0) {
      foreach ($_GET  as $key => $user) {
        break;
      }
    }
    if (empty($key) || empty($user)) {
      $this->render('error', array(
        'message' => Yii::t('app', 'There are no parameters given'),
        'key' => $key,
        'user' => $user
      ));
    } else {
      $this->model = Transfer::model()->find('`key`=:key', array(':key' => $key));
      if (empty($this->model)) {
        $this->render('error', array(
          'message' => Yii::t('app', 'The key could not be found')
        ));
      } else {
        $err = $this->model->validateUser($user);
        if (!empty($err)) {
           $this->render('error', array(
              'message' => $err
            ));        
        } else {
          $this->model->setCurrentUser($user);
          $this->render('view');
        }
      }
    }  
  }

  const TRANSFER_ID = 2;
  const USER_ID = 3;
  const FILE_ID = 4;

  /**
   * The keys are: transfer_id / user_id / file_id
   * 
   * @param string $name
   * @param DownloadFileAction $action
   */
  public function viewGetFilename($name, $action) {
    $r = Yii::app()->getRequest();
    $path = $r->pathInfo;
    $keys = explode('/', $path);
    if (count($keys) == 0) {
      throw new CHttpException(403);
    } else {
      $this->model = Transfer::model()->find('`key`=:key', array(':key' => $keys[self::TRANSFER_ID]));
      if (empty($this->model)) {
        throw new CHttpException(404);
      } else {
        $err = $this->model->validateUser($keys[self::USER_ID]);
        if (!empty($err)) {
          throw new CHttpException(403);
        } else {
          $this->model->setCurrentUser($keys[self::USER_ID]);
          $name = $this->model->fysicalFilename($keys[self::FILE_ID]);
 
          $action->userFilename = Util::sanitize($this->model->art->title);
          $alt = $this->model->altFile($keys[self::FILE_ID]);
          if ($alt) {
            $action->userFilename .= '.'.Util::sanitize($alt->name);
          } 
          $action->userFilename .= '.'.  pathinfo($name, PATHINFO_EXTENSION);          
        }
      }
    }      
    return $name;
  }
}
