$('.jdImageProductSmall').click(function(){
	var bigImage=$('.jdImageProductBig').parent().html();
	$(this).attr('class','thumbnail jdImageProductBig');
	var smallImage=$(this).parent().html();
		$(this).attr('class','thumbnail jdImageProductSmall');
	$('.jdImageProductBig').parent().html(smallImage);

});