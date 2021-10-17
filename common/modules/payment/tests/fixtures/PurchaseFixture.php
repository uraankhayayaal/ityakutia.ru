<?php

namespace common\modules\payment\tests\fixtures;

use common\modules\payment\models\Purchase;
use yii\test\ActiveFixture;

class PurchaseFixture extends ActiveFixture
{
    public $modelClass = Purchase::class;
    public $dataFile = '@common/modules/payment/tests/_data/purchase.php';
}