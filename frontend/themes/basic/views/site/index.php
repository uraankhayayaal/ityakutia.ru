<?php

use common\modules\multicity\models\City;
use yii\helpers\Url;

$this->title = null;

?>
        <!--? slider Area Start -->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="hero__caption">
                                    <h2 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Продвижение в соцсетях в городе <?= City::getCurrent()->name; ?></h2>
                                    <img src="<?= $this->theme->baseUrl; ?>/img/hero/mobile.svg" class="d-md-none mw-100 pr-3 pb-3 heartbeat" alt="IT Yakutia, Разработка и поддержка сайтов. SMM продвижениие в социальных сетях">
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Мы, профессиональная команда, поможем в комплексном продвижении вашего бизнеса в разных социальных сетях, увеличим узнаваемость вашего продукта и повысим продажи</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href="<?= Url::toRoute(['/site/contact'])?>" class="btn hero-btn">Заказать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="<?= $this->theme->baseUrl; ?>/img/hero/watch.svg" class="heartbeat" alt="IT Yakutia, Разработка и поддержка сайтов. SMM продвижениие в социальных сетях в городе <?= City::getCurrent()->name; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Разработка и поддержка сайта в городе <?= City::getCurrent()->name; ?></h1>
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Мы, профессиональная команда, поможем в продвижении вашего бизнеса в интернете и в социальных сетях, увеличим узнаваемость вашего продукта и повысим продажи</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href="<?= Url::toRoute(['/site/contact'])?>" class="btn hero-btn">Заказать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="<?= $this->theme->baseUrl; ?>/img/hero/watch2.png" class="heartbeat" alt="IT Yakutia, Разработка и поддержка сайтов. SMM продвижениие в социальных сетях в городе <?= City::getCurrent()->name; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- ? New Product Start -->
        <section class="new-product-area section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle mb-70">
                            <h2>Последние работы</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/new_product6.jpg" alt="Admin14, IT Yakutia, портфолио, разработка сайта">
                            </div>
                            <div class="product-caption">
                                <h3><a href="<?= Url::toRoute(['/site/portfolio']) ?>">Ассоциация Ветеран РС(Я)</a></h3>
                                <span>veteransakha.ru</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/new_product1.jpg" alt="Admin14, IT Yakutia, портфолио, разработка сайта">
                            </div>
                            <div class="product-caption">
                                <h3><a href="<?= Url::toRoute(['/site/portfolio']) ?>">Корея лайф центр</a></h3>
                                <span>daegulife.ru</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/new_product5.jpg" alt="Admin14, IT Yakutia, портфолио, разработка сайта">
                            </div>
                            <div class="product-caption">
                                <h3><a href="<?= Url::toRoute(['/site/portfolio']) ?>">Ресторан Тыгын Дархан</a></h3>
                                <span>tygyndarhanrest.ru</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="<?= Url::toRoute(['/site/portfolio'])?>" class="btn view-btn1">Посмотреть еще</a>
                    </div>
                </div>
            </div>
        </section>
        <!--  New Product End -->
        <!--? Gallery Area Start -->
        <!-- <div class="gallery-area">
            <div class="container-fluid p-0 fix">
                <div class="row">
                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/gallery3.png);"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/gallery4.png);"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
        <!-- Gallery Area End -->
        <!--? Popular Items Start -->
        <div class="popular-items section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>Наши услуги</h2>
                            <p>Компания IT Yakutia предоставляет широкий спектр услуг, от разработки и поддержки сайтов до введение социальных сетей в г. Якутск и в других регионах России</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/popular2.jpg" alt="Admin14, IT Yakutia, портфолио, разработка сайта">
                                <div class="img-cap">
                                    <span>Заказать</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Разработка и поддержка сайтов</a></h3>
                                <!-- <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Корпоративный сайт для бизнеса</a></h3> -->
                                <!-- <span>от 36,000 ₽</span> -->
                                <span>от 12,000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/popular5.jpg" alt="Admin14, IT Yakutia, портфолио, разработка сайта">
                                <div class="img-cap">
                                    <span>Заказать</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Введение социальных сетей</a></h3>
                                <span>от 10,000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/popular6.jpg" alt="Admin14, IT Yakutia, портфолио, разработка сайта">
                                <div class="img-cap">
                                    <span>Заказать</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Изготовление видеороликов</a></h3>
                                <span>от 5,000 ₽</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="<?= Url::toRoute(['/site/goods'])?>" class="btn view-btn1">Посмотреть еще</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
        <!--? Video Area Start -->
        <div class="video-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                    <div class="video-wrap">
                        <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=HTx0h5h2Qkc"><i class="fas fa-play"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Arrow -->
                <div class="thumb-content-box">
                    <div class="thumb-content">
                        <h3>Галерея</h3>
                        <a href="<?= Url::toRoute(['/gallery/front/index'])?>"> <i class="flaticon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Area End -->
        <!--? Watch Choice  Start-->
        <div class="watch-area section-padding30">
            <div class="container">
                <div class="row align-items-center justify-content-between padding-130 flex-md-row-reverse">
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="choice-watch-img mb-40 text-left text-md-center">
                            <img src="<?= $this->theme->baseUrl; ?>/img/gallery/choce_watch1.png" alt="<?= Yii::$app->name ?>">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="watch-details mb-40">
                            <h2>Гарантия 1 год</h2>
                            <p>Мы не только уверены в качестве наших работ, но и даем гарантию на все работы на один год</p>
                            <a href="<?= Url::toRoute(['/site/contact']) ?>" class="btn d-none d-md-inline">Заказать сайт</a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="choice-watch-img mb-40 text-center">
                            <img src="<?= $this->theme->baseUrl; ?>/img/gallery/choce_watch2.png" alt="<?= Yii::$app->name ?>">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="watch-details mb-40">
                            <h2>Бесплатный ssl сертификат</h2>
                            <p>При покупке домена дается бесплатный ssl сертификат, он обеспечивает защиту сайта и поднимается поисковыми сервисами в рейтинге</p>
                            <a href="<?= Url::toRoute(['/site/contact']) ?>" class="btn">Заказать сайт</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Watch Choice  End-->
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-center mt-4 text-white">Отзывы о нас</h2>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <p>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                </p>
                                <p>ООО «МЕДИСИТИ»</p>
                                <h6>Гаврил Сивцев</h6>
                                <p>Заказывали сайт в 2018 году для нашей деятельности по медтуризму в Южную Корею. Сайт был готов за месяц, обошлось недорого, в любом случае лучше чем сайты визитки, можно после запуска уже самому все редактировать и обновлять. Всем довольны, спасибо</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">   
                                <p>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                </p>
                                <p>ГБУ РС (Я) "ПОБЕДА"</p>
                                <h6>Лебедева Галина</h6>
                                <p><a href="/pobeda.pdf" download="Отзыв о сайте Ресурсного центра Победа.pdf">Отзыв о сайте Ресурсного центра Победа.pdf</a></p>
                            </div>
                        </div> 
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <p>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                </p>
                                <p>Ассоциация "Ветеран" РС(Я)</p>
                                <h6>Андреева Дария</h6>
                                <p><a href="/veteran.pdf" download="Отзыв о сайте Ассоц Ветеран.pdf">Отзыв о сайте Ассоц Ветеран.pdf</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Method End-->


        <!-- Reviews Start-->
        <!-- Reviews End-->

        <!-- Partners Start-->
        <!-- Partners End-->