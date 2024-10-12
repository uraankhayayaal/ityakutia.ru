<?php

use yii\helpers\Url;

?>


<div class="watch-area section-padding30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Наш блог</h2>
                </div>
            </div>
        </div>
        <div class="row align-content-stretch">
            <?php foreach ($model as $article) { ?>
                <div class="d-flex col-lg-4 col-md-4 col-sm-12">
                    <article class="blog_item d-flex flex-column flex-grow-1">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="<?= $article->photo ?>" alt="<?= $article->title ?>">
                            <a href="#" class="blog_item_date">
                                <h3><?= Yii::$app->formatter->asDate($article->created_at, 'php:j') ?></h3>
                                <p><?= Yii::$app->formatter->asDate($article->created_at, 'php:M') ?></p>
                            </a>
                        </div>
                        <div class="blog_details flex-grow-1">
                            <a class="d-inline-block" href="<?= Url::to(['view', 'id' => $article->id]) ?>">
                                <h2><?= $article->title ?></h2>
                            </a>
                            <p><?= $article->description ?></p>
                            <ul class="blog-info-link">
                                <?php foreach ($article->articleCategorySets as $key => $articleSet) { ?>
                                    <li><a href="<?= Url::to(['index', 'filter_category_id' => $articleSet->article_category_id]); ?>"><i class="fa fa-hashtag"></i> <?= $articleSet->articleCategory->title ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </article>
                </div>
            <?php } ?>
        </div>
        <div class="row justify-content-center">
            <div class="room-btn">
                <a href="<?= Url::toRoute(['/blog'])?>" class="btn view-btn1">Посмотреть еще</a>
            </div>
        </div>
    </div>
</div>
