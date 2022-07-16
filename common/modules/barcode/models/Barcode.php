<?php

namespace common\modules\barcode\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Barcode extends ActiveRecord
{
    const IMG_URL = '/images/uploads/barcode/';
    const IMG_PATH = '@frontend/web/images/uploads/barcode/';

    const TYPE_EAN13 = 1;
    const TYPE_CODE128 = 2;
    const TYPE_QRCODE = 3;

    const TYPES = [
        self::TYPE_EAN13 => 'Ean 13',
        self::TYPE_CODE128 => 'Code 128',
        self::TYPE_QRCODE => 'QR code',
    ];

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public static function tableName(): string
    {
        return 'barcode';
    }

    public function rules()
    {
        return [
            [['code', 'type'], 'required'],
            [['type'], 'integer'],
            [['code', 'src', 'url'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'type' => 'Тип',
            'src' => 'Путь в файловой системе',
            'url' => 'url адрес',
        ];
    }

    public function generateImg()
    {
        $blackColor = [0, 0, 0];
        $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
        $barcodeImg = $generator->getBarcode($this->code, $this->getGeneratorType($generator), 4, 100, $blackColor);
        $barcodeImgName = $this->code . '_' . $this->id . '.jpg';
        $src = self::IMG_PATH . $barcodeImgName;
        if (!file_exists(\Yii::getAlias(self::IMG_PATH)) || !is_dir(\Yii::getAlias(self::IMG_PATH)))
            \yii\helpers\FileHelper::createDirectory(\Yii::getAlias(self::IMG_PATH), $mode = 0775, $recursive = true);
        if (file_put_contents(\Yii::getAlias($src), $barcodeImg, FILE_APPEND | LOCK_EX)) {
            $this->url = self::IMG_URL . $barcodeImgName;
            $this->src = self::IMG_PATH . $barcodeImgName;
            $this->save();
            $this->annotateImg();
        } else {
            var_dump($barcodeImg); die;
        }
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

    private function annotateImg()
    {
        // 380x100
        $newImageName = \Yii::getAlias(self::IMG_PATH . $this->code . '_' . $this->id . '_text.jpg');
        $fontFile = \Yii::getAlias('@backend/web/css/Montserrat-Bold') . '.ttf';

        // 480x200
        $img = \yii\imagine\Image::frame(\Yii::getAlias($this->src), 50, 'ffffff', 100);
        $img->save($newImageName);

        // 430x175
        $img = \yii\imagine\Image::crop($newImageName, 430, 175, [25, 25]);
        $img->save($newImageName);

        $img = \yii\imagine\Image::text($newImageName, 'Наименование товара и артикул дата создания', $fontFile, [0, 130], ['size' => 12, 'color' => '000000']);
        $img->save($newImageName);
    }
}