<?php

namespace common\modules\smartlink\controllers;

use common\modules\smartlink\models\Smartlink;
use common\modules\smartlink\models\SmartlinkSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BackController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['smartlink']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SmartlinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
    }

    public function actionCreate()
    {
        $model = new Smartlink();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно создана!');
            return $this->redirect(Url::previous());
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно изменена!');
            return $this->redirect(Url::previous());
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    // public function actionDelete($id)
    // {
    //     $modelDelete = $this->findModel($id)->delete();
    //     if(false !== $modelDelete) {
    //         Yii::$app->session->setFlash('success', 'Запись успешно удалена!');
    //     }

    //     return $this->redirect(Url::previous());
    // }

    protected function findModel($id)
    {
        $model = Smartlink::findOne($id);
        if(null === $model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}