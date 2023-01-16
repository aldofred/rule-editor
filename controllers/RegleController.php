<?php

namespace app\controllers;

use app\models\Regle;
use app\models\RegleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegleController implements the CRUD actions for Regle model.
 */
class RegleController extends Controller
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
     * Lists all Regle models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RegleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //return var_dump($dataProvider);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Regle model.
     * @param int $id_regle Id Regle
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_regle)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_regle),
        ]);
    }

    /**
     * Creates a new Regle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Regle();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_regle' => $model->id_regle]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Regle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_regle Id Regle
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_regle)
    {
        $model = $this->findModel($id_regle);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_regle' => $model->id_regle]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Regle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_regle Id Regle
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_regle)
    {
        $this->findModel($id_regle)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Regle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_regle Id Regle
     * @return Regle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_regle)
    {
        if (($model = Regle::findOne(['id_regle' => $id_regle])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
