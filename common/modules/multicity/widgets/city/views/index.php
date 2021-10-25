<?php

use yii\helpers\Html;

?>

<div id="city">
    <span id="current-city">
        <?= $current->name; ?>
    </span>
    <ul id="cities">
        <?php foreach ($cities as $city):?>
            <li class="item-city">
                <?= Html::a($city->name, '/'.$city->url.Yii::$app->getRequest()->getCityUrl()) ?>
            </li>
        <?php endforeach;?>
    </ul>
</div>