<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SaleOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-view">
    <div class="col-lg-10">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white" style="padding:10px;">Thông tin đơn hàng</h4>
            </div>
            <br/>
            <p>
                <?= Html::a('Sửa đổi', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa sản phẩm này?',
                        'method' => 'post',
                    ],
                    ]) ?>
            </p>
            <br/>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'total_price',
            'id',
            //'bill_code',
            'status',
            'created_date',
            'id_user',
        ],
    ]) ?>

</div>
