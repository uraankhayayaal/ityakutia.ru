<?php
namespace common\modules\payment\tests\functional;

use common\modules\payment\FunctionalTester;
use common\modules\payment\tests\fixtures\PurchaseFixture;
use Yii;

class PurchaseCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => PurchaseFixture::className(),
                'dataFile' => "@common/modules/payment/tests/_data/purchase.php",
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/smartlink');
    }

    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('/site/smartlink');
        $I->click('Купить за 790 руб.');
    }
}