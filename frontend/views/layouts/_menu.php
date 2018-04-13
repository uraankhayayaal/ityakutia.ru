<?php

use yii\helpers\Url;

?>
    <header>
        <div class="container">
        <nav>
          <div class="nav-wrapper">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="<?= Url::home(); ?>" class="brand-logo valign-wrapper"><img src="/images/logo.png" alt="logo admin14.ru" width="50">Admin14</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="<?= (\Yii::$app->controller->id == 'site' && \Yii::$app->controller->action->id == 'yakutskmaster') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/yakutskmaster'); ?>">Служба ремонта ПК и ПО</a></li>
                <li class="<?= (\Yii::$app->controller->id == 'site' && \Yii::$app->controller->action->id == 'portfolio') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/portfolio'); ?>">Портфолио</a></li>
                <!-- <li class="<?= (\Yii::$app->controller->id == 'site' && \Yii::$app->controller->action->id == 'contact') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/contact'); ?>">Резюме</a></li> -->
                <li class="<?= (\Yii::$app->controller->id == 'site' && \Yii::$app->controller->action->id == 'about') ? 'active' : ''; ?>"><a href="<?= Url::toRoute('site/about'); ?>">О нас</a></li>
            </ul>
          </div>
        </nav>
        </div>
    </header>