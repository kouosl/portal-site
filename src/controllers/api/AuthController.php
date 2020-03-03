<?php
namespace kouosl\site\controllers\api;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kouosl\site\models\LoginForm;
use kouosl\user\models\User;
use kouosl\site\models\Setting;

use kouosl\site\models\SignupForm;

/**
 * Site controller
 */
class AuthController extends DefaultController
{	
	
    public function actionLogin(){
		
		$model = new LoginForm();

		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		if($model->load(Yii::$app->getRequest()->getBodyParams(),'') && $model->login()){
			$user = User::findIdentity(Yii::$app->user->identity->id);
			return ['access_token' => $user->access_token,'status' => true];
		}
		else
			return ['access_token' => '','status' => false];
	
	}

	public function actionSignup()
	{
		$model = new SignupForm();

		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		if($model->load(Yii::$app->getRequest()->getBodyParams(),'') && $user = $model->signup()){
			return ['access_token' => $user->access_token,'status' => true];
		}
		else
			return ['access_token' => '','status' => false];


	}
}