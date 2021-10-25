<?php

namespace common\modules\multicity\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ext_city".
 *
 * @property int $id
 * @property string $url
 * @property string $local
 * @property string $name
 * @property int $default
 * @property int $updated_at
 * @property int $created_at
 */
class City extends \yii\db\ActiveRecord
{
    static $current = null;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ext_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'local', 'name'], 'required'],
            [['default', 'updated_at', 'created_at'], 'integer'],
            [['url', 'local', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'local' => 'Local',
            'name' => 'Name',
            'default' => 'Default',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    static function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultCity();
        }
        return self::$current;
    }

    static function setCurrent($url = null)
    {
        $city = self::getCityByUrl($url);
        self::$current = ($city === null) ? self::getDefaultCity() : $city;
        Yii::$app->language = self::$current->local;
    }

    static function getDefaultCity()
    {
        return City::find()->where('`default` = :default', [':default' => 1])->one();
    }

    static function getCityByUrl($url = null)
    {
        if ($url === null) {
            return null;
        } else {
            $city = City::find()->where('url = :url', [':url' => $url])->one();
            if ( $city === null ) {
                return null;
            }else{
                return $city;
            }
        }
    }
}
