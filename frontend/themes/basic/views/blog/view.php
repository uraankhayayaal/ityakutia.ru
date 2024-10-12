<?php

use ityakutia\blog\models\ArticleCategory;
use yii\helpers\Url;

$this->title = $model->title ?? 'Статья';

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
    <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <img class="img-fluid" src="<?= $model->photo ?>" alt="<?= $model->title ?>">
                     </div>
                     <div class="blog_details">
                        <h2><?= $model->title ?></h2>
                        <ul class="blog-info-link mt-3 mb-4">
                           <?php foreach ($model->articleCategorySets as $key => $articleSet) { ?>
                              <li><a href="<?= Url::to(['index', 'filter_category_id' => $articleSet->article_category_id]); ?>"><i class="fa fa-hashtag"></i> <?= $articleSet->articleCategory->title ?></a></li>
                           <?php } ?>
                        </ul>
                        <div class="imperavi_wrapper">
                           <?= $model->content ?>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="navigation-top">
                     <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                           people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                           <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>
                        </div>
                        <ul class="social-icons">
                           <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                     </div>
                     <div class="navigation-area">
                        <div class="row">
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                              <div class="thumb">
                                 <a href="#">
                                    <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-left"></span>
                                 </a>
                              </div>
                              <div class="detials">
                                 <p>Prev Post</p>
                                 <a href="#">
                                    <h4>Space The Final Frontier</h4>
                                 </a>
                              </div>
                           </div>
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                              <div class="detials">
                                 <p>Next Post</p>
                                 <a href="#">
                                    <h4>Telescopes 101</h4>
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-right"></span>
                                 </a>
                              </div>
                              <div class="thumb">
                                 <a href="#">
                                    <img class="img-fluid" src="assets/img/post/next.png" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="blog-author">
                     <div class="media align-items-center">
                        <img src="assets/img/blog/author.png" alt="">
                        <div class="media-body">
                           <a href="#">
                              <h4>Harvard milan</h4>
                           </a>
                           <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                              our dominion twon Second divided from</p>
                        </div>
                     </div>
                  </div>
                  <div class="comments-area">
                     <h4>05 Comments</h4>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/comment/comment_1.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">Emilly Blunt</a>
                                       </h5>
                                       <p class="date">December 4, 2017 at 3:12 pm </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/comment/comment_2.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">Emilly Blunt</a>
                                       </h5>
                                       <p class="date">December 4, 2017 at 3:12 pm </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/comment/comment_3.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">Emilly Blunt</a>
                                       </h5>
                                       <p class="date">December 4, 2017 at 3:12 pm </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comment-form">
                     <h4>Leave a Reply</h4>
                     <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                        </div>
                     </form>
                  </div> -->
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
                        <h3 class="widget_title">Последние статьи</h3>
                        <?php foreach ($model->getMore(4) as $key => $article) { ?>
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
      <!--================ Blog Area end =================-->