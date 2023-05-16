<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true],
    ]); ?>

        <div class="row">
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'percent', [
                    'options' => ['class' => 'text-right font-weight-light'],
                    'template' => '{label}',
                    'labelOptions' => ['style' => 'font-size: 0.8rem;'],
                ])->textInput() ?>
            </div>
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'percent', [
                    'options' => ['class' => 'input-group'],
                    'template' => '{input}<span class="input-group-text">%</span>',
                ])->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'percent', [
                    'options' => ['class' => 'text-right text-danger'],
                    'template' => '{error}',
                ])->textInput() ?>
            </div>
        </div>
        <div class="mt-2"></div>
        <div class="row">
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'totalSum', [
                    'options' => ['class' => 'text-right font-weight-light'],
                    'template' => '{label}',
                    'labelOptions' => ['style' => 'font-size: 0.8rem;'],
                ])->textInput() ?>
            </div>
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'totalSum', [
                    'options' => ['class' => 'input-group'],
                    'template' => '{input}<span class="input-group-text">%</span>',
                ])->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'totalSum', [
                    'options' => ['class' => 'text-right text-danger'],
                    'template' => '{error}',
                ])->textInput() ?>
            </div>
        </div>
        <div class="mt-2"></div>
        <div class="row">
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'startSum', [
                    'options' => ['class' => 'text-right font-weight-light'],
                    'template' => '{label}',
                    'labelOptions' => ['style' => 'font-size: 0.8rem;'],
                ])->textInput() ?>
            </div>
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'startSum', [
                    'options' => ['class' => 'input-group'],
                    'template' => '{input}<span class="input-group-text">₽</span>',
                ])->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'startSum', [
                    'options' => ['class' => 'text-right text-danger'],
                    'template' => '{error}',
                ])->textInput() ?>
            </div>
        </div>
        <div class="mt-2"></div>
        <div class="row">
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'periodOfYears', [
                    'options' => ['class' => 'text-right font-weight-light'],
                    'template' => '{label}',
                    'labelOptions' => ['style' => 'font-size: 0.8rem;'],
                ])->textInput() ?>
            </div>
            <div class="col-6 col-md-12 col-lg-6">
                <?= $form->field($model, 'periodOfYears', [
                    'options' => ['class' => 'input-group'],
                    'template' => '{input}<span class="input-group-text">лет</span>',
                ])->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'periodOfYears', [
                    'options' => ['class' => 'text-right text-danger'],
                    'template' => '{error}',
                ])->textInput() ?>
            </div>
        </div>
        <div class="mt-2"></div>

        <div class="form-group text-right">
            <?= Html::submitButton('Рассчитать', ['class' => 'btn']) ?>
        </div>
        
    <?php ActiveForm::end(); ?>