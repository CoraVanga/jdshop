<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<section  class="homepage-slider" id="home-slider">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="../assets-shopper/themes/images/carousel/banner-1.jpg" alt="" />
			</li>
			<li>
				<img src="../assets-shopper/themes/images/carousel/banner2.jpg" alt="" />
			</li>
		</ul>
	</div>			
</section>
<section class="main-content">
<div class="row">
	<div class="span12">													
		<div class="row">
			<div class="span12">
				<h4 class="title">
					<span class="pull-left"><span class="text"><span class="line">SẢN PHẨM <strong>THỊNH HÀNH</strong></span></span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
					</span>
				</h4>
				<div id="myCarousel" class="myCarousel carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails">
								<?php
									$i=0;
									foreach ($dataProvider->models as $model) {
									echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
									if ($model->getImageProducts()->one()) {
										$image = $model->getImageProducts()->asArray()->one();
									 		echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" alt="" />', ['../product/view', 'id' => $model->id]).'</p>';
									 	}
									 	echo Html::a($model->name, ['../product/view', 'id' => $model->id],['class' => 'title']);
										echo '<p class="price">'.$model->price.' VNĐ</p>';
										echo '</div></li>';
										$i++;
										if($i==8) break;
										if ($i==4) {
											echo '</div><div class="item"><ul class="thumbnails">';
											$i=0;
										}
									}
								?>									
								
						</div>
					</div>							
				</div>
			</div>						
		</div>
	</div>
</div>
<div class="row">
	<div class="span12">
		<h4 class="title">
			<span class="pull-left"><span class="text"><span class="line">SẢN PHẨM <strong>MỚI NHẤT</strong></span></span></span>
			<span class="pull-right">
				<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
			</span>
		</h4>
		<div id="myCarousel-2" class="myCarousel carousel slide">
			<div class="carousel-inner">
				<div class="active item">
					<ul class="thumbnails">												
						<li class="span3">
							<div class="product-box">
								<span class="sale_tag"></span>
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware2.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">Ut wisi enim ad</a><br>
								<a href="products.html" class="category">Commodo consequat</a>
								<p class="price">$25.50</p>
							</div>
						</li>
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware1.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br>
								<a href="products.html" class="category">Quis nostrud</a>
								<p class="price">$17.55</p>
							</div>
						</li>
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware6.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">Know exactly turned</a><br>
								<a href="products.html" class="category">Quis nostrud</a>
								<p class="price">$25.30</p>
							</div>
						</li>
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware5.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">You think fast</a><br>
								<a href="products.html" class="category">World once</a>
								<p class="price">$25.60</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="item">
					<ul class="thumbnails">
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware4.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">Know exactly</a><br>
								<a href="products.html" class="category">Quis nostrud</a>
								<p class="price">$45.50</p>
							</div>
						</li>
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware3.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">Ut wisi enim ad</a><br>
								<a href="products.html" class="category">Commodo consequat</a>
								<p class="price">$33.50</p>
							</div>
						</li>
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware2.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">You think water</a><br>
								<a href="products.html" class="category">World once</a>
								<p class="price">$45.30</p>
							</div>
						</li>
						<li class="span3">
							<div class="product-box">
								<p><a href="product_detail.html"><img src="../assets-shopper/themes/images/cloth/bootstrap-women-ware1.jpg" alt=""></a></p>
								<a href="product_detail.html" class="title">Quis nostrud exerci</a><br>
								<a href="products.html" class="category">Quis nostrud</a>
								<p class="price">$25.20</p>
							</div>
						</li>																																	
					</ul>
				</div>
			</div>							
		</div>
	</div>						
</div>
<div class="row feature_box">						
	<div class="span4">
		<div class="service">
			<div class="responsive">	
				<img src="../assets-shopper/themes/images/feature_img_2.png" alt="" />
				<h4>Thiết kế  <strong>sang trọng</strong></h4>
				<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
			</div>
		</div>
	</div>
	<div class="span4">	
		<div class="service">
			<div class="customize">			
				<img src="../assets-shopper/themes/images/feature_img_1.png" alt="" />
				<h4>Miễn phí  <strong>giao hàng</strong></h4>
				<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
			</div>
		</div>
	</div>
	<div class="span4">
		<div class="service">
			<div class="support">	
				<img src="../assets-shopper/themes/images/feature_img_3.png" alt="" />
				<h4>Miễn phí<strong> làm sạch trọn đời</strong></h4>
				<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
			</div>
		</div>
	</div>	
</div>
</section>