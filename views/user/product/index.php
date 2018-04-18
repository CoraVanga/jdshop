<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<section class="header_text sub">
			<img class="pageBanner" src="../assets-shopper/themes/images/carousel/nhannu.jpg" alt="New products" >
				<h4><span>Sản phẩm bán chạy</span></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">
							<li class="span3">
								<div class="product-box">
									<span class="sale_tag"></span>												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/9.jpg"></a><br/>
									<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
									<a href="#" class="category">Phasellus consequat</a>
									<p class="price">$341</p>
								</div>
							</li>       
							<li class="span3">
								<div class="product-box">												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/8.jpg"></a><br/>
									<a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
									<a href="#" class="category">Erat gravida</a>
									<p class="price">$28</p>
								</div>
							</li>
							<li class="span3">
								<div class="product-box">
									<span class="sale_tag"></span>												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/7.jpg"></a><br/>
									<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
									<a href="#" class="category">Suspendisse aliquet</a>
									<p class="price">$341</p>
								</div>
							</li>	
							<li class="span3">
						</ul>
						<div >
								<span><strong>Sắp xếp theo: </strong></span>
								<select>
							  	<option value="volvo">Volvo</option>
							  	<option value="saab">Saab</option>
							  	<option value="vw">VW</option>
							  	<option value="audi" selected>Audi</option>
							</select>
						</div>
						<ul class="thumbnails listing-products">	
							<li class="span3">
								<div class="product-box">												
									<span class="sale_tag"></span>
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/6.jpg"></a><br/>
									<a href="product_detail.html" class="title">Praesent tempor sem sodales</a><br/>
									<a href="#" class="category">Nam imperdiet</a>
									<p class="price">$49</p>
								</div>
							</li>
							<li class="span3">
								<div class="product-box">                                        												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/1.jpg"></a><br/>
									<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
									<a href="#" class="category">Congue diam congue</a>
									<p class="price">$35</p>
								</div>
							</li>       
							<li class="span3">
								<div class="product-box">												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/2.jpg"></a><br/>
									<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
									<a href="#" class="category">Gravida placerat</a>
									<p class="price">$61</p>
								</div>
							</li>
							<li class="span3">
								<div class="product-box">												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/3.jpg"></a><br/>
									<a href="product_detail.html" class="title">Quam ultrices rutrum</a><br/>
									<a href="#" class="category">Orci et nisl iaculis</a>
									<p class="price">$233</p>
								</div>
							</li>
							<li class="span3">
								<div class="product-box">												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/4.jpg"></a><br/>
									<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
									<a href="#" class="category">Urna nec lectus mollis</a>
									<p class="price">$134</p>
								</div>
							</li>
							<li class="span3">
								<div class="product-box">												
									<a href="product_detail.html"><img alt="" src="../assets-shopper/themes/images/ladies/5.jpg"></a><br/>
									<a href="product_detail.html" class="title">Luctus quam ultrices</a><br/>
									<a href="#" class="category">Suspendisse aliquet</a>
									<p class="price">$261</p>
								</div>
							</li>
						</ul>
												
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

