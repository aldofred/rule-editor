<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypeRegle */

$this->title = $model->id_type_regle;
$this->params['breadcrumbs'][] = ['label' => 'Type Regles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-regle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_type_regle' => $model->id_type_regle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_type_regle' => $model->id_type_regle], [
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
            'id_type_regle',
            'libelle_type_regle',
            'description_type_fait',
        ],
    ]) ?>

</div>
