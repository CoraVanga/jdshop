$(function() {
	$(document).ready(function() {
		$('.jdComBoBox').change(function() {
			var price = $('.jdComBoBox').val();
			var size = $('.jdComBoBox option:selected').text();
			var discount = $('#jdDiscount').text();
			alert(price);
			alert(discount/100);
			alert(price*discount/100);
			if(size=="CHỌN KÍCH CỠ")
			{
				size = $('.jdComBoBox option:selected').next().text();
			}
			price = price * (discount/100);
			$('.productPrice').text(price);
			$('#productSize').val(size);
		});
		$('#addToCartButton').click(function(){
		});
	});

});