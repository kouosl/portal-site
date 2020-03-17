<?php

namespace portalium\site\controllers\frontend;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use portalium\site\Module;
use portalium\site\models\ContactForm;
use portalium\site\models\Setting;
use portalium\web\Controller as WebController;

class HomeController extends WebController
{
    public function behaviors(){
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index','error','contact','about','captcha','lang'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        if(Setting::findOne(['key' => 'page_login'])->value === 'true')
            return $this->render('about');
        return $this->goHome();
    }

    public function actionContact()
    {
        if(Setting::findOne(['key' => 'page_contact'])->value === 'true')
        {
            $model = new ContactForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail(Setting::findOne(['key' => 'email_address'])->value)) {
                    Yii::$app->session->setFlash('success', Module::t('Thank you for contacting us. We will respond to you as soon as possible.'));
                } else {
                    Yii::$app->session->setFlash('error', Module::t('There was an error sending your message.'));
                }

                return $this->refresh();
            } else {
                return $this->render('contact', [
                    'model' => $model,
                ]);
            }
        }

        return $this->goHome();
    }

    public function actionLang($lang)
    {
        Yii::$app->session->set('lang',$lang);
        return $this->goBack(Yii::$app->request->referrer);
    }
}