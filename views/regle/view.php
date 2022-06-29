<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Regle */

$this->title = $model->id_regle;
$this->params['breadcrumbs'][] = ['label' => 'Regles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="regle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_regle' => $model->id_regle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_regle' => $model->id_regle], [
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
            'id_regle',
            'nom_regle',
            'description_regle',
            'type_regle_id',
        ],
    ]) ?>

</div>
