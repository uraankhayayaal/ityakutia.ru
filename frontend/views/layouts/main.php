<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name ?> - <?= Html::encode($this->title) ?></title>
    <link rel="icon" href="/images/favicon.png">

    <meta name="description" content="Разработка сайтов и мобильных приложений Admin14 - качесвтенно и в корокие сроки, от одностраничных (landingpage) до сложных сайтов, порталов и интернет магазинов">
    <meta name="keywords" content="разработка сайтов, создание интернет страниц, якутск, Yii2, разработка мобильных приложений, заказы на разработку сайтов и мобильных приложений, android, ios, web, landingpage, одностраничный сайт, интернет магазин, сервер, доска объявлений">
    <meta name="google-site-verification" content="S31x0lJg0CebKhPoOpLixsaUtap1PgQu7HoT4lIYF-A" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php $this->head() ?>
</head>
<body id="layout_main">
<?php $this->beginBody() ?>

    <?= $this->render('_menu') ?>

    <main>
        <?= $this->render('_main_side_bar') ?>
        <?= $content ?>
    </main>

    <?= $this->render('_footer') ?>
      
<?php $this->endBody() ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44427349 = new Ya.Metrika({
                    id:44427349,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44427349" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
<?php $this->endPage() ?>
