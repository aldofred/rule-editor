<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Condition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_condition')->textInput() ?>

    <?= $form->field($model, 'libelle_condition')->textInput() ?>

    <?= $form->field($model, 'operateur_id')->textInput() ?>

    <?= $form->field($model, 'indicateur_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
