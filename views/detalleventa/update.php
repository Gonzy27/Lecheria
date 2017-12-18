<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */

$this->title = 'Actualizar el Detalle de Venta de: '.$model->producto->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Detalleventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetalle, 'url' => ['view', 'id' => $model->idDetalle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalleventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
