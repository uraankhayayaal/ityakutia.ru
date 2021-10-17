<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'SMARTLINK - умная ссылка для продвижения мобильных приложений';

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

        <!-- About Details Start -->
        <div class="about-details section-padding30">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-lg-8">
                        <div class="about-details-cap mb-50">
                            <h4>Почему вам нужен Smartlink</h4>
                            <p>Для продвижения мобильного приложения необходимо иметь две ссылки на AppStore и GooglePlay, это двойные расходы.</p>
                            <p></p>
                        </div>

                        <div class="about-details-cap mb-50">
                            <h4>Что мы предлагаем</h4>
                            <p>Объедените ссылки на ваше мобильное приложение одну умную ссылку, она автоматически будет определять платформу вашего клиента и направит его в нужный Store.</p>
                            <p>Сбор аналитики на вашу рекламную кампанию.</p>
                            <p>Красивую иконку и описание умной ссылки при рассылках.</p>
                            <p>Отправьте нам на электронную почту <a style="color:#777777;" href="mailto:manager@admin14.ru">заявку</a> в произвольной форме.</p>
                        </div>

                        <div class="about-details-cap mb-50">
                            <h4>Сколько это стоит</h4>
                            <p>До конца 2021 года подключение абсолютно бесплатно.</p>
                            <p>Красивая ссылка и аналитика по переходам обсуждаются индивидуально.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Details End -->

        <div class="about-details">
            <div class="container">
                <div class="row">
                    <div class="col offset-xl-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-50">
                                    <h4>Разовый абонимент на месяц</h4>
                                    <p>Оплачивайте каждый месяц как вам удобно.</p>
                                    <p><?= Html::a("Купить за 790 руб.", ['/payment/order/create', 'product' => 1], ['class' => 'btn']); ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-50">
                                    <h4>Годовой абонимент</h4>
                                    <p>Оплатите один раз в год, экономия 480 руб.</p>
                                    <p><?= Html::a("Купить за 9000 руб.", ['/payment/order/create', 'product' => 2], ['class' => 'btn']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
