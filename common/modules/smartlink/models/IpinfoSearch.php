<?php

namespace common\modules\smartlink\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class IpinfoSearch extends Ipinfo 
{
    public function rules()
    {
        return [
            [['id', 'timezone_dstOffset', 'timezone_gmtOffset', 'created_at', 'updated_at'], 'integer'],
            ['success', 'boolean'],
            [['ip', 'message', 'type', 'continent', 'continent_code', 'country', 'country_code', 'country_flag', 'country_capital', 'country_phone', 'country_neighbours', 'region', 'city', 'latitude', 'longitude', 'asn', 'org', 'isp', 'timezone', 'timezone_name', 'timezone_gmt', 'currency', 'currency_code', 'currency_symbol', 'currency_rates', 'currency_plural'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Ipinfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'success' => $this->success,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}