<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Product;
use yii\widgets\LinkPager;

?>
<br>
<div class="row">
		<div class="span9">			
			<ul class="thumbnails listing-products">
				<?php
				$i=0;
				foreach($productList as $product)
				{
					if($i%3==0)
					{
						echo '<div style="clear:both;"></div>';
					}
					echo '<li class="span3">';
					echo '<div class="product-box">';
					echo '<span class="sale_tag"></span>';
					$model = Product::findOne($product['pid']);
					if (!empty($model->getImageProducts()->one())) {
						$image = $model->getImageProducts()->asArray()->one();
						echo '<div class="jdimgcontainer">';
						echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt=""/>', ['../../product/view', 'id' => $product['pid']]).'</p>';
						echo '<div class="middle">';
						echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['pid']]).'</div>';
						echo '</div></div>';
					}
					else
					{
						echo '<div class="jdimgcontainer">';
						echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png'.'" alt="" />', ['../../product/view', 'id' => $product['pid']]).'</p>';
						echo '<div class="middle">';
						echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['pid']]).'</div>';
						echo '</div></div>';
					}
					echo Html::a($product['productname'], ['../../product/view', 'id' => $product['pid']],['class' => 'title']);
									// echo '<p class="price">'.$model->price.' VNĐ</p>';
					echo '<br/>';
					echo Html::a($product['gender'], ['../../product/view', 'id' => $product['pid']],['class' => 'category']);

					echo '</div>';
					echo '</li>';
					if($i==(count($productList)-1))
					{
						echo '<div style="clear:both;"></div>';
					}
					$i++;
				}
				?>
				<hr>
				<div class="pagination pagination-small pagination-centered">
				 <?php
				echo LinkPager::widget([
				    'pagination' => $pages,
				    // 'options' => [
		      //           'class' => 'pagination pagination-small pagination-centered',
		      //       ],
				]);
				?>
				</div> 
				<!-- <hr>
				<div class="pagination pagination-small pagination-centered">
					<ul>
						<li><a href="#">Prev</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div> -->
			</div>
		</div>
