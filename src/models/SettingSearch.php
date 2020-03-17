<?php

namespace portalium\site\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use portalium\site\models\Settings;

class SettingSearch extends Setting
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['key', 'value'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Setting::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate())
        {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}