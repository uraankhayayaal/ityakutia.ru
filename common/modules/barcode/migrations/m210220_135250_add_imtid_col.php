<?php

use yii\db\Migration;

/**
 * Class m210220_135250_add_imtid_col
 */
class m210220_135250_add_imtid_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('barcode', 'imtID', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('barcode', 'imtID');
    }
}
