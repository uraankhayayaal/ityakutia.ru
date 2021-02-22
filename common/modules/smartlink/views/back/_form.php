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
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#tab_smartlink">Smart Link</a></li>
                <li class="tab col s3"><a href="#tab_biolink">Bio Link</a></li>
            </ul>
        </div>
        <div id="tab_smartlink" class="col s12">
            <div class="row">
                <div class="col s12 m4 l4">
                    <?= $form->field($model,'status')->dropdownlist(Smartlink::STATUSES); ?>
                </div>
                <div class="col s12 m4 l4">
                    <?= WCheckbox::widget(['model' => $model, 'attribute' => 'is_js_redirect_for_mobile']); ?>
                </div>
                <div class="col s12 m4 l4">
                    <?= Html::label($model->getAttributeLabel('link_hash'), '', ['class' => 'label']) ?>
                    <?= Html::input('text', '', $model->link_hash, ['disabled' => 'disabled']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_ios')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_android')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_web')->textInput(['maxlength' => true]) ?>
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

            <div class="row">
                <div class="col s12 m12 l12">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l12">
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l12">
                    <?= $form->field($model, 'photo')->widget(Cropper::class, [
                        'aspectRatio' => 1080/1080,
                        'maxSize' => [1080, 1080, 'px'],
                        'minSize' => [256, 256, 'px'],
                        'startSize' => [100, 100, '%'],
                        'uploadUrl' => Url::to(['/smartlink/back/uploadImg']),
                    ]); ?>
                    <small>Your upload img have to has size: 1080x1080 px</small>
                </div>
            </div>
        </div>
        <div id="tab_biolink" class="col s12">

            <div class="row">
                <div class="col s12 m4 l4">
                    <?= Html::label($model->getAttributeLabel('link_bio'), '', ['class' => 'label']) ?>
                    <?= Html::input('text', '', $model->link_bio, ['disabled' => 'disabled']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_instagram')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_vk')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_youtube')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_facebook')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_whatsapp')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_twitter')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_phone')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col s12 m12 l4">
                    <?= $form->field($model, 'link_email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
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
