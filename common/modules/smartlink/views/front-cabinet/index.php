<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;

$this->title = 'Личные данные';

?>        
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?= $this->render('@frontend/themes/basic/views/cabinet/_nav'); ?>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">


                            <p>
                                <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => SerialColumn::class],
                                    ['class' => ActionColumn::class, 'template' => '{update}'],

                                    [
                                        'header' => 'Фото',
                                        'format' => 'raw',
                                        'value' => function($model) {
                                            return $model->photo ? '<img class="materialboxed" src="'.$model->photo.'" width="70">':'';
                                        }
                                    ],
                                    [
                                        'attribute' => 'link_hash',
                                        'headerOptions' => ['calss' => 'table-header-link'],
                                        'format' => 'raw',
                                        'value' => function($model){
                                            return Html::a($model->smartlink, $model->smartlink, ['target' => '_blank']);
                                        }
                                    ],
                                    [
                                        'attribute' => 'link_bio',
                                        'format' => 'raw',
                                        'value' => function($model){
                                            return Html::a($model->biolink, $model->biolink, ['target' => '_blank']);
                                        }
                                    ],
                                    // 'company',
                                    [
                                        'attribute' => 'app_name',
                                        'format' => 'raw',
                                        'value' => function($model){
                                            return Html::a($model->app_name, ['view', 'id' => $model->id]);
                                        }
                                    ],
                                    // [
                                    //     'attribute' => 'status',
                                    //     'format' => 'raw',
                                    //     'value' => function($model){
                                    //         return '<div class="chip">'.Smartlink::STATUSES[$model->status].'</div>';
                                    //     },
                                    //     'filter' => Smartlink::STATUSES,
                                    // ],
                                    // [
                                    //     'attribute' => 'is_js_redirect_for_mobile',
                                    //     'format' => 'boolean',
                                    //     // 'value' => function($model){
                                    //     //     return $model->is_js_redirect_for_mobile ? '<i class="material-icons green-text">done</i>' : '<i class="material-icons red-text">clear</i>';
                                    //     // },
                                    //     // 'filter' =>[0 => 'Нет', 1 => 'Да'],
                                    // ],
                                    // [
                                    //     'attribute' => 'start_at',
                                    //     'format' => 'datetime',
                                    // ],
                                    // [
                                    //     'attribute' => 'end_at',
                                    //     'format' => 'datetime',
                                    // ],
                                    ['class' => ActionColumn::class, 'template' => '{delete}'],
                                ],
                            ]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>