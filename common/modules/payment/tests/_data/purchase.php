<?php

use Faker\Factory;

$data = [];
$faker = Factory::create();
$params = require('_config.php');

for ($i = 0; $i < $params['purchaseCount']; $i++) {
    $data[] = [
        'user_id' => null,
        'order_id' => ($i + 1) . '-' . time(),
        'sum' => round(rand(100, 25000), 2),
        'status' => 'I',
        'created_at' => new \yii\db\Expression('NOW()'),
        'pay_time' => new \yii\db\Expression('NOW()'),
        'method' => 'sberbank',
        'orderId' => 'order_' . ($i + 1) . '-' . time(),
        'remote_id' => ($i + 1),
        'data' => '{"data":[{"asd":"ads","asdasd":"asdasd"}]}',
        'url' => null,
    ];
}

return $data;