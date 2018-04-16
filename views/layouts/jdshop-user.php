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
									<span class="pull-left"><span class="text"><span class="line">Trang sức <strong>Nữ</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>

								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">												
												<li class="span3">
													<div class="row-fruid">
													<div class="span16">
												<img src="assets-shopper/themes/images/carousel/span3.jpg" alt="" />
													</div>
													</div>	
												
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





 <?= $content ?><!--Cực kỳ quan trọng, không được xóa nha-->






			</section>
			<section class="our_client">
				<h4 class="title"><span class="text">Manufactures</span></h4>
				
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>  
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="assets-shopper/themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
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