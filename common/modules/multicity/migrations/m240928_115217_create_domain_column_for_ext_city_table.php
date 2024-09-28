<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ext_city}}`.
 */
class m240928_115217_create_domain_column_for_ext_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ext_city}}', 'domain', $this->string()->notNull());
        $this->update('{{%ext_city}}', ['domain' => 'beeapps.ru'], ['!=', 'url', 'yakutsk']);
        $this->update('{{%ext_city}}', ['domain' => 'ityakutia.ru'], ['=', 'url', 'yakutsk']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%ext_city}}', 'domain');
    }
}
