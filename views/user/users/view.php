<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title ='Thông tin tài khoản '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật thông tin', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Thay đổi mật khẩu', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>
    <div style="width:50%">
    <?= DetailView::widget([
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
    ]) ?>
    </div>

</div>
