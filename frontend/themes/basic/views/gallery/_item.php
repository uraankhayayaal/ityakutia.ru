<?php

use ityakutia\gallery\models\GalleryAlbumPhoto;
use yii\helpers\Url;

?>	

<a class="col-12 gallery_item" href="<?= Url::toRoute(['view', 'id' => $model->id]); ?>">
    <div class="gallery_label d-flex align-items-center mb-4">
        <img class="gallery_image mw-100" src="<?= $model->photo ?>" alt="<?= $model->title ?>">
        <h3 class="gallery_name ml-3"><?= $model->title ?></h3>
    </div>
    <div class="gallery_content">
        <div class="row">
            <?php $photos = GalleryAlbumPhoto::find()->where(['album_id' => $model->id])->limit(6)->all(); ?>
            <?php foreach ( $photos as $key => $photo) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                    <div class="gallery_photo d-flex flex-wrap align-content-end">
                        <div class="gallery_photo_image d-flex w-100"><img class="mw-100 w-100" src="<?= $photo->photo->src ?>" alt="<?= $photo->photo->name ?>"></div>
                        <div class="gallery_photo_name"><?= $photo->photo->name ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</a>