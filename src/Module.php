<?php

namespace portalium\site;

use Yii;
use yii\filters\auth\CompositeAuth;

class Module extends \portalium\base\Module
{
    public static function moduleInit()
    {
        self::registerTranslation('site/*','@site/messages',[
            'site/site' => 'site.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::t('site', $message, $params);
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