<?php

namespace common\modules\smartlink\models;

use common\models\User;
use Imagine\Filter\Basic\Strip;
use Yii;
use yii\base\ErrorException;
use yii\base\Security;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class Smartlink extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_PAUSED = 3;
    const STATUS_COMPLATED = 4;
    const STATUS_CANCALED = 5;

    const STATUSES = [
        self::STATUS_NEW => 'Новый',
        self::STATUS_PROCESSING => 'В процессе',
        self::STATUS_PAUSED => 'На паузе',
        self::STATUS_COMPLATED => 'Завершен',
        self::STATUS_CANCALED => 'Отменен',
    ];

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'user_id',
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'user_id',
                ],
                'value' => function ($event) {
                    return Yii::$app->user->id;
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'link_hash',
                ],
                'value' => function ($event) {
                    return $this->generateSmartlinkHash();
                },
            ],
        ];
    }
    
    public static function tableName(): string
    {
        return 'smartlink';
    }

    public function rules()
    {
        return [
            [['company', 'app_name', 'link_ios', 'link_android'], 'required'],
            [['user_id', 'start_at', 'end_at', 'status', 'created_at', 'updated_at'], 'integer'],
            [['company', 'app_name', 'region'], 'string', 'max' => 255],
            ['link_hash', 'string', 'max' => 16],
            [['link_ios', 'link_android'], 'url'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'link_ios' => 'iOS link',
            'link_android' => 'Android link',
            'link_hash' => 'Smart link Hash',
            'company' => 'Company name',
            'app_name' => 'App name',
            'region' => 'Region',
            'start_at' => 'Start Ad At',
            'end_at' => 'End Ad At',

            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getMovements(): ActiveQuery
    {
        return $this->hasMany(Movement::class, ['smartlink_id' => 'id']);
    }

    public function generateSmartlinkHash(): String
    {
        $security = new Security();
        $randomString = $security->generateRandomString(16);
        $isUniqueHash = !self::find()->where(['link_hash' => $randomString])->exists();
        return $isUniqueHash ? $randomString : $this->generateSmartlinkHash();
    }

    public function getSmartlink(): String
    {
        return Yii::$app->urlManagerFrontend->createUrl(['/smartlink/front/index', 'id' => $this->link_hash], 'https');
    }

    public static function findOneByHash($link_hash): Smartlink
    {
        return self::find()->where(['link_hash' => $link_hash])->one();
    }

    public function getPlatformLink(): ?String
    {
        $platform = $this->getPlatform();
        $url = null;
        switch ($platform) {
            case 'iOS':
                $url = $this->link_ios;
                break;
            case 'Android':
                $url = $this->link_android;
                break;
            default:
                $url = null;
        }

        $this->createMovement($platform);

        if($url !== null){
            return $url;
        }

        return null;
    }

    protected function getPlatform(): String
    {
        if (\Yii::$app->devicedetect->isiOS())
            return 'iOS';
        
        if (\Yii::$app->devicedetect->isAndroidOS())
            return 'Android';

        return 'Web';
    }

    protected function createMovement($platform): void
    {
        $model = new Movement();
        $model->platform = $platform;
        $model->ip = (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : ((isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $model->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $model->platform = $platform;
        $model->browser = \Yii::getAlias('@device');
        $model->port = $_SERVER['SERVER_PORT'];
        $model->host = $_SERVER['HTTP_HOST'];
        $model->url = $_SERVER['REQUEST_URI'];
        $model->smartlink_id = $this->id;
        if(!$model->save())
            throw new ErrorException(serialize($model->errors));
    }
}
