<?php

use yii\helpers\Url;

$this->title = $model->title;

?>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <h2 class="text-center"><?= $this->title ?></h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mb-5 page-view-content">
            <?php foreach ($model->getBlocks() as $key => $block) { ?>
                <?= $block ?>
            <?php } ?>
        </div>
        <!-- <div class="col-12 col-md-4 mb-5">
            <h3>Файлы и ссылки</h3>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="far fa-file"></i> Файл для скачиваия</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="fas fa-link"></i> Прикрепоенная ссылка организатора</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="far fa-file-pdf"></i> Положение мероприятия.pdf</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="far fa-file-word"></i> Заявкая участника</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="far fa-file-excel"></i> Журнал событий</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="fas fa-globe"></i> Официальный сайт спонсора</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="fab fa-youtube"></i> Ссылка на канал в ютубе</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="fab fa-instagram"></i></i> Страница в инстаграм</a></p>
            <p><a href="<?= Url::toRoute(['/news/view', 'id' => 1])?>"><i class="fab fa-vk"></i> Страница в вк</a></p>
        </div> -->
    </div>
</div>