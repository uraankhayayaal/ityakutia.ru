<?php

use yii\helpers\Url;

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
                                <ul id="navigation">  
                                    <li><a href="<?= Url::home(); ?>">Главная</a></li>
                                    <li><a href="<?= Url::toRoute(['/site/about']); ?>">О нас</a></li>
                                    <li class="hot"><a href="<?= Url::toRoute(['/site/goods']); ?>">Услуги</a></li>
                                    <!-- <li class="hot"><a href="#">Latest</a>
                                        <ul class="submenu">
                                            <li><a href="shop.html"> Product list</a></li>
                                            <li><a href="product_details.html"> Product Details</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="<?= Url::toRoute(['/site/portfolio']); ?>">Портфолио</a></li>
                                    <!-- <li><a href="blog.html">Портфолио</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="<?= Url::toRoute(['/site/sale']); ?>">Акции</a>
                                        <!-- <ul class="submenu">
                                            <li><a href="<?= Url::toRoute(['/page/front/view', 'slug' => 'site-social-5']); ?>">Сайт + соцсеть = -5%</a></li>
                                            <li><a href="<?= Url::toRoute(['/page/front/view', 'slug' => '3-2-baners']); ?>">3 баннера по цене 2х</a></li>
                                            <li><a href="<?= Url::toRoute(['/page/front/view', 'slug' => 'domain-ssl']); ?>">1 домен = ssl 1 год</a></li>
                                            <li><a href="<?= Url::toRoute(['/page/front/view', 'slug' => '1-year-guarantee']); ?>">1 год гарантия</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="<?= Url::toRoute(['/site/contact']); ?>">Контакты</a></li>
                                </ul>
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