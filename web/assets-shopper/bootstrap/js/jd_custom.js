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
		$('#addToCartButton').click(function(){

		});
	});

});