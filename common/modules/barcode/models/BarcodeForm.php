<?php

namespace common\modules\barcode\models;

use Dompdf\Dompdf;
use Dompdf\Options;

class BarcodeForm extends \yii\base\Model
{
    const TYPE_EAN13 = 1;
    const TYPE_CODE128 = 2;
    const TYPE_QRCODE = 3;

    const TYPES = [
        self::TYPE_EAN13 => 'Ean 13',
        self::TYPE_CODE128 => 'Code 128',
        // self::TYPE_QRCODE => 'QR code',
    ];

    const FORMAT_A4 = 0;
    const FORMAT_TL = 1;
    const FORMATS = [
        self::FORMAT_A4 => 'А4',
        self::FORMAT_TL => 'Термоэтикетка',
    ];

    const BC_SIZE_XS = 0;
    const BC_SIZE_S = 1;
    const BC_SIZE_M = 2;
    const BC_SIZE_L = 3;
    const BC_SIZE_XL = 4;
    const BC_SIZE_XXL = 5;
    const BC_SIZES = [
        self::BC_SIZE_XS =>  ['label' => '43x25',     'x' => 4.3,  'y' => 2.5],
        self::BC_SIZE_S =>   ['label' => '52x34',     'x' => 5.2,  'y' => 3.4],
        self::BC_SIZE_M =>   ['label' => '58x40',     'x' => 5.8,  'y' => 4.0],
        self::BC_SIZE_L =>   ['label' => '70x37',     'x' => 7.0,  'y' => 3.7],
        self::BC_SIZE_XL =>  ['label' => '70x42',     'x' => 7.0,  'y' => 4.2],
        self::BC_SIZE_XXL => ['label' => '105X48',    'x' => 10.5, 'y' => 4.8],
    ];
    const BC_SIZES_DROPDOWN = [
        self::BC_SIZE_XS => '43x25', 
        self::BC_SIZE_S => '52x34', 
        self::BC_SIZE_M => '58x40', 
        self::BC_SIZE_L => '70x37', 
        self::BC_SIZE_XL => '70x42', 
        self::BC_SIZE_XXL => '105X48',
    ];

    public $code = '000000000000';
    public $type = self::TYPE_EAN13;
    public $articule;
    public $color;
    public $size;
    public $name;
    public $company;
    public $is_articule = true;
    public $is_color = false;
    public $is_size = false;
    public $is_name = false;
    public $is_company = false;
    public $count = 1;
    public $format = self::FORMAT_A4;
    public $barcodeSize = self::BC_SIZE_M;
    public $fontSize = 11;
    public $is_border = true;
    public $eac = true;

