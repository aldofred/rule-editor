<?php

use app\models\Condition;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\RegleCondition;
use app\models\Regle;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RegleConditionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regle Conditions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regle-condition-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Regle Condition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_regle_condition',
            
            //'regle_id',
            array(

                'header' => 'Règle',
          
                'value' => function($value, $model, $index) {
          
                  $a = Regle::find(['id_regle' => $value->regle_id])
                                            ->select(['nom_regle'])
                                            ->one();
                  return $a['nom_regle'];
                }
            ),
            //'condition_id',
            array(

                'header' => 'Condition',
          
                'value' => function($value, $model, $index) {
          
                  $a = Condition::find(['id_condition' => $value->condition_id])
                                            ->select(['libelle_condition'])
                                            ->one();
                  return $a['libelle_condition'];
                }
            ),
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RegleCondition $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_regle_condition' => $model->id_regle_condition]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
