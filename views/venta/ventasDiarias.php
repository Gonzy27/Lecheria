<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                'value'=>'cliente'
            ],
            [
                'header' => 'nombre cliente',
                'value' => function($model){
                    return $model->cliente0->nombre." ".$model->cliente0->apellido;
                },
                'footer' => '<center><b>Total: </b></center>',  
            ],
            
             [
                'header'=>'Monto Total Venta',
                'value'=>function($model){
                    return 0;
                },
                 'footer'=>'0'
            ]
                
        ],
    ]); ?>
</div>