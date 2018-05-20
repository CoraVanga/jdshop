<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;
use app\models\DiscountProduct;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <div class="card-title m-t-15">
        <h3>Thông tin sản phẩm</h3>
    </div>
    <hr>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row p-t-0">
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'name')->textInput()->input('name', ['placeholder' => "Tên sản phẩm"])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'code')->textInput()->input('code', ['placeholder' => "Mã sản phẩm"])->label(false) ?>
            </div>
        </div>
    </div>
 
    <div class="row p-t-20">
        <div class="form-group">
            <div class="col-md-3">
                <?= $form->field($model, 'id_type')->dropDownList(ArrayHelper::map(Type::find()->select(['id','name'])->all(),'id','name'),['class'=>'form-control custom-select'])?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'id_discount')->dropDownList(ArrayHelper::map(DiscountProduct::find()->select(['id','info'])->all(),'id','info'),['class'=>'form-control custom-select'])?>
            </div>
        </div>
    </div>

<!--     <div class="row p-t-20">
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'info')->textarea(['rows' => '7']) ?>
            </div>
        </div>
    </div> -->
    <input type="hidden" name="sizeList" class="jdSizeList" value="">
    <input type="hidden" name="priceList" class="jdPriceList" value="">
    <input type="hidden" name="amountList" class="jdAmountList" value="">
    <div class="jdtab">
      <button type="button" class="jdtablinks active" onclick="openTab(event, 'detail')">Chi tiết sản phẩm</button>
      <button type="button" class="jdtablinks" onclick="openTab(event, 'image')">Hình ảnh</button>
      <button type="button" class="jdtablinks" onclick="openTab(event, 'info')">Mô tả</button>
    </div>

    <div id="detail" class="jdtabcontent" style="display: block; overflow:auto;">
        <div class="table-responsive">
            <table class="table table-striped jdOne2Many">
                <thead>
                    <tr>
                        <th>Kích cỡ</th>
                        <th>Giá</th>
                        <th>Số lượng tồn</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="jdButtonRow">
                        <td><button id="jdAddButton" type="button" class="btn btn-primary m-b-10 m-l-5 btn-sm">Thêm chi tiết mới</button></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="image" class="jdtabcontent" style="overflow:auto;">
        <?= $form->field($modelImage, 'link')->fileInput() ?>
    </div>

    <div id="info" class="jdtabcontent" style="overflow:auto;">
        <?= $form->field($model, 'info')->textarea(['rows' => '9'])->label(false) ?>
    </div>

    <div style="clear: both;"></div>
    <div class="form-group" >
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
