<?php

namespace common\modules\barcode\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class BarcodeSearch extends Barcode 
{
    public function rules()
    {
        return [
            [['code', 'type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['code', 'category', 'productArticule', 'size'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Barcode::find();

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
            'code' => $this->code,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'category', $this->category])
            ->orFilterWhere(['like', 'productArticule', $this->category]);

        return $dataProvider;
    }
}