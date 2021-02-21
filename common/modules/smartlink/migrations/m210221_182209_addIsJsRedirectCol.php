<?php

use yii\db\Migration;

/**
 * Class m210221_182209_addIsJsRedirectCol
 */
class m210221_182209_addIsJsRedirectCol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('smartlink', 'is_js_redirect_for_mobile', $this->boolean()->notNull()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('smartlink', 'is_js_redirect_for_mobile');
    }
}
