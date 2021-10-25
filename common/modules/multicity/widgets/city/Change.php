<?php

namespace ayaalkaplin\multicity\widgets\city;

use ayaalkaplin\multicity\models\City;

/**
 * This is just an example.
 */
class Change extends \yii\base\Widget
{
    public function init(){}

    public function run() {
        return $this->render('index', [
            'current' => City::getCurrent(),
            'citys' => City::find()->where('id != :current_id', [':current_id' => City::getCurrent()->id])->all(),
        ]);
    }
}
