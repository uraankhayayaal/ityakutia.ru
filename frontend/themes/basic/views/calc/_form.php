<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin([
    'errorCssClass' => 'red-text',
]); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'percent', [
                'options' => ['class' => 'text-right'],
                'template' => '{label}<br>{error}',
            ])->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'percent', [
                'options' => ['class' => 'input-group'],
                'template' => '{input}<span class="input-group-text">%</span>',
            ])->textInput() ?>
        </div>
    </div>
    <div class="mt-2"></div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'periodOfMonths', [
                'options' => ['class' => 'text-right'],
                'template' => '{label}<br>{error}',
            ])->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'periodOfMonths', [
                'options' => ['class' => 'input-group'],
                'template' => '{input}<span class="input-group-text">Месяцев</span>',
            ])->textInput() ?>
        </div>
    </div>
    <div class="mt-2"></div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'startSum', [
                'options' => ['class' => 'text-right'],
                'template' => '{label}<br>{error}',
            ])->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'startSum', [
                'options' => ['class' => 'input-group'],
                'template' => '{input}<span class="input-group-text">₽</span>',
            ])->textInput() ?>
        </div>
    </div>
    <div class="mt-2"></div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'monthChargeSum', [
                'options' => ['class' => 'text-right'],
                'template' => '{label}<br>{error}',
            ])->textInput() ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'monthChargeSum', [
                'options' => ['class' => 'input-group'],
                'template' => '{input}<span class="input-group-text">₽</span>',
            ])->textInput() ?>
        </div>
    </div>
    <div class="mt-2"></div>

    <div class="form-group text-right">
        <?= Html::submitButton('Рассчитать', ['class' => 'button button-contactForm btn_1 boxed-btn']) ?>
    </div>
    
<?php ActiveForm::end(); ?>