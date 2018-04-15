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
									foreach ($dataProvider->models as $model) {
										echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
										echo '<a href="#" class="title">'.$model->name.'</a><br/>';
										echo '<p class="price">'.$model->price.' VNĐ</p>';
										echo '</div></li>';
									}
								?>									
								<li class="span3">
									<div class="product-box">
										<span class="sale_tag"></span>
										<p><a href="product_detail.html"><img src="themes/images/ladies/1.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
										<a href="products.html" class="category">Commodo consequat</a>
										<p class="price">$17.25</p>
									</div>
								</li>
								<li class="span3">
									<div class="product-box">
										<span class="sale_tag"></span>
										<p><a href="product_detail.html"><img src="themes/images/ladies/2.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br/>
										<a href="products.html" class="category">Quis nostrud</a>
										<p class="price">$32.50</p>
									</div>
								</li>
								<li class="span3">
									<div class="product-box">
										<p><a href="product_detail.html"><img src="themes/images/ladies/3.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">Know exactly turned</a><br/>
										<a href="products.html" class="category">Quis nostrud</a>
										<p class="price">$14.20</p>
									</div>
								</li>
								<li class="span3">
									<div class="product-box">
										<p><a href="product_detail.html"><img src="themes/images/ladies/4.jpg" alt="" /></a></p>
										<a href="product_detail.html" class="title">You think fast</a><br/>
										<a href="products.html" class="category">World once</a>
										<p class="price">$31.45</p>
									</div>
								</li>
							</ul>
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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>
	<?php
	foreach ($dataProvider->models as $model) {
	    echo $model->id;
	    echo $model->name;
	}
	?>