<?php

namespace common\modules\smartlink\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class MovementSearch extends Movement 
{
    public function rules()
    {
        return [
            [['port', 'smartlink_id', 'created_at'], 'integer'],
            [['ip', 'userAgent', 'platform', 'browser', 'host', 'url'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params, $id)
    {
        $query = Movement::find();

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
            'port' => $this->port,
            'smartlink_id' => $id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'userAgent', $this->userAgent])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'platform', $this->platform])
            ->andFilterWhere(['like', 'browser', $this->browser])
            ->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}