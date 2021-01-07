<?php

use yii\helpers\Url;

?>

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="<?= $this->theme->baseUrl; ?>/img/logo/logo2_footer.svg" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Разработка и поддержка сайтов. Создание web-дизайна и видеороликов. Продвижение в социальных сетях.</p>
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
                                    <li><a href="<?= Url::toRoute(['/site/sale#banner']); ?>">Баннер в подарок</a></li>
                                    <li><a href="<?= Url::toRoute(['/site/sale#turbo']); ?>">Производительность в подарок</a></li>
                                    <li><a href="<?= Url::toRoute(['/site/sale#domain']); ?>">Домен на 1 год</a></li>
                                    <li><a href="<?= Url::toRoute(['/site/sale#ssl']); ?>">SSL сертификат на 1 год</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Поддержка</h4>
                                <ul>
                                    <li><a href="<?= Url::toRoute(['/faq']); ?>">Вопросы и ответы</a></li>
                                    <li><a href="<?= Url::toRoute(['/terms-of-service']); ?>">Условия пользования</a></li>
                                    <li><a href="<?= Url::toRoute(['/privacy-policy']); ?>">Политика конфиденциальности</a></li>
                                    <li><a href="<?= Url::toRoute(['/cookies']); ?>">Политика обработки cookies</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>&copy;2017-<script>document.write(new Date().getFullYear());</script> Все права защищены | ООО Информационные технологии Якутии</a></p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>