<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Venta */

use app\models\DetalleventaSearch;
$this->title = "Venta N° ".$model->idVenta;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
    $(function(){
        $('.modelButton2').click(function(){
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
            
            //'idDetalle',
            [
                'attribute' => 'Producto',
                'value' =>   function ($model){
                    return $model->producto->nombre." ".$model->producto->detalle."";
                }        
            ],
            [
                'attribute' => 'cantidad',
                'footer' => 'Total',       
            ],[
                'attribute' => 'precioFinal',
                'footer' =>'$'.number_format(DetalleventaSearch::getTotal($dataProvider2->models,'precioFinal')), 
                'value'=> function ($model){
                    return '$'.number_format($model->precioFinal)."";
                }   
            ],
            [  
                'class' => 'yii\grid\ActionColumn',
              'header' => 'Acciones',
              'headerOptions' => ['style' => 'color:#337ab7'],
              'template' => '{update}{delete}',
              'buttons' => [
                'update' => function ($url, $model) {
                    return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['class' => 'modelButton2', 'value' => \yii\helpers\Url::to(['detalleventa/update', 'id' => $model->idDetalle])]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                                'data-confirm' => Yii::t('yii', '¿Está seguro de eliminar este elemento?'),
                                'data-method'  => 'post',
                    ]);
                }

              ],
              'urlCreator' => function ($action, $model, $key, $index) {

                if ($action === 'update') {
                    $url ='index.php?r=client-login/lead-update&id='.$model->idVenta;
                    return \yii\helpers\Url::to(['detalleventa/update', 'id' => $model->idDetalle]);
                    
                }
                if ($action === 'delete') {
                    $url ='http://localhost/lecheria/web/index.php?r=detalleventa%2Fdelete&id='.$model->idDetalle;
                    return \yii\helpers\Url::to(['detalleventa/delete', 'id' => $model->idDetalle]);
                }

              }
            ],
        ],
    ]); ?>
    
<div align="right"><p>
        <?= Html::a('Factura', ['factura','id'=>$model->idVenta], ['class' => 'btn btn-success']) ?>
    </p></div>  
</div>
    