<?php

use yii\db\Migration;

/**
 * Class m210221_183213_fixTooLongForHost
 */
class m210221_183213_fixTooLongForHost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('smartlink_movement', 'host');
        $this->addColumn('smartlink_movement', 'host', $this->text());
        $this->dropColumn('smartlink_movement', 'url');
        $this->addColumn('smartlink_movement', 'url', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('smartlink_movement', 'url');
        $this->addColumn('smartlink_movement', 'url', $this->string());
        $this->dropColumn('smartlink_movement', 'host');
        $this->addColumn('smartlink_movement', 'host', $this->string());
    }
}
