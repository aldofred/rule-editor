<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Regle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_regle')->textInput() ?>

    <?= $form->field($model, 'nom_regle')->textInput() ?>

    <?= $form->field($model, 'description_regle')->textInput() ?>

    <?= $form->field($model, 'type_regle_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
