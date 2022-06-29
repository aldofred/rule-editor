<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fait */

$this->title = $model->id_fait;
$this->params['breadcrumbs'][] = ['label' => 'Faits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fait-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_fait' => $model->id_fait], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_fait' => $model->id_fait], [
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
            'id_fait',
            'description_fait',
            'variable_id',
            'patient_id',
        ],
    ]) ?>

</div>
