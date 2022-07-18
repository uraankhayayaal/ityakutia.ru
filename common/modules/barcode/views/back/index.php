<?php

use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Штрихкоды';
?>
<div class="barcode-index">
    <div class="row">
        <div class="col s12">
            <p>
                <?php // Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Импорт', ['import'], ['class' => 'btn btn-success']) ?>
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
                    [
                        'attribute' => 'photo',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::img($model->photo, ['style' => 'width:70px;', 'alt' => $model->code]);
                        },
                    ],
                    [
                        'attribute' => 'category',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a('<p>Категория: '.$model->category.'</p><p>Наименование: '.$model->name.'</p><p>Артикул: '.$model->productArticule.'</p>', ['view', 'id' => $model->id]);
                        },
                    ],
                    'imtID',
                    'uid',
                    [
                        'attribute' => 'code',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->code, ['view', 'id' => $model->id]) . "<br />";
                        },
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
