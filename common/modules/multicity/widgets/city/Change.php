<?php

namespace common\modules\multicity\widgets\city;

use common\modules\multicity\models\City;

/**
 * This is just an example.
 */
class Change extends \yii\base\Widget
{
    public function init(){}

    public function run() {
        return $this->render('index', [
            'current' => City::getCurrent(),
            'cities' => City::find()->where('id != :current_id', [':current_id' => City::getCurrent()->id])->all(),
        ]);
    }
}
