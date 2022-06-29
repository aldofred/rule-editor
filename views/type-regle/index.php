<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\TypeRegle;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypeRegleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type de règle';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-regle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Type Regle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_type_regle',
            'libelle_type_regle',
            'description_type_fait',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TypeRegle $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_type_regle' => $model->id_type_regle]);
                 }
            ],
        ],
    ]); ?>


</div>
