<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ImageProduct */

$this->title = 'Create Image Product';
$this->params['breadcrumbs'][] = ['label' => 'Image Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
