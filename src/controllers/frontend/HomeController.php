<?php
namespace kouosl\site\controllers\frontend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kouosl\site\models\Setting;
use kouosl\content\models\Content;
/*
 * Home controller
 */
class HomeController extends DefaultController
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

    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

    }


    
}

