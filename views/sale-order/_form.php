<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaleOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'total_price')->textInput() ?>

    <?= $form->field($model, 'bill_code')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
