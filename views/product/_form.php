<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'info')->textInput() ?>

    <?= $form->field($model, 'id_type')->textInput() ?>

    <?= $form->field($model, 'created_uid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize
        \$form.serialize()
    )
        .done(function(result){
            if(result.massage == 'Success')
            {

                $(\$form).trigger("reset");
                $.pjax.reload({container:'#productGrid'});
            }
            else
            {
                
                $("#messager").html(result.message);
            }

        });
        .fail(function(){
            console.log("server error");
        });
    return false;
}
JS;
$this->registerJS($script);
?>
