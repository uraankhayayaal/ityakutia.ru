<?php

namespace common\modules\smartlink;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\smartlink\controllers';
    public $defaultRoute = 'front';

    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}