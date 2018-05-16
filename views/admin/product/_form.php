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

    <div class="jdtab">
      <button type="button" class="jdtablinks active" onclick="openTab(event, 'detail')">Chi tiết sản phẩm</button>
      <button type="button" class="jdtablinks" onclick="openTab(event, 'image')">Hình ảnh</button>
      <button type="button" class="jdtablinks" onclick="openTab(event, 'info')">Mô tả</button>
    </div>

    <div id="detail" class="jdtabcontent" style="display: block;">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kolor Tea Shirt For Man</td>
                        <td><span class="badge badge-primary">Sale</span></td>
                        <td>January 22</td>
                        <td class="color-primary">$21.56</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Kolor Tea Shirt For Women</td>
                        <td><span class="badge badge-success">Tax</span></td>
                        <td>January 30</td>
                        <td class="color-success">$55.32</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Blue Backpack For Baby</td>
                        <td><span class="badge badge-danger">Extended</span></td>
                        <td>January 25</td>
                        <td class="color-danger">$14.85</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="image" class="jdtabcontent">
        <?= $form->field($modelImage, 'link')->fileInput() ?>
    </div>

    <div id="info" class="jdtabcontent">
        <?= $form->field($model, 'info')->textarea(['rows' => '6'])->label(false) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
