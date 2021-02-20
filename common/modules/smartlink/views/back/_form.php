<?php

use common\modules\smartlink\models\Smartlink;
use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use uraankhayayaal\materializecomponents\imgcropper\Cropper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div class="banner-form">

    <?php $form = ActiveForm::begin([
        'errorCssClass' => 'red-text',
    ]); ?>


    <div class="row">
        <div class="col s12 m6 l6">
            <?= $form->field($model,'status')->dropdownlist(Smartlink::STATUSES); ?>
        </div>
        <div class="col s12 m6 l6">
            <?= Html::label($model->getAttributeLabel('link_hash'), '', ['class' => 'label']) ?>
            <?= Html::input('text', '', $model->link_hash, ['disabled' => 'disabled']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 l6">
            <?= $form->field($model, 'link_ios')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col s12 m6 l6">
            <?= $form->field($model, 'link_android')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 l6">
            <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col s12 m6 l6">
            <?= $form->field($model, 'app_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12 m4 l4">
            <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col s12 m4 l4">
            <?= $form->field($model, 'start_at')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col s12 m4 l4">
            <?= $form->field($model, 'end_at')->textInput(['maxlength' => true]) ?>
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
