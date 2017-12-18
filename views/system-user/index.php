<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'System Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create System User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'phone_number',
            'username',
            // 'email:email',
            // 'password',
            // 'authKey',
            // 'user_level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
<div align="right"><p>
        <?= Html::a('Reporte', ['report'], ['class' => 'btn btn-success']) ?>
    </p></div>

</div>
