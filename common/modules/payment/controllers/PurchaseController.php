<?php

namespace common\modules\payment\controllers;

use common\modules\api\controllers\PaymentController;
use common\modules\payment\models\Purchase;
use common\modules\payment\services\Sberbank;
use ErrorException;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PurchaseController extends Controller
{
    /* @var Module */
    public $module;

    /**
     * Сюда будет перенаправлен результат оплаты
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
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

            //Проверяем, если это API оплата, то ответ отправляем к клиенту.
            if(isset($model->data) && isset($model->data[PaymentController::API_SUCCESS_RETURN_URL_KEY]))
            {
                return $this->redirect($model->data[PaymentController::API_SUCCESS_RETURN_URL_KEY]);
            }

            return $this->redirect($payment->successUrl);
        } else {
            if ($payment->failCallback) {
                $callback = $payment->failCallback;
                $callback($model);
            }

            //Проверяем, если это API оплата, то ответ отправляем к клиенту.
            if(isset($model->data) && isset($model->data[PaymentController::API_FAIL_RETURN_URL_KEY]))
            {
                return $this->redirect($model->data[PaymentController::API_FAIL_RETURN_URL_KEY]);
            }

            return $this->redirect($payment->failUrl);
        }
    }

    /**
     * Создание оплаты редеректим в шлюз сберабнка
     * @param $id
     * @return \yii\web\Response
     * @throws ErrorException
     * @throws \Exception
     * @throws \yii\db\StaleObjectException
     * @throws \Throwable
     */
    public function actionCreate($id)
    {
        $model = Purchase::findOne($id);
        // $result = $this->module->sberbank->create($model); // WTF?
        $result = (new Sberbank())->create($model);
        if (array_key_exists('errorCode', $result)) {
            throw new ErrorException($result['errorMessage']);
        }
        $orderId = $result['orderId'];
        $formUrl = $result['formUrl'];
        $model->orderId = $orderId;
        $model->update();
        return $this->redirect($formUrl);
    }
}