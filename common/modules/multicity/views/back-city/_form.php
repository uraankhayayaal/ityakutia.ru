<?php

use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Lang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin([
        'errorCssClass' => 'red-text',
    ]); ?>

    <div class="row">
        <div class="col s12">
            <?= WCheckbox::widget(['model' => $model, 'attribute' => 'default']); ?>
        </div>
        <div class="col s12 m6">
            <?= $form->field($model, 'domain')->textInput(['maxlength' => true, 'value' => $model->domain ?? parse_url(Yii::$app->params['domain'], PHP_URL_HOST)]) ?>
        </div>
        <div class="col s12 m6">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col s12 m6">
            <?= $form->field($model, 'local')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col s12 m6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
    </div>
    <div class="fixed-action-btn">
        <?= Html::submitButton('<i class="material-icons">save</i>', [
            'class' => 'btn-floating btn-large waves-effect waves-light tooltipped',
            'title' => 'Сохранить',
            'data-position' => "left",
            'data-tooltip' => "Сохранить",
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
