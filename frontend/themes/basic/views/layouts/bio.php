<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\modules\multicity\models\City;
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
    <title><?= $this->title ?></title>
    <link rel="shortcut icon" type="image/svg+xml" href="<?= $this->theme->baseUrl; ?><?= City::getCurrent()->url === 'yakutsk' ? '/img/itYakutiaFavicon.svg' : '/img/beeAppsFavicon.svg' ?>">

    <meta name="google-site-verification" content="S31x0lJg0CebKhPoOpLixsaUtap1PgQu7HoT4lIYF-A" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="yandex-verification" content="837e75889d0f2540" />
    <?= $this->render('_tagmanager_head') ?>

    <?php $this->head() ?>
</head>
<body>
<?= $this->render('_tagmanager_body') ?>
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

    <main>
        <?= $content ?>
    </main>

    <!-- JS here -->
<?php $this->endBody() ?>

<?= $this->render('_metrika'); ?>

</body>
</html>
<?php $this->endPage() ?>
