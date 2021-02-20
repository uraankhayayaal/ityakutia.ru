<?php
    Yii::$app->params['meta_description']['content'] = $model->description;
    Yii::$app->params['meta_keywords']['content'] = $model->description;

    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => $model->description,
    ]);
    $this->registerMetaTag([
        'name' => 'description',
        'content' => $model->description,
    ]);

    $this->registerMetaTag([
        'property' => 'og:title',
        'content' => $model->title,
    ]);
    $this->registerMetaTag([
        'property' => 'og:description',
        'content' => $model->description,
    ]);
    $this->registerMetaTag([
        'property' => 'og:image',
        'content' => $model->photo,
    ]);
    $this->registerMetaTag([
        'property' => 'og:image:alt',
        'content' => $model->title,
    ]);
    $this->registerMetaTag([
        'property' => 'og:url',
        'content' => $model->link_web,
    ]);

?>

<div class="container">
    <p><img src="<?= $model->photo ?>" alt="<?= $model->title ?>" style="max-width:300px;"></p>
    <h1><?= $model->title ?></h1>
    <p><?= $model->description ?></p>
</div>

<script>
    window.setTimeout(() => {
        location.href = "<?= $model->link_web; ?>";
    }, 200);
</script>