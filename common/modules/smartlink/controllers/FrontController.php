<?php

namespace common\modules\smartlink\controllers;

use common\modules\smartlink\models\Smartlink;
use Yii;
use uraankhayayaal\page\models\Page;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

/**
 * Front controller
 */
class FrontController extends Controller
{
    public function actionIndex(String $id)
    {
        $this->layout = '@frontend/themes/basic/views/layouts/empty';
        $model = $this->findModel($id);

        $platformLink = $model->getPlatformLink();
        
        if(\Yii::getAlias('@device') == 'desktop')
            return $this->render('index', [
                'model' => $model,
            ]);

        if($platformLink !== null){
            return $this->redirect($platformLink);
        }else{
            return $this->render('index', [
                'model' => $model,
                'error' => 'Platform detected no mobile device'
            ]);
        }
    }

    protected function findModel($link_hash): Smartlink
    {
        if (($model = Smartlink::findOneByHash($link_hash)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
