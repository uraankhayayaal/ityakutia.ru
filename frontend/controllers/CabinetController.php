<?php
namespace frontend\controllers;

use frontend\models\Cabinet;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Cabinet controller
 */
class CabinetController extends Controller
{
    /**
     * @inheritdoc
     */
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Cabinet();
        $model->scenario = Cabinet::SCENARIO_PROFILE;
        $user = Yii::$app->user->identity;
        $model->loadFromItem(Yii::$app->user->identity);

        $load = $model->load(Yii::$app->request->post());

        if ($load && $model->edit($user)) {
            $model->loadFromItem(Yii::$app->user->identity);
            return $this->render('index', [
                'model' => $model,
                'success' => true,
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'success' => false,
        ]);
    }

    public function actionChange()
    {
        $model = new Cabinet();
        $model->scenario = Cabinet::SCENARIO_PWD;
        $user = Yii::$app->user->identity;
        $model->loadFromItem(Yii::$app->user->identity);

        $post = Yii::$app->request->post();
        $load = $model->load($post);

        if ($load && $model->repwd($user)) {
            $model->loadFromItem(Yii::$app->user->identity);
            return $this->render('change', [
                'model' => $model,
                'success_pwd' => true,
            ]);
        }

        return $this->render('change', [
            'model' => $model,
            'success_pwd' => false,
        ]);
    }
}
