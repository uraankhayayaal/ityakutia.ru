<?php

use ityakutia\gallery\assets\slider\SliderAsset;
use ityakutia\gallery\assets\album\AlbumAsset;
use powerkernel\photoswipe\Modal;

SliderAsset::register($this);
AlbumAsset::register($this);

$this->title = $model->title;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фотогалерея', 'url' => ['/gallery/front/index']];
$this->params['breadcrumbs'][] = $this->title;

?>    

<div class="container">
    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <h2 class="text-center"><?= $this->title ?></h2>
        </div>
    </div>
</div>

<div class="doctors">
    <div class="container">
        <div class="row doctors_row">

                <div class="departments">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="section_title"><?= $this->title ?></div>
                                <div class="section_subtitle"><?= $model->description ?></div>
                            </div>
                        </div>
                        <div class="row dept_row">
                            <div class="col">
                                <div class="dept_slider_container_outer my-5">
                                    <div class="dept_slider_container">

                                        <div class="owl-carousel owl-theme dept_slider">
                                            
                                            <?php foreach ($model->galleryAlbumPhotos as $key => $alboomPhoto) { ?>
                                                <div class="owl-item dept_item modaled">
                                                    <a href="<?= $alboomPhoto->photo->original; ?>" class="dept_image progressive replace">
                                                        <img src="<?= $alboomPhoto->photo->src; ?>" class="preview" alt="<?= $alboomPhoto->photo->name ?>">
                                                    </a>
                                                </div>
                                            <?php } ?>

                                        </div>
                                            
                                        <?php
                                        $photos = [];
                                        foreach ($model->galleryAlbumPhotos as $key => $photo) {
                                            $photos[] = [
                                                'src' => $photo->photo->original,
                                                'title' => $photo->photo->name,
                                                'caption' => $photo->photo->description,
                                                'width' => $photo->photo->w,
                                                'height' => $photo->photo->h,
                                                //'size' => '1024x685',
                                                //'thumb' => $photo->photo->src,
                                            ];
                                        }
                                        ?>
                                        <?=
                                        Modal::widget([
                                            'selector' => '.modaled',
                                            'images' => $photos,
                                        ])
                                        ?>
                                    </div>
                                    <!-- <div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>