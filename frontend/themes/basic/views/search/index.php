<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

?>

<div class="search-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php $form = ActiveForm::begin([
                    'errorCssClass' => 'red-text',
                    'action' => Url::to(['/search/index']),
                    'method' => 'get',
                ]); ?>
                    <?= $form->field($searchModel, 'word')->textInput(['maxlength' => true]) ?>
                    <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <ol class="">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => ''],
                'itemView' => '_item',
                'options' => ['tag' => false, 'class' => false, 'id' => false],
                'itemOptions' => [
                    'tag' => false,
                    'class' => '',
                ],
                'layout' => '{items}',
                'summaryOptions' => ['class' => 'summary grey-text'],
                'emptyTextOptions' => ['class' => 'empty grey-text'],
            ]) ?>
        </ol>
    </div>
</div>

