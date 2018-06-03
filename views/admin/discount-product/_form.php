<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Widget;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\DiscountProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-product-form">
<h3 class="card-title m-t-15">Thông tin khuyến mãi</h3>
    <hr>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row p-t-20">
        <div class="col-md-9">
            <div class="form-group">
                <?= $form->field($model, 'info')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="row p-t-0">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'discount')->textInput(['type'=>'number']) ?>
            </div>
        </div>
    </div>
    <div class="row p-t-20">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'begin_date')->widget(\yii\jui\DatePicker::class, [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    ]) ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
                    'options' => ['class' => 'form-control'],
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    ]) ?>
            </div>
        </div>
    </div>
    <h4>Danh sách sản phẩm áp dụng khuyến mãi</h4>
     <input type="hidden" name="productList" class="jdProductList" value="">
    <div class="jdtab">

      <button type="button" class="jdtablinks active" onclick="openTab(event, 'detail0')"><?= $typeList['0']['name']?></button>
      <?php
        $i=0;
        foreach($typeList as $type)
        {
            if($i!=0)
            {
                $string = '<button type="button" class="jdtablinks" onclick="openTab(event,';
                $string = $string."'detail".$i."')";
                $string = $string.'">';
                $string = $string.$type['name'];
                $string = $string.'</button>';
                echo $string;
            }
            $i++;
        }
      ?>
      <!-- <button type="button" class="jdtablinks" onclick="openTab(event, 'info')">Mô tả</button> -->
    </div>
    <?php
        $i=0;
        foreach($typeList as $type)
        {
            if($i==0)
                echo '<div id="detail'.$i.'" class="jdtabcontent" style="display: block; overflow:auto;">';
            else
                echo '<div id="detail'.$i.'" class="jdtabcontent" style="display: none; overflow:auto;">';
            echo '<div class="table-responsive">';
            echo '<table class="table table-hover jdDiscount">';
            echo '<thead>
                    <tr>
                        <th><input type="checkbox" class="jdProductType"></th>
                        <th>Tên sản phẩm</th>
                        <th>Mã</th>
                    </tr>
                </thead>
                ';
            echo '<tbody>';
            foreach($productList as $product)
            {
                if($product->type->name == $type['name'] && $product->id_discount == $model->id && $model->info!=null)
                {
                    echo '<tr>';
                    echo '<td><input type="checkbox" class="jdProductItem" checked="checked"></td>';
                    echo '<td hidden="1" class="jdProductID">'.$product->id.'</td>';
                    echo '<td>'.$product->name.'</td>';
                    echo '<td>'.$product->code.'</td>';
                    echo '</tr>';
                }
                else if($product->type->name == $type['name'])
                {
                    echo '<tr>';
                    echo '<td><input type="checkbox" class="jdProductItem"></td>';
                    echo '<td hidden="1" class="jdProductID">'.$product->id.'</td>';
                    echo '<td>'.$product->name.'</td>';
                    echo '<td>'.$product->code.'</td>';
                    echo '</tr>';
                }
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            $i++;   
        }
    ?>
    <!-- <div id="detail" class="jdtabcontent" style="display: block; overflow:auto;">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Kích cỡ</th>
                        <th>Giá</th>
                        <th>Số lượng tồn</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div id="info" class="jdtabcontent" style="overflow:auto;">
        <?=$model->info?>
    </div> -->

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
