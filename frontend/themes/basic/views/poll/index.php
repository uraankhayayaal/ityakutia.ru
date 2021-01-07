<?php

use yii\widgets\ListView;

$this->title = "Все опросы";
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?= $this->title ?></h1>
    <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
  </div>
</div>

<div class="container poll-index">
    <div class="row">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget){
                return $this->render('_item', [
                    'model' => $model,
                    'models' => $widget->dataProvider->models,
                    'key' => $key,
                    'index' => $index,
                ]);
            },
            'options' => ['tag' => false, 'class' => false, 'id' => false],
            'itemOptions' => [
                'tag' => false,
                'class' => 'news-item',
            ],
            'layout' => '{items}',
            'summaryOptions' => ['class' => 'summary grey-text'],
            'emptyTextOptions' => ['class' => 'empty grey-text'],
        ]) ?>
    </div>
</div>