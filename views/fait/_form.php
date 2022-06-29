<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fait */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fait-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fait')->textInput() ?>

    <?= $form->field($model, 'description_fait')->textInput() ?>

    <?= $form->field($model, 'variable_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
