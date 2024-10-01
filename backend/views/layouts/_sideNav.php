<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo"><a href="<?= Url::home() ?>"></a></li>

    <li class="no-padding <?= (Yii::$app->controller->module->id === 'user' && Yii::$app->controller->id === 'profile')?'active':'' ?>">
        <ul class="collapsible collapsible-accordion white-text">
            <li class="<?= Yii::$app->controller->id === 'profile' ? 'active' : '' ?>">
            <a class="collapsible-header waves-effect waves-blue white-text tooltipped" data-position="right" data-tooltip="Нажмите чтобы открыть"><i class="material-icons white-text">account_circle</i><b style="font-size: 1.6rem;"><?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username ?></b><br/><i class="material-icons white-text">mail</i><?= Yii::$app->user->isGuest ? null : Yii::$app->user->identity->email ?></a>
                <div class="collapsible-body">
                    <ul class="">
                        <li class="<?= (Yii::$app->controller->module->id === 'user' && Yii::$app->controller->id === 'profile' && Yii::$app->controller->action->id === 'index') ? 'active' : '' ?>"><a class="waves-effect waves-blue white-text" href="<?= Url::toRoute('/profile/index') ?>"><i class="material-icons white-text">person</i> Личный кабинет</a></li>
                        <li class="<?= (Yii::$app->controller->module->id === 'user' && Yii::$app->controller->id === 'profile' && Yii::$app->controller->action->id === 'change') ? 'active' : '' ?>"><a class="waves-effect waves-blue white-text" href="<?= Url::toRoute('/profile/change') ?>"><i class="material-icons white-text">security</i> Изменить пароль</a></li>
                        <li><?= Html::a('Выйти <i class="material-icons white-text">exit_to_app</i>', ['/site/logout'], ['data' => ['method' => 'post'], 'class' => 'waves-effect waves-blue white-text']) ?></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    

    <?php if(Yii::$app->user->can("smartlink")) { ?>
        <li><a class="subheader grey-text"><i class="material-icons grey-text tiny">branding_watermark</i> <?= Yii::t('app', 'Маркетинг')?></a></li>
        <li class="<?= (Yii::$app->controller->module->id=='smartlink' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/smartlink/back/index') ?>"><i class="material-icons">link</i> <?= Yii::t('app', 'Умные ссылки') ?></a></li>
        <li class="<?= (Yii::$app->controller->module->id=='smartlink' && Yii::$app->controller->id=='back-ip')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/smartlink/back-ip/index') ?>"><i class="material-icons">location_on</i> <?= Yii::t('app', 'IP адреса') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("page") || Yii::$app->user->can("news_category") || Yii::$app->user->can("news")) { ?>
        <li><a class="subheader grey-text"><i class="material-icons grey-text tiny">public</i> <?= Yii::t('app', 'Публикации')?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("page")) { ?>
        <li class="<?= (Yii::$app->controller->module->id=='page' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/page/back/index') ?>"><i class="material-icons">pageview</i> <?= Yii::t('app', 'Страницы') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("page_menu")) { ?>
        <li class="<?= (Yii::$app->controller->module->id=='page' && Yii::$app->controller->id=='back-menu')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/page/back-menu/index') ?>"><i class="material-icons">menu</i> <?= Yii::t('app', 'Меню на страницах') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("banner")) { ?>
        <li class="<?= (Yii::$app->controller->module->id=='banner' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/banner/back/index') ?>"><i class="material-icons">photo_size_select_actual</i> <?= Yii::t('app', 'Баннеры') ?></a></li>
    <?php } ?>
    
    <?php if(Yii::$app->user->can("navigation")) { ?>
    <li class="<?= (Yii::$app->controller->module->id=='navigation' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/navigation/back/index') ?>"><i class="material-icons">clear_all</i> <?= Yii::t('app', 'Навигация') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("poll")) { ?>
    <li class="<?= (Yii::$app->controller->module->id=='poll' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute(['/poll/back/index']); ?>"><i class="material-icons">poll</i> <?= Yii::t('app', 'Опросы') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("news_category")) { ?>
        <li class="<?= (Yii::$app->controller->module->id=='blog' && Yii::$app->controller->id=='back-category')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/blog/back-category/index') ?>"><i class="material-icons">list</i> <?= Yii::t('app', 'Категории Новостей') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("news")) { ?>
        <li class="<?= (Yii::$app->controller->module->id=='blog' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/blog/back/index') ?>"><i class="material-icons">send</i> <?= Yii::t('app', 'Новости') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("gallery")) { ?>
    <li class="<?= (Yii::$app->controller->module->id=='gallery' && Yii::$app->controller->id=='back-album')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/gallery/back-album/index') ?>"><i class="material-icons">burst_mode</i> <?= Yii::t('app', 'Галерея') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("partner")) { ?>
    <li class="<?= (Yii::$app->controller->module->id=='partner' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/partner/back/index') ?>"><i class="material-icons">people_outline</i> <?= Yii::t('app', 'Партнеры') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("collective")) { ?>
    <li class="<?= (Yii::$app->controller->module->id=='collective' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/collective/back/index') ?>"><i class="material-icons">people</i> <?= Yii::t('app', 'Коллектив') ?></a></li>
    <?php } ?>

    <?php if(Yii::$app->user->can("admin")) { ?>
        <li class="<?= (Yii::$app->controller->module->id=='barcode' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute(['/barcode/back/index']); ?>"><i class="material-icons">code</i> <?= Yii::t('app', 'Штрихкоды') ?></a></li>
        <li class="<?= (Yii::$app->controller->module->id=='multicity' && Yii::$app->controller->id=='back')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute(['/multicity/back-city/index']); ?>"><i class="material-icons">location_on</i> <?= Yii::t('app', 'Города') ?></a></li>
    <?php } ?>
    
    <?php if(Yii::$app->user->can("rbac_permissions") || Yii::$app->user->can("rbac_roles") || Yii::$app->user->can("rbac_users") || Yii::$app->user->can("settings")) { ?>
        <li><a class="subheader grey-text"><i class="material-icons grey-text tiny">public</i> <?= Yii::t('app', 'Основное') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("rbac_permissions")) { ?>
        <li class="<?= (Yii::$app->controller->id == 'permission')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/rbac/permission/index') ?>"><i class="material-icons">check_circle</i> <?= Yii::t('app', 'Права') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("rbac_roles")) { ?>
        <li class="<?= (Yii::$app->controller->id == 'role')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/rbac/role/index') ?>"><i class="material-icons">perm_identity</i> <?= Yii::t('app', 'Роли') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("rbac_users")) { ?>
        <li class="<?= (Yii::$app->controller->id == 'user')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/rbac/user/index') ?>"><i class="material-icons">supervisor_account</i> <?= Yii::t('app', 'Пользователи') ?></a></li>
    <?php } ?>
    <?php if(Yii::$app->user->can("settings")) { ?>
        <li class="<?= (Yii::$app->controller->module->id == 'setting')?'active':''; ?>"><a class="waves-effect waves-teal" href="<?= Url::toRoute('/setting/back/index') ?>"><i class="material-icons">settings</i> <?= Yii::t('app', 'Параметры') ?></a></li>
    <?php } ?>

    <br>
    <br>
    <br>
    <br>
    <br>
</ul>