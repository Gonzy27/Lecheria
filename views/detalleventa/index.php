<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleventaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalleventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleventa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detalleventa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetalle',
            'idVenta',
            'idProducto',
            'cantidad',
            'precioFinal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
