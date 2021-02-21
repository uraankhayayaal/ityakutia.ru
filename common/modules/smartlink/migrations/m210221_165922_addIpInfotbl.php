<?php

use yii\db\Migration;

/**
 * Class m210221_165922_addIpInfotbl
 */
class m210221_165922_addIpInfotbl extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('smartlink_ipinfo', [
            'id' => $this->primaryKey(),
            "ip" => $this->string()->notNull(),
            "success" => $this->boolean()->notNull(),
            "message" => $this->string(),
            "type" => $this->string(),
            "continent" => $this->string(),
            "continent_code" => $this->string(),
            "country" => $this->string(),
            "country_code" => $this->string(),
            "country_flag" => $this->string(),
            "country_capital" => $this->string(),
            "country_phone" => $this->string(),
            "country_neighbours" => $this->string(),
            "region" => $this->string(),
            "city" => $this->string(),
            "latitude" => $this->string(),
            "longitude" => $this->string(),
            "asn" => $this->string(),
            "org" => $this->string(),
            "isp" => $this->string(),
            "timezone" => $this->string(),
            "timezone_name" => $this->string(),
            "timezone_dstOffset" => $this->integer(),
            "timezone_gmtOffset" => $this->integer(),
            "timezone_gmt" => $this->string(),
            "currency" => $this->string(),
            "currency_code" => $this->string(),
            "currency_symbol" => $this->string(),
            "currency_rates" => $this->string(),
            "currency_plural" => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('smartlink_ipinfo');
    }
}
