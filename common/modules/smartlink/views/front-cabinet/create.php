<?php

$this->title = 'Новая умная ссылка';
?>
<div class="banner-create">
    <div class="row">
        <div class="col-12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
