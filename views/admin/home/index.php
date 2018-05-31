<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use app\models\Product;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Trang chủ (admin)';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
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
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Extra Area Chart</h4>
					<?= ChartJs::widget([
					    'type' => 'line',
					    'options' => [
					        'height' => 100,
					        'width' => 400
					    ],
					    'data' => [
					        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
					        'datasets' => [
					            [
					                'label' => "My First dataset",
					                'backgroundColor' => "rgba(179,181,198,0.2)",
					                'borderColor' => "rgba(179,181,198,1)",
					                'pointBackgroundColor' => "rgba(179,181,198,1)",
					                'pointBorderColor' => "#fff",
					                'pointHoverBackgroundColor' => "#fff",
					                'pointHoverBorderColor' => "rgba(179,181,198,1)",
					                'data' => [65, 59, 90, 81, 56, 55, 40]
					            ],
					            [
					                'label' => "My Second dataset",
					                'backgroundColor' => "rgba(255,99,132,0.2)",
					                'borderColor' => "rgba(255,99,132,1)",
					                'pointBackgroundColor' => "rgba(255,99,132,1)",
					                'pointBorderColor' => "#fff",
					                'pointHoverBackgroundColor' => "#fff",
					                'pointHoverBorderColor' => "rgba(255,99,132,1)",
					                'data' => [28, 48, 40, 19, 96, 27, 100]
					            ],
					            [
					                'label' => "My Third dataset",
					                'backgroundColor' => "rgba(255,80,120,0.2)",
					                'borderColor' => "rgba(255,99,132,1)",
					                'pointBackgroundColor' => "rgba(255,99,132,1)",
					                'pointBorderColor' => "#fff",
					                'pointHoverBackgroundColor' => "#fff",
					                'pointHoverBorderColor' => "rgba(255,99,132,1)",
					                'data' => [55, 99, 10, 150, 70, 111, 133]
					            ]
					        ]
					    ]
					]);
					?>
				</div>
			</div>
		</div>
	</div>
</div>