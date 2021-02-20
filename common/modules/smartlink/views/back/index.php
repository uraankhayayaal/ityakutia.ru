<?php

use common\modules\smartlink\models\Smartlink;
use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Умные ссылки';
?>
<div class="banner-index">
    <div class="row">
        <div class="col s12">
            <p>
                <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="fixed-action-btn">
                <?= Html::a('<i class="material-icons">add</i>', ['create'], [
                    'class' => 'btn-floating btn-large waves-effect waves-light tooltipped',
                    'title' => 'Сохранить',
                    'data-position' => "left",
                    'data-tooltip' => "Добавить",
                ]) ?>
            </div>

            <?= GridView::widget([
                'tableOptions' => [
                    'class' => 'striped bordered my-responsive-table',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => SerialColumn::class],
                    ['class' => MaterialActionColumn::class, 'template' => '{update}'],

                    [
                        'attribute' => 'link_hash',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->smartlink, $model->smartlink, ['target' => '_blank']);
                        }
                    ],
                    'company',
                    [
                        'attribute' => 'app_name',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->app_name, ['view', 'id' => $model->id]);
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($model){
                            return '<div class="chip">'.Smartlink::STATUSES[$model->status].'</div>';
                        },
                        'filter' => Smartlink::STATUSES,
                    ],
                    [
                        'attribute' => 'start_at',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'end_at',
                        'format' => 'datetime',
                    ],
                    ['class' => MaterialActionColumn::class, 'template' => '{delete}'],
                ],
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination center'],
                    'prevPageCssClass' => '',
                    'nextPageCssClass' => '',
                    'pageCssClass' => 'waves-effect',
                    'nextPageLabel' => '<i class="material-icons">chevron_right</i>',
                    'prevPageLabel' => '<i class="material-icons">chevron_left</i>',
                ],
            ]); ?>
        </div>
    </div>
</div>
