<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use app\models\ImageProduct;
use app\models\ProductDetail;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Giỏ hàng';
?>
<section class="main-content">				
	<div class="row">
		<div class="span9">					
			<h4 class="title"><span class="text"><strong>Đơn hàng cũ</strong> của bạn</span></h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Họ tên</th>
							<th>Tổng tiền</th>
							<th>Địa chỉ</th>
							<th>Ngày tạo</th>
							<th>Trạng thái</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach($soList as $saleorder){
                        	echo '<tr>';
                        	echo '<td>'.$saleorder->user->name.'</td>';
                        	echo '<td>'.number_format($saleorder->total_price).'</td>';
                        	echo '<td>'.$saleorder->user->address.'</td>';
                        	echo '<td>'.date("d/m/Y", strtotime($saleorder->created_date)).'</td>';
                        	if($saleorder->status==4)
                        		echo '<td><span class="badge badge-success">Hoàn thành</span></td>';
                        	if($saleorder->status==3)
                        		echo '<td><span class="badge badge-warning">Đơn hàng</span></td>';
                        	echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
			</div>
		</div>
		<div class="span3 col">
			<div class="block">	
				<ul class="nav nav-list">
					<li class="nav-header">SUB CATEGORIES</li>
					<li><a href="products.html">Nullam semper elementum</a></li>
					<li class="active"><a href="products.html">Phasellus ultricies</a></li>
					<li><a href="products.html">Donec laoreet dui</a></li>
					<li><a href="products.html">Nullam semper elementum</a></li>
					<li><a href="products.html">Phasellus ultricies</a></li>
					<li><a href="products.html">Donec laoreet dui</a></li>
				</ul>
				<br/>
				<ul class="nav nav-list below">
					<li class="nav-header">MANUFACTURES</li>
					<li><a href="products.html">Adidas</a></li>
					<li><a href="products.html">Nike</a></li>
					<li><a href="products.html">Dunlop</a></li>
					<li><a href="products.html">Yamaha</a></li>
				</ul>
			</div>
			<div class="block">
				<h4 class="title">
					<span class="pull-left"><span class="text">Randomize</span></span>
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
										<a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
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
										<a href="product_detail.html"><img alt="" src="themes/images/ladies/4.jpg"></a><br/>
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
		</div>
	</div>
</section>
<script>
	$('.delCartItem').click(function() {
			var orderLineId = $(this).parent().parent().find(".orderLineId").html();
			//var baseUrl = '<?php echo Yii::$app->request->baseUrl?>';
			// var orderlineItem = $(this).parent().parent().html();
			// alert(orderlineItem);
			var classOrderLineId = "."+orderLineId+"";
			// alert("Đã xóa "+orderLineId);
			// console.log("Bắt đầu");
			// console.log($(classOrderLineId).html());
			$.ajax({
				url: '<?php echo Yii::$app->request->baseUrl. '/user/cart/del' ?>',
				type: 'post',
				data: {
					 _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
					id: orderLineId
				},
				success:function(data){
					alert("Đã xóa sản phẩm này khỏi giỏ hàng của bạn");
					$(classOrderLineId).remove();
				}
			});
			
		});
</script>			