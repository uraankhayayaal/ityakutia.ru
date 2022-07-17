<?php

namespace common\modules\barcode\components\wb;

use common\modules\barcode\models\Barcode;
use common\modules\barcode\models\BarcodeForm;

interface DataTrasferObjectInterface
{
    public function setData($data): DataTrasferObjectInterface;
    public function transform();
}

class DataTrasferObject implements DataTrasferObjectInterface
{
    private $data;

    public function setData($data): DataTrasferObjectInterface
    {
        $this->data = $data;
        return $this;
    }

    public function transform()
    {
        foreach ($this->data['result']['cards'] as $product) {
            $category = $product['object'];
            $productArticule = $product['supplierVendorCode'];
            $countryProduction = $product['countryProduction'];

            // Полуцение 
            $brend = null;
            $gender = null;
            $name = null;
            $description = null;
            $tnved = null;
            $compound = null;
            $equipment = null;
            $decor = null;
            foreach ($product['addin'] as $key => $addin) {
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

            foreach ($product['nomenclatures'] as $nomenclature) {
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
                    $model = Barcode::find()->where(['uid' => $variation['chrtId']])->one();
                    if($model === null) $model = new Barcode();
                    
                    $model->uid = $variation['chrtId'];
                    $model->code = $variation['barcodes'][0] ?? '000000000000';
                    $model->type = BarcodeForm::TYPE_EAN13;
                    $model->category = $category;
                    $model->productArticule = $productArticule;
                    $model->countryProduction = $countryProduction;
                    $model->vendorCode = $vendorCode;
                    $model->color = $nomenclatureColor;
                    $model->photo = $nomenclaturePhoto;
                    $model->data = \yii\helpers\Json::encode($product, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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