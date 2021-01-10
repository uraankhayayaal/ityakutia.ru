<?php

use ityakutia\navigation\models\Navigation;
use frontend\themes\basic\widgets\bootstrap\Nav;
use yii\helpers\Url;

function getChildren($item){
    $subnav = [];
    foreach ($item->children(1)->all() as $key => $subitem) {
        $subnav[] = [
            'label' => $subitem->name,
            'url' => $subitem->link,
            'items' => getChildren($subitem),
            'active' => Url::current() == $subitem->link,
            'options' => ['class' => ($item->color_switcher ? 'hot' : '')],
        ];
    }
    return $subnav;
}
$navigation = [];
$roots = Navigation::find()->where(['is_publish' => 1])->roots()->orderBy(['sort' => SORT_ASC])->all();
$leaves = Navigation::find()->where(['is_publish' => 1])->leaves()->all();

foreach ($roots as $key => $item) {
    $navigation[] = [
        'label' => $item->name,
        'url' => $item->link,
        'items' => getChildren($item),
        'active' => Url::current() == $item->link,
        'options' => ['class' => ($item->color_switcher ? 'hot' : '')],
        'dropdownOptions' => ['class' => 'submenu'],
    ];
}

?>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= Url::home(); ?>"><img src="<?= $this->theme->baseUrl; ?>/img/logo/logo.svg" alt="<?= Yii::$app->name ?>"></a>
                        </div>
                        <!-- Main-menu -->
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
                        <!-- Header Right -->
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
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>