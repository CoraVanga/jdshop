<?php
    use app\models\Users;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="<?php echo Yii::$app->homeUrl.'assets-shopper/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">      
		<link href="<?php echo Yii::$app->homeUrl.'assets-shopper/bootstrap/css/bootstrap-responsive.min.css'?>" rel="stylesheet">
		
		<link href="<?php echo Yii::$app->homeUrl.'assets-shopper/themes/css/bootstrappage.css'?>" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="<?php echo Yii::$app->homeUrl.'assets-shopper/themes/css/flexslider.css'?>" rel="stylesheet"/>
		<link href="<?php echo Yii::$app->homeUrl.'assets-shopper/themes/css/main.css'?>" rel="stylesheet"/>

		<!-- scripts -->
		<script src="<?php echo Yii::$app->homeUrl.'assets-shopper/themes/js/jquery-1.7.2.min.js'?>"></script>
		<script src="<?php echo Yii::$app->homeUrl.'assets-shopper/bootstrap/js/bootstrap.min.js'?>"></script>				
		<script src="<?php echo Yii::$app->homeUrl.'assets-shopper/themes/js/superfish.js'?>"></script>	
		<script src="<?php echo Yii::$app->homeUrl.'assets-shopper/themes/js/jquery.scrolltotop.js'?>"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">Tài khoản</a></li>
							<li><a href="cart.html">Giỏ hàng</a></li>
							<li><a href="checkout.html">Thanh toán</a></li>
                                                        <?php if(isset($_SESSION['ID_USER'])):?>
                                                            <li><a href="site/logout-user">
                                                                <?php
                                                                $users = Users::findUsersById($_SESSION['ID_USER']);
                                                                echo $users->name . "( Đăng xuất )";
                                                                ?>
                                                            </a></li>	
                                                        <?php else: ?>
                                                            <li><a href="site/login">Đăng nhập</a></li>	
                                                        <?php endif;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="<?php echo Yii::$app->homeUrl.'assets-shopper/imageweb/logo.png'?>" width="50%", height="50%" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./products.html">Trang sức nữ</a>					
								<ul>
									<li><a href="./products.html">Nhẫn</a></li>									
									<li><a href="./products.html">Bông tai</a></li>
									<li><a href="./products.html">Dây chuyền</a></li>
									<li><a href="./products.html">Lắc tay, lắc chân</a></li>									
								</ul>
							</li>															
							<li><a href="./products.html">Trang sức nam</a>
								<ul>
									<li><a href="./products.html">Nhẫn</a></li>									
									<li><a href="./products.html">Bông tai</a></li>
									<li><a href="./products.html">Dây chuyền</a></li>	
								</ul>
							</li>				
							<li><a href="./products.html">Trang sức trẻ em</a>
								<ul>									
									<li><a href="./products.html">Bông tai</a></li>
									<li><a href="./products.html">Dây chuyền</a></li>
									<li><a href="./products.html">Lắc tay, lắc chân</a></li>	
								</ul>
							</li>							
							<li><a href="./products.html">Trang sức cưới</a>
								<ul>									
									<li><a href="./products.html">Trang sức cưới truyền thống</a></li>
									<li><a href="./products.html">Trang sức cưới hiện đại</a></li>
								</ul>
							</li>
							<li><a href="./products.html">Quà tặng</a>
								<ul>									
									<li><a href="./products.html">Cầu hôn</a></li>
									<li><a href="./products.html">Sinh nhật</a></li>
									<li><a href="./products.html">Ngày kỉ niệm</a></li>	
								</ul>
							</li>	
						</ul>
					</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="assets-shopper/themes/images/carousel/banner-1.jpg" alt="" />
						</li>
						<li>
							<img src="assets-shopper/themes/images/carousel/banner2.jpg" alt="" />
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
									<span class="pull-left"><span class="text"><span class="line">Trang sức <strong>cưới</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">												
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
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Trang sức <strong>Nữ</strong></span></span></span>
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
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
														<a href="products.html" class="category">Commodo consequat</a>
														<p class="price">$25.50</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br/>
														<a href="products.html" class="category">Quis nostrud</a>
														<p class="price">$17.55</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware6.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Know exactly turned</a><br/>
														<a href="products.html" class="category">Quis nostrud</a>
														<p class="price">$25.30</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware5.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">You think fast</a><br/>
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
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware4.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Know exactly</a><br/>
														<a href="products.html" class="category">Quis nostrud</a>
														<p class="price">$45.50</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware3.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
														<a href="products.html" class="category">Commodo consequat</a>
														<p class="price">$33.50</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">You think water</a><br/>
														<a href="products.html" class="category">World once</a>
														<p class="price">$45.30</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
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
										<img src="themes/images/feature_img_2.png" alt="" />
										<h4>Thiết kế  <strong>sang trọng</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="themes/images/feature_img_1.png" alt="" />
										<h4>Miễn phí  <strong>giao hàng</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="themes/images/feature_img_3.png" alt="" />
										<h4>Miễn phí<strong> làm sạch trọn đời</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
			</section>





 <?= $content ?><






			</section>
			<section class="our_client">
				<h4 class="title"><span class="text">Nhà sản xuất</span></h4>
				
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Giới thiệu về JD</h4>
						<ul class="nav">
							<li><a href="./index.html">Thông tin về JD</a></li>  
							<li><a href="./about.html">Quá trình phát triển</a></li>
							<li><a href="./contact.html">Tuyển dụng</a></li>
							<li><a href="./cart.html">Liên hệ</a></li>
							<li><a href="./register.html">FAQs</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>Hỗ trợ mua hàng</h4>
						<ul class="nav">
							<li><a href="#">Hướng dẫn mua hàng</a></li>
							<li><a href="#">Hướng dẫn thanh toán</a></li>
							<li><a href="#">Phương thức vận chuyển</a></li>
							<li><a href="#">Hướng dẫn đo size trang sức</a></li>
							<li><a href="#">Hướng dẫn sử dụng trang sức</a></li>
							<li><a href="#">Tra cứu đơn hàng-thẻ thành viên</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="assets-shopper/imageweb/logo.png" class="site_logo" alt=""></p>
						<p>CÔNG TY CỔ PHẦN BẠC ĐÁ QUÝ TÂY NGUYÊN </p>
						<p>170E Phan Đăng Lưu, P.3, T.Gia Lai, TP.Hồ Chí Minh - ĐT: 028 3995 1703 - 
						<br/>
						<p>Fax: 028 3995 1702 - Email: jd@jd.com.vn</p>
						</p>
						<p>Giấy chứng nhận đăng ký kinh doanh: 0708521758
						</p>
						</p>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="assets-shopper/themes/js/common.js"></script>
		<script src="assets-shopper/themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>

    </body>
</html>