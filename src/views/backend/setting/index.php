<?php

use yii\helpers\Html;
use portalium\site\Module;

$this->title = Module::t('Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-form">
    <table class="table">
        <thead>
        <tr>
            <th class="text-center"><?= Module::t('Setting Name') ?></th>
            <th class="text-center"><?= Module::t('Value') ?></th>
        </tr>
        </thead>
        <tbody>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Portal Title') ?></td>
                <td class="text-center"><?= Html::input('text', 'settings[title]', $settings['title']) ?>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Portal Languages') ?></td>
                <td class="text-center"><?= Html::dropDownList('settings[languages]', null, $languages) ?></td>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Portal Language') ?></td>
                <td class="text-center"><?= Html::dropDownList('settings[language]', $settings['language'], $languages) ?></td>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Home Page') ?></td>
                <td class="text-center"><?php // Html::dropDownList('settings[page_home]', $settings['page_home'], $contents);  ?></td>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('About Page Show') ?></td>
                <td class="text-center"><?= Html::checkbox('settings[page_about]', $settings['page_about'],['class' => 'make-switch']) ?></td>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Contact Page Show') ?></td>
                <td class="text-center"><?= Html::checkbox('settings[page_contact]', $settings['page_contact'],['class' => 'make-switch']) ?></td>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Signup Page Show') ?></td>
                <td class="text-center"><?= Html::checkbox('settings[page_signup]', $settings['page_signup'],['class' => 'make-switch']) ?></td>
            </tr>
            <tr id="row-setting">
                <td class="text-center"><?= Module::t('Login Page Show') ?></td>
                <td class="text-center"><?= Html::checkbox('settings[page_login]', $settings['page_login'],['class' => 'make-switch']) ?></td>
            </tr>
        </tbody>
    </table>
</div>