$(function() {
	$(document).ready(function() {
		$('.jdComBoBox').change(function() {
			if($('.jdComBoBox').val()=='choosesize')
			{
				var i =0;
				var price=0;
				$(".jdComBoBox").find('option').each(function()
				{
				    // Add $(this).val() to your list
				    i++;
				    if (i==2)
				    {
				    	var price = $(this).val();
				    	$('.productPrice').text(price);
				    }
				});
			}
			else
			{
				var price = $('.jdComBoBox').val();
				$('.productPrice').text(price);
			}
		});
	});
});