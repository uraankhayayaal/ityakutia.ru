<?php

use common\modules\multicity\models\City;
use ityakutia\setting\models\Setting;
use yii\helpers\Url;

?>

<footer>
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-logo">
                                <a href="<?= Url::to(['/'])?>"><img src="<?= $this->theme->baseUrl; ?><?= City::getCurrent()->url === 'yakutsk' ? '/img/logo/itYakutiaFooterLogo.svg' : '/img/logo/beeAppsLogo.svg'; ?>" alt="<?= Yii::$app->name ?>"></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Ваши идеи — наше приложение: мы создаем сайты и мобильные решения, которые работают на вас!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Ссылки</h4>
                            <ul>
                                <li><a href="<?= Url::toRoute(['/site/about']); ?>">О нас</a></li>
                                <li><a href="<?= Url::toRoute(['/site/goods']); ?>">Услуги</a></li>
                                <li><a href="<?= Url::toRoute(['/site/portfolio']); ?>">Портфолио</a></li>
                                <li><a href="<?= Url::toRoute(['/site/contact']); ?>">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Акции</h4>
                            <ul>
                                <li><a href="<?= Url::toRoute(['/site/sale#guarantee']); ?>">1 год гарантии</a></li>
                                <li><a href="<?= Url::toRoute(['/site/sale#turbo']); ?>">Админка для сайта</a></li>
                                <li><a href="<?= Url::toRoute(['/site/sale#ssl']); ?>">Бесплатный SSL сертификат</a></li>
                                <li><a href="<?= Url::toRoute(['/site/sale#ssl']); ?>">Всесторонняя поддержка сайта</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Поддержка</h4>
                            <ul>
                                <!-- <li><a href="<?= Url::toRoute(['/faq']); ?>">Вопросы и ответы</a></li> -->
                                <li><a href="<?= Url::toRoute(['/terms-of-service']); ?>">Условия пользования</a></li>
                                <li><a href="<?= Url::toRoute(['/privacy-policy']); ?>">Политика конфиденциальности</a></li>
                                <li><a href="<?= Url::toRoute(['/cookies']); ?>">Политика обработки cookies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="footer-copy-right">
                        <p>&copy; 2017 - <?= date("Y") ?> Все права защищены | ООО Информационные технологии Якутии</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>