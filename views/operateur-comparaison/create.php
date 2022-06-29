<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperateurComparaison */

$this->title = 'Create Operateur Comparaison';
$this->params['breadcrumbs'][] = ['label' => 'Operateur Comparaisons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operateur-comparaison-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
