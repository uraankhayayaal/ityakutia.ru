<?php

use ityakutia\blog\models\Article;
use ityakutia\blog\models\ArticleCategory;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Калькулятор по ипотеке';

Yii::$app->params['meta_keywords']['content'] = 'Калькулятор, финансовый, ипотека, накопления, расчитать, прибыль';
Yii::$app->params['meta_description']['content'] = 'Расчитать ежемесячную оплату и переплату по ипотеке, введите первоначальный взнос, сумму кредита, ставку и период';

?>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="/calc/index">Финансовые калькуляторы</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ипотека</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="hero-cap text-center">
                    <h1><?= $this->title ?></h1>
                </div>
            </div>
        </div>
    </div>
   
    <!-- <section class="blog_area single-post-area section-padding"> -->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-12 posts-list">

                    <?php Pjax::begin([
                        'id' => 'calcResult',
                    ]); ?>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="comment-form">
                                <?= $this->render('_form_credit', [
                                    'model' => $model,
                                ])?>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="single-post">
                                <div class="blog_details">
                                    <h3>Расчет</h3>
                                    <table class="table" style="font-size: 0.8rem;">
                                        <tbody>
                                            <tr>
                                                <td>Сумма кредита</td>
                                                <td><?= Yii::$app->formatter->asCurrency($model->credit) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Ежемесячный платеж</th>
                                                <th><?= Yii::$app->formatter->asCurrency($model->monthlyPayment) ?></th>
                                            </tr>
                                            <tr>
                                                <td>Всего выплат</td>
                                                <td><?= Yii::$app->formatter->asCurrency($model->totalPayment) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Переплата</td>
                                                <th><?= Yii::$app->formatter->asCurrency($model->pereplata) ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="single-post">
                                <div class="blog_details">
                                    <!-- <p>
                                        <button class="btn" type="button" data-toggle="collapse" data-target="#paymentCalendar" aria-expanded="false" aria-controls="paymentCalendar">
                                            График платежей
                                        </button>
                                    </p>
                                    <div class="collapse" id="paymentCalendar"> -->
                                        <h3>График платежей</h3>
                                        <table class="table" style="font-size: 0.8rem;">
                                            <thead>
                                                <tr>
                                                    <th>Месяцы</th>
                                                    <th>Платеж</th>
                                                    <th>Проценты</th>
                                                    <th>Основной долг</th>
                                                    <th>Остаток долга</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($model->calendar as $index => $month) { ?>
                                                    </tr>
                                                        <td><?= ++$index ?></td>
                                                        <td><?= Yii::$app->formatter->asCurrency($month['payment']) ?></td>
                                                        <td><?= Yii::$app->formatter->asCurrency($month['procenty']) ?></td>
                                                        <td><?= Yii::$app->formatter->asCurrency($month['osnovnoyDolg']) ?></td>
                                                        <td><?= Yii::$app->formatter->asCurrency($month['ostatokDolga']) ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php Pjax::end(); ?>
                </div>
            </div>
         </div>
    </section>