<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            <h1>Hình ảnh</h1>
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
