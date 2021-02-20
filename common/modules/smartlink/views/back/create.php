<?php

$this->title = 'Новая умная ссылка';
?>
<div class="banner-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
