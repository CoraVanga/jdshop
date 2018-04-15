<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

?>
<h2><?= Html::encode($model->id . ' : ' . $model->name) ?></h2>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'price',
    ],
]) ?>