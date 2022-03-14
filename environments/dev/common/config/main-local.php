<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=admin14.ru',
            'username' => 'admin14.ru',
            'password' => 'admin14.ru',
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
                'password' => '*****',
                'port' => '465',
            ],
        ],
    ],
];
