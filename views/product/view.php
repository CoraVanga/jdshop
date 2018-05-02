<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
?>
<section class="header_text sub">
	<img class="pageBanner" src="../assets-shopper/themes/images/carousel/nhannu.jpg" alt="New products" >
	<h4><span>THÔNG TIN CHI TIẾT SẢN PHẨM <?= $model->name?></span></h4>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					<?php
						$image = $model->getImageProducts()->asArray()->one();
						echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" class="thumbnail" title="'.$image['link'].'" alt="<img src="../images/product-images'.'/'.$image['link'].'" />').'</p>';
					?>
					<!-- <a href="../assets-shopper/themes/images/ladies/1.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="../assets-shopper/themes/images/ladies/1.jpg"></a> -->												
					<ul class="thumbnails small">								
						<li class="span1">
							<a href="../assets-shopper/themes/images/ladies/2.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="../assets-shopper/themes/images/ladies/2.jpg" alt=""></a>
						</li>								
						<li class="span1">
							<a href="../assets-shopper/themes/images/ladies/3.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="../assets-shopper/themes/images/ladies/3.jpg" alt=""></a>
						</li>													
						<li class="span1">
							<a href="../assets-shopper/themes/images/ladies/4.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="../assets-shopper/themes/images/ladies/4.jpg" alt=""></a>
						</li>
						<li class="span1">
							<a href="../assets-shopper/themes/images/ladies/5.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="../assets-shopper/themes/images/ladies/5.jpg" alt=""></a>
						</li>
					</ul>
				</div>
				<div class="span5">
					<address>
						<strong>Nhãn hiệu: </strong> <span>Apple</span><br>
						<strong>Mã sản phẩm: </strong> <span><?= $model->code ?></span><br>
						<strong>Số lượng: </strong> <span><?= $model->amount?></span><br>								
					</address>									
					<h4><strong>Giá: <?=$model->price?></strong></h4>
				</div>
				<div class="span5">
					<form class="form-inline">
						<p>&nbsp;</p>
						<label>Số lượng:</label>
						<input type="text" class="span1" placeholder="1">
						<button class="btn btn-inverse" type="submit">Thêm vào giỏ hàng</button>
					</form>
				</div>							
			</div>
			<div class="row">
				<div class="span9">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home">Mô tả</a></li>	
					</ul>							 
					<div class="tab-content">
						<div class="tab-pane active" id="home"><?=$model->info?></div>
					</div>							
				</div>						
				<div class="span9">	
					<br>
					<h4 class="title">
						<span class="pull-left"><span class="text"><strong>Sản phẩm</strong> liên quan</span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-1" class="carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails listing-products">
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/6.jpg"></a><br/>
											<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
											<a href="#" class="category">Suspendisse aliquet</a>
											<p class="price">$341</p>
										</div>
									</li>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/5.jpg"></a><br/>
											<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
											<a href="#" class="category">Phasellus consequat</a>
											<p class="price">$341</p>
										</div>
									</li>       
									<li class="span3">
										<div class="product-box">												
											<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/4.jpg"></a><br/>
											<a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
											<a href="#" class="category">Erat gravida</a>
											<p class="price">$28</p>
										</div>
									</li>												
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails listing-products">
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/1.jpg"></a><br/>
											<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
											<a href="#" class="category">Phasellus consequat</a>
											<p class="price">$341</p>
										</div>
									</li>       
									<li class="span3">
										<div class="product-box">												
											<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/2.jpg"></a><br/>
											<a href="product_detail.html">Praesent tempor sem</a><br/>
											<a href="#" class="category">Erat gravida</a>
											<p class="price">$28</p>
										</div>
									</li>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/3.jpg"></a><br/>
											<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
											<a href="#" class="category">Suspendisse aliquet</a>
											<p class="price">$341</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
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
										<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/7.jpg"></a><br/>
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
										<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/8.jpg"></a><br/>
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

