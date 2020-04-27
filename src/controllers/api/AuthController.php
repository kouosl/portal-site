<?php

namespace portalium\site\controllers\api;

use portalium\site\Module;
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

		if($model->load(Yii::$app->getRequest()->getBodyParams(),'')) {
            if ($model->login()) {
                $user = User::findIdentity(Yii::$app->user->identity->id);
                return ['access-token' => $user->access_token];
            } else
                return $this->modelError($model);
        }else{
		    return $this->error(['LoginForm' => Module::t("Username (username) and Password (password) required.")]);
		}
	}

	public function actionSignup()
	{
		$model = new SignupForm();

        if($model->load(Yii::$app->getRequest()->getBodyParams(),'')) {
            if($user = $model->signup()){
                return ['access-token' => $user->access_token];
            }
            else
                return $this->modelError($model);
        }else{
            return $this->error(['SignupForm' => Module::t("Username (username), Password (password) and Email (email) required.")]);
        }
	}
}
