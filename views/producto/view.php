<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->idProducto;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= "Código del producto:".Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idProducto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idProducto], [
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
            'idProducto',
            'nombre',
            'detalle',[
                'attribute' => 'stock',
                'value' => "".number_format($model->stock)
        
             ],[
                'attribute' => 'precio',
                'value' => "$".number_format($model->precio)
        
             ],
        ],
    ]) ?>

</div>
