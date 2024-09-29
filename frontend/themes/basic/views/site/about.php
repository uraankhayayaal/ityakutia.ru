<?php

use yii\helpers\Url;

$this->title = 'О нас';

?>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 contact-hero d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
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
                            <h4>Наша миссия</h4>
                            <p>Преобразовывать идеи в эффективные цифровые решения, создавая уникальные сайты и приложения, которые помогают бизнесу наших клиентов расти и развиваться. Мы стремимся к инновации, качеству и бескомпромиссной поддержке, чтобы каждый проект стал воплощением успеха в цифровом мире.</p>
                            <p></p>
                        </div>

                        <div class="about-details-cap mb-50">
                            <h4>Наши видения</h4>
                            <p>Стать ведущим партнером в разработке цифровых решений в России, известным своим инновационным подходом, высоким качеством услуг и максимально эффективной поддержкой. Мы стремимся создавать не просто сайты и приложения, а экосистемы, которые помогают бизнесам легко адаптироваться к меняющемуся миру технологий, обеспечивая их конкурентоспособность и устойчивый рост в цифровой экономике.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Details End -->
        <!--? Video Area Start -->
        <div class="video-area mb-100">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                    <div class="video-wrap">
                        <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=KMc6DyEJp04"><i class="fas fa-play"></i></a></div>
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
        <!--? Shop Method Start-->
        <!-- <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Free Shipping Method</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div> 
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Shop Method End-->