<?php

namespace frontend\components;

use yii\helpers\Url;

class ViewHelper 
{
    public static function getMenuChildren($item)
    {
        $subnav = [];
        foreach ($item->children(1)->all() as $key => $subitem) {
            $subnav[] = [
                'label' => $subitem->name,
                'url' => $subitem->link,
                'items' => self::getMenuChildren($subitem),
                'active' => Url::current() == $subitem->link,
                'options' => ['class' => ($item->color_switcher ? 'hot' : '')],
            ];
        }
        return $subnav;
    }
}