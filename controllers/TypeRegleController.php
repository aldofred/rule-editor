<?php

namespace app\controllers;

use app\models\TypeRegle;
use app\models\TypeRegleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypeRegleController implements the CRUD actions for TypeRegle model.
 */
class TypeRegleController extends Controller
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
     * Lists all TypeRegle models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TypeRegleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TypeRegle model.
     * @param int $id_type_regle Id Type Regle
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_type_regle)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_type_regle),
        ]);
    }

    /**
     * Creates a new TypeRegle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TypeRegle();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_type_regle' => $model->id_type_regle]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TypeRegle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_type_regle Id Type Regle
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_type_regle)
    {
        $model = $this->findModel($id_type_regle);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_type_regle' => $model->id_type_regle]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TypeRegle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_type_regle Id Type Regle
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_type_regle)
    {
        $this->findModel($id_type_regle)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TypeRegle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_type_regle Id Type Regle
     * @return TypeRegle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_type_regle)
    {
        if (($model = TypeRegle::findOne(['id_type_regle' => $id_type_regle])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
