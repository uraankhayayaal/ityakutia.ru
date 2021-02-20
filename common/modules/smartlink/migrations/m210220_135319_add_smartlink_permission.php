<?php

use yii\db\Migration;

/**
 * Class m210220_135319_add_smartlink_permission
 */
class m210220_135319_add_smartlink_permission extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $smartlinkRedactor = $auth->getPermission('smartlink');
        if($smartlinkRedactor == null){
            $smartlinkRedactor = $auth->createPermission('smartlink');
            $smartlinkRedactor->description = 'Управление умными ссылками';

            $auth->add($smartlinkRedactor);

            $operator = $auth->getRole('operator');
            if($operator != null || $operator != false)
                $auth->addChild($operator,$smartlinkRedactor);
        }
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $smartlinkRedactor = $auth->getPermission('smartlink');
        if($smartlinkRedactor !== null)
            $auth->remove($smartlinkRedactor);
        
    }
}
