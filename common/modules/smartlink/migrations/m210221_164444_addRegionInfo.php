<?php

use yii\db\Migration;

/**
 * Class m210221_164444_addRegionInfo
 */
class m210221_164444_addRegionInfo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('smartlink_movement', 'country', $this->string());
        $this->addColumn('smartlink_movement', 'region', $this->string());
        $this->addColumn('smartlink_movement', 'city', $this->string());
        $this->addColumn('smartlink_movement', 'coordinate', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('smartlink_movement', 'coordinate');
        $this->dropColumn('smartlink_movement', 'city');
        $this->dropColumn('smartlink_movement', 'region');
        $this->dropColumn('smartlink_movement', 'country');
    }
}
