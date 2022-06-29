<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicateur */

$this->title = Yii::t('app', 'Update Indicateur: {name}', [
    'name' => $model->id_indicateur,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Indicateurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_indicateur, 'url' => ['view', 'id_indicateur' => $model->id_indicateur]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="indicateur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
