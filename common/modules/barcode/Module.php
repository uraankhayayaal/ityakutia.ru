<?php

namespace common\modules\barcode;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\barcode\controllers';
    public $defaultRoute = 'back';

    public function init()
    {
        parent::init();
    }
}