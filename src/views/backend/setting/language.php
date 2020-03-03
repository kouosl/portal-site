<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kouosl\site\models\SettingsSearch */
/* @var $form yii\widgets\ActiveForm */
$language_list = [0=> 'Dili Seçiniz', 1 => 'TR', 2 => 'EN', 3 => 'FR'];
?>
  <tr id="row-language">
        <td class="text-center">Language</td>
        <td class="text-center"><?= Html::dropDownList('language', 'language', $language_list, ['id'=>'language' , 'onchange' => 'if(this.options[this.selectedIndex].text != \'Dili Seçiniz\') edit({ language: this.options[this.selectedIndex].text , type : \'language\'},\'language\')']); ?></td>
</tr>   

 