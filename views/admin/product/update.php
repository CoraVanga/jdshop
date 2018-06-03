<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Sửa đổi thông tin sản phẩm: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="product-update">
	<div class="col-lg-10">
		<div class="card card-outline-primary">
			<div class="card-header">
				<h4 class="m-b-0 text-white" style="padding:10px;">Cập nhật thông tin</h4>
			</div>
			<div class="card-body">
				<?= $this->render('_form_update', [
					'model' => $model,
					'modelImage'=>$modelImage,
					]) ?>
			</div>
		</div>
	</div>
</div>
<script>
	$('.jdDelImageButton').click(function() {
			$(this).parent().parent().parent().attr('id','jdDelIem');
			idImage = $(this).parent().parent().parent().find('.jdImageId').html();
			$.ajax({
				url: '<?php echo Yii::$app->request->baseUrl. '/admin/product/delimage' ?>',
				type: 'post',
				data: {
					 _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
					id: idImage,
				},
				success:function(data){
					alert("Xóa hình ảnh thành công");
					$('#jdDelIem').remove();
				}
			});
			
		});
		$('.jdDeleteDetail').click(function() {
			idProductDetail = $(this).parent().parent().parent().find('.jdProductDetailID').html();
			//alert(idProductDetail);
			$.ajax({
				url: '<?php echo Yii::$app->request->baseUrl. '/admin/product/deldetail' ?>',
				type: 'post',
				data: {
					 _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
					id: idProductDetail,
				},
				success:function(data){
					alert("Xóa chi tiết thành công");
				}
			});
			
		});
</script>
