<?php

namespace common\modules\payment\models;

use Yii;
use yii\base\InvalidParamException;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use function call_user_func;
use function is_array;

class Purchase extends ActiveRecord
{
    /**
     * Добавление оплаты через сбербанк
     * @param integer|null $orderId Идентификатор заказа
     * @param float $price Цена заказа
     * @param int|null $remoteId Идентификатор заказа из api
     * @param array $data Массив дополнительные данных
     * @return self
     */
    public static function addSberbank($orderId = null, $price, $remoteId = null, $data = [])
    {
        if (empty($orderId) && empty($remoteId)) {
            throw new InvalidParamException('Обязательно должен присутствовать идентификатор локального заказа или с удаленного сервиса');
        }
        $model = new self();
        $model->order_id = $orderId;
        $model->remote_id = $remoteId;
        $model->user_id = Yii::$app->user->id;
        $model->method = 'SB';
        $model->sum = $price;
        $model->status = 'I';
        $model->data = $data;
        $model->save();
        return $model;
    }

    /**
     * Создание уникального номера инвойса, который
     * передается в API Сбербанка параметром uniqid
     */
    public function generateUniqid()
    {
        /* @var $module Module */
        if (empty($this->id)) {
            $sql = 'SELECT MAX(id) FROM ' . self::tableName();
            $this->id = Yii::$app->db->createCommand($sql)->queryScalar() + 1;
        }
        $id = $this->id . '-' . time();
        return $id;
    }

    public function beforeSave($insert)
    {
        if (is_array($this->data) === false) {
            $this->data = [];
        }
        $this->data = array_merge(['uniqid' => $this->generateUniqid()], $this->data);
        $this->data = Json::encode($this->data);
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->data = Json::decode($this->data);
        parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind()
    {
        parent::afterFind();
        if ($this->data) {
            $this->data = Json::decode($this->data);
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_id', 'remote_id'], 'integer'],
            [['sum', 'method', 'status'], 'required'],
            [['sum'], 'number'],
            [['data', 'created_at', 'pay_time', 'orderId'], 'safe'],
            [['method'], 'string', 'max' => 7],
            [['status'], 'string', 'max' => 7],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'sum' => 'Sum',
            'status' => 'Status',
            'created_at' => 'Created At',
            'pay_time' => 'Pay Time',
            'method' => 'Method',
            'orderId' => 'orderId',
        ];
    }
}