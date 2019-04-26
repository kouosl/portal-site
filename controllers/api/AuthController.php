<?php
namespace kouosl\site\controllers\api;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kouosl\site\models\LoginForm;
use kouosl\user\models\User;
use kouosl\site\models\Setting;
/**
 * Site controller
 */
class AuthController extends DefaultController
{	
    public function actionLogin(){
			
		$model = new LoginForm();
	   
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		if($model->load(Yii::$app->getRequest()->getBodyParams(),'') && $model->login())
			return ['access_token' => Yii::$app->user->identity->getAuthKey(),'status' => true];
		else
			return ['access_token' => '','status' => false];
    }
	
}