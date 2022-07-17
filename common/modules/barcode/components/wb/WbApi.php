<?php

namespace common\modules\barcode\components\wb;

use yii\httpclient\Client;

interface WbApiInterface
{
    public function getProducts();
    public function query($method, $action, $data);
}

class WbApi implements WbApiInterface
{
    private $url = 'https://suppliers-api.wildberries.ru/card/';

    public function getProducts()
    {
        $method = 'POST';
        $action = 'list';
        $data = [
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
        $data = $this->query($method, $action, $data);
        $dto = new DataTrasferObject();
        return $dto->setData($data)->transform();
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