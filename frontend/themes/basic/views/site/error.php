<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
        <!--? Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h1><?= Html::encode($this->title) ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================ error section start ================= -->
        <section class="error-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-3">
                    
                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>

                        <p>
                            Ошибка на сайте, пожалуйста обратитесь к администратору сайта.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ error section end ================= -->