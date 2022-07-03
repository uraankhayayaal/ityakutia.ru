<?php

use yii\helpers\Url;

$this->title = $model->title;

?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 gallery-hero d-flex align-items-center">
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
        <!--================ Page Area start =================-->
        <section class="blog_area single-page-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 mb-5 page-view-content">
                        <div class="imperavi-content my-3">
                            <?= $model->content; ?>
                        </div>
                        <?php foreach ($model->getBlocks() as $key => $block) { ?>
                            <?= $block ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Page Area end =================-->