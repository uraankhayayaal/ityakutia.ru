<?php

use yii\db\Migration;

/**
 * Class m210220_135249_add_barcode_tbl
 */
class m210220_135249_add_barcode_tbl extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('barcode', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'uid' => $this->string(36),
            'category' => $this->string(),
            'name' => $this->string(),
            'brend' => $this->string(),
            'gender' => $this->string(),
            'description' => $this->text(),
            'tnved' => $this->string(),
            'compound' => $this->string(),
            'equipment' => $this->text(),
            'decor' => $this->string(),
            'productArticule' => $this->string(),
            'size' => $this->string(),
            'countryProduction' => $this->string(),
            'vendorCode' => $this->string(),
            'photo' => $this->string(),
            'color' => $this->string(),
            'data' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('barcode');
    }
}
