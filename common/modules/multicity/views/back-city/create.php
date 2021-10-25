<?php

$this->title = 'Добавить город';

?>
<div class="city-create">
    <div class="row">
        <div class="col s12">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
