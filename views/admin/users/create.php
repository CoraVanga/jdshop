<?php

use yii\helpers\Html;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Thêm tài khoản';
$this->params['breadcrumbs'][] = ['label' => 'Tài khoản', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
	<?php Users::CheckMessage(); ?>
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white" style="padding:10px;"><?= Html::encode($this->title) ?></h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form', [
					'model' => $model,
					]) ?>
			</div>
		</div>
	</div>
</div>
