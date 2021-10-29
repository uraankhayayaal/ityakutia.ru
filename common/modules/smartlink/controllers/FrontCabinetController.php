<?php

namespace common\modules\smartlink\controllers;

use common\modules\smartlink\models\Movement;
use common\modules\smartlink\models\Smartlink;
use common\modules\smartlink\models\SmartlinkSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

class FrontCabinetController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['*'],
                'rules' => [
                    [
                        // 'actions' => ['*'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         // 'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    public function actionIndex()
    {   
        $searchModel = new SmartlinkSearch();
        $dataProvider = $searchModel->searchOwn(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
    }

    // TODO: Доделать
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

    // TODO: Доделать
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

    protected function findModel($id): Smartlink
    {
        if (($model = Smartlink::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
