<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'css/materialize.css',
        'css/app.css',
    ];
    public $js = [
        // 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
        'js/materialize.js',
        'js/app.js',
        'js/Sortable.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
