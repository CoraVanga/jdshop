<?php

use yii\helpers\Html;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Tạo người dùng';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
    <?php Users::CheckMessage(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
