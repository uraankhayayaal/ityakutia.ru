<?php

use common\modules\multicity\models\City;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Контакты';

?>
        <!--? Hero Area Start-->
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
        <!--? Hero Area End-->
        <!-- ================ contact section start ================= -->
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Напишите нам, что вы хотите заказать?</h2>
                    </div>
                    <div class="col-lg-8">
                        <?php $form = ActiveForm::begin(['id' => 'contactForm', 'options' => ['class' => "form-contact contact_form"]]); ?>
                            <div class="row">
                                <div class="col-12">
                                    <?= $form->field($model, 'subject')->textInput(['class' => "form-control", 'onfocus' => "this.placeholder = ''", 'onblur' => "this.placeholder = '".$model->getAttributeLabel('subject')."'", 'placeholder' => $model->getAttributeLabel('subject')])->label(false) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'name')->textInput(['class' => "form-control", 'onfocus' => "this.placeholder = ''", 'onblur' => "this.placeholder = '".$model->getAttributeLabel('name')."'", 'placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'email')->textInput(['class' => "form-control", 'onfocus' => "this.placeholder = ''", 'onblur' => "this.placeholder = '".$model->getAttributeLabel('email')."'", 'placeholder' => $model->getAttributeLabel('email')])->label(false) ?>
                                </div>
                                <div class="col-12">
                                    <?= $form->field($model, 'body')->textarea(['class' => "form-control w-100", 'cols' => "30", 'rows' => "9", 'onfocus' => "this.placeholder = ''", 'onblur' => "this.placeholder = '".$model->getAttributeLabel('body')."'", 'placeholder' => $model->getAttributeLabel('body'), 'autofocus' => true])->label(false) ?>
                                </div>
                                <div class="col-12">
                                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                        'template' => '<div class="row"><div class="col-4 col-md-3">{image}</div><div class="col-8 col-md-6 col-lg-3">{input}</div></div>',
                                        'options' => [
                                            'onfocus' => "this.placeholder = ''",
                                            'onblur' => "this.placeholder = '".$model->getAttributeLabel('verifyCode')."'",
                                            'placeholder' => $model->getAttributeLabel('verifyCode')
                                        ]
                                    ])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <?= Html::submitButton('Отправить', ['class' => 'button button-contactForm boxed-btn', 'name' => 'contact-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <?php switch (City::getCurrent()->url) {
                                    case 'kazan':
                                        echo '
                                            <h3>Республика Татарстан, Россия.</h3>
                                            <p>Казань, 420000</p>
                                        ';
                                        break;
                                    case 'yakutsk':
                                        echo '
                                            <h3>Республика Саха (Якутия), Россия.</h3>
                                            <p>Якутск, 677008</p>
                                        ';
                                        break;
                                    default:
                                        echo '
                                            <h3>Республика Саха (Якутия), Россия.</h3>
                                            <p>Якутск, 677008</p>
                                        ';
                                        break;
                                } ?>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+7 914 273 6836</h3>
                                <p>с 14:00 до 18:00 в будни</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>manager@admin14.ru</h3>
                                <p>На почту в любое время</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->