<?php
namespace common\modules\multicity\components;

use yii\web\UrlManager;
use common\modules\multicity\models\City;

class CityUrlManager extends UrlManager
{
    public function createUrl($params)
    {
        if( isset($params['city_id']) ){
            //Если указан идентефикатор языка, то делаем попытку найти язык в БД,
            //иначе работаем с языком по умолчанию
            $city = City::findOne($params['city_id']);
            if( $city === null ){
                $city = City::getDefaultCity();
            }
            
            unset($params['city_id']);
        } else {
            //Если не указан параметр языка, то работаем с текущим языком
            $city = City::getCurrent();
        }
        
        $url = parent::createUrl($params);
        
        return $url == '/' ? '/'.$city->url : '/'.$city->url.$url;
    }
}