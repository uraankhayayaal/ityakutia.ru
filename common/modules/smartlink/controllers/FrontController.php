<?php

namespace common\modules\smartlink\controllers;

use common\modules\smartlink\models\Movement;
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

        $platformLink = $model->getPlatformLink(Movement::TYPE_SMART);
        
        if(\Yii::getAlias('@device') == 'desktop')
            return $this->render('index', [
                'model' => $model,
                'platformLink' => $platformLink,
            ]);

        if($platformLink !== null){
            if($model->is_js_redirect_for_mobile)
                return $this->render('index', [
                    'model' => $model,
                    'platformLink' => $platformLink,
                ]);
                
            return $this->redirect($platformLink);
        }else{
            return $this->render('index', [
                'model' => $model,
                'error' => 'Platform detected no mobile device'
            ]);
        }
    }

    public function actionBio(String $id)
    {
        $this->layout = '@frontend/themes/basic/views/layouts/bio';
        $model = $this->findBioLink($id);

        $model->getPlatformLink(Movement::TYPE_BIO); // вычисление кто откуда и запись
        
        return $this->render('bio', [
            'model' => $model
        ]);
    }

    protected function findModel($link_hash): Smartlink
    {
        if (($model = Smartlink::findOneByHash($link_hash)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findBioLink($link_bio): Smartlink
    {
        if (($model = Smartlink::findOneByBioHash($link_bio)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
