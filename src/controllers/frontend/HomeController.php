<?php
namespace portalium\site\controllers\frontend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use portalium\web\Controller as WebController;

class HomeController extends WebController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLang($lang)
    {
        Yii::$app->session->set('lang',$lang);
        $this->goBack(Yii::$app->request->referrer);
    }
}