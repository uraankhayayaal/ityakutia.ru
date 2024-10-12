<?php

use yii\helpers\Url;

?>

<article class="blog_item">
    <div class="blog_item_img">
        <img class="card-img rounded-0" src="<?= $model->photo ?>" alt="<?= $model->title ?>">
        <a href="#" class="blog_item_date">
            <h3><?= Yii::$app->formatter->asDate($model->created_at, 'php:j') ?></h3>
            <p><?= Yii::$app->formatter->asDate($model->created_at, 'php:M') ?></p>
        </a>
    </div>

    <div class="blog_details">
        <a class="d-inline-block" href="<?= Url::to(['view', 'id' => $model->id]) ?>">
            <h2><?= $model->title ?></h2>
        </a>
        <p><?= $model->description ?></p>
        <ul class="blog-info-link">
            <?php foreach ($model->articleCategorySets as $key => $articleSet) { ?>
                <li><a href="<?= Url::to(['index', 'filter_category_id' => $articleSet->article_category_id]); ?>"><i class="fa fa-hashtag"></i> <?= $articleSet->articleCategory->title ?></a></li>
            <?php } ?>
            <!-- <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> -->
        </ul>
    </div>
</article>