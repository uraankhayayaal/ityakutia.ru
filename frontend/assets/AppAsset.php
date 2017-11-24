<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'css/materialize.min.css',
        'css/app.css',
        'css/color.css',
    ];
    public $js = [
        'js/materialize.min.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
