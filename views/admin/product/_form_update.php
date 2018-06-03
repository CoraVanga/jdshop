<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;
use app\models\DiscountProduct;
use yii\helpers\ArrayHelper;
use kato\DropZone;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <div class="card-title m-t-15">
        <h3>Thông tin sản phẩm</h3>
    </div>
    <hr>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
                <?php
                    $types=Type::find()->all();
                    $listtype = [];
                    foreach($types as $type)
                    {
                        if($type->gender!=null)
                            $listtype[$type->id]=$type->name.': '.$type->gender;
                        else
                            $listtype[$type->id]=$type->name;
                    }
                ?>
                <?= $form->field($model, 'id_type')->dropDownList($listtype,['prompt'=>'Loại sản phẩm'])->label(false)?>
            </div>

            <div class="col-md-4">
                <?php
                    $discounts=DiscountProduct::find()->all();
                    $listdp = [];
                    foreach($discounts as $discount)
                    {
                        $listdp[$discount->id]=$discount->info;
                    }
                ?>
                <?= $form->field($model, 'id_discount')->dropDownList($listdp,['prompt'=>'Khuyến mãi'])->label(false)?>
            </div>
        </div>
    </div>
    <label>Chọn hình ảnh</label>
    <input type="file" name="files[]" multiple="multiple" />
    <br>
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
      <!-- <button type="button" class="jdtablinks" onclick="openTab(event, 'image')">Hình ảnh</button> -->
      <button type="button" class="jdtablinks" onclick="openTab(event, 'info')">Mô tả</button>
    </div>

    <div id="detail" class="jdtabcontent" style="display: block; overflow:auto;">
        <div class="table-responsive">
            <table class="table table-hover jdOne2Many">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Kích cỡ</th>
                        <th>Giá</th>
                        <th>Số lượng tồn</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $i=1;
                            foreach($model->productDetails as $productdetail)
                            {
                                echo '<tr class="jdItem">';
                                echo '<td hidden="1" class="jdProductDetailID">'.$productdetail->id.'</td>';
                                echo '<td class="jdOrderNumber">'.$i.'</td>';
                                echo '<td>'.$productdetail->size.'</td>';
                                echo '<td>'.number_format($productdetail->price).' VNĐ</td>';
                                echo '<td>'.$productdetail->amount.'</td>';
                                echo '<td><p class="jdDeleteItem" onclick="deleteOne2ManyRow(this)"><i class="fa fa-trash-o jdDeleteDetail" aria-hidden="true"></i></p><td>';
                                echo '<tr/>';
                                $i++;
                            }
                        ?>
                    <tr class="jdButtonRow">
                        <td><button id="jdAddButton" type="button" class="btn btn-primary m-b-10 m-l-5 btn-sm">Thêm chi tiết mới</button></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div id="info" class="jdtabcontent" style="overflow:auto;">
        <?= $form->field($model, 'info')->textarea(['rows' => '9'])->label(false) ?>
    </div>

    <table>
        <tr>
            <h4>Hình ảnh</h4>
        </tr>
            <?php
            $i=0;
            echo '<tr>';
            foreach($model->imageProducts as $photo)
            {   
                    
                echo '<td>';
                echo '<div class="jdimgcontainer">';
                echo '<p hidden="1" class="jdImageId">'.$photo->id.'</p>';
                echo '<p><img width="200" height="200" src="../../images/product-images'.'/'.$photo->link.'"></p>';
                echo '<div class="jdmiddle">';
                echo '<p class="btn btn-danger jdDelImageButton">Xóa</p>';
                echo '</div></div>';
                echo '</td>';
                if($i==3)
                {
                    $i=0;
                    echo '</tr>';
                    echo '<tr>';
                }
                $i++;
                // if ($i==3) {
                //     echo '</tr><tr>';
                //     $i=0;
                // }

            }
            echo '</tr>';
            ?>
       
    </table>

    <div style="clear: both;"></div>
    <div class="form-group" >
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
