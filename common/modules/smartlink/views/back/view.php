<?php

use common\modules\smartlink\models\Movement;
use common\modules\smartlink\models\Smartlink;
use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;

$this->title = $model->company . '/' . $model->app_name;
?>

<div class="banner-view">
    <div class="row">
        <div class="col s12">
            <?= GridView::widget([
                'tableOptions' => [
                    'class' => 'striped bordered my-responsive-table',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => SerialColumn::class],
                    [
                        'attribute' => 'ip',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->ip, ['/smartlink/back-ip/view-ip', 'ip' => $model->ip]);
                        },
                        'filter' =>[0 => 'Нет', 1 => 'Да'],
                    ],
                    // 'userAgent',
                    [
                        'attribute' => 'type',
                        'format' => 'raw',
                        'value' => function($model){
                            return '<div class="chip">'.Movement::TYPES[$model->type].'</div>';
                        },
                        'filter' => Movement::TYPES,
                    ],
                    'platform',
                    'country',
                    'region',
                    'city',
                    // 'coordinate',
                    // 'browser',
                    // 'port',
                    // 'host',
                    // 'url',
                    [
                        'attribute' => 'created_at',
                        'format' => ['datetime', 'short'],
                    ],
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
