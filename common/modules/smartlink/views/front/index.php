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
    
<h1>Error</h1>
<p><?= $error ?></p>