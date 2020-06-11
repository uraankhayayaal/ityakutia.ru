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
    'name' => 'Admin14 - Разработка Сайтов и мобильных приложений',
    'language' => 'ru',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
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
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '/'                                 => 'site/index',
                'yakutskmaster' => 'site/yakutskmaster'
            ],
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
    ],
    'params' => $params,
];
