<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchOrderLine */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Lines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-line-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Line', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'amount',
            'size_product',
            'sum_price',
            'code_color',
            //'id_product',
            //'id_bill',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
