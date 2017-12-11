<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   

    <p>
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           [
            'attribute'=>'id',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],
           [
            'attribute'=>'rut',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],
            [
            'attribute'=>'nombre',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],
            [
            'attribute'=>'apellidoPaterno',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],[
            'attribute'=>'apellidoPaterno',
              'contentOptions'=>['class' =>'text-center'],
              'headerOptions'=>['class' =>'text-center'],  
            ],//'telefono',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
     
    <div align="right"><p>
        <?= Html::a('Reporte', ['report'], ['class' => 'btn btn-success']) ?>
    </p></div>
    
</div>
