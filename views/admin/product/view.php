<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\DiscountProduct;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <div class="col-lg-10">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white" style="padding:10px;">Thông tin sản phẩm</h4>
            </div>
            <br/>
            <p>
                <?= Html::a('Sửa đổi', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa sản phẩm này?',
                        'method' => 'post',
                    ],
                    ]) ?>
            </p>
            <br/>
            <div class="card-body">
                <div class="row p-t-0">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4>Tên sản phẩm: <?=$model->name?></h4>
                        </div>
                    </div>
                </div>
                <div class="row p-t-0">
                    <div class="col-md-10">
                        <div class="form-group">
                            <h4>Mã sản phẩm: <?=$model->code?></h4>
                        </div>
                    </div>
                </div>
             
                <div class="row p-t-20">
                    <div class="form-group">
                        <div class="col-md-5">
                            <h4>Loại sản phẩm: <?=$model->type->name.':'.$model->type->gender?></h4>
                        </div>
                    </div>
                </div>

                <div class="row p-t-20">
                    <div class="form-group">
                        <div class="col-md-10">
                            <h4>Khuyến mãi: 
                            <?= Html::a($discount->info, ['../../admin/discount-product/view','id'=>$discount->id]) ?></h4>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="jdtab">
                  <button type="button" class="jdtablinks active" onclick="openTab(event, 'detail')">Chi tiết sản phẩm</button>
                  <!-- <button type="button" class="jdtablinks" onclick="openTab(event, 'image')">Hình ảnh</button> -->
                  <button type="button" class="jdtablinks" onclick="openTab(event, 'info')">Mô tả</button>
                </div>

                <div id="detail" class="jdtabcontent" style="display: block; overflow:auto;">
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
                                <?php
                                    $i=1;
                                    foreach($productdetails as $productdetail)
                                    {
                                        echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.$productdetail->size.'</td>';
                                        echo '<td>'.number_format($productdetail->price).' VNĐ</td>';
                                        echo '<td>'.$productdetail->amount.'</td>';
                                        echo '<tr/>';
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div id="info" class="jdtabcontent" style="overflow:auto;">
                    <?=$model->info?>
                </div>
                <table>
                    <tr>
                        <h4>Hình ảnh</h4>
                    </tr>
                    <tr>
                        <?php
                        $i=0;
                        foreach($model->imageProducts as $photo)
                        { 
                            echo '<td><img width="200" height="200" src="../../images/product-images'.'/'.$photo->link.'"></td>';
                            $i++;
                            if ($i==3) {
                                echo '</tr><tr>';
                                $i=0;
                            }
                        }
                        ?>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
</div>
