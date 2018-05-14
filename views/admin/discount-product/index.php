<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchDiscountProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách khuyến mãi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-product-index">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4><?= Html::encode($this->title) ?></h4>
                <p>
                    <?= Html::a('Tạo khuyến mãi', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

            // 'id',
                        'info',
                        'discount',
            // 'created_date',
                        'begin_date',
                        'end_date',
            // 'created_uid',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    ]); ?>
            </div>
        </div>
    </div>
</div>

