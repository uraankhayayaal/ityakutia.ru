<?php

namespace common\modules\smartlink\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Movement extends ActiveRecord
{
    const PLATFORM_IOS = 1;
    const PLATFORM_ANDROID = 2;
    const PLATFORM_WEB = 3;

    const TYPE_SMART = 1;
    const TYPE_BIO = 2;

    const TYPES = [
        self::TYPE_SMART => 'Smart',
        self::TYPE_BIO => 'Bio',
    ];

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    'updatedAtAttribute' => false,
                ],
            ],
        ];
    }
    
    public static function tableName(): string
    {
        return 'smartlink_movement';
    }

    public function rules()
    {
        return [
            [['platform', 'smartlink_id'], 'required'],
            [['port', 'smartlink_id', 'created_at'], 'integer'],
            [['ip', 'userAgent', 'platform', 'browser', 'host', 'url', 'country', 'region', 'city', 'coordinate'], 'string'],
            [['smartlink_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smartlink::class, 'targetAttribute' => ['smartlink_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'IP',
            'userAgent' => 'User Agent',
            'platform' => 'Platform',
            'browser' => 'Browser',
            'port' => 'Posrt',
            'host' => 'From domain',
            'url' => 'From url',
            'smartlink_id' => 'Smartlink',
            'created_at' => 'Created At',
            'country' => 'Country',
            'region' => 'Region',
            'city' => 'City',
            'coordinate' => 'Coordinate',
            
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getSmartlink(): ActiveQuery
    {
        return $this->hasOne(Smartlink::class, ['id' => 'smartlink_id']);
    }
}
