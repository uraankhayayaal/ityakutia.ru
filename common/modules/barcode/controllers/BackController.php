<?php

namespace common\modules\barcode\controllers;

use common\modules\barcode\models\Product;
use common\modules\barcode\models\ProductSearch;
use common\modules\barcode\models\BarcodeForm;
use common\modules\barcode\models\ProductUpdateFrom;
use common\modules\barcode\components\wb\WbApi;
use uraankhayayaal\materializecomponents\imgcropper\actions\UploadAction;
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
                        'roles' => ['barcode', 'admin']
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

    public function actions()
    {
        return [
            'uploadImg' => [
                'class' => UploadAction::class,
                'url' => '/images/uploads/barcode',
                'path' => '@frontend/web/images/uploads/barcode/',
                'maxSize' => 10485760
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
    }

    public function actionImport()
    {
        $api = new WbApi();
        $api->getProducts();

        return $this->redirect('index');
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $form = new BarcodeForm();
        $newNameForm = new ProductUpdateFrom();
        return $this->render('view', [
            'model' => $model,
            'form' => $form,
            'newNameForm' => $newNameForm,
        ]); 
    }

    public function actionPdfTicket($id)
    {
        $model = $this->findModel($id);
        $form = new BarcodeForm();

        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            // Yii::$app->session->setFlash('success', 'Штрихкоды успешно сгенерированы!');
            return $form->getPdf();
        } else {
            // Yii::$app->session->setFlash('error', 'Не получилось сгенерировать штрихкоды!');
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionCreate()
    {
        $model = new Product();

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

    public function actionUpdateProduct($id)
    {
        $model = $this->findModel($id);
        $newNameForm = new ProductUpdateFrom();

        if($newNameForm->load(Yii::$app->request->post()) && $newNameForm->validate()) {
            $api = new WbApi();
            if ($api->changeProduct($model, $newNameForm)) {
                $api->getProduct($model->imtID);
                Yii::$app->session->setFlash('success', 'Запись успешно изменена!');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка на сервере!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        Yii::$app->session->setFlash('error', 'Не правильно введен наименование продукта!');
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionDelete($id)
    {
        $modelDelete = $this->findModel($id)->delete();
        if(false !== $modelDelete) {
            Yii::$app->session->setFlash('success', 'Запись успешно удалена!');
        }

        return $this->redirect(Url::previous());
    }

    protected function findModel($id)
    {
        $model = Product::findOne($id);
        if(null === $model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}