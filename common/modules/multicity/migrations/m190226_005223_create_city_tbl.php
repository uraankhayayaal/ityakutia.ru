<?php

use yii\db\Migration;

/**
 * Class m190226_005223_create_city_tbl
 */
class m190226_005223_create_city_tbl extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
    
        $this->createTable('{{%ext_city}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->notNull(),
            'local' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'default' => $this->boolean()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
    
        $this->batchInsert('ext_city', ['url', 'local', 'name', 'default', 'updated_at', 'created_at'], [
            ['kazan', 'ru-RU', 'Казань', 0, time(), time()],
            ['yakutsk', 'ru-RU', 'Якутск', 1, time(), time()],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%ext_city}}');
    }
}
