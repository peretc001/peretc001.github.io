$(document).on('click','.page_right ul li a',function(){
	$('page_left').html('<div align="center" style="margin:0 auto; display:block; width:300px; height:300px; background-image:url(/img/load.gif); background-color:#ffff; padding:4px; border:1px solid #ccc; background-position:center center; background-repeat:no-repeat;"></div>');
	var ww = $.ajax({
	type: "GET",
	cache: false,
	url: $(this).attr('href'),
	global: false,
	dataType: "text",
	success: function(data){
		
		$('div.product_page_specification table').html($(data).find('div.product_page_specification table').html());
			
		
		setTimeout(function(){
			$('.page_left').html($(data).find(".page_left").html());
			$('.menuid').html($(data).find(".menuid").html());
			$('.page_right ul.color').html($(data).find(".page_right ul.color").html());
			$('h1').html($(data).find("h1").html());
			$('.page_right ul.size').html($(data).find(".page_right ul.size").html());
			$('.page_right p.price').html($(data).find(".page_right p.price").html());
			$('.page_right ul.price_kv').html($(data).find(".page_right ul.price_kv").html());
			$('.page_right ul.price_list').html($(data).find(".page_right ul.price_list").html());
			$('.page_right ul.polyc_size').html($(data).find(".page_right ul.polyc_size").html());
			$('.page_right form[id=add]').html($(data).find(".page_right form[id=add]").html());
			$('div.product_page_specification').html($(data).find('div.product_page_specification').html());
		},600);
		
	}
}); //console.log(ww)
if (ww){
return false;
} else{
	return true;
	}
});