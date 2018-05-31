<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card-title m-t-15">
        <h3>Thông tin người dùng</h3>
    </div>
    <hr>
    <div class="row p-t-0">
        <div class="col-md-5">
            <div class="form-group">
                <?= $form->field($model, 'name')->textInput()->input('name', ['placeholder' => "Họ và tên"])->label(false) ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <?= $form->field($model, 'phone')->textInput()->input('phone', ['placeholder' => "Số điện thoại"])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'dob')->input('date', ['placeholder' => "Ngày sinh"],['class'=>'form-control input-sm'])?>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-10">
            <div class="form-group">
                <?= $form->field($model, 'address')->input('address', ['placeholder' => "Địa chỉ"],['class'=>'form-control input-sm'])->label(false)?>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-5">
            <div class="form-group">
                <?= $form->field($model, 'email')->input('email', ['placeholder' => "email"],['class'=>'form-control input-sm'])->label(false)?>
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
                <?= $form->field($model, 'username')->textInput()->input('username', ['placeholder' => "Tên tài khoản"])->label(false) ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput()->input('password', ['placeholder' => "Mật khẩu"])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-5">
            <div class="form-group">
                <input type="text" id="users-status" class="form-control" name="Users[status]" hidden="1">
                <?php $users = new Users(); echo $form->field($model, 'role')->dropDownList($users->getArrayRole()); ?>
            </div>
        </div>
    </div>
        
        
        

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    
</script>