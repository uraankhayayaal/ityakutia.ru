<?php

namespace backend\modules\email\models;

use Codeception\Command\Shared\Config;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Recipient extends ActiveRecord
{
    public static function tableName()
    {
        return 'email_recipient';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['email_id','contact_id'], 'required'],
            [['status', 'created_at', 'updated_at', 'email_id','contact_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_id' => 'Сообщение',
            'contact_id' => 'Контакт',
            'status' => 'Status',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
        ];
    }
    
    public function getEmail()
    {
        return $this->hasOne(Email::class, ['id' => 'email_id']);
    }

    public function getContact()
    {
        return $this->hasOne(Contact::class, ['id' => 'contact_id']);
    }
}