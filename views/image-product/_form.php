<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\ImageProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-product-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?=
    	$form->field($model, 'id_product')->dropDownList(ArrayHelper::map(Product::find()->select(['id','name'])->all(),'id','name'))
    ?>
    <!-- <?= $form->field($model, 'id_product')->textInput() ?> -->
    <?= $form->field($model, 'link')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
