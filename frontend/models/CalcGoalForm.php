<?php

namespace frontend\models;

use common\models\Auth;
use common\models\User;
use yii\base\Model;
use Yii;

class CalcGoalForm extends Model
{
    public $percent = 7.5;
    public $periodOfMonths = 9;
    public $startSum = 12000;
    public $monthChargeSum = 2000;
    
    public $calendar = [];

    public $totalSum;
    public $profitSum;

    public function rules() {
        return [
            [['percent', 'periodOfMonths', 'startSum', 'monthChargeSum'], 'required'],
            [['percent', 'totalSum', 'profitSum'], 'double'],
            [['periodOfMonths', 'startSum', 'monthChargeSum'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'percent' => 'Процентная ставка вклада',
            'periodOfMonths' => 'Период вклада',
            'startSum' => 'Начальная сумма',
            'monthChargeSum' => 'Ежемесячное пополнение',
            'totalSum' => 'Накопленная сумма',
            'profitSum' => 'Прибыль от вклада',
        ];
    }

    public function calc()
    {
        $this->calcMonthTotalSum();
    }

    public function calcMonthTotalSum()
    {
        for ($monthIndex = 0; $monthIndex < $this->periodOfMonths; $monthIndex++) {
            $this->calendar[$monthIndex] = [];
            $this->calendar[$monthIndex]['startSum'] = $monthIndex == 0 ? $this->startSum : $this->calendar[$monthIndex - 1]['totalSum'];
            $this->calendar[$monthIndex]['profitSum'] = round($this->calendar[$monthIndex]['startSum'] * $this->percent / 100 / 12, 2);
            $this->calendar[$monthIndex]['totalSum'] = round($this->calendar[$monthIndex]['startSum'] + $this->calendar[$monthIndex]['profitSum'] + $this->monthChargeSum, 2);
        }
    }
}
