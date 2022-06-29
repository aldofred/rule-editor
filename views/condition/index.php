<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Condition;
use app\models\OperateurComparaison;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConditionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conditions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condition-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Condition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_condition',
            'libelle_condition',
            array(

                'header' => 'Operateur',
          
                'value' => function($value, $model, $index) {
          
                  $a = OperateurComparaison::find(['id_operateur' => $value->operateur_id])
                                            ->select(['libelle_operateur'])
                                            ->one();
                  return $a['libelle_operateur'];
                }
            ),
            'indicateur_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Condition $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_condition' => $model->id_condition]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
