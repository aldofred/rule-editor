<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RegleCondition */

$this->title = $model->id_regle_condition;
$this->params['breadcrumbs'][] = ['label' => 'Regle Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="regle-condition-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_regle_condition' => $model->id_regle_condition], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_regle_condition' => $model->id_regle_condition], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_regle_condition',
            'regle_id',
            'condition_id',
        ],
    ]) ?>

</div>
