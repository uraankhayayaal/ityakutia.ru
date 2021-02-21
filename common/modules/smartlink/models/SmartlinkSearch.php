<?php

namespace common\modules\smartlink\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class SmartlinkSearch extends Smartlink 
{
    public function rules()
    {
        return [
            [['user_id',  'start_at', 'end_at', 'status', 'created_at', 'updated_at', 'is_js_redirect_for_mobile'], 'integer'],
            [['link_ios', 'link_android', 'link_hash', 'link_web', 'company', 'app_name', 'region', 'title', 'photo', 'description'], 'safe']
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
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_js_redirect_for_mobile' => $this->is_js_redirect_for_mobile,
        ]);

        $query->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'app_name', $this->app_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'link_ios', $this->link_ios])
            ->andFilterWhere(['like', 'link_android', $this->link_android])
            ->andFilterWhere(['like', 'link_hash', $this->link_hash])
            ->andFilterWhere(['like', 'link_web', $this->link_web])
            ->andFilterWhere(['like', 'region', $this->region]);

        return $dataProvider;
    }
}