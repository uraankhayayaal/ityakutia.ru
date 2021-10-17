<?php

use yii\db\Migration;

class m161021_232200_create_purchase_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('purchase', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),
            'order_id' => $this->integer()->null(),
            'sum' => $this->decimal(10, 2)->notNull(),
            'status' => $this->string(1)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'pay_time' => $this->timestamp()->null(),
            'method' => $this->string(15)->notNull(),
            'orderId' => $this->string()->null(),
            'remote_id' => $this->integer()->null(),
            'data' => 'JSON NULL DEFAULT NULL',
            'url' => $this->string()->null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('purchase');
    }
}
