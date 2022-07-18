<?php

namespace common\modules\barcode\components\wb;

use yii\httpclient\Client;
use common\modules\barcode\models\Product;
use common\modules\barcode\models\ProductUpdateFrom;
use common\modules\barcode\components\wb\response\ProductResponseDTO;
use common\modules\barcode\components\wb\response\ProductsResponseDTO;
use common\modules\barcode\components\wb\request\ProductRequestDTO;

interface WbApiInterface
{
    public function getProduct($imtID);
    public function getProducts();
    public function changeProduct(Product $data, ProductUpdateFrom $newProduct);
    public function query($method, $action, $data);
}

class WbApi implements WbApiInterface
{
    private $url = 'https://suppliers-api.wildberries.ru/card/';

    public function getProduct($imtID)
    {
        $method = 'POST';
        $action = 'cardByImtID';
        $params = [
            'id' => 1,
            'jsonrpc' => '2.0',
            'params' => [
                "imtID" => $imtID,
                'supplierID' => \Yii::$app->params['wb_key'],
            ]
        ];
        $data = $this->query($method, $action, $params);
        $dto = new ProductResponseDTO();
        return $dto->setData($data)->transform();
    }

    public function getProducts()
    {
        $method = 'POST';
        $action = 'list';
        $params = [
            'id' => 1,
            'jsonrpc' => '2.0',
            'params' => [
                'filter' => [
                    'order' => [
                        'column' => 'createdAt',
                        'order' => 'desc'
                    ]
                ],
                'isArchive' => true,
                'query' => [
                    'limit' => 1000,
                    'offset' => 0,
                    'total' => 1000
                ],
                'supplierID' => \Yii::$app->params['wb_key'],
            ]
        ];
        $data = $this->query($method, $action, $params);
        $dto = new ProductsResponseDTO();
        return $dto->setData($data)->transform();
    }

    public function changeProduct(Product $product, ProductUpdateFrom $newProduct)
    {
        $method = 'POST';
        $action = 'update';
        $productRequesDTO = new ProductRequestDTO();
        $productRequesDTO->setData($product);
        $productRequesDTO->changeProduct($newProduct);
        $data = $this->query($method, $action, $productRequesDTO->getArray());
        if (isset($data['result'])) {
            return true;
        } else {
            var_dump($data);die;
            return false;
        }
    }

    public function query($method, $action, $data)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($this->url . $action)
            ->setHeaders([
                'Authorization' => \Yii::$app->params['wb_secret'],
            ])
            ->setFormat(Client::FORMAT_JSON)
            ->setData($data)
            ->send();
        if ($response->isOk) {
            return $response->data;
        }
        return ['isOk' => false, 'error' => true, 'message' => 'Ошибка получения ответа от сервера'];
    }
}