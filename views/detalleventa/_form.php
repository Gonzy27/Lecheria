<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use app\models\Producto;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin([
    //    'beforeSubmit' => 'window.forms.candidate',
    'enableClientValidation' => true,
     
    //    'enableAjaxValidation' => true,
    'id' => 'someform'
    ]); ?>
<?php 
    echo $form->field($model, 'idProducto')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(app\models\Producto::find()->all(),'idProducto','nombre','stock'),
        
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona un producto'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?>


    <?= $form->field($model, 'cantidad')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
