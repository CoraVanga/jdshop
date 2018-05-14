<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-product-form">
<h3 class="card-title m-t-15">Thông tin khuyến mãi</h3>
    <hr>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row p-t-20">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'info')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="row p-t-20">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'discount')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="row p-t-20">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'begin_date')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="row p-t-20">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'end_date')->textInput() ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
