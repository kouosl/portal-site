<?php

namespace portalium\site\controllers\backend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use portalium\site\models\LoginForm;
use portalium\site\models\SettingSearch;
use portalium\site\models\Setting;
//use portalium\content\models\Content;
use portalium\web\Controller as WebController;

class SettingController extends WebController
{
    public function actionIndex()
    {
        $settings  = ArrayHelper::map(Setting::find()->asArray()->all(),'key','value');
        //$contents = ArrayHelper::map(Content::find()->asArray()->all(),'id','name');
        $languages = Json::decode($settings['languages']);
       
        return $this->render('index', [
            'settings' => $settings,
            'languages' => $languages,
        ]);
    }
}