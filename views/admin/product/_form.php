<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <h3 class="card-title m-t-15">Thông tin sản phẩm</h3>
    <hr>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row p-t-20">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'id_type')->dropDownList(ArrayHelper::map(Type::find()->select(['id','name'])->all(),'id','name'),['class'=>'form-control custom-select'])?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'name')->textInput(['class'=>'form-control']) ?>

    <div class="row p-t-20">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'code')->textInput(['class'=>'form-control']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'size')->textInput(['class'=>'form-control']) ?>
            </div>
        </div>
    </div>

    <div class="row p-t-20">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'price')->textInput() ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'amount')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="row p-t-20">
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'info')->textarea() ?>
            </div>
        </div>
    </div>
    
    <?= $form->field($modelImage, 'link')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
