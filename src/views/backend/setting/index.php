<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kouosl\site\models\SettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';  
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="settings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= $this->render('_site',[
        'signup' => $settings['signup'] === 'true'? true: false,
        'contact' =>  $settings['contact'] === 'true'? true: false,
        'login' =>  $settings['login']=== 'true'? true: false,
        'about' => $settings['about']=== 'true'? true: false,
        'language' =>  $settings['language'],
        'title' => $settings['title'],
        'selectedHome' => $settings['home'],
        'home' =>  $contents
        
        ]
    ); 
        ?>
   

    
</div>
