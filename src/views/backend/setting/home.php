<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kouosl\site\models\SettingsSearch */
/* @var $form yii\widgets\ActiveForm */
$content_name = array();
foreach($contents as $item){
    $content_name[$item['id']] = $item['name'];
}
?>
  <tr id="row-home">
        <td class="text-center">Home Page</td>
        <td class="text-center"><?= Html::dropDownList('home', 'home', $content_name, ['id'=>'home' , 'onchange' => 'edit({ home: this.options[this.selectedIndex].value , key : \'home\'},\'home\')','options' => [ $selectedHome => ['Selected'=>'selected']]]); ?></td>
</tr>   

 