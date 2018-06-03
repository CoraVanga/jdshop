<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Type;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Cập nhật mở rộng cho sản phấm</h4>

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form>
                    <?php $form = ActiveForm::begin(); ?>


                        <div class="form-group">
                            <label>Loại Sản phẩm</label>
                            <select class="form-control" id="sel1">
						        <option>1</option>
						        <option>2</option>
						        <option>3</option>
						        <option>4</option>
						      </select>
                        </div>
                        <div class="form-group">
                            <label>Số tiền thay đổi</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Thực hiện</button>
                    <?php ActiveForm::end(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    
</div>