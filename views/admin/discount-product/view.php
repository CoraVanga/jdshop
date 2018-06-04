<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountProduct */

$this->title = $model->info;
$this->params['breadcrumbs'][] = ['label' => 'Khuyến mãi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-product-view">
    <div class="col-lg-10">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white" style="padding:10px;">Thông tin khuyến mãi</h4>
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
            <div class="card-body">
                <div class="row p-t-20">
                    <div class="col-md-9">
                        <div class="form-group">
                            <h4>Mô tả: <?=$model->info?></h4>
                        </div>
                    </div>
                </div>
                <div class="row p-t-0">
                    <div class="col-md-3">
                        <div class="form-group">
                            <h4>% Khuyến mãi: <?=$model->discount?></h4>
                        </div>
                    </div>
                </div>
                <div class="row p-t-20">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>Ngày bắt đầu: <?=date("d/m/Y", strtotime($model->begin_date))?></h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>Ngày kết thúc: <?=date("d/m/Y", strtotime($model->begin_date))?></h4>
                        </div>
                    </div>
                </div>
                <h4>Danh sách sản phẩm áp dụng khuyến mãi</h4>
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
                                    <th>Tên sản phẩm</th>
                                    <th>Mã</th>
                                </tr>
                            </thead>
                            ';
                        echo '<tbody>';
                        foreach($productList as $product)
                        {
                            if($product->type->name == $type['name'] && $product->id_discount == $model->id)
                            {
                                echo '<tr>';
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
            </div>
        </div>
    </div>
</div>
