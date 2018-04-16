<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ImageProduct */
$this->title = 'Hình ảnh của '.$model->product->name;
$this->params['breadcrumbs'][] = ['label' => 'Image Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-product-view">

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
            'id_product',
            [
                'attribute'=>'link',
                'value'=> 'http://localhost:7777/images/product-images'.'/'.$model->link,
                'format'=>['image',['width' => '100', 'height' => '100']]
            ]
        ],
    ]) ?>

</div>