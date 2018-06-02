<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Sửa đổi thông tin sản phẩm: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="product-update">
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white" style="padding:10px;">Cập nhật thông tin</h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form_update', [
					'model' => $model,
					'modelImage'=>$modelImage,
					]) ?>
			</div>
		</div>
	</div>
</div>
