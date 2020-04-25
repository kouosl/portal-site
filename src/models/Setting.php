<?php

namespace portalium\site\models;

use yii\db\ActiveRecord;
use portalium\helpers\ObjectHelper;

class Setting extends ActiveRecord
{
    const TYPE_INPUT            = 0;
    const TYPE_INPUTTEXT        = 1;
    const TYPE_INPUTPASSWORD    = 2;
    const TYPE_INPUTFILE        = 3;
    const TYPE_INPUTHIDDEN      = 4;
    const TYPE_TEXTAREA         = 5;
    const TYPE_CHECKBOX         = 6;
    const TYPE_CHECKBOXLIST     = 7;
    const TYPE_RADIO            = 8;
    const TYPE_RADIOLIST        = 9;
    const TYPE_LISTBOX          = 10;
    const TYPE_DROPDOWNLIST     = 11;
    
    public static function tableName()
    {
        return '{{setting}}';
    }

    public function rules()
    {
        return [
            [['category','name','label','type'], 'required'],
            [['name', 'value'], 'string', 'max' => 200],
            ['type', 'default', 'value' => self::TYPE_INPUT],
            ['type', 'in', 'range' => self::getTypes()],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }

    public static function getTypes()
    {
        return ObjectHelper::getConstants('TYPE_',__CLASS__);
    }
}
