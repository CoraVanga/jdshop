<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách sản phẩm';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-index">
<div class="col-lg-12">
    <div class="card">
        <div class="card-title">
    <h4><?= Html::encode($this->title) ?></h4>
        <p>
        <?= Html::a('Thêm sản phẩm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
    <div class="card-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'price',
            'created_date',
            'status',
            //'code',
            //'size',
            //'amount',
            //'info',
            //'id_type',
            //'created_uid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
</div>
