<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Condition */

$this->title = $model->id_condition;
$this->params['breadcrumbs'][] = ['label' => 'Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="condition-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_condition' => $model->id_condition], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_condition' => $model->id_condition], [
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
            'id_condition',
            'libelle_condition',
            'operateur_id',
            'indicateur_id',
        ],
    ]) ?>

</div>
