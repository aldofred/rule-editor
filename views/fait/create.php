<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fait */

$this->title = 'Create Fait';
$this->params['breadcrumbs'][] = ['label' => 'Faits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fait-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
