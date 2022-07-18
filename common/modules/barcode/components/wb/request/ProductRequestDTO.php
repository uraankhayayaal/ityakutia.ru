<?php

namespace common\modules\barcode\components\wb\request;

use common\modules\barcode\models\Product;
use common\modules\barcode\models\ProductUpdateFrom;
use yii\helpers\Json;

interface ProductRequestDTOInterface
{
    public function setData(Product $product): ProductRequestDTOInterface;
    public function changeProduct(ProductUpdateFrom $newProduct);
    public function getJson();
    public function getArray();
}

class ProductRequestDTO implements ProductRequestDTOInterface
{
    protected $data;

    public function setData(Product $product): ProductRequestDTOInterface
    {
        $productData = Json::decode($product->data);
        $jsonData = 
        '{
            "id": 1,
            "jsonrpc": "2.0",
            "params": {
                "card": '.$product->data.',
                "supplierID": "'.$productData['supplierId'].'"
            }
        }';
        $this->data = Json::decode($jsonData);
        return $this;
    }

    public function changeProduct(ProductUpdateFrom $newProduct)
    {
        foreach ($this->data['params']['card']['addin'] as $key => $addin) {
            if ($addin['type'] == 'Наименование')
                $this->data['params']['card']['addin'][$key]['params'][0]['value'] = $newProduct->productName;
        }
        $this->data['params']['card']['countryProduction'] = $newProduct->countryProduction;
        return $this->data;
    }

    public function getJson()
    {
        return Json::encode($this->data);
    }

    public function getArray()
    {
        return $this->data;
    }
}