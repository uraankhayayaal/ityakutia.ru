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
                <div class="col-lg-12">
                    <?= Html::a('Калькулятор финансовых целей', ['/calc/goal'])?>
               </div>
                <div class="col-lg-12">
                    <?= Html::a('Калькулятор по ипотеке и кредиту', ['/calc/credit'])?>
               </div>
            </div>
         </div>
    </section>