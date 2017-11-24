<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
		<ul id="slide-out" class="side-nav">
          <li><div class="user-view">
            <div class="background">
              <?= Html::img('@web/images/logo.jpg', ['alt' => 'Admin14 - разработка сайтов и мобильных приложений - Главная', 'width' => '100%']); ?>
            </div>
            <br>
            <br>
            <br>
            <br>
          </div></li>
          <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') ? 'active' : ''; ?>"><a class="hide-on-large-only" href="<?= Url::home() ?>"><i class="material-icons">room</i>Главная</a></li>
          <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'portfolio') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/portfolio'); ?>" class="waves-effect"><i class="material-icons">business_center</i>Портфолио</a></li>
          <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/contact'); ?>" class="waves-effect"><i class="material-icons">account_box</i>Резюме</a></li>
          <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'about') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/about'); ?>" class="waves-effect"><i class="material-icons">phone</i>О нас</a></li>
        </ul>