<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Trang chủ (admin)';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card p-30">
				<div class="media">
					<div class="media-left meida media-middle">
						<span><i class="fa fa-usd f-s-40 color-primary"></i></span>
					</div>
					<div class="media-body media-text-right">
						<h5><?=  number_format($revenue['0']['revenue']) ?></h5>
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
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Extra Area Chart</h4>
					<?= ChartJs::widget([
					    'type' => 'line',
					    'options' => [
					        'height' => 100,
					        'width' => 400
					    ],
					    'data' => [
					        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
					        'datasets' => [
					            [
					                'label' => "My First dataset",
					                'backgroundColor' => "rgba(179,181,198,0.2)",
					                'borderColor' => "rgba(179,181,198,1)",
					                'pointBackgroundColor' => "rgba(179,181,198,1)",
					                'pointBorderColor' => "#fff",
					                'pointHoverBackgroundColor' => "#fff",
					                'pointHoverBorderColor' => "rgba(179,181,198,1)",
					                'data' => [65, 59, 90, 81, 56, 55, 40]
					            ],
					            [
					                'label' => "My Second dataset",
					                'backgroundColor' => "rgba(255,99,132,0.2)",
					                'borderColor' => "rgba(255,99,132,1)",
					                'pointBackgroundColor' => "rgba(255,99,132,1)",
					                'pointBorderColor' => "#fff",
					                'pointHoverBackgroundColor' => "#fff",
					                'pointHoverBorderColor' => "rgba(255,99,132,1)",
					                'data' => [28, 48, 40, 19, 96, 27, 100]
					            ]
					        ]
					    ]
					]);
					?>
				</div>
			</div>
		</div>
	</div>
</div>