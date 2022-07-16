<?php

use common\modules\barcode\models\Barcode;
use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
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
            <h1><?= $model->code; ?></h1>
            <p><?= Barcode::TYPES[$model->type]; ?></p>
            <p><img class="mw-100" src="<?= $model->url ?>" alt="<?= $model->type; ?> - <?= $model->code; ?>"></p>
        </div>
    </div>
</div>
