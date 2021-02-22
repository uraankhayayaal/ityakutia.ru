<?php

namespace common\modules\smartlink\models;

use common\models\User;
use common\modules\smartlink\api\IpInfo;
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
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'link_bio',
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
            [['company', 'app_name', 'region', 'title', 'photo', 'description'], 'string', 'max' => 255],
            [['link_hash', 'link_bio'], 'string', 'max' => 16],
            [['link_ios', 'link_android', 'link_web', 'link_instagram', 'link_vk', 'link_youtube', 'link_facebook', 'link_twitter'], 'url'],
            ['link_email', 'email'],
            [['link_phone', 'link_whatsapp'], 'string', 'max' => 16],
            ['is_js_redirect_for_mobile', 'boolean'],
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
            'link_web' => 'Web link',
            'link_hash' => 'Smart link Hash',
            'company' => 'Company name',
            'app_name' => 'App name',
            'region' => 'Region',
            'start_at' => 'Start Ad At',
            'end_at' => 'End Ad At',
            'title' => 'Title',
            'photo' => 'Photo',
            'descriiption' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_js_redirect_for_mobile' => 'Is JS redirect for mobile',
            'link_instagram' => 'Instagram link',
            'link_vk' => 'Vk link',
            'link_youtube' => 'Youtube link',
            'link_facebook' => 'Facebook link',
            'link_whatsapp' => 'Whatsapp link',
            'link_twitter' => 'Twitter link',
            'link_phone' => 'Phone link',
            'link_email' => 'Email link',
            'link_bio' => 'Bio link Hash',
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

    public function getBiolink(): String
    {
        return Yii::$app->urlManagerFrontend->createUrl(['/smartlink/front/bio', 'id' => $this->link_bio], 'https');
    }

    public static function findOneByHash($link_hash): Smartlink
    {
        return self::find()->where(['link_hash' => $link_hash])->one();
    }

    public static function findOneByBioHash($link_bio): Smartlink
    {
        return self::find()->where(['link_bio' => $link_bio])->one();
    }

    public function getPlatformLink(int $type): ?String
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
                $url = $this->link_web;
        }

        $this->createMovement($platform, $type);

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

    protected function createMovement(String $platform, int $type): void
    {
        Yii::error(['message' => 'createMovement', 'platform' => $platform]);
        $model = new Movement();
        $model->platform = $platform;
        $model->ip = (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : ((isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $model->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $model->platform = $platform;
        $model->browser = \Yii::getAlias('@device');
        $model->port = $_SERVER['SERVER_PORT'];
        $model->host = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        $model->url = $_SERVER['REQUEST_URI'];

        $ipInfo = new IpInfo($model->ip);
        $model->country = $ipInfo->getcountry();
        $model->region = $ipInfo->getregion();
        $model->city = $ipInfo->getcity();
        $model->coordinate = $ipInfo->getcoordinate();
        
        $model->smartlink_id = $this->id;
        $model->type = $type;
        if(!$model->save()){
            Yii::error(['message' => 'Movement save error', 'model' => $model->errors]);
            throw new ErrorException(serialize($model->errors));
        }
    }
}
