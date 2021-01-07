<?php

use yii\helpers\Url;

?>

<li class="search-item">
    <?php if ($model['table'] === 'article') { ?>
        <a href="<?= Url::toRoute(['/blog/front/view', 'id' => $model['page']]) ?>">
            <h3><?= strip_tags($model['title']) ?></h3>
            <p><?= strip_tags($model['content']) ?></p>
        </a>
    <?php } elseif ($model['table'] === 'page') { ?>
        <a href="<?= Url::toRoute(['/page/front/view', 'slug' => $model['page']]) ?>">
            <h3><?= strip_tags($model['title']) ?></h3>
            <p><?= strip_tags($model['content']) ?></p>
        </a>
    <?php } ?>
</li>