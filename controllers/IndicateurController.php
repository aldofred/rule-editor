<?php

namespace app\controllers;

use app\models\Indicateur;
use app\models\IndicateurSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IndicateurController implements the CRUD actions for Indicateur model.
 */
class IndicateurController extends Controller
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
     * Lists all Indicateur models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IndicateurSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Indicateur model.
     * @param int $id_indicateur Id Indicateur
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_indicateur)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_indicateur),
        ]);
    }

    /**
     * Creates a new Indicateur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Indicateur();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_indicateur' => $model->id_indicateur]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Indicateur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_indicateur Id Indicateur
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_indicateur)
    {
        $model = $this->findModel($id_indicateur);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_indicateur' => $model->id_indicateur]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Indicateur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_indicateur Id Indicateur
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_indicateur)
    {
        $this->findModel($id_indicateur)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Indicateur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_indicateur Id Indicateur
     * @return Indicateur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_indicateur)
    {
        if (($model = Indicateur::findOne(['id_indicateur' => $id_indicateur])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
