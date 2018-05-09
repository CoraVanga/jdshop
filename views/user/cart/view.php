<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use app\models\ImageProduct;
use app\models\ProductDetail;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $saleorder->bill_code;
?>
<section class="main-content">				
	<div class="row">
		<div class="span9">					
			<h4 class="title"><span class="text"><strong>Giỏ hàng</strong> của bạn</span></h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Xóa</th>
						<th>Hình ảnh</th>
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
						echo '<td><input type="checkbox" value="option1"></td>';
						if(!empty($image))
						{
							echo '<td>'.Html::a('<img src="../../images/product-images'.'/'.$image->link.'" class="thumbnail" title="'.$image['link'].'" alt="<img src="../images/product-images'.'/'.$image->link.'" />').'</td>';
						}
						else
						{
							echo '<td>'.Html::a('<img src="../../images/product-images/NoImageFound.png" class="thumbnail" title="No Image Found"').'</td>';
						}
						echo '<td>'.$item->product->name.'<br/>KÍCH CỠ: '.$item->size_product.'<br/>ĐƠN GIÁ: '.number_format($productdetail->price).' VNĐ</td>';
						echo '<td>'.$item->amount.'</td>';
						echo '<td>'.number_format($item->sum_price).'</td>';
						echo '</tr>';
					}
					endif;
				?>
				</tbody>
<!-- 				<tbody>
					<tr>
						<td><input type="checkbox" value="option1"></td>
						<td><a href="product_detail.html"><img alt="" src="themes/images/ladies/9.jpg"></a></td>
						<td>Fusce id molestie massa</td>
						<td><input type="text" placeholder="1" class="input-mini"></td>
						<td>$2,350.00</td>
						<td>$2,350.00</td>
					</tr>			  
					<tr>
						<td><input type="checkbox" value="option1"></td>
						<td><a href="product_detail.html"><img alt="" src="themes/images/ladies/1.jpg"></a></td>
						<td>Luctus quam ultrices rutrum</td>
						<td><input type="text" placeholder="2" class="input-mini"></td>
						<td>$1,150.00</td>
						<td>$2,450.00</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="option1"></td>
						<td><a href="product_detail.html"><img alt="" src="themes/images/ladies/3.jpg"></a></td>
						<td>Wuam ultrices rutrum</td>
						<td><input type="text" placeholder="1" class="input-mini"></td>
						<td>$1,210.00</td>
						<td>$1,123.00</td>
					</tr>	  
				</tbody> -->
			</table>
			<hr>
			<p class="cart-total right">
				<strong>Tổng cộng: </strong><strong style="color: #eb4800; font-size:17px;"><?= number_format($saleorder->total_price)?> VNĐ</strong><br>
			</p>
			<hr/>
			<p class="buttons center">				
				<button class="btn" type="button">Cập nhật</button>
				<!-- <button class="btn" type="button">Continue</button> -->
				<button class="btn btn-inverse" type="submit" id="checkout">Thanh toán</button>
			</p>					
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