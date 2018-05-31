<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tài khoản', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
        <h4><?= Html::encode($this->title) ?></h4>

        <p>
            <?= Html::a('Sửa đổi', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có chắc chắn muốn xóa tài khoản này?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
<div class="card-body">
    <div class="card-title m-t-15">
        <h3>Thông tin người dùng</h3>
    </div>
    <hr>
    <div class="row p-t-0">
        <div class="col-md-5">
            <div class="form-group">
                <h4>Họ và tên: <?=$model->name?></h4>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <h4>Số điện thoại: <?=$model->phone?></h4>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-3">
            <div class="form-group">
                <h4>Ngày sinh: <?=$model->dob?></h4>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-10">
            <div class="form-group">
                <h4>Địa chỉ: <?=$model->address?></h4>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-5">
            <div class="form-group">
                <h4>Email: <?=$model->email?></h4>
            </div>
        </div>
    </div>
    <div class="card-title m-t-15">
        <h3>Thông tin tài khoản</h3>
    </div>
    <hr>
    <div class="row p-t-0">
        <div class="col-md-5">
            <div class="form-group">
                <h4>Tên đăng nhập: <?=$model->username?></h4>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <h4>Quyền truy cập: <?php
                $role = $model->role;
                if($role==1)
                    echo 'Admin';
                if($role==2)
                    echo 'Quản lý';
                if($role==3)
                    echo 'Nhân viên';
                if($role==4)
                    echo 'Khách hàng';
                    ?></h4>
            </div>
        </div>
    </div>
    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'password',
            'name',
            'dob',
            'phone',
            'role',
            'address',
            'email:email',
            'status',
        ],
    ]) ?> -->

</div>
</div>
</div>
</div>
</div>
