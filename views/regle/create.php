<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Regle */

$this->title = 'Create Regle';
$this->params['breadcrumbs'][] = ['label' => 'Regles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
