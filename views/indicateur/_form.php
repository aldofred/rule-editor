<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indicateur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicateur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_indicateur')->textInput() ?>

    <?= $form->field($model, 'valeur_indicateur')->textInput() ?>

    <?= $form->field($model, 'libelle_indicateur')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
