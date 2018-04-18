<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Sửa đổi thông tin sản phẩm: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white"><?= Html::encode($this->title) ?></h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form', [
					'model' => $model,
					'modelImage'=>$modelImage,
					]) ?>
				</div>
			</div>
		</div>
	</div>
