<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Thống kê';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card p-30">
				<h6 align="center">SẢN PHẨM BÁN CHẠY NHẤT</h6>
					<?php
						$i=0;
						foreach ($feature1MountProduct as $product)
						{
							
							$model = Product::findOne($product['id_product']);
							echo '<div class="avatar jdimgcontainer">';
							if (!empty($model->getImageProducts()->one())) {
								
								$image = $model->getImageProducts()->asArray()->one();
								echo '<p>'.Html::a('<img src="../../images/product-images'.'/'.$image['link'].'" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p>';
								echo '<div class="jdmiddle">';
				                echo '<p class="btn btn-info">Số lần mua: '.$product['amount'].'</p>';
				                echo '</div></div>';
								// echo '<div class="middle">';
								// echo '<div class="jdimgtext">'.Html::a('Xem chi tiết', ['../../product/view', 'id' => $product['id_product']]).'</div>';
								// echo '</div></div>';
							}
							else
							{
								echo '<p>'.Html::a('<img src="../../images/product-images/NoImageFound.png" alt="" width="170px" height="170px"/>', ['../../admin/product/view', 'id' => $product['id_product']]).'</p></div>';
							}
							echo '<h6 align="center">'.$model->name.'</h6>';
						}
					?>
					<!-- <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Allison Walker">
                    </div> -->
					<!-- <div class="media-body media-text-right">
						<h5><?=  number_format($revenue['0']['revenue']) ?></h5>
						<p class="m-b-0">Tổng doanh số</p>
					</div> -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tổng lợi nhuận theo loại sản phẩm</h4>
					<?php
					$label = []; 
					$data = [];
					foreach($profitByType as $type)
					{
						array_push($label,$type['name']);
						array_push($data,$type['amount']);
					}
					echo ChartJs::widget([
					    'type' => 'bar',
					    'options' => [
					        'height' => 170,
                    
                
					    ],
					    'data' => [
					        'labels' => $label,
					        'datasets' => [
					            [
					                'label' => false,
					                'backgroundColor' => ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95ce"],
					                'hoverBackgroundColor' => ["#3e95dd", "#8e5eb2","#3cba0f","#e8c3c9","#c45860","#3e95de"],
					                'data' => $data,

					            ],
					        ]
					    ],
					    'clientOptions' => [
					    	'legend' => [ 'display'=> false ],
					    ],
					]);
					?>
				</div>
			</div>
		</div>
		<div class="col-md-3" >
			<div class="card" style="height: 350px;">
				<div class="card-body">
					<h4 class="card-title">In danh sách đơn hàng</h4>
					<form class="form-horizontal" method="post" action="statistics/print">
						<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
						<div class="form-group">
							<label for="beginDate">Ngày bắt đầu</label>
							<input type="date" class="form-control" name="beginDate">
						</div>
						<div class="form-group">
							<label for="endDate">Ngày kết thúc</label>
							<input type="date" class="form-control" name="endDate">
						</div>
						<div id="jdCartSubmitButton" style="text-align: center;">
							<button class="btn btn-inverse"  type="submit">In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="card p-30">
				<div class="media">
					<div class="media-left meida media-middle">
						<span><i class="fa fa-usd f-s-40 color-primary"></i></span>
					</div>
					<div class="media-body media-text-right">
						<h5><?=  number_format($revenue['0']['revenue']) ?></h5>
						<p class="m-b-0">Tổng doanh số</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card p-30">
				<div class="media">
					<div class="media-left meida media-middle">
						<span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
					</div>
					<div class="media-body media-text-right">
						<h5><?=number_format($sales['0']['sales'])?></h5>
						<p class="m-b-0">Lần mua hàng</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card p-30">
				<div class="media">
					<div class="media-left meida media-middle">
						<span><i class="fa fa-archive f-s-40 color-warning"></i></span>
					</div>
					<div class="media-body media-text-right">
						<h5><?=number_format($products['0']['products'])?></h5>
						<p class="m-b-0">Sản phẩm</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card p-30">
				<div class="media">
					<div class="media-left meida media-middle">
						<span><i class="fa fa-user f-s-40 color-danger"></i></span>
					</div>
					<div class="media-body media-text-right">
						<h5><?=number_format($customers['0']['users'])?></h5>
						<p class="m-b-0">Khách hàng</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
            <div class="card bg-dark">
                <div class="testimonial-widget-one p-17">
                    <div class="testimonial-widget-one owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonial-content">
	                            <img class="testimonial-author-img" src="images/avatar/3.jpg" alt="" />
                                <div class="testimonial-author">BILL GATES</div>
                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i><span style="color:white; font-size:15px;">Những khách hàng khó tính nhất chính là nguồn học vĩ đại nhất của bạn. Nếu bạn sinh ra trong nghèo khó, đó không phải là lỗi của bạn. Nhưng nếu bạn chết trong nghèo khó, thì đó là lỗi của bạn.</span>
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/3.jpg" alt="" />
                                <div class="testimonial-author">JACK MA</div>
                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>
                                    <span style="color:white; font-size:15px;">Nếu bạn muốn phát triển, hãy tìm kiếm một cơ hội thật tốt. Nếu bạn muốn có một công ty lớn, bạn hãy nghĩ đến những vấn đề mà bạn phải đối mặt trước khi nghĩ đến thành công.</span>
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/1.jpg" alt="" />
                                <div class="testimonial-author">JOSEPH ADDISON</div>
                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>
                                    <span style="color:white; font-size:15px;">Không có gì cần thiết hơn trong kinh doanh là sự nhanh nhạy.</span><br/>
									<span style="color:white; font-size:15px;">There is nothing more requisite in business than despatch.</span>
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/4.jpg" alt="" />
                                <div class="testimonial-author">ZIG ZIGLAR</div>
                               <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>
                                    <span style="color:white; font-size:15px;">Nếu mọi người thích bạn, họ sẽ lắng nghe bạn, nhưng nếu họ tin tưởng bạn, họ sẽ làm kinh doanh với bạn.</span><br/>
									<span style="color:white; font-size:15px;">If people like you, they'll listen to you, but if they trust you, they'll do business with you.</span>
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <img class="testimonial-author-img" src="images/avatar/5.jpg" alt="" />
                                <div class="testimonial-author">ZIG ZIGLARS</div>
                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>
                                   	<span style="color:white; font-size:15px;">Mỗi lần bán hàng có năm trở ngại cơ bản: không cần thiết, không có tiền, không vội vàng, không ham muốn, không có niềm tin.</span><br/>
									<span style="color:white; font-size:15px;">Every sale has five basic obstacles: no need, no money, no hurry, no desire, no trust.</span>
                                    <i class="fa fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-title">
                    <h4>Đơn hàng gần đây </h4>
                </div>
                <div class="card-body">
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
                                
                                    <!-- <td>John Abraham</td>
                                    <td><span>iBook</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Hoàn thành</span></td> -->
                                    <?php foreach($recentSO as $SO){
                                    	echo '<tr>';
                                    	echo '<td>'.$SO['name'].'</td>';
                                    	echo '<td>'.number_format($SO['total_price']).'</td>';
                                    	echo '<td>'.$SO['address'].'</td>';
                                    	echo '<td>'.date("d/m/Y", strtotime($SO['created_date'])).'</td>';
                                    	if($SO['status']==4)
                                    		echo '<td><span class="badge badge-success">Hoàn thành</span></td>';
                                    	if($SO['status']==3)
                                    		echo '<td><span class="badge badge-success">Đơn hàng</span></td>';
                                    	echo '</tr>';
                                    }
                                    ?>
                                
                            </tbody>
                        </table>
                        <p align="center"><?=Html::a('Xem thêm', ['../admin/sale-order'],['class' => 'btn btn-success'])?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-lg-9">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Lợi nhuận trong những tháng gần đây</h4>
					<?= ChartJs::widget([
					    'type' => 'line',
					    'options' => [
					        'height' => 100,
                    
                
					    ],
					    'data' => [
					        'labels' => [$profit['7']['month'].'/'.$profit['7']['year'], 
					        			$profit['6']['month'].'/'.$profit['6']['year'],
					        			$profit['5']['month'].'/'.$profit['5']['year'],
					        			$profit['4']['month'].'/'.$profit['4']['year'],
					        			$profit['3']['month'].'/'.$profit['3']['year'],
					        			$profit['2']['month'].'/'.$profit['2']['year'],
					        			$profit['1']['month'].'/'.$profit['1']['year'],
					        			$profit['0']['month'].'/'.$profit['0']['year'],
					        			],
					        'datasets' => [
					            [
					                'label' => "Lợi nhuận",
					                'backgroundColor' => "rgba(179,181,198,0.2)",
					                'borderColor' => "rgba(179,181,198,1)",
					                'pointBackgroundColor' => "rgba(179,181,198,1)",
					                'pointBorderColor' => "#fff",
					                'pointHoverBackgroundColor' => "#fff",
					                'pointHoverBorderColor' => "rgba(179,181,198,1)",
					                'data' => [$profit['7']['profit'],
					                			$profit['6']['profit'],
					                			$profit['5']['profit'],
					                			$profit['4']['profit'],
					                			$profit['3']['profit'],
					                			$profit['2']['profit'],
					                			$profit['1']['profit'],
					                			$profit['0']['profit'],
					            	]
					            ],
					        ]
					    ]
					]);
					?>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Tồn kho theo loại sản phẩm</h4>
					<?php
					$data = [];
					$label=[];
					foreach($inventory as $item)
					{
						array_push($data, $item['totalamount']);
						array_push($label, $item['name'].' '.$item['gender']);
					}
					echo ChartJs::widget([
					    'type' => 'pie',
					    'id' => 'structurePie',
					    'options' => [
					        'height' => 420,
					        'width' => 420,
					        'legend' => [
					        	'display' => false,
					        ],
					    ],
					    'data' => [
					        'radius' =>  "90%",
					        'labels' => $label, // Your labels
					        'datasets' => [
					            [
					                'data' => $data, // Your dataset
					                'label' => '',
					                'backgroundColor' => [
					                        '#ADC3FF',
					                        '#FF9A9A',
					                    	'rgba(190, 124, 145, 0.8)',
					                    	'#80CC14',
					                        '#CC3814',
					                    	'#00FFA9',
					                    	'#ADC3FF',
					                        '#FF9A9A',
					                    	'CC6E14',
					                ],
					                'borderColor' =>  [
					                        '#fff',
					                        '#fff',
					                        '#fff'
					                ],
					                'borderWidth' => 1,
					                'hoverBorderColor'=>["#999","#999","#999","#999","#999","#999","#999","#999","#999"],                
					            ]
					        ]
					    ],
					    'clientOptions' => [
					    	'legend' => [ 'display'=> false ],
					    ],
					]);
					?>

				</div>
			</div>
		</div>
	</div>
</div>