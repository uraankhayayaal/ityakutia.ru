<?php

use common\modules\multicity\models\City;
use frontend\themes\basic\widgets\news\NewsWidget;
use yii\helpers\Url;

$this->title = City::getCurrent()->url === 'yakutsk' ? 'IT Yakutia' : 'BeeApps';

?>
        <!--? slider Area Start -->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <?php /* <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="hero__caption">
                                    <h2 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Продвижение в соцсетях в городе <?= City::getCurrent()->name; ?></h2>
                                    <img src="<?= $this->theme->baseUrl; ?>/img/hero/mobile.svg" class="d-md-none mw-100 pr-3 pb-3 heartbeat" alt="Разработка и поддержка сайтов. SMM продвижениие в социальных сетях">
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Ваши идеи — наше приложение: мы создаем сайты и мобильные решения, которые работают на вас!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href="<?= Url::toRoute(['/site/contact'])?>" class="btn hero-btn">Заказать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="<?= $this->theme->baseUrl; ?>/img/hero/watch.svg" class="heartbeat" alt="Разработка и поддержка сайтов. SMM продвижениие в социальных сетях в городе <?= City::getCurrent()->name; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> */ ?>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Разработка и поддержка сайта в городе <?= City::getCurrent()->name; ?></h1>
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Ваши идеи — наше приложение: мы создаем сайты и мобильные решения, которые работают на вас!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href="<?= Url::toRoute(['/site/contact'])?>" class="btn hero-btn">Заказать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="<?= $this->theme->baseUrl; ?>/img/hero/hexagon.png" class="heartbeat" alt="Разработка и поддержка сайтов. SMM продвижениие в социальных сетях в городе <?= City::getCurrent()->name; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        
        <!--? Gallery Area Start -->
        <!-- <div class="gallery-area">
            <div class="container-fluid p-0 fix">
                <div class="row">
                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/popular1.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/popular2.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/popular3.jpg);"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(<?= $this->theme->baseUrl; ?>/img/gallery/popular4.jpg);"></div>
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
                            <p>Компания <?= City::getCurrent()->url === 'yakutsk' ? 'IT Yakutia' : 'BeeApps' ?> предоставляет широкий спектр услуг, от создания логотипа до годовой гаранитии на разработку сайтов и приложений по всей территории России</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
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
                                <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Разработка и поддержка сайтов</a></h3>
                                <!-- <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Корпоративный сайт для бизнеса</a></h3> -->
                                <!-- <span>от 36,000 ₽</span> -->
                                <!-- <span>от 12,000 ₽</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
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
                                <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Разработка мобильных приложений</a></h3>
                                <!-- <span>от 10,000 ₽</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/popular6.jpg" alt="Портфолио, разработка сайта">
                                <div class="img-cap">
                                    <span>Заказать</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="<?= Url::toRoute(['/site/goods']) ?>">Разработка логотипов и баннеров</a></h3>
                                <!-- <span>от 5,000 ₽</span> -->
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
        <!-- ? New Product Start -->
        <section class="new-product-area section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>Последние работы</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/new_product8.jpg" alt="Портфолио, разработка сайта">
                            </div>
                            <div class="product-caption">
                                <h3><a href="<?= Url::toRoute(['/site/portfolio']) ?>">Управление образования Усть-Майского улуса</a></h3>
                                <span>ustmuo.ru</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/new_product1.jpg" alt="Портфолио, разработка сайта">
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
                                <img src="<?= $this->theme->baseUrl; ?>/img/gallery/new_product5.jpg" alt="Портфолио, разработка сайта">
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
        <!--? Video Area Start -->
        <!-- <div class="video-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                    <div class="video-wrap">
                        <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=HTx0h5h2Qkc"><i class="fas fa-play"></i></a></div>
                    </div>
                    </div>
                </div>
                
                <div class="thumb-content-box">
                    <div class="thumb-content">
                        <h3>Галерея</h3>
                        <a href="<?= Url::toRoute(['/gallery/front/index'])?>"> <i class="flaticon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Video Area End -->
        <?= NewsWidget::widget(); ?>
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="">
                    <div class="row">
                        <div class="col">
                            <h2 class="text-center mt-4 mb-5">Отзывы о нас</h2>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-12 col-md-6">
                            <div class="mb-40">
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
                        <div class="col-12 col-md-6">
                            <div class="mb-40">   
                                <p>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                </p>
                                <p>ГБУ РС (Я) "ПОБЕДА"</p>
                                <h6>Лебедева Галина</h6>
                                <p>Ресурсный центр социальной защиты «Победа» выражает благодарность ООО «Информационные технологии Якутии» за качественную и своевременную разработку сайта нашей организации.<br>Разработанный Вами веб-сайт «http://rcmtykt.ru/» имеет социальную направленность, целевой аудиторией которого являются организации социальной защиты и социального обслуживания Республики Саха (Якутия), а также граждане, нуждающиеся в социальной поддержке.<br>Считаем, что сайт четко структурирован, понятен для использования в работе, имеет современный дизайн и возможности проведения опросов для населения. Работа, выполненная разработчиками, сделана с учетом всех наших требований, пожеланий и в установленные сроки.<br>Желаем Вам успехов в продвижении новых масштабных проектов и выражаем готовность к дальнейшему сотрудничеству.</p>
                                <p><a style="color: #FF8100;" href="/pobeda.pdf" download="Отзыв о сайте Ресурсного центра Победа.pdf">Отзыв о сайте Ресурсного центра Победа.pdf</a></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-40">
                                <p>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                </p>
                                <p>Ассоциация "Ветеран" РС(Я)</p>
                                <h6>Андреева Дария</h6>
                                <p>Ассоциация в содействии защиты прав ветеранов войны и труда "Ветеран" PC (Я) выражает благодарность ООО «Информационные технологии Якутии» за качественную и своевременную разработку сайта нашего учреждения. <br>Сайт https://veteransakha.ru будет освещать работу учреждения и работу общественных организаций Республики Саха (Якутия) ведущих патриотическую работу. <br>Работа выполнена быстро в течении 3-х недель с учетом наших пожеланий. <br>Выражаем готовность к дальнейшему сотрудничеству.</p>
                                <p><a style="color: #FF8100;" href="/veteran.pdf" download="Отзыв о сайте Ассоц Ветеран.pdf">Отзыв о сайте Ассоц Ветеран.pdf</a></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-40">
                                <p>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                    <i class="ti-star d-inline"></i>
                                </p>
                                <p>Сеть ортопедических салонов NotaBene</p>
                                <h6>ИП Никифорова Т.Н.</h6>
                                <p>Сеть ортопедических салонов "NotaBene" (ИП Никифорова Т.Н.) выражает благодарность компании ООО "Информационные технологии Якутии" за отличную работу по разработке сайта нашей компании за весьма приемлемую цену. Ваш разработчик помог нам с уточнением технического задания, всегда был на связи, отвечал на вопросы практически мгновенно, предлагал грамотные решения всех наших пожеланий, сделал все в назначенный срок. Радует длительный гарантийный срок поддержки. Мы рады, что выбрали Вашу компанию и в результате получили продукт, который даже превзошел наши ожидания. Готовы на дальнейшее взаимовыгодное сотрудничество.</p>
                                <p><a style="color: #FF8100;" href="/notabene.pdf" download="Письмо благодарность ИП Никифорова ТН.pdf">Письмо благодарность ИП Никифорова ТН.pdf</a></p>
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

        <div class="section-padding30">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row">
                        <div class="col">
                            <div class="section-tittle mb-70 text-center">
                                <h2>Напишите нам</h2>
                                <p>Мы доступны в мессенджерах telegram и whatsapp, а так же можете позвонить или написать по электронной почте:</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fab fa-telegram" aria-hidden="true"></i></span>
                                <div class="media-body">
                                    <h3 class="typography h6">В telegram</h3>
                                    <p><a style="color: #FF8100;" target="_blank" href="https://t.me/beeapps_official">@beeapps_official</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fab fa-whatsapp" aria-hidden="true"></i></span>
                                <div class="media-body">
                                    <h3 class="typography h6">В whatsapp</h3>
                                    <p><a style="color: #FF8100;" target="_blank" href="https://wa.me/79998271911">Написать</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h3 class="typography h6">На электронную почту</h3>
                                    <p><a style="color: #FF8100;" target="_blank" href="mailto:manager@admin14.ru">manager@admin14.ru</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <?php switch (City::getCurrent()->url) {
                                        case 'yakutsk':
                                            echo '
                                                <h3>Республика Саха (Якутия), Россия.</h3>
                                                <p>677008, Якутск, Лермонтова 87</p>
                                            ';
                                            break;
                                        default:
                                            echo '
                                                <h3>Строгино, Москва</h3>
                                                <p>123181, Улица Маршала Катукова 25</p>
                                            ';
                                            break;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>