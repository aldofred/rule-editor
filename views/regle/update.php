<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Regle */

$this->title = 'Update Regle: ' . $model->id_regle;
$this->params['breadcrumbs'][] = ['label' => 'Regles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_regle, 'url' => ['view', 'id_regle' => $model->id_regle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
