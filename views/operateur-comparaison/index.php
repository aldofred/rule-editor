<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\OperateurComparaison;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OperateurComparaisonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operateurs de Comparaison';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operateur-comparaison-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Operateur Comparaison', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_operateur',
            'libelle_operateur',
            'signe_operateur',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OperateurComparaison $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_operateur' => $model->id_operateur]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
