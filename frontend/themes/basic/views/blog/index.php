<?php

use ityakutia\blog\models\Article;
use ityakutia\blog\models\ArticleCategory;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Новости';

?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 gallery-hero d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><?= $this->title ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <?= ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemOptions' => ['class' => 'item'],
                                'itemView' => '_item',
                                'options' => ['tag' => false, 'class' => false, 'id' => false],
                                'itemOptions' => [
                                    'tag' => false,
                                    'class' => 'news-item',
                                ],
                                'layout' => '{items}<nav class="blog-pagination justify-content-center d-flex">{pager}</nav>',
                                'summaryOptions' => ['class' => 'summary grey-text'],
                                'emptyTextOptions' => ['class' => 'empty grey-text'],
                                'pager' => [
                                    'registerLinkTags' => true,
                                    'options' => ['class' => 'pagination'],
                                    'prevPageCssClass' => 'page-item',
                                    'nextPageCssClass' => 'page-item',
                                    'pageCssClass' => 'page-item',
                                    'nextPageLabel' => '<i class="ti-angle-right"></i>',
                                    'prevPageLabel' => '<i class="ti-angle-left"></i>',
                                    'linkOptions' => ['class' => 'page-link'],
                                    'disabledPageCssClass' => 'd-none',
                                ]
                            ]) ?>

                            <!-- <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <!-- <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Search Keyword'
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Search Keyword'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Search</button>
                                </form>
                            </aside> -->

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Категории</h4>
                                <ul class="list cat-list">
                                    <?php $categories = ArticleCategory::find()->where(['is_publish' => 1])->all(); ?>
                                    <?php foreach ($categories as $key => $category) { ?>
                                        <li>
                                            <a href="<?= Url::to(['index', 'filter_category_id' => $category->id]); ?>" class="d-flex">
                                                <p class="<?= Yii::$app->request->get('filter_category_id') == $category->id ? 'font-weight-bold' : ''; ?>"><?= $category->title ?> (<?= $category->getArticleCategorySets()->count(); ?>)</p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?= Url::to(['index']); ?>" class="d-flex">
                                            <p class="<?= Yii::$app->request->get('filter_category_id') == null ? 'font-weight-bold' : ''; ?>">Все</p>
                                        </a>
                                    </li>
                                </ul>
                            </aside>

                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Свежие новости</h3>
                                <?php $articles = Article::find()->where(['is_publish' => 1])->orderBy(['created_at' => SORT_DESC])->limit(4)->all(); ?>
                                <?php foreach ($articles as $key => $article) { ?>
                                <div class="media post_item">
                                    <img class="w-50" src="<?= $article->photo ?>" alt="<?= $article->title ?>">
                                    <div class="media-body">
                                        <a href="single-blog.html">
                                            <h3><?= $article->title ?></h3>
                                        </a>
                                        <p><?= Yii::$app->formatter->asDAtetime($article->created_at, 'medium')?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </aside>
                            <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </aside> -->


                            <!-- <aside class="single_sidebar_widget instagram_feeds">
                                <h4 class="widget_title">Instagram Feeds</h4>
                                <ul class="instagram_row flex-wrap">
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="/themes/basic/img/post/post_5.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="/themes/basic/img/post/post_6.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="/themes/basic/img/post/post_7.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="/themes/basic/img/post/post_8.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="/themes/basic/img/post/post_9.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="/themes/basic/img/post/post_10.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </aside> -->


                            <!-- <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>

                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                                </form>
                            </aside> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->