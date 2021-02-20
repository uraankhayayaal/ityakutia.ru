<?php

use yii\db\Migration;

/**
 * Class m210220_162135_fixPlatformType
 */
class m210220_162135_fixPlatformType extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('smartlink_movement', 'platform');
        $this->addColumn('smartlink_movement', 'platform', $this->string()->notNull());
        $this->addColumn('smartlink', 'link_web', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('smartlink', 'link_web');
        $this->dropColumn('smartlink_movement', 'platform');
        $this->addColumn('smartlink_movement', 'platform', $this->string()->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210220_162135_fixPlatformType cannot be reverted.\n";

        return false;
    }
    */
}
