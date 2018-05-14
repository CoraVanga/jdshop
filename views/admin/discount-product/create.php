<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiscountProduct */

$this->title = 'Tạo khuyến mãi';
$this->params['breadcrumbs'][] = ['label' => 'Discount Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-product-create">
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white"><?= Html::encode($this->title) ?></h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form', [
					'model' => $model,
					]) ?>
			</div>
		</div>
	</div>
</div>
