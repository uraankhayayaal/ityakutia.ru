<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=admin14.loc',
            'username' => 'admin14.loc',
            'password' => 'admin14.loc',
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
