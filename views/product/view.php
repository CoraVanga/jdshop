<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
?>
<section class="header_text sub">
	<!-- <img class="pageBanner" src="../assets-shopper/themes/images/carousel/nhannu.jpg" alt="New products" > -->
	<!-- <h4><span>THÔNG TIN CHI TIẾT SẢN PHẨM <?= $model->name?></span></h4> -->
	<?php
	if($_POST){
        // if($flag==1)
        // {
        // 	 Alert::begin([
	       //      'options' => [
	       //          'class' => 'alert-danger',
	       //      ],
	       //  ]);
        // 	echo 'Bạn phải đăng nhập để mua sản phẩm này';
        // }
        if($flag==2)
        {
        	 Alert::begin([
	            'options' => [
	                'class' => 'alert-warning',
	            ],
	        ]);
        	echo 'Sản phẩm đã hết số lượng, xin vui lòng liên lạc lại sau';
        }
        if($flag==3)
        {
        	 Alert::begin([
	            'options' => [
	                'class' => 'alert-success',
	            ],
	        ]);
        	echo 'Đã thêm sản phẩm thành công vào giỏ hàng của bạn';
        }
        Alert::end();
        }
	?>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					<?php
						$image = $model->getImageProducts()->asArray()->one();
						if(!empty($image))
						{
						echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" class="thumbnail jdImageProductBig" title="'.$image['link'].'" alt="<img src="../images/product-images'.'/'.$image['link'].'" />').'</p>';
						}
						else
						{
							echo '<p>'.Html::a('<img src="../images/product-images/NoImageFound.png" class="thumbnail" title="No Image Found"').'</p>';
						}
					?>
					<!-- <a href="../assets-shopper/themes/images/ladies/1.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="../assets-shopper/themes/images/ladies/1.jpg"></a> -->												
					<ul class="thumbnails small">
						<?php 
							$imageList = $model->getImageProducts()->asArray()->all();
							foreach($imageList as $images)
							{
								echo '<li class="span1">';
								echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$images['link'].'" class="thumbnail jdImageProductSmall" data-fancybox-group="group1" title="'.$images['link'].'" alt="<img src="../images/product-images'.'/'.$image['link'].'" />').'</p>';
								echo '</li>';
							}
						?>		
						<!-- <li class="span1">
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
						</li> -->
					</ul>
				</div>
				<div class="span5">
					<address>
						<h3><?= $model->name?></h3>
						<h5>MS: <?= $model->code ?></h5>
						<?php if(isset($discount)):?>
							<p id="jdDiscount" hidden><?=$discount->discount?></p>
							<h4><?=$discount->info?> Giảm giá: <?=$discount->discount?>%</h4>
							<h2 class="productPrice" style="color: #eb4800;"><?= number_format($detail['0']->price - $detail['0']->price*($discount->discount/100))?> VNĐ</h2>
							<h5><strike class="jdOriginPrice"><?= number_format($detail['0']->price)?> VNĐ</strike></h5>
						<?php else: ?>
							<p id="jdDiscount" hidden>0</p>
							<h2 class="productPrice" style="color: #eb4800;"><?= number_format($detail['0']->price)?> VNĐ</h2>
						<?php endif;?>
						<br/>
						<!-- <strong>Số lượng: </strong> <span>$model->amount</span><br>	 -->							
					</address>									
					<!-- <h4><strong>Giá: $model->price</strong></h4> -->
				</div>
				<div class="span5">
					<form class="form-inline" method="post" action="view?id=<?=$model->id?>">

						<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
						<input type="hidden" name="id" value="<?php echo $model->id; ?>">
						<input type="hidden" name="size" id="productSize" value="<?php echo $detail['0']->size; ?>">
						<?php if(isset($discount)):?>
							<select class="jdComBoBox" style="width: 150px; height: 40px; padding: 10px;" name="productDropDown" id="productDropDown">
							  <option value="<?=number_format($detail['0']->price)?> VNĐ">CHỌN KÍCH CỠ</option>
							<?php
								foreach ($detail as $product_detail) {
								    echo '<option value="'.number_format($product_detail->price - $product_detail->price*($discount->discount/100)).' VNĐ">'.$product_detail->size.'</option>';
								}
							?>
							</select>
							<div hidden="1">
								<select class="jdComBoBox2" style="width: 150px; height: 40px; padding: 10px;" name="productDropDown2" id="productDropDown">
								  <option value="<?=number_format($detail['0']->price)?> VNĐ ">CHỌN KÍCH CỠ</option>
								<?php
									foreach ($detail as $product_detail) {
									    echo '<option value="'.number_format($product_detail->price).' VNĐ">'.$product_detail->size.'</option>';
									}
								?>
								</select>
							</div>
						<?php else: ?>
							<select class="jdComBoBox" style="width: 150px; height: 40px; padding: 10px;" name="productDropDown" id="productDropDown">
							  <option value="<?=number_format($detail['0']->price)?> VNĐ">CHỌN KÍCH CỠ</option>
							<?php
								foreach ($detail as $product_detail) {
								    echo '<option value="'.number_format($product_detail->price).' VNĐ">'.$product_detail->size.'</option>';
								}
							?>
							</select>
						<?php endif;?>
						<span style="font-size: 15px; padding: 10px;"><?= Html::a('Hướng dẫn chọn kích cỡ', ['main/hdds']) ?></span>
						<br/><br/>
						<button id="addToCartButton" type="submit" name="" class="btn btn-info">Thêm vào giỏ hàng</button>
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
									<?php
										$i=0;
										foreach ($relatedProduct as $product)
										{
											if ($i==3) {
												echo '</ul></div><div class="item"><ul class="thumbnails listing-products">';
												$i=0;
											}
											echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
											$model = Product::findOne($product['id']);
											if (!empty($model->getImageProducts()->one())) {
												$image = $model->getImageProducts()->asArray()->one();
													echo '<div class="jdimgcontainer">';
											 		echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../product/view', 'id' => $product['id']]).'</p>';
											 		echo '<div class="middle">';
											 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
											 		echo '</div></div>';
											 	}
											 	else
											 	{
											 		echo '<div class="jdimgcontainer">';
											 		echo '<p>'.Html::a('<img src="../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id']]).'</p>';
											 		echo '<div class="middle">';
											 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
											 		echo '</div></div>';
											 	}
											 	echo Html::a($product['name'], ['../product/view', 'id' => $product['id']],['class' => 'title']);
												// echo '<p class="price">'.$model->price.' VNĐ</p>';
												echo '<br/>';
												echo Html::a($model->type->gender, ['../product/view', 'id' => $product['id']],['class' => 'category']);
												echo '</div></li>';
												$i++;
										}
									?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span3 col">
			<div class="block">	
				<h4 class="title">
					<span class="pull-left"><span class="text">Sản phẩm bán chạy nhất</span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
					</span>
				</h4>
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails listing-products">
							<?php
								$i=0;
								foreach ($featureProduct as $product)
								{
									if ($i==1) {
										echo '</ul></div><div class="item"><ul class="thumbnails listing-products">';
										$i=0;
									}
									echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
									$model = Product::findOne($product['id_product']);
									if (!empty($model->getImageProducts()->one())) {
										$image = $model->getImageProducts()->asArray()->one();
											echo '<div class="jdimgcontainer">';
									 		echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../product/view', 'id' => $product['id_product']]).'</p>';
									 		echo '<div class="middle">';
									 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id_product']]).'</div>';
									 		echo '</div></div>';
									 	}
									 	else
									 	{
									 		echo '<div class="jdimgcontainer">';
									 		echo '<p>'.Html::a('<img src="../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id_product']]).'</p>';
									 		echo '<div class="middle">';
									 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id_product']]).'</div>';
									 		echo '</div></div>';
									 	}
									 	echo Html::a($product['name'], ['../product/view', 'id' => $product['id_product']],['class' => 'title']);
										// echo '<p class="price">'.$model->price.' VNĐ</p>';
										echo '<br/>';
										echo Html::a($product['gender'], ['../product/view', 'id' => $product['id_product']],['class' => 'category']);
										echo '</div></li>';
										$i++;
								}
						?>					
						</div>
					</div>
				</div>
			</div>
			<div class="block">
				<h4 class="title">
					<span class="pull-left"><span class="text">Sản phẩm mới nhất</span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
					</span>
				</h4>
				<div id="myCarousel-2" class="carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails listing-products">
								<?php
									$i=0;
									foreach ($newProduct as $product)
									{
										if ($i==1) {
											echo '</ul></div><div class="item"><ul class="thumbnails listing-products">';
											$i=0;
										}
										echo '<li class="span3"><div class="product-box"><span class="sale_tag"></span>';
										$model = Product::findOne($product['id']);
										if (!empty($model->getImageProducts()->one())) {
											$image = $model->getImageProducts()->asArray()->one();
												echo '<div class="jdimgcontainer">';
										 		echo '<p>'.Html::a('<img src="../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../product/view', 'id' => $product['id']]).'</p>';
										 		echo '<div class="middle">';
										 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
										 		echo '</div></div>';
										 	}
										 	else
										 	{
										 		echo '<div class="jdimgcontainer">';
										 		echo '<p>'.Html::a('<img src="../images/product-images/NoImageFound.png'.'" alt="" />', ['../product/view', 'id' => $product['id']]).'</p>';
										 		echo '<div class="middle">';
										 		echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../product/view', 'id' => $product['id']]).'</div>';
										 		echo '</div></div>';
										 	}
										 	echo Html::a($product['name'], ['../product/view', 'id' => $product['id']],['class' => 'title']);
											// echo '<p class="price">'.$model->price.' VNĐ</p>';
											echo '<br/>';
											echo Html::a($model->type->gender, ['../product/view', 'id' => $product['id']],['class' => 'category']);
											echo '</div></li>';
											$i++;
									}
								?>
						</div>
						<!-- <div class="item">
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
						</div> -->
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

