<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'idVenta',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ], [
            'attribute'=>'fecha',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],
           // 'idCliente',
            [
                'attribute' => 'cliente',
                'value' => 'cliente.nombre',
           'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
             ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<div align="right"><p>
        <?= Html::a('Reporte', ['report'], ['class' => 'btn btn-success']) ?>
    </p></div>  
