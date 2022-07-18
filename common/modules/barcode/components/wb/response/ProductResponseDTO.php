<?php

namespace common\modules\barcode\components\wb\response;

use common\modules\barcode\models\Product;
use common\modules\barcode\models\BarcodeForm;

interface ProductResponseDTOInterface
{
    public function setData($data): ProductResponseDTOInterface;
    public function transform();
}

class ProductResponseDTO implements ProductResponseDTOInterface
{
    private $data;

    public function setData($data): ProductResponseDTOInterface
    {
        $this->data = $data['result']['card'];
        return $this;
    }

    public function transform()
    {
        $category = $this->data['object'];
        $productArticule = $this->data['supplierVendorCode'];
        $countryProduction = $this->data['countryProduction'];
        $imtID = $this->data['imtId'];

        // Полуцение 
        $brend = null;
        $gender = null;
        $name = null;
        $description = null;
        $tnved = null;
        $compound = null;
        $equipment = null;
        $decor = null;
        foreach ($this->data['addin'] as $key => $addin) {
            switch ($addin['type']) {
                case 'Бренд':
                    $brend = $this->getAddin($addin);
                    break;
                case 'Пол':
                    $gender = $this->getAddin($addin);
                    break;
                case 'Наименование':
                    $name = $this->getAddin($addin);
                    break;
                case 'Описание':
                    $description = $this->getAddin($addin);
                    break;
                case 'Тнвэд':
                    $tnved = $this->getAddin($addin);
                    break;
                case 'Состав':
                    $compound = $this->getAddin($addin);
                    break;
                case 'Комплектация':
                    $equipment = $this->getAddin($addin);
                    break;
                case 'Декоративные элементы':
                    $decor = $this->getAddin($addin);
                    break;
            }
        }

        foreach ($this->data['nomenclatures'] as $nomenclature) {
            $vendorCode = $nomenclature['vendorCode'];

            // Получение первой фотографии
            $nomenclaturePhoto = null;
            foreach ($nomenclature['addin'] as $key => $addin) {
                if ($addin['type'] == 'Фото') {
                    $nomenclaturePhoto = $addin['params'][0]['value'];
                    break;
                }
            }

            // Полуцение цвета
            $nomenclatureColor = null;
            foreach ($nomenclature['addin'] as $key => $addin) {
                if ($addin['type'] == 'Основной цвет') {
                    $nomenclatureColor = $addin['params'][0]['value'];
                    break;
                }
            }
            
            foreach ($nomenclature['variations'] as $variation) {
                $model = Product::find()->where(['uid' => $variation['chrtId']])->one();
                if($model === null) $model = new Product();
                
                $model->imtID = $imtID;
                $model->uid = $variation['chrtId'];
                $model->code = $variation['barcodes'][0] ?? '000000000000';
                $model->type = BarcodeForm::TYPE_EAN13;
                $model->category = $category;
                $model->productArticule = $productArticule;
                $model->countryProduction = $countryProduction;
                $model->vendorCode = $vendorCode;
                $model->color = $nomenclatureColor;
                $model->photo = $nomenclaturePhoto;
                $model->data = \yii\helpers\Json::encode($this->data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                $model->brend = $brend;
                $model->gender = $gender;
                $model->name = $name;
                $model->description = $description;
                $model->tnved = $tnved;
                $model->compound = $compound;
                $model->equipment = $equipment;
                $model->decor = $decor;
                
                // Полуцение размера
                $variationSize = "";
                foreach ($variation['addin'] as $i => $addin) {
                    if ($addin['type'] == 'Размер' || $addin['type'] == 'Рос. размер') {
                        $variationSize .= ($i != 0 ? ' / ' : '');
                        $variationSize .= ($addin['type'] . ": ");
                        foreach ($addin['params'] as $key => $param) {
                            $variationSize .= ($key != 0 ? ', ' : '') . $param['value'];
                        }
                    }
                }
                $model->size = $variationSize;
                $model->save();
            }
        }
    }

    private function getAddin($addin)
    {
        $itemName = '';
        foreach ($addin['params'] as $key => $param) {
            $itemName .= ($key != 0 ? ', ' : '') . $param['value'];
        }
        return $itemName;
    }
}