<?php
namespace portalium\site\controllers\backend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use portalium\web\Controller as WebController;

/*
 * Home controller
 */
class HomeController extends WebController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLang($lang)
    {
        yii::$app->session->set('lang',$lang);
        return $this->goBack(Yii::$app->request->referrer);
    }
}