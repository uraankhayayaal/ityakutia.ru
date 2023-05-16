<?php

namespace frontend\models;

use yii\base\Model;

class CalcGoalForm extends Model
{
    public $percent = 7.5;
    public $periodOfMonths = 9;
    public $startSum = 120000;
    public $monthChargeSum = 0;
    
    public $calendar = [];

    public $totalSum = 0;
    public $profitSum = 0;

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
            'periodOfMonths' => 'Период вклада в месяцях',
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
            $this->profitSum += $this->calendar[$monthIndex]['profitSum'];
            $this->calendar[$monthIndex]['totalSum'] = round($this->calendar[$monthIndex]['startSum'] + $this->calendar[$monthIndex]['profitSum'] + $this->monthChargeSum, 2);
            $this->totalSum = $this->calendar[$monthIndex]['totalSum'];
        }
    }
}
