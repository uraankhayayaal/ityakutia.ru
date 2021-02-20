<?php

$this->title = 'Редактирование: ' . $model->company . '/' . $model->app_name;
?>
<div class="banner-update">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
