<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\AssetBundle;
use \kouosl\theme\bundles\SettingAsset;
/* @var $this yii\web\View */
/* @var $model kouosl\site\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">
    
    <table class="table">
    <thead>
      <tr>
        <th class="text-center">Setting Name</th>
        <th class="text-center">Value</th>
      </tr>
    </thead>
    <tbody>
      <?= $this->render('signup',  ['signup' => $signup] )     ?>
      <?= $this->render('contact', ['contact' => $contact] )   ?>
      <?= $this->render('login',   ['login' => $login] )       ?>
      <?= $this->render('about',   ['about' => $about] )       ?>   
      <?= $this->render('language',['language' =>   $language] ) ?>
      <?= $this->render('title',   ['title' => $title] ) ?>
      <?= $this->render('home',   ['contents' => $home,'selectedHome'=> $selectedHome] ) ?>
     
    </tbody>
  </table>

</div>
<?php

SettingAsset::register($this);

$script = <<< JS

function edit (data,id){
  $('#row-'+id).attr("class","info");
    $.ajax({
                type: "POST",
                url: "/admin/site/setting/change",
                data : data,
                success: function (msg) {
                  $('#row-'+id).attr("class","success");
                },
                error: function(msg){
                  $('#row-'+id).attr("class","danger");
                }
    })
}


JS;
$this->registerJS($script, \yii\web\View::POS_HEAD);

?>
