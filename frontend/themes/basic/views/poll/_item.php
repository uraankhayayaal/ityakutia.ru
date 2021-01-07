<?php

use yii\helpers\Url;

?>

<div class="col-12 col-sm-6 col-md-4">
    <a href="<?= Url::toRoute(['/poll/' . $model->slug]) ?>">
        <div class="card my-4">
            <img class="card-img-top" src="<?= $model->photo ? $model->photo : '/images/nophoto.jpg' ?>" alt="<?= $model->title ?>">
            <!-- <div class="card-stat d-flex justify-content-around">
                <div>
                    <p><i class="fas fa-eye"></i></p>
                    <p>341</p>
                </div>
                <div>
                    <p><i class="fas fa-poll"></i></p>
                    <p>137</p>
                </div>
                <div>
                    <p><i class="fas fa-share"></i></p>
                    <p>41</p>
                </div>
            </div> -->
            <div class="card-body">
                <h5 class="card-title"><?= $model->title ?></h5>
            </div>
        </div>
    </a>
</div>