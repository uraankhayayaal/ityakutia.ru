<?php
    Yii::$app->params['meta_description']['content'] = $model->desctipition;
    Yii::$app->params['meta_keywords']['content'] = $model->desctipition;

    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => $model->desctipition,
    ]);
    $this->registerMetaTag([
        'name' => 'description',
        'content' => $model->desctipition,
    ]);

    $this->registerMetaTag([
        'property' => 'og:title',
        'content' => $model->title,
    ]);
    $this->registerMetaTag([
        'property' => 'og:description',
        'content' => $model->desctipition,
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
    
<h1><?= $model->title ?></h1>
<p><?= $model->description ?></p>

<script>
    window.onload = (event) => {
        location.href = <?= $model->link_web; ?>;
    };
</script>