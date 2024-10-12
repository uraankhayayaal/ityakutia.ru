<?php

use common\modules\multicity\models\City;
use frontend\components\ViewHelper;
use ityakutia\navigation\models\Navigation;
use frontend\themes\basic\widgets\bootstrap\Nav;
use yii\helpers\Url;

$city = City::getCurrent();
$navigation = [];
$roots = Navigation::find()->where(['is_publish' => 1])->roots()->orderBy(['sort' => SORT_ASC])->all();
$leaves = Navigation::find()->where(['is_publish' => 1])->leaves()->all();

foreach ($roots as $key => $item) {
    $navigation[] = [
        'label' => $item->name,
        'url' => [$item->link, 'city_id' => $city->id],
        'items' => ViewHelper::getMenuChildren($item, $city),
        'active' => Url::current() == $item->link,
        'options' => ['class' => ($item->color_switcher ? 'hot' : '')],
        'dropdownOptions' => ['class' => 'submenu'],
    ];
}

if(Yii::$app->user->isGuest){
    $navigation[] = [
        'label' => "Войти",
        'url' => ["/site/login", 'city_id' => $city->id],
        'active' => Url::current() == "/site/login",
    ];
}else{
    $navigation[] = [
        'label' => "Профиль",
        'url' => ["/cabinet/index", 'city_id' => $city->id],
        // 'linkOptions' => ['data-method' => 'post']
    ];
}

$navigation[] = [
    'label' => $city->name,
    'url' => false,
    'items' => ViewHelper::getOtherCity($city),
    'options' => ['class' => 'city d-block d-lg-none'],
    'dropdownOptions' => ['class' => 'submenu'],
];

?>
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="menu-wrapper">
                    <div class="logo">
                        <a href="<?= Url::to(['/']); ?>"><img src="<?= $this->theme->baseUrl; ?><?= City::getCurrent()->url === 'yakutsk' ? '/img/logo/itYakutiaLogo.svg' : '/img/logo/beeAppsLogo.svg'; ?>" alt="<?= Yii::$app->name ?>"></a>
                    </div>
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <?php
                                if (!empty($navigation)) {
                                    echo Nav::widget([
                                        'options' => ['id' => 'navigation'],
                                        'items' => $navigation,
                                    ]);
                                }
                            ?>
                        </nav>
                    </div>
                    <div class="header-right">
                        <ul>
                            <!-- <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li> -->
                            <!-- <li> <a href="<?= Url::toRoute(['/site/login']); ?>"><span class="flaticon-user"></span></a></li> -->
                            <!-- <li><a href="cart.html"><span class="flaticon-shopping-cart"></span></a> </li> -->
                        </ul>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <?= Nav::widget([
                                    'options' => ['id' => ''],
                                    'items' => [[
                                        'label' => $city->name,
                                        'url' => false,
                                        'items' => ViewHelper::getOtherCity($city),
                                        'options' => ['class' => 'city'],
                                        'dropdownOptions' => ['class' => 'submenu'],
                                    ]],
                                ]); ?>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</header>