$(document).on('click','.page_right ul.color li a',function(){
	$('page_left').html('<div align="center" style="margin:0 auto; display:block; width:400px; height:400px; background-image:url(/img/load.gif); background-color:#ffff; padding:4px; border:1px solid #ccc; background-position:center center; background-repeat:no-repeat;"></div>');
	var ww = $.ajax({
	type: "GET",
	cache: false,
	url: $(this).attr('href'),
	global: false,
	dataType: "text",
	success: function(data){
		
			
		
		setTimeout(function(){
			$('.page_left').html($(data).find(".page_left").html());
			$('.menuid').html($(data).find(".menuid").html());
			$('.page_right ul.color').html($(data).find(".page_right ul.color").html());
			$('.page_right ul.tech').html($(data).find(".page_right ul.tech").html());
			$('h1').html($(data).find("h1").html());
			$('.page_right select[id=select_price]').html($(data).find(".page_right select[id=select_price]").html());
			$('.page_right p.price').html($(data).find(".page_right p.price").html());
			$('.page_right form[id=add]').html($(data).find(".page_right form[id=add]").html());
			$('.product_page_specification table td.osn').html($(data).find(".product_page_specification table td.osn").html());

		},600);
		
	}
}); //console.log(ww)
if (ww){
return false;
} else{
	return true;
	}
});