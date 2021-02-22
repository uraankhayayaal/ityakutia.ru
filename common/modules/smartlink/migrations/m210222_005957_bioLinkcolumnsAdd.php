<?php

use yii\db\Migration;

/**
 * Class m210222_005957_bioLinkcolumnsAdd
 */
class m210222_005957_bioLinkcolumnsAdd extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('smartlink_movement', 'type', $this->integer()->notNull());
        $this->addColumn('smartlink', 'link_instagram', $this->string());
        $this->addColumn('smartlink', 'link_vk', $this->string());
        $this->addColumn('smartlink', 'link_youtube', $this->string());
        $this->addColumn('smartlink', 'link_facebook', $this->string());
        $this->addColumn('smartlink', 'link_whatsapp', $this->string());
        $this->addColumn('smartlink', 'link_twitter', $this->string());
        $this->addColumn('smartlink', 'link_phone', $this->string());
        $this->addColumn('smartlink', 'link_email', $this->string());
        $this->addColumn('smartlink', 'link_bio', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('smartlink', 'link_bio');
        $this->dropColumn('smartlink', 'link_email');
        $this->dropColumn('smartlink', 'link_phone');
        $this->dropColumn('smartlink', 'link_twitter');
        $this->dropColumn('smartlink', 'link_whatsapp');
        $this->dropColumn('smartlink', 'link_facebook');
        $this->dropColumn('smartlink', 'link_youtube');
        $this->dropColumn('smartlink', 'link_vk');
        $this->dropColumn('smartlink', 'link_instagram');
        $this->dropColumn('smartlink_movement', 'type');
    }
}
