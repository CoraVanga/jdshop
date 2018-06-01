<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use app\models\ImageProduct;
use app\models\ProductDetail;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Giỏ hàng';
?>
<section class="main-content">				
	<div class="row">
		<div class="span9">					
			<h4 class="title"><span class="text"><strong>Đơn hàng cũ</strong> của bạn</span></h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Họ tên</th>
							<th>Tổng tiền</th>
							<th>Địa chỉ</th>
							<th>Ngày tạo</th>
							<th>Trạng thái</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($soList as $saleorder){
							echo '<tr>';
							echo '<td>'.$saleorder->user->name.'</td>';
							echo '<td>'.number_format($saleorder->total_price).'</td>';
							echo '<td>'.$saleorder->user->address.'</td>';
							echo '<td>'.date("d/m/Y", strtotime($saleorder->created_date)).'</td>';
							if($saleorder->status==4)
								echo '<td><span class="badge badge-success">Hoàn thành</span></td>';
							if($saleorder->status==3)
								echo '<td><span class="badge badge-warning">Đơn hàng</span></td>';
							echo '</tr>';
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
		<div class="span3 col">
			<div class="block">	
				<h4 class="title">
					<span class="pull-left"><span class="text">Sản phẩm bán chạy nhất</span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
					</span>
				</h4>
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails listing-products">
								<?php
								$i=0;
								foreach ($featureProduct as $product)
								{
									if ($i==1) {
										echo '</ul></div><div class="item"><ul class="thumbnails listing-products">';
										$i=0;
									}
									echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
									$model = Product::findOne($product['id_product']);
									if (!empty($model->getImageProducts()->one())) {
										$image = $model->getImageProducts()->asArray()->one();
										echo '<div class="jdimgcontainer">';
										echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../../product/view', 'id' => $product['id_product']]).'</p>';
										echo '<div class="middle">';
										echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id_product']]).'</div>';
										echo '</div></div>';
									}
									else
									{
										echo '<div class="jdimgcontainer">';
										echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id_product']]).'</p>';
										echo '<div class="middle">';
										echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id_product']]).'</div>';
										echo '</div></div>';
									}
									echo Html::a($product['name'], ['../../product/view', 'id' => $product['id_product']],['class' => 'title']);
										// echo '<p class="price">'.$model->price.' VNĐ</p>';
									echo '<br/>';
									echo Html::a($product['gender'], ['../product/view', 'id' => $product['id_product']],['class' => 'category']);
									echo '</div></li>';
									$i++;
								}
								?>					
							</div>
						</div>
					</div>
				</div>
				<div class="block">
					<h4 class="title">
						<span class="pull-left"><span class="text">Sản phẩm mới nhất</span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails listing-products">
									<?php
									$i=0;
									foreach ($newProduct as $product)
									{
										if ($i==1) {
											echo '</ul></div><div class="item"><ul class="thumbnails listing-products">';
											$i=0;
										}
										echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
										$model = Product::findOne($product['id']);
										if (!empty($model->getImageProducts()->one())) {
											$image = $model->getImageProducts()->asArray()->one();
											echo '<div class="jdimgcontainer">';
											echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../../product/view', 'id' => $product['id']]).'</p>';
											echo '<div class="middle">';
											echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id']]).'</div>';
											echo '</div></div>';
										}
										else
										{
											echo '<div class="jdimgcontainer">';
											echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id']]).'</p>';
											echo '<div class="middle">';
											echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
											echo '</div></div>';
										}
										echo Html::a($product['name'], ['../../product/view', 'id' => $product['id']],['class' => 'title']);
											// echo '<p class="price">'.$model->price.' VNĐ</p>';
										echo '<br/>';
										echo Html::a($model->type->gender, ['../../product/view', 'id' => $product['id']],['class' => 'category']);
										echo '</div></li>';
										$i++;
									}
									?>
								</ul>
							</div>
						</div>						
					</div>
				</div>
</section>		