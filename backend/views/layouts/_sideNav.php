<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<ul id="slide-out" class="sidenav sidenav-fixed">
    <li class="logo"><a href="<?= Url::home() ?>"><?= Html::img('/images/header/sn_en.png');?></a></li>

    <li class="no-padding <?= (Yii::$app->controller->id=='profile' || Yii::$app->controller->id=='dish')?'active':''; ?>">
        <ul class="collapsible collapsible-accordion it-yakutia-primary-color white-text">
            <li class="<?= (Yii::$app->controller->id=='profile')?'active':''; ?>">
            <a class="collapsible-header waves-effect waves-teal white-text tooltipped" data-position="right" data-tooltip="Нажмите чтобы открыть"><i class="material-icons white-text">account_circle</i><b style="font-size: 1.6rem;"><?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username ?></b><br/><i class="material-icons white-text">mail</i><?= Yii::$app->user->isGuest ? null : Yii::$app->user->identity->email ?></a>
                <div class="collapsible-body">
                    <ul class="it-yakutia-primary-color">
                        <li class="<?= (Yii::$app->controller->id=='profile' && Yii::$app->controller->action=='index')?'active':''; ?>"><a class="waves-effect waves-teal white-text" href="<?= Url::toRoute('/profile/index') ?>"><i class="material-icons white-text">person</i> Профиль</a></li>
                        <li class="<?= (Yii::$app->controller->id=='profile' && Yii::$app->controller->action=='change')?'active':''; ?>"><a class="waves-effect waves-teal white-text" href="<?= Url::toRoute('/profile/change') ?>"><i class="material-icons white-text">security</i> Изменить пароль</a></li>
                        <li><?= Html::a('Выйти <i class="material-icons white-text">exit_to_app</i>', ['/site/logout'], ['data' => ['method' => 'post'], 'class' => 'waves-effect waves-teal white-text']) ?></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    

    <li><a class="subheader grey-text">Карточка организации</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='company')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/company/company/index'); ?>"><i class="material-icons">location_city</i> Организации</a>
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/company/company-client/index'); ?>"><i class="material-icons">accessibility</i> Представители</a>
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/company/company-department/index'); ?>"><i class="material-icons">account_balance</i> Подразделения</a>
    </li>

    <li><a class="subheader grey-text">Справочники</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='directory')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/directory/directory/index'); ?>"><i class="material-icons">folder</i> Справочники</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='directory')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/directory/directory-category/index'); ?>"><i class="material-icons">list</i> Категории</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='directory')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/directory/directory-file/index'); ?>"><i class="material-icons">insert_drive_file</i> Файлы</a>
    </li>

    <li><a class="subheader grey-text">Внутренние документы</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='comp_dir')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/comp_dir/comp-dir/index'); ?>"><i class="material-icons">picture_as_pdf</i> Документы</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='comp_dir')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/comp_dir/comp-dir-category/index'); ?>"><i class="material-icons">list</i> Категория</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='comp_dir')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/comp_dir/comp-dir-file/index'); ?>"><i class="material-icons">insert_drive_file</i> Файлы</a>
    </li>

    <li><a class="subheader grey-text">Работа с запросами</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='inquiry')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/inquiry/inquiry/index'); ?>"><i class="material-icons">compare_arrows</i> Запросы</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='inquiry')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/inquiry/inquiry-comment/index'); ?>"><i class="material-icons">comment</i> Комментарии</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='inquiry')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/inquiry/inquiry-file/index'); ?>"><i class="material-icons">insert_drive_file</i> Файлы</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='inquiry')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/inquiry/inquiry-status/index'); ?>"><i class="material-icons">check_box</i> Статусы</a>
    </li>

    <li><a class="subheader grey-text">Конструктор документов</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='builder')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/builder/main/index'); ?>"><i class="material-icons">view_compact</i> Конструктор документов</a>
    </li>

    <li><a class="subheader grey-text">Заказ услуг</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='product')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/product/product/index'); ?>"><i class="material-icons">room_service</i> Услуги</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='product')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/product/product-order/index'); ?>"><i class="material-icons">access_alarms</i> Заказы</a>
    </li>
    <li class="<?= (Yii::$app->controller->module->id=='product')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/product/product-status/index'); ?>"><i class="material-icons">check_box</i> Статусы</a>
    </li>

    <li><a class="subheader grey-text">События</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='todo')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/todo/todo/index'); ?>"><i class="material-icons">event_available</i> События</a>
    </li>
    
    <li><a class="subheader grey-text">Настройки</a></li>
    <li class="<?= (Yii::$app->controller->module->id=='user')?'active':''; ?>">
        <a class="waves-effect waves-teal" href="<?= Url::toRoute('/user/user/index'); ?>"><i class="material-icons">person</i> Пользователи</a>
    </li>

    <br>
    <br>
    <br>
    <br>
    <br>
</ul>