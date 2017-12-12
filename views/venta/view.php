<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = $model->idVenta;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-view">

    <h1><?="Codigo de la Venta:". Html::encode($this->title) ?></h1>

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
    
   <?= Html::button('Agregar Producto', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['detalleventa/create', 'id' => $model->idVenta]), 'class' => 'btn btn-success']) ?>
    <?php
        Modal::begin([
            'header' => '<h2>Detalle de Venta</h2>',
            'id'     => 'model',
            'size'   => 'model-lg',
        ]);

         echo "<div id='modelContent'></div>";

        Modal::end();
    ?>
    
<script>
    $(function(){
        $('#modelButton').click(function(){
            $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));            
        });
    });    
</script>
    
<br><br>
    
<?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'idDetalle',
            'idVenta',
            'idProducto',
            'cantidad',
            'precioFinal',

        ],
    ]); ?>
    
</div>
    