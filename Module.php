<?php

namespace kouosl\site;

use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\HttpException;

class Module extends \kouosl\base\Module
{
    public $controllerNamespace = '';

    public function init()
    {
        parent::init();
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
}
