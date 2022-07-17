<?php

namespace common\modules\barcode\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Barcode extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public static function tableName(): string
    {
        return 'barcode';
    }

    public function rules()
    {
        return [
            [['code', 'type'], 'required'],
            [['type'], 'integer'],
            [['code', 'category', 'productArticule', 'size', 'countryProduction', 'vendorCode', 'photo', 'data', 'color', 'name', 'brend', 'gender', 'description', 'tnved', 'compound', 'equipment', 'decor',], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'type' => 'Тип',
            'uid' => 'Уникальный идентификатор вариации товара',
            'category' => 'Категория товара',
            'productArticule' => 'Артикул товара',
            'size' => 'Размер вариации',
            'countryProduction' => 'Страна производства',
            'vendorCode' => 'Артикул номенклатуры',
            'color' => 'Цвет',
            'photo' => 'Фото',
            'data' => 'Json data',
            'name' => 'Наименование товара',
            'brend' => 'Бренд',
            'gender' => 'Пол',
            'description' => 'Описание',
            'tnved' => 'ТНВЕД',
            'compound' => 'Состав',
            'equipment' => 'Комплектация',
            'decor' => 'Декоративные элементы',
        ];
    }
}