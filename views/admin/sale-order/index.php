<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSaleOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách đơn hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-index">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4><?= Html::encode($this->title) ?></h4>
                <p>
                    
                </p>
            </div>
            <div class="card-body">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'id_user',
                            'label' => 'Họ & tên',
                            'value' => function ($model) {
                                    return $model->user->name;
                            },
                        ],
                        //'total_price',
                        //'user.address:text:School',
                        [
                            //'label' => 'total_price',
                            'attribute'=>'total_price',
                            'value' => function ($model) {
                                    return number_format($model->total_price);
                            },
                        ],
                        //'id',
                        //'bill_code',
                        // [
                        //     'attribute' => 'id_user',
                        //     'label' => 'Địa chỉ',
                        //     'value' => function ($model) {
                        //             return $model->user->address;
                        //     },
                        // ],
                        [
                            'label' => 'Ngày tạo',
                            'attribute'=>'created_date',
                            'value' => function ($model) {
                                    return date("d/m/Y", strtotime($model->created_date));
                            },
                        ],
                        [
                            'label' => 'Trạng thái',
                            'value' => function ($model) {
                                    if($model->status==4)
                                        return 'Hoàn hành';
                                    if($model->status==3)
                                        return 'Đơn hàng';
                                    
                            },
                        ],
                        //'status',
                        //'id_user',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    ]); ?>
            </div>
        </div>
    </div>
</div>

