<?php

namespace common\modules\payment\services;

use yii\helpers\Json;

class Sberbank extends AbstractPaymentService
{
    private $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
    private $username = 'kinder_admin14-api';
    private $pasword = 'kinder_admin14';
    private $testMode = true;
    private $stages = 1; // 1: Одностадийна оплата / 2: Двухстадийная оплата
    private $returnUrl = '/payment/purchase/return-url?paymentservice=sberbank';
    private $failUrl = '/payment/purchase/fail-url?paymentservice=sberbank';
    private $apiUrlTest = 'https://3dsec.sberbank.ru/payment/rest/';
    private $apiUrl = 'https://3dsec.sberbank.ru/payment/rest/';

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

    /*
     * Test method that to be deleted.
     */
    public function paymentCardStrategy()
    {
        return $this->registerDo(); //
    }

    public function registerDo()
    {
        $data = [
            'returnUrl' => $this->returnUrl,
            'failUrl' => $this->failUrl
        ];
        $url = $this->urls['Регистрация заказа'];
        list($orderId, $formUrl) = $this->query($url, $data);
        return ['orderId' => '34324234234', 'formUrl' => 'https://sometestpaymentservice.test/asd?asd=asdasdsad'];
    }

    public function query($action, $data)
    {
        $data = $this->insertAuthData($data);
        $url = ($this->testMode ? $this->apiUrlTest : $this->apiUrl) . $action;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $out = curl_exec($curl);
        curl_close($curl);
        return Json::decode($out);
    }

    protected function insertAuthData(array $data)
    {
        $data['userName'] = $this->login;
        $data['password'] = $this->password;
        return $data;
    }
}