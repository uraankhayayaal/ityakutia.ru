<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Забыли пароль?';
$this->params['breadcrumbs'][] = $this->title;
?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><?= Html::encode($this->title) ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================ password_reset_part Area start =================-->
        <section class="password_reset_part section_padding ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <p>Запрос на изменение пароля, введите вашу электронную почту:</p>
                        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('email')])->label(false) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================ password_reset_part Area end =================-->
