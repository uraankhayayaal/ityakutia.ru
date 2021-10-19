<?php

namespace common\modules\payment\services;

use common\modules\payment\models\Purchase;
use yii\db\Expression;
use yii\helpers\Json;
use yii\helpers\Url;

class Sberbank
{
    private $headers = ['Content-Type: application/x-www-form-urlencoded'];
    private $username = 'kinder_admin14-api';
    private $password = 'kinder_admin14';
    private $testMode = true;
    private $stages = 1; // 1: Одностадийна оплата / 2: Двухстадийная оплата
    private $returnUrl = '/payment/purchase/complete?paymentservice=sberbank';
    private $apiUrlTest = 'https://3dsec.sberbank.ru/payment/rest/';
    private $apiUrl = 'https://3dsec.sberbank.ru/payment/rest/';
    public $sessionTimeoutSecs = 1200;

    public $successUrl = '/payment/order/success';
    public $failUrl = '/payment/order/fail';
    public $successCallback = null;
    public $failCallback = null;

    private $urls = [
        'Регистрация заказа' => 'register.do',
        'Регистрация заказа с предавторизацией' => 'registerPreAuth.do',
        'Запрос завершения оплаты заказа' => 'deposit.do',
        'Запрос отмены оплаты заказа' => 'reverse.do',
        'Запрос возврата средств оплаты заказа' => 'refund.do',
        'Получение статуса заказа' => 'getOrderStatusExtended.do',
        'Запрос проверки вовлечённости карты в 3DS' => 'verifyEnrollment.do',
        'Запрос отмены неоплаченного заказа' => 'decline.do',
        'Запрос сведений о кассовом чеке (Для продавцов, подключённых к оператору фискальных данных.)' => 'getReceiptStatus.do',
        'Запрос деактивации связки' => 'unBindCard.do',
        'Запрос активации связки' => 'bindCard.do',
        'Запрос списка всех связок клиента' => 'getBindings.do',
        'Запрос списка связок определённой банковской карты' => 'getBindingsByCardOrId.do',
        'Запрос изменения срока действия связки' => 'extendBinding.do',
        'Запрос оплаты через Apple Pay' => 'https://3dsec.sberbank.ru/payment/applepay/payment.do',
        'Запрос рекуррентных платежей Apple Pay' => 'https://3dsec.sberbank.ru/payment/recurrentPayment.do',
        'Запрос оплаты через Samsung Pay' => 'https://3dsec.sberbank.ru/payment/samsung/payment.do',
        'Запрос оплаты через Samsung Pay (web)' => 'https://3dsec.sberbank.ru/payment/samsungWeb/payment.do',
        'Запрос оплаты через Google Pay' => 'https://3dsec.sberbank.ru/payment/google/payment.do',
    ];

    public function setStage(int $stage) : void 
    {
        $this->stage = $stage;
    }

    public function setTestMode(bool $testMode) : void 
    {
        $this->testMode = $testMode;
    }

    public function create(Purchase $model, array $post = [])
    {
        $post['orderNumber'] = $model->data['uniqid'];
        $post['amount'] = $model->sum * 100;
        $post['returnUrl'] = Url::to($this->returnUrl, true);
        $post['sessionTimeoutSecs'] = $this->sessionTimeoutSecs;
        if (array_key_exists('comment', $model->data)) {
            $post['description'] = $model->data['comment'];
        }
        $result = $this->query($this->urls['Регистрация заказа'], $post);
        if (array_key_exists('formUrl', $result)) {
            $model->url = $result['formUrl'];
            $model->save();
        }
        return $result;
    }

    public function complete($orderId)
    {
        $post = [];
        $post['orderId'] = $orderId;
        return $this->query($this->urls['Получение статуса заказа'], $post);
    }

    public function query($action, $data)
    {
        $data = $this->insertAuthData($data);
        $url = ($this->testMode ? $this->apiUrlTest : $this->apiUrl) . $action;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $out = curl_exec($curl);
        curl_close($curl);
        return Json::decode($out);
    }

    protected function insertAuthData(array $data)
    {
        $data['userName'] = $this->username;
        $data['password'] = $this->password;
        return $data;
    }

    public function successStatus()
    {
        return 2;
    }

    public function getDataForUpdate()
    {
        return [
            'status' => 'S',
            'pay_time' => new Expression("NOW()"),
        ];
    }
}