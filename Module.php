<?php

namespace kouosl\site;

use Yii;

use yii\filters\auth\CompositeAuth;

class Module extends \kouosl\base\Module{
    public $controllerNamespace = '';

    public function init()
    {
        parent::init();
        $this->registerTranslations();

    }
  
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['site/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@kouosl/site/messages',
            'fileMap' => [
                'site/site' => 'site.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('site/' . $category, $message, $params, $language);
    }

    public static function initRules()
    {
        return $rules = [
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => [
                    'site/auth',
                ],
                'tokens' => [
                    '{id}' => '<id:\\w+>'
                ],
                'patterns' => [
                    'POST login' => 'auth/login',
                    'POST signup' => 'auth/signup'
                ]
            ],
        ] ;
    }

/**
 * 
 * base behaviors override method
 * 
 */
    public function behaviors(){

		$behaviors = parent::behaviors();

    	$behaviors['authenticator'] = [
			'class' => CompositeAuth::className(),
			'except' => ['auth/login'],
        ];
		return $behaviors;
    }
}