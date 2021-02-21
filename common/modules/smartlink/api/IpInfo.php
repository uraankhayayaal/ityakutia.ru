<?php

namespace common\modules\smartlink\api;

use common\modules\smartlink\models\Ipinfo as ModelsIpinfo;
use Yii;

// API Documentatiion: https://ipwhois.io/ru/documentation
class IpInfo
{
    protected $ip = null;
    protected $model = null;

    public function __construct(String $ip)
    {
        $this->ip = $ip;
    }

    public function getCity(): ?String
    {
        return $this->getAttributeValue('city');
    }

    public function getRegion(): ?String
    {
        return $this->getAttributeValue('region');
    }

    public function getCountry(): ?String
    {
        return $this->getAttributeValue('country');
    }

    public function getCoordinate(): ?String
    {
        return json_encode([
            'lat' => $this->getAttributeValue('latitude'),
            'lng' => $this->getAttributeValue('longitude')
        ]);
    }

    protected function getAttributeValue(String $attribute): ?String
    {
        if($this->model === null){
            $ipinfo = ModelsIpinfo::find()->where(['ip' => $this->ip])->one();
            // 1. Check in DB
            if($ipinfo !== null)
                // 2. Get from DB
                $this->model = $ipinfo;
            else {
                $ipinfo = new ModelsIpinfo();
                // 3. Get form API
                $apiResult = $this->query();
                $ipinfo->attributes = $apiResult;
                // 4. Save to DB
                if($ipinfo->save()) {
                    $this->model = $ipinfo;
                } else {
                    Yii::warning(['message' => 'Error to query ot API or save in DB', 'ipInfoModel' => $ipinfo->errors, 'isLoad' => $ipinfo->load($apiResult)]);
                    $this->model = (object)$apiResult;
                }
            }
        }

        if($this->isSuccess())
            return $this->model->$attribute;
        
        return $this->getErrorMessage();
    }

    protected function isSuccess(): bool
    {
        if ($this->model !== null)
            return $this->model->success == true; // don't use `===`
        else
            return false;
    }

    protected function getErrorMessage(): ?String
    {
        // completed_requests количеств запросов в текущем месяце
        if ($this->model !== null)
            return $this->model->message;
        else
            return 'No model here';
        
    }

    protected function query(): array
    {
        $ch = curl_init('http://ipwhois.app/json/'.$this->ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);

        $ipwhois_result = json_decode($json, true);

        Yii::warning(['message' => 'We got data from API', 'APP <- API' => $ipwhois_result]);
        return $ipwhois_result;
    }
}