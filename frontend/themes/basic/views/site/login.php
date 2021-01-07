<?php

use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Авторизация</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Впервые на нашем сайте?</h2>
                                <p>Вы получите возможность участвовать в обсуждениях, оставлять отзывы и другое. Вам нужно только:</p>
                                <a href="<?= Url::toRoute(['/site/signup'])?>" class="btn_3">Создать аккаунт</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Вход на сайт</h3>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'errorCssClass' => 'red-text',
                                ]); ?>
                                    <div class="row">
                                        <?= $form->field($model, 'username', ['options' => ['class' => 'col-md-12 form-group p_star']])->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('username')])->label(false) ?>

                                        <?= $form->field($model, 'password', ['options' => ['class' => 'col-md-12 form-group p_star']])->passwordInput(['placeholder' => $model->getAttributeLabel('username')])->label(false) ?>

                                        <div class="col-md-12 form-group">
                                            <?= WCheckbox::widget(['model' => $model, 'attribute' => 'rememberMe'])?>
                                            <?= Html::submitButton('Войти', ['class' => 'btn', 'name' => 'login-button']) ?>
                                            <a class="lost_pass" href="<?= Url::toRoute(['/site/request-password-reset'])?>">Забыли пароль?</a>
                                        </div>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->