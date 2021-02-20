<?php

namespace common\modules\smartlink\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class SmartlinkSearch extends Smartlink 
{
    public function rules()
    {
        return [
            [['user_id', 'link_ios', 'link_android', 'link_hash', 'company', 'start_at', 'end_at', 'status', 'created_at', 'updated_at'], 'integer'],
            [['company', 'app_name', 'region'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Smartlink::find();

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
            'user_id' => $this->user_id,
            'link_ios' => $this->link_ios,
            'link_android' => $this->link_android,
            'link_hash' => $this->link_hash,
            'company' => $this->company,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'app_name', $this->app_name])
            ->andFilterWhere(['like', 'region', $this->region]);

        return $dataProvider;
    }
}