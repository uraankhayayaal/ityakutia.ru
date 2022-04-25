<?php

use yii\helpers\Url;

$this->title = "Услуги";

?>

        <!-- Hero Area Start-->
        <div class="slider-area ">
			<div class="single-slider slider-height2 services-hero d-flex align-items-center">
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
        <section class="section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <h3 class="mb-30">Дизайн</h3>
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">
                                    <div class="serial">#</div>
                                    <div class="country">Наименование</div>
                                    <div class="visit">Стоимость</div>
                                    <div class="percentage">Сроки</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">01</div>
                                    <div class="country">Разработка дизайна мобильного приложения</div>
                                    <div class="visit">от 12,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">02</div>
                                    <div class="country">Разработка web-дизайна</div>
                                    <div class="visit">от 7,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">03</div>
                                    <div class="country">Разработка видеоролика</div>
                                    <div class="visit">от 5,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-3" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">04</div>
                                    <div class="country">Разработка инфорграфики</div>
                                    <div class="visit">от 5,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-3" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-row">
                                    <div class="serial">05</div>
                                    <div class="country">Разработка презентации</div>
                                    <div class="visit">от 3,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-3" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">06</div>
                                    <div class="country">Разработка логотипа</div>
                                    <div class="visit">от 3,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-4" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">07</div>
                                    <div class="country">Изготовление баннера</div>
                                    <div class="visit">от 1,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-4" role="progressbar" style="width: 10%"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= Url::toRoute(['/site/contact']) ?>" class="btn mt-3">Заказать</a>

                        <!-- <h3 class="mb-30 mt-60">СММ (введение социальных сетей)</h3>
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">
                                    <div class="serial">#</div>
                                    <div class="country">Наименование</div>
                                    <div class="visit">Стоимость</div>
                                    <div class="percentage">Выгодность</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">01</div>
                                    <div class="country">Instagram</div>
                                    <div class="visit">10,000 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">02</div>
                                    <div class="country">VKontakte</div>
                                    <div class="visit">10,000 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">03</div>
                                    <div class="country">Facebook</div>
                                    <div class="visit">10,000 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">04</div>
                                    <div class="country">Tik-tok</div>
                                    <div class="visit">15,000 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-3" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">05</div>
                                    <div class="country">Youtube</div>
                                    <div class="visit">15,000 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-3" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">06</div>
                                    <div class="country">Instagram + VKontakte + Facebbook</div>
                                    <div class="visit">27,500 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-4" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">07</div>
                                    <div class="country">Tik-tok + Youtube</div>
                                    <div class="visit">27,500 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-5" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">08</div>
                                    <div class="country">Полный пакет</div>
                                    <div class="visit">50,000 ₽/мес</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-4" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= Url::toRoute(['/site/contact']) ?>" class="btn mt-3">Заказать</a> -->

                        <h3 class="mb-30 mt-60">Разработка</h3>
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">
                                    <div class="serial">#</div>
                                    <div class="country">Наименование</div>
                                    <div class="visit">Стоимость</div>
                                    <div class="percentage">Сроки</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">01</div>
                                    <div class="country">Landing page (одностраничный)</div>
                                    <div class="visit">от 12,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">02</div>
                                    <div class="country">Корпоративный сайт для бизнеса</div>
                                    <div class="visit">от 36,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">03</div>
                                    <div class="country">Интернет магазин, доска объявлений</div>
                                    <div class="visit">от 115,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-3" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">04</div>
                                    <div class="country">Интернет портал, серверы для мобильных приложений</div>
                                    <div class="visit">индивидуально</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-2" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">05</div>
                                    <div class="country">Мобильное приложение (одна платформа)</div>
                                    <div class="visit">от 150,000 ₽</div>
                                    <div class="percentage">
                                        <div class="progress">
                                            <div class="progress-bar color-2" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= Url::toRoute(['/site/contact']) ?>" class="btn mt-3">Заказать</a>

                        <h3 class="mb-30 mt-60">Поддержка</h3>
                        <div class="progress-table-wrap">
                            <div class="progress-table">
                                <div class="table-head">
                                    <div class="serial">#</div>
                                    <div class="country">Наименование</div>
                                    <div class="visit">Стоимость</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">01</div>
                                    <div class="country">Установка сайта на хостинг</div>
                                    <div class="visit">1,500 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">02</div>
                                    <div class="country">Настройка домена</div>
                                    <div class="visit">500 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">03</div>
                                    <div class="country">Установка ssl сертификата</div>
                                    <div class="visit">500 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">04</div>
                                    <div class="country">Подключение сайта в поисковые системы</div>
                                    <div class="visit">500 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">05</div>
                                    <div class="country">Установка аналитики посещения</div>
                                    <div class="visit">1,000 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">06</div>
                                    <div class="country">Создание карты сайта</div>
                                    <div class="visit">3,000 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">07</div>
                                    <div class="country">Наполнение контентом</div>
                                    <div class="visit">от 5,000 ₽</div>
                                </div>
                                <div class="table-row">
                                    <div class="serial">08</div>
                                    <div class="country">Хостинг</div>
                                    <div class="visit">5,000 ₽/год</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= Url::toRoute(['/site/contact']) ?>" class="btn mt-3">Заказать</a>

                    </div>
                </div>
            </div>
        </div>