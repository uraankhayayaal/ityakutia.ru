<?php

namespace backend\tests;

use \common\modules\barcode\models\BarcodeForm;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $barcodeFrom = new BarcodeForm();

        $barcodeFrom->setName(null);
        $barcodeFrom->code = '123213123123';
        $barcodeFrom->type = BarcodeForm::TYPE_EAN13;
        $barcodeFrom->articule = 'asdasdasd';
        $barcodeFrom->color = 'asdasdasd';
        $barcodeFrom->size = 'asdasdasd';
        $barcodeFrom->name = 'asdasdasd';
        $barcodeFrom->company = 'asdasdasd';
        $barcodeFrom->is_articule = true;
        $barcodeFrom->is_color = false;
        $barcodeFrom->is_size = false;
        $barcodeFrom->is_name = false;
        $barcodeFrom->is_company = false;
        $barcodeFrom->count = 1;
        $barcodeFrom->format = BarcodeForm::FORMAT_A4;
        $barcodeFrom->barcodeSize = BarcodeForm::BC_SIZE_M;
        $barcodeFrom->fontSize = 11;
        $barcodeFrom->is_border = true;
        $barcodeFrom->eac = true;

        $this->assertFalse($barcodeFrom->getPdf());
    }
}