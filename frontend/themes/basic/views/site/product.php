<?php

use yii\helpers\Url;

$this->title = 'Наши продукты';

?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 contact-hero d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="text-center">
                                <h2><?= $this->title ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        
        <!--? Popular Items Start -->
        <div class="popular-items section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <a href="<?= Url::toRoute(['/site/smartlink']) ?>">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="<?= $this->theme->baseUrl; ?>/img/gallery/popular2.jpg" alt="Портфолио, разработка сайта">
                                    <div class="img-cap">
                                        <span>Заказать</span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3>Smart link</h3>
                                    <!-- <span>от 12,000 ₽</span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <a href="<?= Url::toRoute(['/site/biolink']) ?>">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="<?= $this->theme->baseUrl; ?>/img/gallery/popular5.jpg" alt="Портфолио, разработка сайта">
                                    <div class="img-cap">
                                        <span>Заказать</span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3>Bio link</h3>
                                    <!-- <span>от 10,000 ₽</span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->