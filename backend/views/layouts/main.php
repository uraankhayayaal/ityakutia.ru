<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use uraankhayayaal\materializecomponents\alert\Toast;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" href="/favicon.png" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?= $this->render('_topBar'); ?>
    <?= $this->render('_sideNav'); ?>

    <main>
        <?= Toast::widget() ?>
        <?= $content ?>
    </main>

    <footer class="page-footer">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Docloud</h5>
                <p class="grey-text text-lighten-4">Archive</p>
                <p class="grey-text text-lighten-4">IT Solution</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">facebook</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">twitter</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">youtube</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="row">
                <div class="col s12">
                    &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                </div>
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
