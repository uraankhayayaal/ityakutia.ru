<?php

namespace common\modules\smartlink\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Ipinfo extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public static function tableName(): string
    {
        return 'smartlink_ipinfo';
    }

    public function rules()
    {
        return [
            [['ip', 'success'], 'required'],
            [['id', 'timezone_dstOffset', 'timezone_gmtOffset', 'created_at', 'updated_at'], 'integer'],
            ['success', 'boolean'],
            [['ip', 'message', 'type', 'continent', 'continent_code', 'country', 'country_code', 'country_flag', 'country_capital', 'country_phone', 'country_neighbours', 'region', 'city', 'latitude', 'longitude', 'asn', 'org', 'isp', 'timezone', 'timezone_name', 'timezone_gmt', 'currency', 'currency_code', 'currency_symbol', 'currency_rates', 'currency_plural'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'ip', // '8.8.4.4',
            'success' => 'Status', // true,
            'message' => 'Error message', // null,
            'type' => 'Type', // 'IPv4',
            'continent' => 'Continent', // 'North America',
            'continent_code' => 'Continent code', // 'NA',
            'country' => 'Country', // 'United States',
            'country_code' => 'Country code', // 'US',
            'country_flag' => 'Country flag', // 'https => '', ////cdn.ipwhois.io/flags/us.svg',
            'country_capital' => 'Country capital', // 'Washington',
            'country_phone' => 'Country phone', // '+1',
            'country_neighbours' => 'Country neighbours', // 'CA,MX,CU',
            'region' => 'Region', // 'New Jersey',
            'city' => 'City', // 'Newark',
            'latitude' => 'Latitude', // 40.735657,
            'longitude' => 'Longitude', // -74.1723667,
            'asn' => 'Asn', // 'AS15169',
            'org' => 'Org', // 'Google LLC',
            'isp' => 'Isp', // 'Google LLC',
            'timezone' => 'Timezone', // 'America/New_York',
            'timezone_name' => 'Timezone name', // 'Eastern Standard Time',
            'timezone_dstOffset' => 'Timezone dstOffset', // 0,
            'timezone_gmtOffset' => 'Timezone gmtOffset', // -18000,
            'timezone_gmt' => 'Timezone gmt', // 'GMT -5 => '', //00',
            'currency' => 'Currency', // 'US Dollar',
            'currency_code' => 'Currency code', // 'USD',
            'currency_symbol' => 'Currency symbol', // '$',
            'currency_rates' => 'Currency rates', // 1,
            'currency_plural' => 'Currency plural', // 0
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}




