<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\themes\basic\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= ($this->title != null ? (Html::encode($this->title).' | ') : '') ?><?= Yii::$app->name ?></title>
    <link rel="shortcut icon" type="image/svg+xml" href="<?= $this->theme->baseUrl; ?>/img/favicon.svg">

    <meta name="google-site-verification" content="S31x0lJg0CebKhPoOpLixsaUtap1PgQu7HoT4lIYF-A" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php $this->head() ?>

    <?php
        Yii::$app->params['meta_description']['content'] = Yii::$app->params['meta_description']['content'];
        Yii::$app->params['meta_keywords']['content'] = ($this->title != null ? (Html::encode($this->title).', ') : '').Yii::$app->params['meta_keywords']['content'];

        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => Yii::$app->params['meta_keywords']['content'],
        ]);
        $this->registerMetaTag([
            'name' => 'description',
            'content' => Yii::$app->params['meta_description']['content'],
        ]);

        $this->registerMetaTag([
            'property' => 'og:title',
            'content' => ($this->title != null ? (Html::encode($this->title).' | ') : '').\Yii::$app->name,
        ]);
        $this->registerMetaTag([
            'property' => 'og:type',
            'content' => Yii::$app->params['meta_type']['content'],
        ]);
        $this->registerMetaTag([
            'property' => 'og:description',
            'content' => Yii::$app->params['meta_description']['content'],
        ]);
        $this->registerMetaTag([
            'property' => 'og:image',
            'content' => Yii::$app->params['meta_image']['content'],
        ]);
        $this->registerMetaTag([
            'property' => 'og:image:type',
            'content' => 'image/jpeg',
        ]);
        $this->registerMetaTag([
            'property' => 'og:image:width',
            'content' => '300',
        ]);
        $this->registerMetaTag([
            'property' => 'og:image:height',
            'content' => '300',
        ]);
        $this->registerMetaTag([
            'property' => 'og:image:alt',
            'content' => Yii::$app->params['meta_description']['content'],
        ]);
        $this->registerMetaTag([
            'property' => 'og:url',
            'content' => empty(Yii::$app->params['meta_url']['content']) ? Url::current([], true) : Yii::$app->params['meta_url']['content'],
        ]);

    ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= $this->theme->baseUrl; ?>/img/logo/logo.svg" alt="<?= Yii::$app->name ?>">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    
    <?= $this->render('_menu'); ?>

    <main>
        <?= $content ?>
    </main>
    <?= $this->render('_footer'); ?>
    
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->
<?php $this->endBody() ?>

<?= $this->render('_metrika'); ?>

</body>
</html>
<?php $this->endPage() ?>
