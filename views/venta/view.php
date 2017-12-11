<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = $model->idVenta;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-view">

    <h1><?="Codigo del producto:". Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idVenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idVenta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro/a de borrar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idVenta',
            'fecha',
           // 'idCliente',
            [
                'attribute' => 'Cliente',
                'value' => $model->cliente->nombre." ".$model->cliente->apellidoPaterno." ".$model->cliente->apellidoMaterno
        
             ],
        ],
    ]) ?>

</div>
