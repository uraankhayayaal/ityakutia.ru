<?php

use yii\db\Migration;

/**
 * Class m210220_163942_addOgTitles
 */
class m210220_163942_addOgTitles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('smartlink', 'photo', $this->string());
        $this->addColumn('smartlink', 'title', $this->string());
        $this->addColumn('smartlink', 'description', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('smartlink', 'description');
        $this->dropColumn('smartlink', 'title');
        $this->dropColumn('smartlink', 'photo');
    }
}
