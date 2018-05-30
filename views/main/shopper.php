<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Product;

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
							foreach ($featureProduct as $product)
							{
								if ($i==4) {
									echo '</ul></div><div class="item"><ul class="thumbnails">';
									$i=0;
								}
								echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
								$model = Product::findOne($product['id_product']);
								if (!empty($model->getImageProducts()->one())) {
									$image = $model->getImageProducts()->asArray()->one();
										echo '<div class="jdimgcontainer">';
								 		echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../product/view', 'id' => $product['id_product']]).'</p>';
								 		echo '<div class="middle">';
								 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id_product']]).'</div>';
								 		echo '</div></div>';
								 	}
								 	else
								 	{
								 		echo '<div class="jdimgcontainer">';
								 		echo '<p>'.Html::a('<img src="../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id_product']]).'</p>';
								 		echo '<div class="middle">';
								 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id_product']]).'</div>';
								 		echo '</div></div>';
								 	}
								 	echo Html::a($product['name'], ['../product/view', 'id' => $product['id_product']],['class' => 'title']);
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
						<?php
							$i=0;
							foreach ($newProduct as $product)
							{
								if ($i==4) {
									echo '</ul></div><div class="item"><ul class="thumbnails">';
									$i=0;
								}
								echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
								$model = Product::findOne($product['id']);
								if (!empty($model->getImageProducts()->one())) {
									$image = $model->getImageProducts()->asArray()->one();
										echo '<div class="jdimgcontainer">';
								 		echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../product/view', 'id' => $product['id']]).'</p>';
								 		echo '<div class="middle">';
								 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
								 		echo '</div></div>';
								 	}
								 	else
								 	{
								 		echo '<div class="jdimgcontainer">';
								 		echo '<p>'.Html::a('<img src="../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id']]).'</p>';
								 		echo '<div class="middle">';
								 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
								 		echo '</div></div>';
								 	}
								 	echo Html::a($product['name'], ['../product/view', 'id' => $product['id']],['class' => 'title']);
									// echo '<p class="price">'.$model->price.' VNĐ</p>';
									echo '<br/>';
									echo Html::a($model->type->gender, ['../product/view', 'id' => $product['id']],['class' => 'category']);
									echo '</div></li>';
									$i++;
							}
						?>									
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