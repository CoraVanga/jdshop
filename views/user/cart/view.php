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
			<h4 class="title"><span class="text"><strong>Giỏ hàng</strong> của bạn</span></h4>
			<div>
				<ul class="wizard pull-right">
					<li id="step10" class="
						<?php if($status==0) 
								echo 'text-primary'; 
							else 
								echo 'text-muted';?>">
						Đơn hàng<span class="chevron"></span>
					</li>
					<li id="step20" class="
						<?php if($status==1) 
								echo 'text-primary'; 
							else 
								echo 'text-muted';?>">
						Vận chuyển &amp;
						Hóa đơn<span class="chevron"></span>   
					</li>
					<li id="step50" class="
						<?php if($status==2) 
								echo 'text-primary'; 
							else 
								echo 'text-muted';?>">
						Xác nhận<span class="chevron"></span>
					</li>
				</ul>
			</div>
			<?php if($status==0):?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Hình ảnh</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
					 
					<?php if(isset($saleorder)):?>
						<?php foreach ($orderline as $item) {
							echo '<tr>';
							$image = ImageProduct::find()->where(['id_product'=>$item->product->id])->one();
							$productdetail = ProductDetail::find()->where(['id_product'=>$item->product->id,'size'=>$item->size_product])->one();
							if(!empty($image))
							{
								echo '<td>'.Html::a('<img src="../../images/product-images'.'/'.$image->link.'" class="thumbnail" title="'.$image['link'].'" alt="<img src="../images/product-images'.'/'.$image->link.'" />').'</td>';
							}
							else
							{
								echo '<td>'.Html::a('<img src="../../images/product-images/NoImageFound.png" class="thumbnail" title="No Image Found"').'</td>';
							}
							echo '<td><h4>'.Html::a($item->product->name, ['../product/view', 'id' => $item->product->id],['class' => 'title']).'</h4><h5>KÍCH CỠ: '.$item->size_product.'</h5><h5>ĐƠN GIÁ: '.number_format($productdetail->price).' VNĐ </h5><h5>'.Html::a('Xóa', ['../main']).'<h5></td>';
							echo '<td>'.$item->amount.'</td>';
							echo '<td>'.number_format($item->sum_price).'</td>';
							echo '</tr>';
						}
						
					?>
					</tbody>
				</table>
				<hr>
				<p class="cart-total right">
					<strong>Tổng cộng: </strong><strong style="color: #eb4800; font-size:17px;"><?= number_format($saleorder->total_price)?> VNĐ</strong><br>
				</p>
				<hr/>
				<p class="buttons center" style="text-align: center;">
					<form class="form-inline" method="post" action="view">
						<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
						<input type="hidden" name="status" value="<?php echo $status ?>">
						<div id="jdCartSubmitButton" style="text-align: center;">
							<button class="btn" type="button">Cập nhật</button>
							<!-- <button class="btn" type="button">Continue</button> -->
							<button class="btn btn-inverse"  type="submit" id="checkout">Thanh toán</button>
						</div>
					</form>				
				</p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orderline as $item) {
							echo '<tr class="'.$item->id.'">';
							echo '<td><h4>'.Html::a($item->product->name, ['../product/view', 'id' => $item->product->id],['class' => 'title']).'</h4><h5>KÍCH CỠ: '.$item->size_product.'</h5><h5>ĐƠN GIÁ: '.number_format($productdetail->price).' VNĐ </h5><button class="btn btn-inverse delCartItem">Xóa</button></td>';
							echo '<td class="orderLineId" hidden="1">'.$item->id.'</td>';
							echo '<td>'.$item->amount.'</td>';
							echo '<td>'.number_format($item->sum_price).'</td>';
							echo '</tr>';
						}
						
					?>
					</tbody>
				</table>

			<?php endif;?>
			<?php elseif($status==1): ?>
				<div style="clear: both;"></div>
				<h3>Thông tin người nhận &amp; địa chỉ giao hàng</h3>
				<hr/>
				<?php if($user->name!=null):?>
				<p><?= Html::a('Chỉnh sửa', ['../user/users/update','id'=>$user->id], ['class' => 'btn btn-primary']) ?></p>
				<?= DetailView::widget([
					'model' => $user,
					'attributes' => [
						'name',
						'dob',
						'phone',
						'address',
						'email:email',
					],
					]) ?>
					<form class="form-horizontal" method="post" action="view">
						<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
						<input type="hidden" name="status" value="<?php echo $status ?>">
						<input type="hidden" name="soid" value="<?php echo $saleorder->id ?>">
						<div id="jdCartSubmitButton" style="text-align: center;">
							<button class="btn btn-inverse"  type="submit">Xác nhận</button>
						</div>
					</form>
				<?php else:?>
					<form class="form-horizontal" method="post" action="view">
						<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
						<input type="hidden" name="status" value="<?php echo $status ?>">
						<input type="hidden" name="soid" value="<?php echo $saleorder->id ?>">
						<div class="form-group">
							<label for="email">Họ và tên</label>
							<input type="text" class="form-control-lg" name="name">
						</div>
						<div class="form-group">
							<label for="pwd">Ngày sinh</label>
							<input type="date" class="form-control" name="dob">
						</div>
						<div class="form-group">
							<label for="pwd">Số điện thoại</label>
							<input type="text" class="form-control" name="sdt">
						</div>
						<div class="form-group">
							<label for="pwd">Địa chỉ</label>
							<input type="text" class="form-control" name="address">
						</div>
						<div id="jdCartSubmitButton" style="text-align: center;">
							<button class="btn btn-inverse"  type="submit">Lưu</button>
						</div>
					</form>
				<?php endif;?>
			<?php elseif($status==2 && $saleorder->status==3): ?>
				<div style="clear: both;"></div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if(isset($saleorder)):
						foreach ($orderline as $item) {
							echo '<tr>';
							$image = ImageProduct::find()->where(['id_product'=>$item->product->id])->one();
							$productdetail = ProductDetail::find()->where(['id_product'=>$item->product->id,'size'=>$item->size_product])->one();
							echo '<td><h4>'.Html::a($item->product->name, ['../product/view', 'id' => $item->product->id],['class' => 'title']).'</h4><h5>KÍCH CỠ: '.$item->size_product.'</h5><h5>ĐƠN GIÁ: '.number_format($productdetail->price).' VNĐ </h5></td>';
							echo '<td>'.$item->amount.'</td>';
							echo '<td>'.number_format($item->sum_price).'</td>';
							echo '</tr>';
						}
						endif;
					?>
					</tbody>
				</table>
				<p>Người nhận: <?php echo $user->name?></p>
				<p>Số điện thoại: <?php echo $user->phone?></p>
				<p>Địa chỉ: <?php echo $user->address?></p>
			<?php endif;?>
								
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