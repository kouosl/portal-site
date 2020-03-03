<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model kouosl\site\models\SettingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
  <tr id="row-login">
        <td class="text-center">Login</td>
        <td class="text-center"><?= Html::checkbox('login',$login,['class' => 'make-switch','checked' => false,'onchange' => 'edit({ login: $(this).is(":checked") , key : \'login\'},\'login\')']) ?></td>
      </tr>   