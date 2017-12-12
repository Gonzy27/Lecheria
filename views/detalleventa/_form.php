<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Producto;
/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idVenta')->textInput() ?>

    <?php
        echo $form->field($model, 'idProducto')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Producto::find()->all(),'idProducto','nombre'),

            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un producto'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precioFinal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'guardarDetalle']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
