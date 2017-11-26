<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDetalle')->textInput() ?>

    <?= $form->field($model, 'idVenta')->textInput() ?>

    <?= $form->field($model, 'idProducto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
