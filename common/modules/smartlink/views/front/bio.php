<?php

use yii\helpers\Html;
use yii\helpers\Url;

Yii::$app->params['meta_description']['content'] = $model->description;
    Yii::$app->params['meta_keywords']['content'] = $model->description;

    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => $model->description,
    ]);
    $this->registerMetaTag([
        'name' => 'description',
        'content' => $model->description,
    ]);

    $this->registerMetaTag([
        'property' => 'og:title',
        'content' => $model->title,
    ]);
    $this->registerMetaTag([
        'property' => 'og:description',
        'content' => $model->description,
    ]);
    $this->registerMetaTag([
        'property' => 'og:image',
        'content' => $model->photo,
    ]);
    $this->registerMetaTag([
        'property' => 'og:image:alt',
        'content' => $model->title,
    ]);
    $this->registerMetaTag([
        'property' => 'og:url',
        'content' => Url::current(),
    ]);

?>

<style>
.btn-bio-social{
    padding: 8px;
    font-size: 1.8rem;
    width: 100%;
    text-align: center;
}
</style>

<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-center"><img src="<?= $model->photo ?>" alt="<?= $model->title ?>" style="max-width:100px;"></p>
            <h1 class="text-center" style="font-size: 16px;"><?= $model->title ?></h1>
            <p class="text-center" style="font-size: 14px;"><?= $model->description ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4 class="text-center mt-5 mb-3">Напишите или позвоните нам</h4>
            <div class="d-block d-md-flex justify-content-around justify-content-md-center">
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fab fa-whatsapp"></i> ' . $model->link_whatsapp, "https://wa.me/{$model->link_whatsapp}?text=Здравствуйте!%20Я%20по%20поводу:%20", ['class' => 'btn w-100', 'target' => '_blank']); ?></p>
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fas fa-phone"></i> ' . $model->link_phone, $model->link_phone, ['class' => 'btn w-100', 'target' => '_blank']); ?></p>
            </div>
        </div>
        <div class="col-12">
            <h4 class="text-center mt-5 mb-3">Подпишитесь на наши социальные сети</h4>
            <div class="d-flex justify-content-around justify-content-md-center">
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fab fa-instagram"></i>', $model->link_instagram, ['class' => 'btn btn-bio-social', 'target' => '_blank']); ?></p>
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fab fa-vk"></i>', $model->link_vk, ['class' => 'btn btn-bio-social', 'target' => '_blank']); ?></p>
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fab fa-youtube"></i>', $model->link_youtube, ['class' => 'btn btn-bio-social', 'target' => '_blank']); ?></p>
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fab fa-facebook"></i>', $model->link_facebook, ['class' => 'btn btn-bio-social', 'target' => '_blank']); ?></p>
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fab fa-twitter"></i>', $model->link_twitter, ['class' => 'btn btn-bio-social', 'target' => '_blank']); ?></p>
            </div>
        </div>
        <div class="col-12">
            <h4 class="text-center mt-5 mb-3">Сайт и email</h4>
            <div class="d-block d-md-flex justify-content-around justify-content-md-center">
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fas fa-globe"></i> ' . $model->link_web, $model->link_web, ['class' => 'btn w-100', 'target' => '_blank']); ?></p>
                <p class="mx-0 mx-md-1"><?= Html::a('<i class="fas fa-envelope"></i> ' . $model->link_email, $model->link_email, ['class' => 'btn w-100', 'target' => '_blank']); ?></p>
            </div>
        </div>
    </div>
</div>
<div style="height: 70px;"></div>