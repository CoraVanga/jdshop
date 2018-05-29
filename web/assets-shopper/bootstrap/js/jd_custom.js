$(function() {
	$(document).ready(function() {
		$('.jdComBoBox').change(function() {
			var price = $('.jdComBoBox').val();
			var size = $('.jdComBoBox option:selected').text();
			var discount = $('#jdDiscount').text();
			if(size=="CHỌN KÍCH CỠ")
			{
				size = $('.jdComBoBox option:selected').next().text();
			}
			$('.productPrice').text(price);
			$('#productSize').val(size);
			var index = $(".jdComBoBox option:selected").index();
			var originvalue = $('.jdComBoBox2 option').eq(index).val();
			$('.jdOriginPrice').text(originvalue);
		});
		// $('.delCartItem').click(function() {
		// 	var orderLineId = $(this).parent().parent().find(".orderLineId").html();
		// 	//var baseUrl = '<?php echo Yii::$app->request->baseUrl?>';
		// 	alert("Đã xóa "+orderLineId);

		// 	$.ajax({
		// 		url: '/user/cart/del',
		// 		type: 'post',
		// 		data: {
		// 			 _csrf : '<?=Yii::$app->request->getCsrfToken()?>',
		// 			id: orderLineId
		// 		},
		// 		success:function(data){
		// 			alert("Đã xóa sản phẩm này khỏi giỏ hàng của bạn");
		// 		}
		// 	});
			
		// });

	});


});