<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Product;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<section class="header_text sub">
			<img class="pageBanner" src="../../assets-shopper/themes/images/carousel/nhannu.jpg" alt="New products" >
				<h4><span><?=$nametype?></span></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">
							<?php
								foreach($productList as $product)
								{
									echo '<li class="span3">';
									echo '<div class="product-box">';
									echo '<span class="sale_tag"></span>';
									$model = Product::findOne($product['pid']);
									if (!empty($model->getImageProducts()->one())) {
										$image = $model->getImageProducts()->asArray()->one();
											echo '<div class="jdimgcontainer">';
									 		echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../product/view', 'id' => $product['pid']]).'</p>';
									 		echo '<div class="middle">';
									 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['pid']]).'</div>';
									 		echo '</div></div>';
									 	}
								 	else
								 	{
								 		echo '<div class="jdimgcontainer">';
								 		echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['pid']]).'</p>';
								 		echo '<div class="middle">';
								 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['pid']]).'</div>';
								 		echo '</div></div>';
								 	}
								 	echo Html::a($product['productname'], ['../product/view', 'id' => $product['pid']],['class' => 'title']);
									// echo '<p class="price">'.$model->price.' VNĐ</p>';
									echo '<br/>';
									echo Html::a($product['gender'], ['../product/view', 'id' => $product['pid']],['class' => 'category']);

									echo '</div>';
									echo '</li>';
								}
							?>
												
						<hr>
						<div class="pagination pagination-small pagination-centered">
							<ul>
								<li><a href="#">Prev</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">MÀU CHẤT LIỆU</li>
								<li><a href="products.html">Hồng+Trắng</a></li>
								<li class="active"><a href="products.html">Trắng</a></li>
								<li><a href="products.html">Bạc si vàng vàng</a></li>
								<li><a href="products.html">Bạc si vàng hồng</a></li>
								<li><a href="products.html">Giả cổ</a></li>
							</ul>
							<br/>
							<ul class="nav nav-list below">
								<li class="nav-header">LOẠI ĐÁ CHÍNH</li>
								<li><a href="products.html">CZ</a></li>
								<li><a href="products.html">Ngọc Trai</a></li>
								<li><a href="products.html">Syntethic</a></li>
							</ul>
						</div>
						<div class="block">
							<h4 class="title">
								<span class="pull-left"><span class="text">Sản phẩm mới nhất</span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<img alt="" src="../assets-shopper/themes/images/ladies/1.jpg"><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$261</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">												
													<img alt="" src="../assets-shopper/themes/images/ladies/2.jpg"><br/>
													<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
													<a href="#" class="category">Urna nec lectus mollis</a>
													<p class="price">$134</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="block">								
							<h4 class="title"><strong>Hỗ trợ</strong> Khách hàng </h4>		
							<ul>
								<li><a href="products.html">Hỗ trợ mua hàng</a></li>
								<li><a href="products.html">Tư vấn chọn trang sức</a></li>
							</ul>						
							
						</div>
					</div>
				</div>
			</section>

