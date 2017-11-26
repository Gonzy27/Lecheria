<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleventaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleventa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDetalle') ?>

    <?= $form->field($model, 'idVenta') ?>

    <?= $form->field($model, 'idProducto') ?>

    <?= $form->field($model, 'cantidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
