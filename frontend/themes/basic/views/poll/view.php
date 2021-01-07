<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?= $this->title ?></h1>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">
                <img class="card-img-top" src="<?= $model->photo ? $model->photo : '/images/nophoto.jpg' ?>" alt="<?= $model->title ?>">
                </div>
                <div class="col-12">
                    <time datetime="<?= Yii::$app->formatter->asDatetime(time()) ?>"><?= Yii::$app->formatter->asDatetime(time(), 'short') ?></time>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="poll" data-id="<?= $model->id ?>">
                        <form action="#">
                            <?php foreach ($model->pollQuestions as $key => $question) { ?>
                                <div class="question my-3" data-id="<?= $question->id ?>">
                                    <h3><?= ( $key + 1 ) . ' ' . $question->title ?></h3>
                                    <div class="options answers ml-5">
                                        <?php foreach ($question->pollOptions as $key => $option) { ?>
                                            <div class="option" data-id="<?= $option->id ?>">
                                                <?php if($question->is_multi_select) { ?>    
                                                    <input id="<?= $model->id ?>-<?= $question->id ?>-<?= $option->id ?>" name="answer[<?= $model->id ?>][<?= $question->id ?>][<?= $option->id ?>]" type="checkbox">
                                                <?php }else{ ?>
                                                    <input id="<?= $model->id ?>-<?= $question->id ?>-<?= $option->id ?>" name="answer[<?= $model->id ?>][<?= $question->id ?>][radio]" value="<?= $option->id ?>" type="radio">
                                                <?php } ?>
                                                <label for="<?= $model->id ?>-<?= $question->id ?>-<?= $option->id ?>"><?= $option->title ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?= Html::hiddenInput('id', $model->id) ?>
                            
                            <p><input type="submit" value="Отправить" class="btn btn-primary my-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <!-- <h3>Другие опросы</h3>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbdsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sdf gfdg sdfgjb lsdfkgjbdflkjg bfldkbgdfsjbv lfdbv ljrdblv raeugil ureg lidr </a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbdsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbddsk.f nsdFKJsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">jdf lsdfbjlv ;kfnvdfvdf vfd</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">df gdfsgfk jdsvfkds</a>
            <a href="<?= Url::toRoute(['/poll2/view', 'id' => 1])?>">sjkdfg dsgfjbdsjfbsdjfhb ksdjhf sjdhfbksjdhfk jdsvfkds</a> -->
        </div>
    </div>
</div>