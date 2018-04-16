<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="row">
	<div class="span12">													
		<div class="row">
			<div class="span12">
				<h4 class="title">
					<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
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
									 		echo '<p><a href="product_detail.html"><img src="../images/product-images'.'/'.$image['link'].'" alt="" /></a></p>';
									 	}
										echo '<a href="#" class="title">'.$model->name.'</a><br/>';
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
						<div class="item">
							<ul class="thumbnails">
								<li class="span3">
									<div class="product-box">
										<p><a href="product_detail.html"><img src="themes/images/ladies/5.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">Know exactly</a><br/>
										<a href="products.html" class="category">Quis nostrud</a>
										<p class="price">$22.30</p>
									</div>
								</li>
								<li class="span3">
									<div class="product-box">
										<p><a href="product_detail.html"><img src="themes/images/ladies/6.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
										<a href="products.html" class="category">Commodo consequat</a>
										<p class="price">$40.25</p>
									</div>
								</li>
								<li class="span3">
									<div class="product-box">
										<p><a href="product_detail.html"><img src="themes/images/ladies/7.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">You think water</a><br/>
										<a href="products.html" class="category">World once</a>
										<p class="price">$10.45</p>
									</div>
								</li>
								<li class="span3">
									<div class="product-box">
										<p><a href="product_detail.html"><img src="themes/images/ladies/8.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
										<a href="products.html" class="category">Quis nostrud</a>
										<p class="price">$35.50</p>
									</div>
								</li>																																	
							</ul>
						</div>
					</div>							
				</div>
			</div>						
		</div>
	</div>
</div>