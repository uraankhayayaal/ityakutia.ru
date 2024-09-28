<?php

namespace common\modules\multicity\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ext_city".
 *
 * @property int $id
 * @property string $domain
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
            [['url', 'local', 'name', 'domain'], 'required'],
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
            'domain' => 'Domain',
            'url' => 'Url',
            'local' => 'Язык',
            'name' => 'Название',
            'default' => 'Город по умолчанию',
            'updated_at' => 'Создан',
            'created_at' => 'Изменен',
        ];
    }

    static public function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultCity();
        }
        return self::$current;
    }

    static public function setCurrentByDomain(string $domain, $url = null)
    {
        $city = self::getCityByDomainAndUrl($domain, $url);
        self::$current = ($city === null) ? self::getDefaultCity() : $city;
        Yii::$app->language = self::$current->local ?? 'ru-RU';
    }

    static public function getDefaultCity()
    {
        $domainDefaultCity = City::find()
            ->where([
                'domain' => Yii::$app->request->getHostName(),
            ])
            ->orderBy([
                'default' => SORT_DESC,
            ])
            ->one();

        return $domainDefaultCity ?? City::find()
            ->where([
                'default' => 1,
            ])
            ->one();
    }

    static public function getCityByDomainAndUrl(string $domain, $url = null)
    {
        return $url !== null
            ? City::find()
                ->where([
                    'domain' => $domain,
                    'url' => $url,
                ])
                ->one()
            : null;
    }
}
