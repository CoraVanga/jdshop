<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SaleOrder */

$this->title = 'Đơn hàng số: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-order-view">
    <div class="col-lg-12">
        <div class="card card-outline-primary">
            <div class="card-header">
                <table width="100%">
                    <tr>
                        <td><h4 class="m-b-0 text-white" style="padding:10px;" width="50%">Thông tin đơn hàng</h4></td>
                        <td><h4 class="m-b-0 text-white" style="padding:10px;" width="50%">Trạng thái: <?php
                            if($model->status==4)
                                echo 'Hoàn thành';
                            if($model->status==3)
                                echo 'Đơn hàng';
                            if($model->status==2)
                                echo 'Nháp';
                            if($model->status==1)
                                echo 'Giỏ hàng';
                            if($model->status==0)
                                echo 'Hủy';
                            ?></h4></td>
                    </tr>
                </table>
                <!-- <h4 class="m-b-0 text-white" style="padding:10px;">Thông tin đơn hàng</h4> -->
            </div>
            <br/>
            <p>
                <?= Html::a('In', ['print', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
                <?php
                    if($model->status==1 || $model->status==2)
                        echo Html::a('Xác nhận', ['changestatus', 'id' => $model->id, 'status'=>3],['class'=>'btn btn-warning']);
                    if($model->status==3)
                        echo Html::a('Hoàn Thành', ['changestatus', 'id' => $model->id, 'status'=>4],['class'=>'btn btn-success']);
                ?>
                <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa đơn hàng này?',
                        'method' => 'post',
                    ],
                    ]) ?>
                <?php
                if($model->status!=0 && $model->status!=4)
                    echo Html::a('Hủy', ['changestatus', 'id' => $model->id, 'status'=>0], [
                    'class' => 'btn btn-default',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn hủy đơn hàng này?',
                        'method' => 'post',
                    ],
                    ]) ?>
                
            </p>
            <br/>
            <div class="card-body">
                <div class="row p-t-20">
                    <div class="col-md-9">
                        <div class="form-group">
                            <h4>Tên khách hàng: <?=$model->user->name?></h4>
                        </div>
                    </div>
                </div>
                <div class="row p-t-20">
                    <div class="col-md-9">
                        <div class="form-group">
                            <h4>Địa chỉ: <?=$model->user->address?></h4>
                        </div>
                    </div>
                </div>
                
                <div class="row p-t-20">
                    <div class="col-md-5">
                        <div class="form-group">
                            <h4>Ngày tạo: <?=date("d/m/Y", strtotime($model->created_date))?></h4>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($model->orderLines as $orderline)
                            {
                                echo '<tr>
                                    <td>'.$orderline->product->name.'</td>
                                    <td>'.$orderline->size_product.'</td>
                                    <td>'.$orderline->amount.'</td>
                                    <td>'.number_format($orderline->sum_price).'</td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <h3 align="right">Tổng cộng: <?=number_format($model->total_price)?> VNĐ</h3>
            </div>
        </div>
    </div>
</div>
