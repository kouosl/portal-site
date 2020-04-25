<?php

namespace portalium\site\controllers\api;

use Yii;
use yii\web\HttpException;
use portalium\user\models\User;
use portalium\site\models\SignupForm;
use portalium\site\models\LoginForm;
use portalium\rest\Controller as RestController;

class AuthController extends RestController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['login','signup'];

        return $behaviors;
    }

    public function actionLogin()
    {
		$model = new LoginForm();

		if($model->load(Yii::$app->getRequest()->getBodyParams(),'') && $model->login()){
			$user = User::findIdentity(Yii::$app->user->identity->id);
			return ['access_token' => $user->access_token];
		}
		else
			return $this->modelError($model);
	}

	public function actionSignup()
	{
		$model = new SignupForm();

		if($model->load(Yii::$app->getRequest()->getBodyParams(),'') && $user = $model->signup()){
			return ['access_token' => $user->access_token];
		}
		else
			return $this->modelError($model);
	}
}
