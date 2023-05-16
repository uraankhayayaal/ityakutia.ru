<?php

namespace frontend\models;

use yii\base\Model;

class CalcCreditForm extends Model
{
    public $percent = 10.9;
    public $totalSum = 3600000;
    public $startSum = 1200000;
    public $periodOfYears = 10;

    public $monthlyPayment = 0;
    public $pereplata = 0;
    public $credit = 0;
    public $totalPayment = 0;
    public $calendar = [];

    public function rules() {
        return [
            [['percent', 'totalSum', 'startSum', 'periodOfYears'], 'required'],
            [['percent', 'monthlyPayment', 'startSum', 'pereplata', 'totalPayment', 'credit'], 'double'],
            [['totalSum', 'periodOfYears'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'percent' => 'Ставка по ипотеке',
            'totalSum' => 'Стоимость недвижимости',
            'startSum' => 'Первоначальный взнос',
            'periodOfYears' => 'Срок кредита',
            'monthlyPayment' => 'Ежемесячный платеж',
            'calendar' => 'Прибыль от вклада',
            'pereplata' => 'Переплата',
            'totalPayment' => 'Всего выплат',
            'credit' => 'Сумма кредита',
        ];
    }

    public function calc()
    {
        $this->calcMonthSum();
    }

    private function calcMonthSum()
    {
        $this->credit = $this->totalSum - $this->startSum;
        $p = $this->percent / 12 / 100;
        $m = $this->periodOfYears * 12;
        $o = pow((1 + $p), $m);
        $this->monthlyPayment = ($this->credit * $p * $o) / ($o -1);
        $ostatokDolga = $this->credit;

        for ($monthIndex = 0; $monthIndex < $m; $monthIndex++) {
            $this->calendar[$monthIndex] = [];

            $procenty = $ostatokDolga * $p;
            $osnovnoyDolg = $this->monthlyPayment - $procenty;
            $ostatokDolga -= $osnovnoyDolg;

            $this->calendar[$monthIndex]['payment'] = $this->monthlyPayment;
            $this->calendar[$monthIndex]['procenty'] = $procenty;
            $this->calendar[$monthIndex]['osnovnoyDolg'] = $osnovnoyDolg;
            $this->calendar[$monthIndex]['ostatokDolga'] = $ostatokDolga;
        }

        $this->pereplata = $this->monthlyPayment * $m - $this->credit;
        $this->totalPayment = $this->monthlyPayment * $m;
    }
}
