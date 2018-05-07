<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'size',
            'price',
            'amount',
            'id_product',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
