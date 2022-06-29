<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegleCondition */

$this->title = 'Update Regle Condition: ' . $model->id_regle_condition;
$this->params['breadcrumbs'][] = ['label' => 'Regle Conditions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_regle_condition, 'url' => ['view', 'id_regle_condition' => $model->id_regle_condition]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regle-condition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
