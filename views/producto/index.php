<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
            'attribute'=>'idProducto',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],
               [
            'attribute'=>'nombre',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],
            [
            'attribute'=>'detalle',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],[
            'attribute'=>'stock',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
                'value'=> function ($model){
                    return number_format($model->stock)."";
                }
            ],[
            'attribute'=>'precio',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
                'value'=> function ($model){
                    return "$".number_format($model->precio);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<div align="right"><p>
        <?= Html::a('Reporte', ['report'], ['class' => 'btn btn-success']) ?>
    </p></div>