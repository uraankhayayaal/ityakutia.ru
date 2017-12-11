<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=admin14',
            'username' => 'admin14',
            'password' => 'admin14',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'ssl://smtp.yandex.ru',
                'username' => 'uraankhayayaal@yandex.ru',
                'password' => '}{Uy2016',
                // 'username' => 'manager@admin14.ru',
                // 'password' => 'golem130',
                'port' => '465',
                //'encryption' => 'SSL',
            ],
        ],
    ],
];
