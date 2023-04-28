<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CalcGoalForm;

/**
 * Calc controller
 */
class CalcController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGoal()
    {
        $model = new CalcGoalForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        }
        
        $model->calc();

        return $this->render('goal', [
            'model' => $model,
        ]);
    }
}
