<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\Profile;
use yii\web\ErrorAction;

/**
 * Class ProfileController
 * @package backend\controllers
 */
class ProfileController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['change'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Profile();
        $model->scenario = Profile::SCENARIO_PROFILE;
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
        $model = new Profile();
        $model->scenario = Profile::SCENARIO_PWD;
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