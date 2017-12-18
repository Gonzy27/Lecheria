<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */

$this->title = 'Actualizar el Detalle de Venta de: '.$model->producto->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Detalleventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetalle, 'url' => ['view', 'id' => $model->idDetalle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalleventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

  <div class="detalleventa-form">

    <?php $form = ActiveForm::begin([
    //    'beforeSubmit' => 'window.forms.candidate',
    'enableClientValidation' => true,
     
    //    'enableAjaxValidation' => true,
    'id' => 'someform'
    ]); ?>


    <?= $form->field($model, 'cantidad')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
