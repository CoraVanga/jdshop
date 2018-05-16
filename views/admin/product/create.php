<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Tạo sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white" style="padding:10px;"><?= Html::encode($this->title) ?></h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form', [
					'model' => $model,
					'modelImage'=> $modelImage,
					]) ?>
			</div>
		</div>
	</div>
</div>
