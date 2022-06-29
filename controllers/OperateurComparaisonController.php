<?php

namespace app\controllers;

use app\models\OperateurComparaison;
use app\models\OperateurComparaisonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OperateurComparaisonController implements the CRUD actions for OperateurComparaison model.
 */
class OperateurComparaisonController extends Controller
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
     * Lists all OperateurComparaison models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OperateurComparaisonSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OperateurComparaison model.
     * @param int $id_operateur Id Operateur
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_operateur)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_operateur),
        ]);
    }

    /**
     * Creates a new OperateurComparaison model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OperateurComparaison();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_operateur' => $model->id_operateur]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OperateurComparaison model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_operateur Id Operateur
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_operateur)
    {
        $model = $this->findModel($id_operateur);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_operateur' => $model->id_operateur]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OperateurComparaison model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_operateur Id Operateur
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_operateur)
    {
        $this->findModel($id_operateur)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OperateurComparaison model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_operateur Id Operateur
     * @return OperateurComparaison the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_operateur)
    {
        if (($model = OperateurComparaison::findOne(['id_operateur' => $id_operateur])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
