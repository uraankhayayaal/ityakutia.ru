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


                      <h1 class="header center orange-text"><?= Yii::$app->name ?></h1>


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

                          <p class="light center description">Скороть разработки зависит только от вас. Не успеете как познакомиться с сайтом, он будет зпущен</p>
                        </div>
                      </div>

                      <div class="col s12 m4">
                        <div class="icon-block">
                          <h2 class="center"><i class="material-icons">group</i></h2>
                          <h5 class="center">Отвественнно</h5>

                          <p class="light center description">Работаю без предоплаты, гарантийное обслуживание два месяца после разработки</p>
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


        <div class="section contact">
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
