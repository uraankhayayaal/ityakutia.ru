<?php

namespace common\modules\payment\controllers;

use common\modules\payment\models\Purchase;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{
    public function actionCreate($product)
    {
        $order = [
            1 => [
                'price' => 790,
                'description' => "Smartlink, Разовый абонимент на месяц",
            ],
            2 => [
                'price' => 9000,
                'description' => "Smartlink, Годовой абонимент",
            ],
        ];

        if(isset($order[$product])){
            $invoice = Purchase::addSberbank($product, $order[$product]['price']);

            return $this->redirect(['/payment/purchase/create', 'id' => $invoice->id]);
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFail()
    {
        return 'Fail';
    }

    public function actionSuccess()
    {
        return 'Success';
    }
}