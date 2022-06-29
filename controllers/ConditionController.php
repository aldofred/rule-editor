<?php

namespace app\controllers;

use app\models\Condition;
use app\models\ConditionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConditionController implements the CRUD actions for Condition model.
 */
class ConditionController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Condition models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConditionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Condition model.
     * @param int $id_condition Id Condition
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_condition)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_condition),
        ]);
    }

    /**
     * Creates a new Condition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Condition();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_condition' => $model->id_condition]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Condition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_condition Id Condition
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_condition)
    {
        $model = $this->findModel($id_condition);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_condition' => $model->id_condition]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Condition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_condition Id Condition
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_condition)
    {
        $this->findModel($id_condition)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Condition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_condition Id Condition
     * @return Condition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_condition)
    {
        if (($model = Condition::findOne(['id_condition' => $id_condition])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
