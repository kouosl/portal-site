<?php
namespace kouosl\site\controllers\frontend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use portalium\site\models\Setting;
use portalium\content\models\Content;
use portalium\web\Controller as WebController;
/*
 * Home controller
 */
class HomeController extends WebController
{
   
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                        ]
                    ],
                ],
        ]);
    }

    public function actionIndex()
    {
        $id = Setting::findOne(['setting_key'=>'home']);

        return $this->render('index',[
            'model' =>  $this->findModel($id)
        ]);
    }

    public function actionLang($lang)
    {
        yii::$app->session->set('lang',$lang);
        return $this->goBack(Yii::$app->request->referrer);
    }

    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

    }
}