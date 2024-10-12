<?php

namespace frontend\components;

use common\modules\multicity\models\City;
use Yii;
use yii\helpers\Url;

class ViewHelper 
{
    public static function getMenuChildren($item, $city)
    {
        $subnav = [];
        foreach ($item->children(1)->all() as $key => $subitem) {
            if (!$subitem->is_publish) {
                continue;
            }

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
        $cities = City::find()
            ->where(['!=', 'id', $currentCity->id])
            ->andWhere(['=', 'domain', $currentCity->domain])
            ->all();

        $subnav = [];
        foreach ($cities as $key => $city) {
            $subnav[] = [
                'label' => $city->name,
                'url' => Url::toRoute((Yii::$app->getRequest()->getCityUrl()), true),
            ];
        }
        return $subnav;
    }
}