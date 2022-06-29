<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegleCondition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regle-condition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'regle_id')->textInput() ?>

    <?= $form->field($model, 'condition_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
