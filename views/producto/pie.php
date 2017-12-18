<?php
use sjaakp\gcharts\PieChart;

use yii\helpers\Html;
$this->title = 'Productos más Vendidos';

$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <h1><?= Html::encode($this->title) ?></h1>
<?= PieChart::widget([
    'height' => '400px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'producto.nombre:string',
        'cantidad'
    ],
    'options' => [
        'title' => 'Producto Vendidos'
    ],
]) ?>

