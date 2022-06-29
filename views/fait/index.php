<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Fait;
use app\models\Patient;
use app\models\Variable;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fait-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fait', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fait',
            'description_fait',
            ///'variable_id',
            array(

                'header' => 'Variable',
          
                'value' => function($value, $model, $index) {
          
                  $a = Variable::find(['id_variable' => $value->variable_id])
                                            ->select(['nom_variable'])
                                            ->one();
                  return $a['nom_variable'];
                }
            ),
            //'patient_id',
            array(

                'header' => 'Patient',
          
                'value' => function($value, $model, $index) {
          
                  $a = Patient::find(['id_patient' => $value->patient_id])
                                            ->select(['nom_patient', 'prenom_patient'])
                                            ->one();
                  return $a['nom_patient']. ' '. $a['prenom_patient'];
                }
            ),
            'valeur',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fait $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_fait' => $model->id_fait]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
