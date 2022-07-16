<?php

use yii\console\controllers\MigrateController;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
$frontend = require(__DIR__ . '/../../frontend/config/main.php');
$common = require(__DIR__ . '/../../common/config/params.php');
$frontend['components']['urlManager']['baseUrl'] = $common['domain'];

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => MigrateController::class,
            'migrationPath' => [
                '@console/migrations',
                '@yii/rbac/migrations',
                '@vendor/it-yakutia/yii2-blog/src/migrations',
                '@vendor/uraankhayayaal/yii2-page/src/migrations',
                '@vendor/it-yakutia/yii2-blog/src/migrations',
                '@vendor/it-yakutia/yii2-gallery/src/migrations',
                '@vendor/it-yakutia/yii2-setting/src/migrations',
                '@vendor/it-yakutia/yii2-navigation/src/migrations',
                '@vendor/it-yakutia/yii2-poll/src/migrations',
                '@vendor/it-yakutia/yii2-partner/src/migrations',
                '@vendor/it-yakutia/yii2-collective/src/migrations',
                '@vendor/it-yakutia/yii2-banner/src/migrations',
                '@common/modules/smartlink/migrations',
                '@common/modules/payment/migrations',
                '@common/modules/multicity/migrations',
                '@common/modules/barcode/migrations',
            ],
        ],
        'sitemap' => [
            'class' => 'demi\sitemap\SitemapController',
            'modelsPath' => '@console/models/sitemap', // Sitemap-data models directory
            'modelsNamespace' => 'console\models\sitemap', // Namespace in [[modelsPath]] files
            'savePathAlias' => '@frontend/web', // Where would be placed the generated sitemap-files
            'sitemapFileName' => 'sitemap.xml', // Name of main sitemap-file in [[savePathAlias]] directory
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => $frontend['components']['urlManager'],
    ],
    'params' => $params,
];
