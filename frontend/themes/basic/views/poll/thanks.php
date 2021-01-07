<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $is_voted ? 'Вы уже проголосовали в данном опросе!' : 'Спасибо что приняли участие в нашем опросе!';

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?= $this->title ?></h1>
    <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="poll" data-id="<?= $model->id ?>">
                <h3><?= $this->title ?></h3>
                <p><?= $model->title ?></p>
                <?= Html::a('Вернуться на страницу опросов', ['index'], ['class' => 'btn btn-primary mb-5']) ?>
                <br />
            </div>
        </div>
        <!-- <div class="col-12 col-md-4">
            <h3>Другие опросы</h3>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbdsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sdf gfdg sdfgjb lsdfkgjbdflkjg bfldkbgdfsjbv lfdbv ljrdblv raeugil ureg lidr </a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbdsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbddsk.f nsdFKJsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">jdf lsdfbjlv ;kfnvdfvdf vfd</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">df gdfsgfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbdsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
        </div> -->
    </div>
</div>