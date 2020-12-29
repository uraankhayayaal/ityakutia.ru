<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */

$this->title = 'Главня страница';
?>
        <div class="container">
            <div class="row">
                <div class="col s12">

                  <div class="section no-pad-bot" id="index-banner">

                      <?php
                          // $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'admin14.ru', '}{Uy2016', Yii::$app->cache);
                          // $emailVecification = new \common\components\twoStepAutoVerification\EmailVerification(
                          //     'manager@admin14.ru',
                          //     'imap.yandex.ru',
                          //     'golem130',
                          //     true,
                          //     null,
                          //     Yii::getAlias('@app')
                          // );
                          // $instagram->login(false, $emailVecification);
                          // $account = $instagram->getAccountById(5);
                      ?>
                      <h1 class="header center orange-text"><?php /* $account->getUsername(); */ ?></h1>


                  </div>

                </div>
            </div>
        </div>

        <div class="section why_we">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="s12">
                  <div class="row">
                      <div class="col s12 m4">
                        <div class="icon-block">
                          <h2 class="center"><i class="material-icons">flash_on</i></h2>
                          <h5 class="center">В короткие сроки</h5>

                          <p class="light center description">Скорость разработки зависит только от вас. Не успеете как познакомиться с сайтом, он будет зпущен</p>
                        </div>
                      </div>

                      <div class="col s12 m4">
                        <div class="icon-block">
                          <h2 class="center"><i class="material-icons">group</i></h2>
                          <h5 class="center">Ответственно</h5>

                          <p class="light center description">Предоплата 50%, гарантийное обслуживание два месяца после разработки</p>
                        </div>
                      </div>

                      <div class="col s12 m4">
                        <div class="icon-block">
                          <h2 class="center"><i class="material-icons">settings</i></h2>
                          <h5 class="center">Качественно</h5>

                          <p class="light center description">В разрботке используется Framework Yii 2, можете выбрать любой CSS-framework.</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="section why_we">
          <div class="container">
            <div class="row">
              <div class="col s12">
                <div class="row">
                    <div class="col s12 m6 l3">
                      <div class="icon-block">
                        <img src="/images/example/landing_empty.png" id="landing_img" class="responsive-img" alt="###">
                        <h5 class="center">Одностраничный (Landing Page)</h5>

                        <p class="light center description">Стоимость: от 12 000 руб.</p>
                        <p class="light center description">Срок: от 5 рабочих дней.</p>
                      </div>
                    </div>

                    <div class="col s12 m6 l3">
                      <div class="icon-block">
                        <img src="/images/example/landing_empty.png" id="business_img" class="responsive-img" alt="###">
                        <h5 class="center">Корпоративный сайт для бизнеса</h5>

                        <p class="light center description">Стоимость: от 36 000 руб.</p>
                        <p class="light center description">Срок: от 15 рабочих дней.</p>
                      </div>
                    </div>

                    <div class="col s12 m6 l3">
                      <div class="icon-block">
                        <img src="/images/example/landing_empty.png" id="shop_img" class="responsive-img" alt="###" style="background-color: white;">
                        <h5 class="center">Интернет магазин, доска объявлений</h5>

                        <p class="light center description">Стоимость: от 115 200 руб.</p>
                        <p class="light center description">Срок: от 48 рабочих дней.</p>
                      </div>
                    </div>

                    <div class="col s12 m6 l3">
                      <div class="icon-block">
                        <img src="/images/example/api_empty.png" id="api_img" class="responsive-img" alt="###" style="background-color: white;">
                        <h5 class="center">Интернет портал, серверы для мобильных приложений</h5>

                        <p class="light center description">Стоимость и срок: индивидуально</p>
                        <p class="light center description"><a href="#modal1" class="btn modal-trigger">Уточнить</a></p>
                      </div>
                    </div>

                  </div>
              </div>
            </div>
          </div>
        </div>


        <div class="section contact no-pad-bot">
          <div class="container">
          <div class="section center">
            <h2>Контакты</h2>
          </div>
            <div class="row">
                <div class="col l6 m6 s12">
                  <h2 class="center"><a href="tel:89142736836"><i class="material-icons">phone</i></a></h2>
                  <h5 class="header col s12 light center"><a href="tel:89142736836">89142736836</a></h5>
                </div>
                <div class="col l6 m6 s12">
                  <h2 class="center"><a href="mailto:manager@admin14.ru"><i class="material-icons">email</i></a></h2>
                  <h5 class="header col s12 light center"><a href="mailto:manager@admin14.ru">manager@admin14.ru</a></h5>
                </div>
            </div>
          </div>
          <a class="dg-widget-link" href="http://2gis.ru/yakutsk/firm/70000001029784446/center/129.70572658698077,62.030501123290136/zoom/15?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Якутска</a><div class="dg-widget-link"><a href="http://2gis.ru/yakutsk/firm/70000001029784446/photos/70000001029784446/center/129.70572658698077,62.030501123290136/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div><div class="dg-widget-link"><a href="http://2gis.ru/yakutsk/center/129.705126,62.029002/zoom/15/routeTab/rsType/bus/to/129.705126,62.029002╎Информационные технологии Якутии, ООО?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Информационные технологии Якутии, ООО</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":600,"pos":{"lat":62.030501123290136,"lon":129.70572658698077,"zoom":15},"opt":{"city":"yakutsk"},"org":[{"id":"70000001029784446"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
        </div>


        <div class="fixed-action-btn">
          <a class="btn btn-floating btn-large cyan pulse waves-effect waves-light modal-trigger" href="#modal1"><i class="material-icons">edit</i></a>
        </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
          <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="modal-content">

              <div class="input-field col s12">
                <h4>Заказать сайт</h4>
                <p>Опишите ваш сайт</p>
              </div>

              <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

              <?= $form->field($model, 'email') ?>

              <?= $form->field($model, 'subject') ?>

              <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class' => 'materialize-textarea']) ?>

              <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                  'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
              ]) ?>

            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Отмена</a>
              <?= Html::submitButton('Отправить', ['class' => 'modal-action modal-close waves-effect waves-green btn', 'name' => 'contact-button']) ?>
            </div>

          <?php ActiveForm::end(); ?>

        </div>
