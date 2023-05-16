<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Калькуляторы';

Yii::$app->params['meta_keywords']['content'] = 'Калькуляторы для расчета полезных показателей';
Yii::$app->params['meta_description']['content'] = 'Воспользуйтесь калькуляторами для определения нужных показателей';

?>

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
   
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-6">
               <a href="<?= Url::toRoute(['/calc/goal'])?>">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Калькулятор финансовых целей</h5>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-6">
               <a href="<?= Url::toRoute(['/calc/credit'])?>">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Калькулятор по ипотеке</h5>
                     </div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </section>