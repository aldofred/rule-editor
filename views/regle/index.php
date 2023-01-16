<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Regle;
use app\models\TypeRegle;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Règles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Regle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_regle',
            'nom_regle',
            'description_regle',
            'type_regle_id',
            array(

                'header' => 'Type de règle',
          
                'value' => function($model, $index) {
                    
                    return $model->typeRegle->libelle_type_regle;
                }
            ),
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Regle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_regle' => $model->id_regle]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
