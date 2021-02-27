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
<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU" type="text/javascript"></script>
<div class="banner-view">
    <div class="row">
        <div class="col s12">
            <p></p>
            <div id="map" style="width: 100%; height: 550px;"></div>
            <?php
                $points = Movement::find()->select(['coordinate'])->where(['smartlink_id' => $model->id])->all();
                $array = [];
                foreach ($points as $key => $point) {
                    if (is_double(json_decode($point->coordinate, true)["lat"]) && json_decode($point->coordinate, true)["lng"]){
                        $array[] = [json_decode($point->coordinate, true)["lat"], json_decode($point->coordinate, true)["lng"]];
                    }
                }
                $coords = json_encode($array);
                $this->registerJs("
                    ymaps.ready(function () {  
                        
                        var myMap = new ymaps.Map('map', {
                            center: [62.0397, 129.7422],
                            zoom: 4
                        });

                        var coords = $coords;

                        // var myCollection = new ymaps.GeoObjectCollection();
                        var myGeoObjects = [];
                        for (var i = 0; i<coords.length; i++) {
                            // myCollection.add(new ymaps.Placemark(coords[i]));
                            myGeoObjects[i] = new ymaps.GeoObject({
                                geometry: {
                                type: 'Point',
                                coordinates: coords[i]
                                }
                            });
                        }

                        var myClusterer = new ymaps.Clusterer();
                        myClusterer.add(myGeoObjects);

                        myMap.geoObjects.add(myClusterer);

                    });
                
                ",$this::POS_READY);
            ?>
            <script>
                
            </script>
        </div>
    </div>
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
                    'coordinate',
                    // 'browser',
                    // 'port',
                    // 'host',
                    // 'url',
                    'created_at',
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
