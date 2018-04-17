<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Product', ['value'=>Url::to('product/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
            'header'=>'<h4>Sản phẩm</h4>',
            'id'=> 'modal',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
        <?php Pjax::begin(['id'=>'productGrid']); ?>
         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
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

