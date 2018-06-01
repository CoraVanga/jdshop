<?php
    use app\models\Users;
    use app\models\SaleOrder;
    use yii\helpers\Html;
	use yii\grid\GridView;
	use yii\widgets\LinkPager;
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
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">      
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-responsive.min.css'?>" rel="stylesheet">
		
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/css/bootstrappage.css'?>" rel="stylesheet"/>
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/css/jd_custom.css'?>" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/css/flexslider.css'?>" rel="stylesheet"/>
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/css/main.css'?>" rel="stylesheet"/>

		<!-- scripts -->
		<script src="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/js/jquery-1.7.2.min.js'?>"></script>
		<script src="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/js/bootstrap.min.js'?>"></script>
		<script src="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/js/jd_custom.js'?>"></script>	
		<script src="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/js/superfish.js'?>"></script>	
		<script src="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/js/jquery.scrolltotop.js'?>"></script>
		
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-about.css'?>" rel="stylesheet"> 
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-info.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-faq.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-hdmh.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-hdtt.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-hdvc.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-dosize.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-hdsd.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/bootstrap-hdtc.css'?>" rel="stylesheet">
		<link href="<?php echo Yii::$app->homeUrl.'../assets-shopper/bootstrap/css/jd_custom.css'?>" rel="stylesheet">
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
                            <?php if(isset($_SESSION['ID_USER'])):?>
                            	 <?php
                                    $users = Users::findUsersById($_SESSION['ID_USER']);
                                    $saleorder = SaleOrder::find()->where(['id_user'=>$users->id])->one();
                                    ?>
                            	<li><?= Html::a('Tài khoản', ['../user/users/view','id'=>$_SESSION['ID_USER']]) ?></li>
								<?php if(isset($saleorder)):?>
									<li><?= Html::a('Giỏ hàng', ['../user/cart/view']) ?></li>
								<?php endif;?>
								<?php if($users->username!=null):?>
                                <li><a href="../../user/site/logout-user">
                                    <?php
                                    echo $users->name . "( Đăng xuất )";
                                    ?>
                                </a></li>
                                <?php endif;?>
                            <?php else: ?>
                            	<?php if(isset($_SESSION['ID_CUS'])):?>
                            		<?php
                            			$users = Users::findUsersById($_SESSION['ID_CUS']);
                            			$saleorder = SaleOrder::find()->where(['id_user'=>$users->id, 'status'=>'1'])->one();
                            		?>
                            		<?php if(isset($saleorder)):?>
                            			<li><?= Html::a('Giỏ hàng', ['../user/cart/view']) ?></li>
                        			<?php endif;?>
                    			<?php endif;?>
                                <li><a href="../../user/site/login">Đăng nhập</a></li>	
                            <?php endif;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">			
					<a href="../../main" class="logo pull-left"><img src="<?php echo Yii::$app->homeUrl.'../assets-shopper/imageweb/logo.png'?>" width="50%", height="50%" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><?= Html::a('Trang chủ', ['../main']) ?>
							</li>
							<li><?= Html::a('Giới thiệu', ['../main/about']) ?>
							</li>
							<li><a href="<?php echo Yii::$app->homeUrl.'../user/product'?>">Sản phẩm</a>					
								<ul>
									<li><?= Html::a('Nhẫn', ['../user/product/view', 'type' => 'ring'])?></li>				
									<li><?= Html::a('Bông tai', ['../user/product/view', 'type' => 'earring'])?></li>
									<li><?= Html::a('Dây chuyền', ['../user/product/view', 'type' => 'necklace'])?></li>
									<li><?= Html::a('Lắc tay', ['../user/product/view', 'type' => 'bangles'])?></li>									
								</ul>
							</li>
							<li><li><?= Html::a('Liên hệ', ['../main/info']) ?></li>
							</li>
							<li><li><?= Html::a('FAQs', ['../main/faq']) ?></li>
							</li>														
						</ul>
					</nav>
				</div>
			</section>

			
			
						





 <?= $content ?>






			<!-- <section class="our_client">
				<h4 class="title"><span class="text">Nhà sản xuất</span></h4> -->
				
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Giới thiệu về JD</h4>
						<ul class="nav">
							<li><?= Html::a('Thông tin về JD', ['../main/about']) ?></li> 
							<li><?= Html::a('Liên hệ', ['../main/info']) ?></li>
							<li><?= Html::a('FAQs', ['../main/faq']) ?></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>Hỗ trợ mua hàng</h4>
						<ul class="nav">
							<li><?= Html::a('Hướng dẫn mua hàng', ['../main/hdmh']) ?></li>
							<li><a href="http://localhost:8080/main/hdtt">Hướng dẫn thanh toán</a></li>
							<li><a href="http://localhost:8080/main/hdvc">Phương thức vận chuyển</a></li>
							<li><a href="http://localhost:8080/main/hdds">Hướng dẫn đo size trang sức</a></li>
							<li><a href="http://localhost:8080/main/hdsd">Hướng dẫn sử dụng trang sức</a></li>
							<li><a href="http://localhost:8080/main/hdtc">Tra cứu đơn hàng-thẻ thành viên</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="../assets-shopper/imageweb/logo.png" class="site_logo" alt=""></p>
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
				<span>Tác giả: Nguyễn Thị Cẩm Tiên</span>
			</section>
		</div>
		<script src="../assets-shopper/themes/js/common.js"></script>
		<script src="../assets-shopper/themes/js/jquery.flexslider-min.js"></script>
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
		<script src="<?php echo Yii::$app->homeUrl.'../assets-shopper/themes/js/jd_custom.js'?>"></script>
    </body>
</html>