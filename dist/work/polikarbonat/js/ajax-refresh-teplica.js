$(document).on('click','table.product td.right ul.teplica li a',function(){
	var ww = $.ajax({
	type: "GET",
	cache: false,
	url: $(this).attr('href'),
	global: false,
	dataType: "text",
	success: function(data){
		$('table.product td.right p.price span').html($(data).find("table.product td.right p.price span").html());
		$('table.product td.right ul.teplica').html($(data).find("table.product td.right ul.teplica").html());
		$('table.product td.right form[id=send]').html($(data).find("table.product td.right form[id=send]").html());
	}
}); //console.log(ww)
if (ww){
return false;
} else{
	return true;
	}
});