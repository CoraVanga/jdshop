<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phảm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

<div class="col-lg-12">
    <div class="card">
        <div class="card-title">
    <h4><?= Html::encode($this->title) ?></h4>

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
</div>
<div class="card-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'created_date',
            'status',
            'code',
            'size',
            'amount',
            'info',
            'id_type',
            'created_uid',
        ],
    ]) ?>
    <table>
        <tr>
            <h4>Hình ảnh</h4>
        </tr>
         <tr>
            <?php
            $i=0;
            foreach($model->imageProducts as $photo)
            { 
                echo '<td><img width="200" height="200" src="../images/product-images'.'/'.$photo->link.'"></td>';
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
</div>
