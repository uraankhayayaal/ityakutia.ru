<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title>Mytona Administration</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="/favicon.png" />
    <?php $this->head() ?>
</head>
<body class="login ">
<?php $this->beginBody() ?>

    <main>
        <div class="container">
            <?= $content ?>
        </div>
    </main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
