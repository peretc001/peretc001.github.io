$(document).on("click",'.product_box .pack a',function(){$('.product_box #links a').html('<div align="center" style="margin:0 auto; display:block; width:200px; height:159px; background-image:url(/img/load.gif); background-position:center center; background-repeat:no-repeat; background-color:#ffffff;">&nbsp;</div>');
var ww=$.ajax({
	type:"GET",
	cache:false,
	url:$(this).attr('href'),
	global:false,
	dataType:"text",
	success:function(data){
		//Цвет
		$('.product_box .color ul').html($(data).find('.product_box .color ul').html());
		//Спецификация
		$('div[id=specification] .row').html($(data).find('div[id=specification] .row').html());
			
		
		setTimeout(function(){
			
			//Комплектация со Стулом или без
			$('.product_box .option').html($(data).find('.product_box .option').html());
			//Картинка со стулом или без
			$('.product_box #links').html($(data).find('.product_box #links').html());
			
			$('h1[itemprop=name]').html($(data).find('h1[itemprop=name]').html());
			$('.product_buy p.bf').html($(data).find('.product_buy p.bf').html());
			$('.product_buy p.price').html($(data).find('.product_buy p.price').html());
			$('.product_buy .oplata p span').html($(data).find('.product_buy .oplata p span').html());
			$('form[id=add]').html($(data).find('form[id=add]').html());
		},600);
	},
	});
if(ww){return false;}
else{return true;}
});