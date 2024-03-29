<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchSaleOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'total_price') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bill_code') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
