<?php
namespace kouosl\site\controllers\backend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/*
 * Home controller
 */
class HomeController extends DefaultController
{
   
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

  


    
}
