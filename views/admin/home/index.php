<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Trang chủ (admin)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-3">
		<div class="card p-30">
			<div class="media">
				<div class="media-left meida media-middle">
					<span><i class="fa fa-usd f-s-40 color-primary"></i></span>
				</div>
				<div class="media-body media-text-right">
					<h5><?=  number_format($revenue['0']['revenue']) ?> VNĐ</h5>
					<p class="m-b-0">Tổng doanh số</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card p-30">
			<div class="media">
				<div class="media-left meida media-middle">
					<span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
				</div>
				<div class="media-body media-text-right">
					<h5><?=number_format($sales['0']['sales'])?></h5>
					<p class="m-b-0">Lần mua hàng</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card p-30">
			<div class="media">
				<div class="media-left meida media-middle">
					<span><i class="fa fa-archive f-s-40 color-warning"></i></span>
				</div>
				<div class="media-body media-text-right">
					<h5><?=number_format($products['0']['products'])?></h5>
					<p class="m-b-0">Sản phẩm</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card p-30">
			<div class="media">
				<div class="media-left meida media-middle">
					<span><i class="fa fa-user f-s-40 color-danger"></i></span>
				</div>
				<div class="media-body media-text-right">
					<h5><?=number_format($customers['0']['users'])?></h5>
					<p class="m-b-0">Khách hàng</p>
				</div>
			</div>
		</div>
	</div>
</div>