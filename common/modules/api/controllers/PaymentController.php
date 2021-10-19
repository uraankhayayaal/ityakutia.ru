<?php

namespace common\modules\api\controllers;

use common\modules\payment\models\Purchase;
use common\modules\payment\services\Sberbank;
use ErrorException;
use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class PaymentController extends Controller
{
    public const API_SUCCESS_RETURN_URL_KEY = 'api_success_return_url';
    public const API_FAIL_RETURN_URL_KEY = 'api_fail_return_url';

    public function actionCreate($order_id, $sum, $remote_id, $api_success_return_url, $api_fail_return_url)
    {
        $invoice = Purchase::addSberbank($order_id, $sum, $remote_id, [self::API_SUCCESS_RETURN_URL_KEY => $api_success_return_url, self::API_FAIL_RETURN_URL_KEY => $api_fail_return_url]);

        $result = (new Sberbank())->create($invoice);
        if (array_key_exists('errorCode', $result)) {
            throw new ErrorException($result['errorMessage']);
        }
        $orderId = $result['orderId'];
        $formUrl = $result['formUrl'];
        $invoice->orderId = $orderId;
        $invoice->update();
        return $formUrl;
    }

    public function actionComplete()
    {
        /* @var $model Invoice */
        if (is_null(Yii::$app->request->get('orderId'))) {
            throw new NotFoundHttpException();
        }
        $model = Purchase::find()
            ->where([
                'AND',
                ['=', 'status', 'I'],
                ['=', 'orderId', Yii::$app->request->get('orderId')],
            ])
            ->one();
        if (is_null($model)) {
            throw new NotFoundHttpException();
        }
        // $result = $this->module->sberbank->complete(Yii::$app->request->get('orderId'));
        $payment = new Sberbank();
        $result = $payment->complete(Yii::$app->request->get('orderId'));
        //Проверяем статус оплаты если всё хорошо обновим инвойс и редерекним
        if (isset($result['orderStatus']) && ($result['orderStatus'] == $payment->successStatus())) {
            $model->attributes = $payment->getDataForUpdate();
            $model->update();
            if ($payment->successCallback) {
                $callback = $payment->successCallback;
                $callback($model);
            }
            return "API: Success";
        } else {
            if ($payment->failCallback) {
                $callback = $payment->failCallback;
                $callback($model);
            }
            return "API: Fail";
        }
    }
}