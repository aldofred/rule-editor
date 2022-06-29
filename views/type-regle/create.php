<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeRegle */

$this->title = 'Create Type Regle';
$this->params['breadcrumbs'][] = ['label' => 'Type Regles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-regle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
