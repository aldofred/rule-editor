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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fait',
            'description_fait',
            'variable_id',
            'patient_id',
            array(

                'header' => 'Nom Patient',
          
                'value' => function($model, $index) {
                    
                    return $model->patient->nom_patient;
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
