<?php

namespace common\modules\barcode\models;

class ProductUpdateFrom extends \yii\base\Model
{
    public $productName;
    public $countryProduction;

    public function rules()
    {
        return [
            [['productName', 'countryProduction'], 'required'],
            [['productName', 'countryProduction'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'productName' => 'Наименование продукта',
            'countryProduction' => 'Страна производства',
        ];
    }
}