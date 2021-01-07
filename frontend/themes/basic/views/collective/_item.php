<?php

use yii\helpers\Url;

?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
    <a href="<?= Url::to(['view', 'id' => $id])?>">
        <div class="text-center">
            <img class="w-100" src="https://picsum.photos/id/<?= $id ?>/120/160/" alt="collective">
            <h3 class="fio mt-3">Фамилия Имя Отчество</h3>
            <p class="about mb-3">Генеральный директор</p>
        </div>
    </a>
</div>