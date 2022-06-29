<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeRegle */

$this->title = 'Update Type Regle: ' . $model->id_type_regle;
$this->params['breadcrumbs'][] = ['label' => 'Type Regles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_type_regle, 'url' => ['view', 'id_type_regle' => $model->id_type_regle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-regle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
