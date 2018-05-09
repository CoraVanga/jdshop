$(function() {
	$(document).ready(function() {
		$('.jdComBoBox').change(function() {
			var price = $('.jdComBoBox').val();
			var size = $('.jdComBoBox option:selected').text();
			if(size=="CHỌN KÍCH CỠ")
			{
				size = $('.jdComBoBox option:selected').next().text();
			}
			$('.productPrice').text(price);
			$('#productSize').val(size);
		});
		$('#addToCartButton').click(function(){

		});
	});
});