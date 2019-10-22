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
        'js/materialize.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