    public function rules()
    {
        return [
            [['code', 'type'], 'required'],
            [['count', 'format', 'barcodeSize', 'fontSize'], 'integer'],
            [['code', 'articule', 'color', 'size', 'name', 'company'], 'string'],
            [['is_articule', 'is_color', 'is_size', 'is_name', 'is_company', 'is_border', 'eac'], 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => 'Штрихкод',
            'type' => 'Тип штрихкода',
            'articule' => 'Артикул',
            'color' => 'Цвет',
            'size' => 'Размер товара',
            'name' => 'Наименование',
            'company' => 'Производитель',
            'count' => 'Количество наклеек',
            'format' => 'Формат наклейки',
            'barcodeSize' => 'Размер наклейки',
            'fontSize' => 'Размер шрифта',
            'is_border' => 'Линии обреза (только для А4)',
            'eac' => 'EAC',
            'is_articule' => 'Включить артикул',
            'is_color' => 'Включить цвет',
            'is_size' => 'Включить размер',
            'is_name' => 'Включить наименование',
            'is_company' => 'Включить производителя',
        ];
    }

    public function getPdf()
    {
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('enable_remote', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($this->renderItems());

        if ($this->format == self::FORMAT_A4) {
            $dompdf->setPaper('A4');
        }
        if ($this->format == self::FORMAT_TL) {
            $dompdf->setPaper([
                0,
                0,
                self::BC_SIZES[$this->barcodeSize]['x']*37.795,
                self::BC_SIZES[$this->barcodeSize]['y']*37.795,
            ]);
        }
        
        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream();
    }

    protected function renderItems()
    {
        $list = '
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
                <style>
                    html,
                    body{
                        margin:0;padding:0;
                        font-family:"Open Sans",sans-serif;
                    }
                    body{
                        margin:1.5rem 2rem;
                    }
                </style>
            </head>
        <body>';
        for ($i=0; $i < $this->count; $i++) { 
            $list .= $this->renderItem($i);
        }
        $list .= '</body></html>';
        return $list;
    }

    protected function renderItem($i)
    {
        return '
            '.(($this->format !== self::FORMAT_A4 && $i > 0) ? '<div style="page-break-before: always;"></div>' : '').'
            <div style="width:'.self::BC_SIZES[$this->barcodeSize]['x'].'cm;height:'.self::BC_SIZES[$this->barcodeSize]['y'].'cm;'.(($this->format == self::FORMAT_A4 && $this->is_border)?'border:1px solid #000;':'').'font-size:'.$this->fontSize.'px;display:inline-block;margin:0;padding:0;position:relative;">
                '.$this->renderContent().'
            </div>
        ';
    }

    protected function renderContent()
    {
        $content = '';

        $img = '<div style="text-align:center;margin-top:5px;"><img width="50%" height="40px" src="'.$this->generateImg().'" alt="'.'sdada'.'"></div>';
        $code = '<div style="text-align:center;margin:1px 0;">'.$this->code.'</div>';
        
        $company = $this->is_company ? 
            ('<div style="text-align:center;margin:1px 0;">'.$this->company.'</div>') : '';
        $name = $this->is_name ? 
            ('<div style="margin:0 5px;">'.$this->name.'</div>') : '';
        $articule = $this->is_articule ? 
            ('<div style="margin:0 5px;">Артикул: '.$this->articule.'</div>') : '';
        $color = $this->is_color ? 
            ('<div style="margin:0 5px;">Цвет: '.$this->color.'</div>') : '';
        $size = $this->is_size ? 
            ('<div style="margin:0 5px;">'.$this->size.'</div>') : '';
        $eac = $this->eac ? '<div style="position:absolute;right:5px;bottom:5px;"><img width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAFuCAQAAAAFLoYuAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQflBgkOGCW7lPuvAAADLklEQVR42u3diwmEMBBAQVfSf212tDagoJAvmSngONd7MXBgIvMAnl2nGcA7gYBAQCAgEBAICAQEAgIBgYBAAIGAQEAgIBAQCAgEBAICAYGAQACBgEBAINBNMYInseE152bzy7qBxEa3F2yxQCAgEBAICAQEAgIBgYBAQCCAQEAgIBAQCAgEBAICAYGAQACBgEBAICAQEAgIBAQCAgGBgEAAgcAfzgfpZrfzNzxBQCAgEEAgIBAQCAgEBAIzG/ZHoXPNEQgsvqTaYoFAQCAgEBAICAQEAgIBgYBAAIGAQEAgIBAQCAgEBAICAYGAQACBgEBAICAQEAgIBAQCAgGBAAIBgYBAQCAgEBAICAQEAgIBgQACAYGAQEAgIBAQCAgEBAICAQQCAgGBgEBAICAQEAgIBAQCAgEEAgIBgYBAQCAgEBAICAQEAggEBAICAYGAQEAgIBAQCAgEBAIIBAQCAgGBgEBAICAQEAgIBBAICAQEAgIBgYBAQCAgEBAICAQQCHxUjKCXMAKBjPu5pHuJLRYIBAQCAgGBgEBAIIBAQCAgEBAICAQEAgIBgYBAQCBGAAIBgYBAQCAgEBAICAQEAgIBBAICAYFAS8Pe7u5t7AiERkuCs0ZssUAgIBAQCAgEBAIIBAQCAgGBgEBAICAQEAgIBAQCCAQEAgIBgYBAQCAgEBAICAQQCAgEBAICAYGAQEAgIBAQCAgEEAgIBAQCAgGBgEBAICAQEAggEBAICAQEAgIBgYBAQCAgEBAIIBAQCAgEBAICAYGAQEAgIBAQiBGAQEAgIBAQCAgEBAICAYGAQACBgEBAICAQEAgIBAQCAgGBgEAAgYBAQCAgEBAICAQEAgIBgQACAYGAQEAgIBCYTDEC1hCVPy/nDmTM5YItFggEBAICAYGAQEAgIBBAICAQEAgIBAQCAgGBgEBAICAQQCAgEBAICAQEAgIBgYBAQCCAQEAgIBAQCAgEBAICAYGAQEAggEBAIFDB53PSnUOOQFhkOfD9bLFAICAQEAgIBAQCCAQEAgIBgYBAQCAgEBAICAQEAggEBAICAYGAQEAgIBAQCAgEEAgIBAQCbdwD9BS+W0M5fQAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMS0wNi0wOVQxNDoyNDozNyswMDowMBwKrMkAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjEtMDYtMDlUMTQ6MjQ6MzcrMDA6MDBtVxR1AAAAAElFTkSuQmCC"></div>' : '';

        $content = 
            $img .
            $code .
            $company .
            $articule .
            $color .
            $size .
            $name .
            $eac;

        return $content;
    }

    public function generateImg()
    {
        $blackColor = [0, 0, 0];
        $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
        $barcodeImg = $generator->getBarcode($this->code, $this->getGeneratorType($generator), 4, 100, $blackColor);
        return 'data:image/png;base64,' . base64_encode($barcodeImg);
    }

    private function getGeneratorType($generator)
    {
        $generatorType = null;
        switch ($this->type) {
            case self::TYPE_CODE128:
                $generatorType = $generator::TYPE_CODE_128;
                break;
            case self::TYPE_EAN13:
                $generatorType = $generator::TYPE_EAN_13;
                break;
            
            default:
                $generatorType = $generator::TYPE_EAN_13;
                break;
        }
        return $generatorType;
    }
}