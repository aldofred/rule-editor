<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OperateurComparaison */

$this->title = $model->id_operateur;
$this->params['breadcrumbs'][] = ['label' => 'Operateur Comparaisons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operateur-comparaison-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_operateur' => $model->id_operateur], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_operateur' => $model->id_operateur], [
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
            'id_operateur',
            'libelle_operateur',
            'signe_operateur',
        ],
    ]) ?>

</div>
