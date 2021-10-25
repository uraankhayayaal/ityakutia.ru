<?php

namespace frontend\components;

use common\modules\multicity\models\City;
use yii\helpers\Url;

class ViewHelper 
{
    public static function getMenuChildren($item, $city)
    {
        $subnav = [];
        foreach ($item->children(1)->all() as $key => $subitem) {
            $subnav[] = [
                'label' => $subitem->name,
                'url' => [$subitem->link, 'city_id' => $city->id],
                'items' => self::getMenuChildren($subitem, $city),
                'active' => Url::current() == $subitem->link,
                'options' => ['class' => ($item->color_switcher ? 'hot' : '')],
            ];
        }
        return $subnav;
    }

    public static function getOtherCity($currentCity)
    {
        $cities = City::find()->where('id != :current_id', [':current_id' => $currentCity->id])->all();
        $subnav = [];
        foreach ($cities as $key => $city) {
            $subnav[] = [
                'label' => $city->name,
                'url' => '/'.$city->url.\Yii::$app->getRequest()->getCityUrl(),
            ];
        }
        return $subnav;
    }
}