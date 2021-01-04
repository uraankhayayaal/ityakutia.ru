<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\themes\basic\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - <?= Yii::$app->name ?></title>
    <link rel="shortcut icon" href="<?= $this->theme->baseUrl; ?>/img/favicon.ico">

    <meta name="description" content="Разработка сайтов и мобильных приложений Admin14 - качесвтенно и в корокие сроки, от одностраничных (landingpage) до сложных сайтов, порталов и интернет магазинов">
    <meta name="keywords" content="разработка сайтов, создание интернет страниц, якутск, Yii2, разработка мобильных приложений, заказы на разработку сайтов и мобильных приложений, android, ios, web, landingpage, одностраничный сайт, интернет магазин, сервер, доска объявлений">
    <meta name="google-site-verification" content="S31x0lJg0CebKhPoOpLixsaUtap1PgQu7HoT4lIYF-A" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= $this->theme->baseUrl; ?>/img/logo/logo.svg" alt="">
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
