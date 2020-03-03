<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kouosl\site\models\SettingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<tr id="row-title">
        <td class="text-center">Title</td>
        <td class="text-center"><?= Html::input('text',$title,$title, $options=['class' => 'make-switch' ,'onblur' => 'edit({ title: $(this).val() , key : \'title\'},\'title\')']) ?>
</tr>
