<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use app\models\Cliente;
/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>

 <?php
        
    echo DatePicker::widget([
        'model'=> $model,
        'attribute' => 'fecha',
        'language' => 'es',
        'readonly'=>true,
	    'options' => ['placeholder' => 'Ingrese Fecha'],
	    'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose'=> true
	]
]);
    ?>     

  <?php
    echo $form->field($model, 'idCliente')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Cliente::find()->all(),'id','id','nombre'),
        
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona un cliente'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
