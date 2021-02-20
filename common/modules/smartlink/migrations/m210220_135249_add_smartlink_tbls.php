<?php

use yii\db\Migration;

/**
 * Class m210220_135249_add_smartlink_tbls
 */
class m210220_135249_add_smartlink_tbls extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('smartlink', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'link_ios' => $this->string()->notNull(),
            'link_android' => $this->string()->notNull(),
            'link_hash' => $this->string()->notNull()->unique(),
            'company' => $this->string()->notNull(),
            'app_name' => $this->string()->notNull(),
            'region' => $this->string(),
            'start_at' => $this->integer(),
            'end_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('smartlink_movement', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(), 
            'userAgent' => $this->text(),
            'platform' => $this->integer()->notNull(),
            'browser' => $this->text(),
            'port' => $this->integer(),
            'host' => $this->string(),
            'url' => $this->string(),
            'smartlink_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('smartlink_movement-smartlink-fkey','smartlink_movement','smartlink_id','smartlink','id','CASCADE','CASCADE');
        $this->createIndex('smartlink_movement-smartlink-idx','smartlink_movement','smartlink_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('smartlink_movement-smartlink-fkey','smartlink_movement');
        $this->dropIndex('smartlink_movement-smartlink-idx','smartlink_movement');

        $this->dropTable('smartlink_movement');
        
        $this->dropTable('smartlink');
    }
}
