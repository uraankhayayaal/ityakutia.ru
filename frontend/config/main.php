<?php

use pantera\yii2\pay\sberbank\models\Invoice;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'name' => 'Разработка cайтов и мобильных приложений',
    'language' => 'ru',
    'bootstrap' => ['log', 'assetsAutoCompress', 'devicedetect'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'class' => \common\modules\multicity\components\CityRequest::class,
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'categories' => ['application'], //категория логов
                    'logFile' => '@runtime/logs/app.log', //куда сохранять
                    'logVars' => [], //не добавлять в лог глобальные переменные ($_SERVER, $_SESSION...)
                    'maxLogFiles' => 10
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => \common\modules\multicity\components\CityUrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',

                'blog' => 'blog/front/index',
                'blog/<slug>' => 'blog/front/view',

                '<slug>' => 'page/front/view',

                'sl/<id>' => 'smartlink/front/index',
                'bl/<id>' => 'smartlink/front/bio',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/' => '<module>/<controller>/<action>',
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@frontend/web/themes/basic',
                'baseUrl' => '@web/themes/basic',
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/basic/views',
                ],
            ],
        ],
        'assetsAutoCompress' => [
            'class'         => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled'                       => true,
            
            'readFileTimeout'               => 3,           //Time in seconds for reading each asset file
            
            'jsCompress'                    => true,        //Enable minification js in html code
            'jsCompressFlaggedComments'     => true,        //Cut comments during processing js
            
            'cssCompress'                   => true,        //Enable minification css in html code
            
            'cssFileCompile'                => true,        //Turning association css files
            'cssFileRemouteCompile'         => true,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
            'cssFileCompress'               => true,        //Enable compression and processing before being stored in the css file
            'cssFileBottom'                 => false,       //Moving down the page css files
            'cssFileBottomLoadOnJs'         => false,       //Transfer css file down the page and uploading them using js
            
            'jsFileCompile'                 => true,        //Turning association js files
            'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
            'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
            'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js
            
            'htmlCompress'                  => true,        //Enable compression html
            'noIncludeJsFilesOnPjax'        => true,        //Do not connect the js files when all pjax requests
            'htmlCompressOptions'           =>              //options for compressing output result
            [
                'extra' => false,        //use more compact algorithm
                'no-comments' => true   //cut all the html comments
            ],
        ],
        'devicedetect' => [
            'class' => 'alexandernst\devicedetect\DeviceDetect'
        ],
    ],
    'modules' => [
        'sberbank' => [
            'class' => 'pantera\yii2\pay\sberbank\Module',
            'components' => [
                'sberbank' => [
                    'class' => pantera\yii2\pay\sberbank\components\Sberbank::class,
                    
                    // время жизни инвойса в секундах (по умолчанию 20 минут - см. документацию Сбербанка)
                    // в этом примере мы ставим время 1 неделю, т.е. в течение этого времени покупатель может
                    // произвести оплату по выданной ему ссылке
                    'sessionTimeoutSecs' => 60 * 60 * 24 * 7,
                    
                    // логин api мерчанта
                    'login' => 'kinder_admin14-api',
                    
                    // пароль api мерчанта
                    'password' => 'kinder_admin14',
                    
                    // использовать тестовый режим (по умолчанию - нет)
                    'testServer' => true,
                ],
            ],
            
            // страница вашего сайта с информацией об успешной оплате
            'successUrl' => '/paySuccess',
            
            // страница вашего сайта с информацией о НЕуспешной оплате
            'failUrl' => '/payFail',
            
            // обработчик, вызываемый по факту успешной оплаты
            'successCallback' => function($invoice) {
                // какая-то ваша логика, например
                $order = \common\models\User::findOne($invoice->order_id); // \your\models\Order::findOne($invoice->order_id);
                $client = $order->getClient();
                $client->sendEmail('Зачислена оплата по вашему заказу №' . $order->id);
                // .. и т.д.
            },
    
            // обработчик, вызываемый по факту НЕуспешной оплаты
            'failCallback' => function($invoice) {
                // какая-то ваша логика, например
                $order = \common\models\User::findOne($invoice->order_id);
                $client = $order->getClient();
                $client->sendEmail('Ошибка при оплате по вашему заказу №' . $order->id);
                // .. и т.д.
            },
            
            // необязательный callback для генерации uniqid инвойса, необходим
            // в том случае, если по каким-то причинам используемый по умолчанию
            // формат `#invoice_id#-#timestamp#` вам не подходит
            'idGenerator' => function(Invoice $invoice, int $id) {
                // $id - это uniqid, сгенерированный по умолчанию
                // вместо него используем собственный алгоритм, например такой
                return '000-AAA-' . $invoice->id;
            },
        ],
        'smartlink' => [
            'class' => 'common\modules\smartlink\Module',
        ],
        'payment' => [
            'class' => 'common\modules\payment\Module',
        ],
        'api' => [
            'class' => 'common\modules\api\Module',
        ],
    ],
    'params' => $params,
];
