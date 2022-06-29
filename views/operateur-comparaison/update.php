<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperateurComparaison */

$this->title = 'Update Operateur Comparaison: ' . $model->id_operateur;
$this->params['breadcrumbs'][] = ['label' => 'Operateur Comparaisons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_operateur, 'url' => ['view', 'id_operateur' => $model->id_operateur]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operateur-comparaison-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
