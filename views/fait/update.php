<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fait */

$this->title = 'Update Fait: ' . $model->id_fait;
$this->params['breadcrumbs'][] = ['label' => 'Faits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fait, 'url' => ['view', 'id_fait' => $model->id_fait]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fait-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
