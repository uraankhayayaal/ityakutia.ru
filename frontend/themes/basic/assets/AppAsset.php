<?php

namespace frontend\themes\basic\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/web/themes/basic';
    public $baseUrl = '@web/themes/basic';
    public $css = [
        'css/bootstrap.min.css',
        'css/owl.carousel.min.css',
        'css/flaticon.css',
        'css/slicknav.css',
        'css/animate.min.css',
        'css/magnific-popup.css',
        'css/fontawesome-all.min.css',
        'css/themify-icons.css',
        'css/slick.css',
        'css/nice-select.css',
        'css/style.css',
    ];
    public $js = [
        'js/vendor/modernizr-3.5.0.min.js',
        'js/vendor/jquery-1.12.4.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.slicknav.min.js',
        'js/owl.carousel.min.js',
        'js/slick.min.js',
        'js/wow.min.js',
        'js/animated.headline.js',
        'js/jquery.magnific-popup.js',
        'js/jquery.scrollUp.min.js',
        'js/jquery.nice-select.min.js',
        'js/jquery.sticky.js',
        // 'js/contact.js', // ?
        // 'js/jquery.form.js', // used only for contact.js
        // 'js/jquery.validate.min.js', // contact, price_rangs, ajaxchimp
        // 'js/mail-script.js', // ?
        // 'js/jquery.ajaxchimp.min.js', // ?
        // 'js/plugins.js',
        //'js/main.js',

        // downCount не используется
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
