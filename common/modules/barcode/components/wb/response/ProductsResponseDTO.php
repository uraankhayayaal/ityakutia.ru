<?php

namespace common\modules\barcode\components\wb\response;

use common\modules\barcode\models\Product;
use common\modules\barcode\models\BarcodeForm;

interface ProductsResponseDTOInterface
{
    public function setData($data): ProductsResponseDTOInterface;
    public function transform();
}

class ProductsResponseDTO implements ProductsResponseDTOInterface
{
    private $data;

    public function setData($data): ProductsResponseDTOInterface
    {
        $this->data = $data;
        return $this;
    }

    public function transform()
    {
        foreach ($this->data['result']['cards'] as $product) {
            $dto = new ProductResponseDTO();
            $dto->setData(['result' => ['card' => $product]])->transform();
        }
    }
}