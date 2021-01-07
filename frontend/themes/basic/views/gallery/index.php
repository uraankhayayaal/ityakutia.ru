<?php

/* @var $this yii\web\View */

use ityakutia\gallery\assets\about\AboutAsset;
use yii\widgets\ListView;

AboutAsset::register($this);

$this->title = "Фотогалерея";

$this->params['breadcrumbs'][] = $this->title;

?>	

        <!--? Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
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

        <!-- ================ gallery section start ================= -->
        <section class="gallery-section">
            <div class="container">
                <div class="row">

                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => '_item',
                        'options' => ['tag' => false, 'class' => false, 'id' => false],
                        'itemOptions' => [
                            'tag' => false,
                            'class' => 'news-item',
                        ],
                        'layout' => '{items}{pager}',
                        'summaryOptions' => ['class' => 'summary grey-text'],
                        'emptyTextOptions' => ['class' => 'empty grey-text'],
                        'pager' => [
                            'registerLinkTags' => true,
                            'options' => ['class' => 'pagination'],
                            'prevPageCssClass' => 'page-item',
                            'nextPageCssClass' => 'page-item',
                            'pageCssClass' => 'page-item',
                            'nextPageLabel' => '>',
                            'prevPageLabel' => '<',
                            'linkOptions' => ['class' => 'page-link'],
                            'disabledPageCssClass' => 'd-none',
                        ]
                    ]) ?>

                </div>
            </div>
        </section>


        <?= $this->render('_video', ['videos' => $videos]); ?>
        <!-- ================ gallery section end ================= -->
