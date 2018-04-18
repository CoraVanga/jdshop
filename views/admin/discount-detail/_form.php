<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_discount')->textInput() ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
