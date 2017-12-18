<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\VentaSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ventas diarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <h1><?php
        
        echo Html::encode("Ventas Diarias"); 
        echo " Del: ".date('d-m-Y')    ;
        ?>  
    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'Rut Cliente',
                'value'=>'cliente.rut'
            ],
            [
                'header' => 'nombre cliente',
                'value' => function($model){
                    return $model->cliente->nombre." ".$model->cliente->apellidoPaterno;
                },
                'footer' => '<center><b>Total: </b></center>',  
            ],
            
             [
                'header'=>'Monto Total Venta',
                'attribute' => 'precioFinal',
                'value'=>function($model){
                    return "$".number_format(VentaSearch::getTotalDetalleValor($model));
                },
                 'footer'=>"$".number_format(VentaSearch::getTotalDetalleDiarias()),
            ]
                
        ],
    ]); ?>
    
    <div align="right"><p>
        <?= Html::a('Factura', ['facturadiaria'], ['class' => 'btn btn-success']) ?>
    </p></div>  
</div>
