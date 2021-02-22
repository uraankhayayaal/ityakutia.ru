<?php

use yii\db\Migration;

/**
 * Class m210222_070439_bioLinkPermAdd
 */
class m210222_070439_bioLinkPermAdd extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $biolinkRedactor = $auth->getPermission('biolink');
        if($biolinkRedactor == null){
            $biolinkRedactor = $auth->createPermission('biolink');
            $biolinkRedactor->description = 'Управление био ссылками';

            $auth->add($biolinkRedactor);

            $operator = $auth->getRole('operator');
            if($operator != null || $operator != false)
                $auth->addChild($operator,$biolinkRedactor);
        }
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $biolinkRedactor = $auth->getPermission('biolink');
        if($biolinkRedactor !== null)
            $auth->remove($biolinkRedactor);
        
    }
}
