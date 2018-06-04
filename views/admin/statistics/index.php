<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Thống kê';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card p-30">
				<h6 align="center">SẢN PHẨM BÁN CHẠY NHẤT THÁNG <?=date('m').'/'.date('Y')?></h6>
					<?php
						$i=0;
						foreach ($feature1MountProduct as $product)
						{
							
							$model = Product::findOne($product['id_product']);
							echo '<div class="avatar jdimgcontainer">';
							if (!empty($model->getImageProducts()->one())) {
								
								$image = $model->getImageProducts()->asArray()->one();
								echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p>';
								echo '<div class="jdmiddle">';
				                echo '<p class="btn btn-info">Số lần mua: '.$product['amount'].'</p>';
				                echo '</div></div>';
								// echo '<div class="middle">';
								// echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id_product']]).'</div>';
								// echo '</div></div>';
							}
							else
							{
								echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p></div>';
							}
							echo '<h6 align="center">'.$model->name.'</h6>';
						}
					?>
					<!-- <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Allison Walker">
                    </div> -->
					<!-- <div class="media-body media-text-right">
						<h5><?=  number_format($revenue['0']['revenue']) ?></h5>
						<p class="m-b-0">Tổng doanh số</p>
					</div> -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tổng lợi nhuận theo loại sản phẩm tháng <?=date('m').'/'.date('Y')?></h4>
					<?php
					$label = []; 
					$data = [];
					foreach($profit1MonthByType as $type)
					{
						array_push($label,$type['name']);
						array_push($data,$type['amount']);
					}
					echo ChartJs::widget([
					    'type' => 'bar',
					    'options' => [
					        'height' => 170,
                    
                
					    ],
					    'data' => [
					        'labels' => $label,
					        'datasets' => [
					            [
					                'label' => false,
					                'backgroundColor' => ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95ce"],
					                'hoverBackgroundColor' => ["#3e95dd", "#8e5eb2","#3cba0f","#e8c3c9","#c45860","#3e95de"],
					                'data' => $data,

					            ],
					        ]
					    ],
					    'clientOptions' => [
					    	'legend' => [ 'display'=> false ],
					    ],
					]);
					?>
				</div>
			</div>
		</div>
		<div class="col-md-3" >
			<div class="card" style="height: 350px;">
				<div class="card-body">
					<h4 class="card-title">In danh sách đơn hàng</h4>
					<form class="form-horizontal" method="post" action="statistics/print">
						<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
						<div class="form-group">
							<label for="beginDate">Ngày bắt đầu</label>
							<input type="date" class="form-control" name="beginDate">
						</div>
						<div class="form-group">
							<label for="endDate">Ngày kết thúc</label>
							<input type="date" class="form-control" name="endDate">
						</div>
						<div id="jdCartSubmitButton" style="text-align: center;">
							<button class="btn btn-inverse"  type="submit">In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="card p-30">
				<h6 align="center">SẢN PHẨM BÁN CHẠY NHẤT TỪ <?=date("m",strtotime("-3 month"))?>-<?=date('m').'/'.date('Y')?></h6>
					<?php
						$i=0;
						foreach ($feature3MountProduct as $product)
						{
							
							$model = Product::findOne($product['id_product']);
							echo '<div class="avatar jdimgcontainer">';
							if (!empty($model->getImageProducts()->one())) {
								
								$image = $model->getImageProducts()->asArray()->one();
								echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p>';
								echo '<div class="jdmiddle">';
				                echo '<p class="btn btn-info">Số lần mua: '.$product['amount'].'</p>';
				                echo '</div></div>';
								// echo '<div class="middle">';
								// echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id_product']]).'</div>';
								// echo '</div></div>';
							}
							else
							{
								echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p></div>';
							}
							echo '<h6 align="center">'.$model->name.'</h6>';
						}
					?>
					<!-- <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Allison Walker">
                    </div> -->
					<!-- <div class="media-body media-text-right">
						<h5><?=  number_format($revenue['0']['revenue']) ?></h5>
						<p class="m-b-0">Tổng doanh số</p>
					</div> -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tổng lợi nhuận theo loại sản phẩm TỪ <?=date("m",strtotime("-3 month"))?>-<?=date('m').'/'.date('Y')?></h4>
					<?php
					$label = []; 
					$data = [];
					foreach($profit3MonthByType as $type)
					{
						array_push($label,$type['name']);
						array_push($data,$type['amount']);
					}
					echo ChartJs::widget([
					    'type' => 'bar',
					    'options' => [
					        'height' => 170,
                    
                
					    ],
					    'data' => [
					        'labels' => $label,
					        'datasets' => [
					            [
					                'label' => false,
					                'backgroundColor' => ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95ce"],
					                'hoverBackgroundColor' => ["#3e95dd", "#8e5eb2","#3cba0f","#e8c3c9","#c45860","#3e95de"],
					                'data' => $data,

					            ],
					        ]
					    ],
					    'clientOptions' => [
					    	'legend' => [ 'display'=> false ],
					    ],
					]);
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="card p-30">
				<h6 align="center">SẢN PHẨM BÁN CHẠY NHẤT NĂM <?=date('Y')?></h6>
					<?php
						$i=0;
						foreach ($featureYearProduct as $product)
						{
							
							$model = Product::findOne($product['id_product']);
							echo '<div class="avatar jdimgcontainer">';
							if (!empty($model->getImageProducts()->one())) {
								
								$image = $model->getImageProducts()->asArray()->one();
								echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p>';
								echo '<div class="jdmiddle">';
				                echo '<p class="btn btn-info">Số lần mua: '.$product['amount'].'</p>';
				                echo '</div></div>';
								// echo '<div class="middle">';
								// echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id_product']]).'</div>';
								// echo '</div></div>';
							}
							else
							{
								echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p></div>';
							}
							echo '<h6 align="center">'.$model->name.'</h6>';
						}
					?>
					<!-- <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Allison Walker">
                    </div> -->
					<!-- <div class="media-body media-text-right">
						<h5><?=  number_format($revenue['0']['revenue']) ?></h5>
						<p class="m-b-0">Tổng doanh số</p>
					</div> -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tổng lợi nhuận theo loại sản phẩm năm <?=date('Y')?></h4>
					<?php
					$label = []; 
					$data = [];
					foreach($profitYearByType as $type)
					{
						array_push($label,$type['name']);
						array_push($data,$type['amount']);
					}
					echo ChartJs::widget([
					    'type' => 'bar',
					    'options' => [
					        'height' => 170,
                    
                
					    ],
					    'data' => [
					        'labels' => $label,
					        'datasets' => [
					            [
					                'label' => false,
					                'backgroundColor' => ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95ce"],
					                'hoverBackgroundColor' => ["#3e95dd", "#8e5eb2","#3cba0f","#e8c3c9","#c45860","#3e95de"],
					                'data' => $data,

					            ],
					        ]
					    ],
					    'clientOptions' => [
					    	'legend' => [ 'display'=> false ],
					    ],
					]);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
	