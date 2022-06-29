<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TypeRegle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="type-regle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_type_regle')->textInput() ?>

    <?= $form->field($model, 'libelle_type_regle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_type_fait')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
