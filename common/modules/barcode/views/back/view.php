<?php

use common\modules\barcode\models\BarcodeForm;
use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Штрихкод /' . $model->code;

?>
<div class="barcode-index">
    <div class="row">
        <div class="col s12">
            <h5>Штрих код: <?= $model->code; ?></h5>
        </div>
        <div class="col s4 m3 l2">
            <p><img style="width:100%;" src="<?= $model->photo; ?>" alt="<?= $model->code; ?>"></p>
        </div>
        <div class="col s8 m9 l10">
            <?= Html::beginForm(['update-product', 'id' => $model->id], 'post') ?>
                <div class="row">
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($newNameForm, 'productName', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $newNameForm, 'productName', ['class' => '', 'value' => $model->name]) ?>
                        <?= Html::error($newNameForm, 'productName', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($newNameForm, 'countryProduction', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $newNameForm, 'countryProduction', ['class' => '', 'value' => $model->countryProduction]) ?>
                        <?= Html::error($newNameForm, 'countryProduction', ['class' => 'error']) ?>
                    </div>
                </div>
                <?= Html::submitButton('Изменить название', ['class' => 'btn submit']) ?>
            <?= Html::endForm() ?>
            <p><span class="grey-text">Штрихкод:</span> <?= $model->code; ?></p>
            <p><span class="grey-text">Артикул:</span> <?= $model->vendorCode; ?></p>
            <p><span class="grey-text">Размер товара:</span> <?= $model->size; ?></p>
            <p><span class="grey-text">Цвет:</span> <?= $model->color; ?></p>
            <p><span class="grey-text">Производитель:</span> <?= $model->brend; ?></p>
        </div>

        <div class="col s12">
            <?= Html::beginForm(['pdf-ticket', 'id' => $model->id], 'post') ?>
                <div class="row">
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'code', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'code', ['class' => '', 'value' => $model->code]) ?>
                        <?= Html::error($form, 'code', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'type', ['class' => 'label']) ?>
                        <?= Html::activeDropDownList($form, 'type', BarcodeForm::TYPES) ?>
                        <?= Html::error($form, 'type', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'format', ['class' => 'label']) ?>
                        <?= Html::activeDropDownList($form, 'format', BarcodeForm::FORMATS) ?>
                        <?= Html::error($form, 'format', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'barcodeSize', ['class' => 'label']) ?>
                        <?= Html::activeDropDownList($form, 'barcodeSize', BarcodeForm::BC_SIZES_DROPDOWN) ?>
                        <?= Html::error($form, 'barcodeSize', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'articule', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'articule', ['class' => '', 'value' => $model->vendorCode]) ?>
                        <?= Html::error($form, 'articule', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'color', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'color', ['class' => '', 'value' => $model->color]) ?>
                        <?= Html::error($form, 'color', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'size', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'size', ['class' => '', 'value' => $model->size]) ?>
                        <?= Html::error($form, 'size', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'name', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'name', ['class' => '', 'value' => $model->name]) ?>
                        <?= Html::error($form, 'name', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'company', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'company', ['class' => '', 'value' => $model->brend]) ?>
                        <?= Html::error($form, 'company', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'count', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'count', ['class' => '', 'value' => $form->count]) ?>
                        <?= Html::error($form, 'count', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12 m6 l4">
                        <?= Html::activeLabel($form, 'fontSize', ['class' => 'label']) ?>
                        <?= Html::activeInput('text', $form, 'fontSize', ['class' => '', 'value' => $form->fontSize]) ?>
                        <?= Html::error($form, 'fontSize', ['class' => 'error']) ?>
                    </div>
                    <div class="col s12">
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'is_articule']); ?>
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'is_color']); ?>
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'is_size']); ?>
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'is_name']); ?>
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'is_company']); ?>
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'is_border']); ?>
                        <?= WCheckbox::widget(['model' => $form, 'attribute' => 'eac']); ?>
                    </div>
                </div>
                <?= Html::submitButton('Сгенерировать наклейку', ['class' => 'btn submit']) ?>
            <?= Html::endForm() ?>
        </div>
        <?php /* <div class="col s12">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings_ethernet</i>Json data</div>
                    <div class="collapsible-body"><pre><?= $model->data; ?></pre></div>
                </li>
            </ul>
        </div> */ ?>
    </div>
</div>
