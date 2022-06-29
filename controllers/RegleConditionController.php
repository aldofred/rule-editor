<?php

namespace app\controllers;

use app\models\RegleCondition;
use app\models\RegleConditionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegleConditionController implements the CRUD actions for RegleCondition model.
 */
class RegleConditionController extends Controller
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
     * Lists all RegleCondition models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RegleConditionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RegleCondition model.
     * @param int $id_regle_condition Id Regle Condition
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_regle_condition)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_regle_condition),
        ]);
    }

    /**
     * Creates a new RegleCondition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RegleCondition();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_regle_condition' => $model->id_regle_condition]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RegleCondition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_regle_condition Id Regle Condition
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_regle_condition)
    {
        $model = $this->findModel($id_regle_condition);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_regle_condition' => $model->id_regle_condition]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RegleCondition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_regle_condition Id Regle Condition
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_regle_condition)
    {
        $this->findModel($id_regle_condition)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RegleCondition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_regle_condition Id Regle Condition
     * @return RegleCondition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_regle_condition)
    {
        if (($model = RegleCondition::findOne(['id_regle_condition' => $id_regle_condition])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
