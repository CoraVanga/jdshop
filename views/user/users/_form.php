<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

        
            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'name')->textInput() ?>

            <?= $form->field($model, 'dob')->input('date') ?>
        
            <?= $form->field($model, 'phone')->textInput() ?>

            <?= $form->field($model, 'address')->textInput() ?>

            <?= $form->field($model, 'email')->textInput() ?>
            
            <input type="text" id="users-status" class="form-control" name="Users[status]" hidden="1">
            
            <?php $users = new Users(); echo $form->field($model, 'role')->dropDownList($users->getArrayRole()); ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    
</script>