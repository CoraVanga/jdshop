<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountProduct */

$this->title = 'Cập nhật khuyến mãi: ' . $model->info;
$this->params['breadcrumbs'][] = ['label' => 'Discount Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->info, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="discount-product-update">
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white" style="padding:10px;"><?= Html::encode($this->title) ?></h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form', [
					'model' => $model,
					'productList' => $productList,
					'typeList' =>$typeList,
					]) ?>
			</div>
		</div>
	</div>
</div>
