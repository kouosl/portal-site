<?php

namespace portalium\site\models;

use Yii;

class Setting extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'setting';
    }

    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['key', 'value'], 'string', 'max' => 200],
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
}