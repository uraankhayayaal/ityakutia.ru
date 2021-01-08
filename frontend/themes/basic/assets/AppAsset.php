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
        // 'js/vendor/modernizr-3.5.0.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js", 'integrity' => "sha512-3n19xznO0ubPpSwYCRRBgHh63DrV+bdZfHK52b1esvId4GsfwStQNPJFjeQos2h3JwCmZl0/LgLxSKMAI55hgw==", 'crossorigin' => "anonymous"],
        // 'js/vendor/jquery-1.12.4.min.js',
        // 'js/popper.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js", 'integrity' => "sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==", 'crossorigin' => "anonymous"],
        // 'js/bootstrap.min.js',
        ['src' => "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", 'integrity' => "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl", 'crossorigin' =>"anonymous"],
        // 'js/jquery.slicknav.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js", 'integrity' => "sha512-FmCXNJaXWw1fc3G8zO3WdwR2N23YTWDFDTM3uretxVIbZ7lvnjHkciW4zy6JGvnrgjkcNEk8UNtdGTLs2GExAw==", 'crossorigin' => "anonymous"],
        // 'js/owl.carousel.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js", 'integrity' => "sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==", 'crossorigin' => "anonymous"],
        // 'js/slick.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js", 'integrity' => "sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==", 'crossorigin' => "anonymous"],
        // 'js/wow.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js", 'integrity' => "sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==", 'crossorigin' => "anonymous"],
        'js/animated.headline.js',
        // 'js/jquery.magnific-popup.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js", 'integrity' => "sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==", 'crossorigin' => "anonymous"],
        // 'js/jquery.scrollUp.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js", 'integrity' => "sha512-gAHP1RIzRzolApS3+PI5UkCtoeBpdxBAtxEPsyqvsPN950Q7oD+UT2hafrcFoF04oshCGLqcSgR5dhUthCcjdA==", 'crossorigin' => "anonymous"],
        // 'js/jquery.nice-select.min.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js", 'integrity' => "sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==", 'crossorigin' => "anonymous"],
        // 'js/jquery.sticky.js',
        ['src' => "https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js", 'integrity' => "sha512-QABeEm/oYtKZVyaO8mQQjePTPplrV8qoT7PrwHDJCBLqZl5UmuPi3APEcWwtTNOiH24psax69XPQtEo5dAkGcA==", 'crossorigin' => "anonymous"],
        // 'js/contact.js', // ?
        // 'js/jquery.form.js', // used only for contact.js
        // 'js/jquery.validate.min.js', // contact, price_rangs, ajaxchimp
        // 'js/mail-script.js', // ?
        // 'js/jquery.ajaxchimp.min.js', // ?
        // 'js/plugins.js',
        'js/main2.js',

        // downCount не используется
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
