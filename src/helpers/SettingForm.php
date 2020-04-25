<?php

namespace portalium\site\helpers;

use yii\helpers\Json;
use portalium\site\Module;
use portalium\site\models\Setting;


class SettingForm
{
    private static $typeMethodName= [
        Setting::TYPE_INPUT => 'input',
        Setting::TYPE_INPUTTEXT => 'textInput',
        Setting::TYPE_INPUTPASSWORD => 'passwordInput',
        Setting::TYPE_INPUTFILE => 'fileInput',
        Setting::TYPE_INPUTHIDDEN => 'hiddenInput',
        Setting::TYPE_TEXTAREA => 'textarea',
        Setting::TYPE_CHECKBOX => 'checkbox',
        Setting::TYPE_CHECKBOXLIST => 'checkboxList',
        Setting::TYPE_RADIO => 'radio',
        Setting::TYPE_RADIOLIST => 'radioList',
        Setting::TYPE_LISTBOX => 'listBox',
        Setting::TYPE_DROPDOWNLIST => 'dropdownList'
    ];

    public function configT($setting)
    {
        $items = Json::decode($setting->config,true);
        return (is_array($items)) ? array_map(function($item) use($setting) {
            return Module::settingT($setting->category, $item);
            }, $items) : $setting->config;
    }

    public function field($form, $setting, $index)
    {
        $method = self::getMethodName($setting->type);
        if(in_array($setting->type, [Setting::TYPE_INPUTFILE, Setting::TYPE_TEXTAREA, Setting::TYPE_CHECKBOX, Setting::TYPE_CHECKBOXLIST, Setting::TYPE_RADIO, Setting::TYPE_RADIOLIST, Setting::TYPE_LISTBOX, Setting::TYPE_DROPDOWNLIST]))
            return $form->field($setting, "[$index]value")->$method(self::configT($setting))->label(false);

        if(in_array($setting->type, [Setting::TYPE_INPUTTEXT, Setting::TYPE_INPUTPASSWORD, Setting::TYPE_INPUTHIDDEN]))
            return $form->field($setting, "[$index]value")->$method()->label(false);
        
        if(in_array($setting->type, [Setting::TYPE_INPUT]))
            return $form->field($setting, "[$index]value")->$method($setting->config)->label(false);
    }

    private function getMethodName($type){
        return self::$typeMethodName[$type];
    }
}
