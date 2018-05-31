<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSaleOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sale Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sale Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'total_price',
            'id',
            //'bill_code',
            'status',
            'created_date',
            //'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
