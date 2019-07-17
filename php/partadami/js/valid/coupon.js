$('document').ready(function(){
	$('#coupon_form').validate(
		{	
			// правила для проверки
			rules:{
				"coupon":{
					required: true
				}
			},

			// выводимые сообщения при нарушении соответствующих правил
			messages:{
				"coupon":{
					required:""
				}
			},
										
			// указаваем обработчик
			submitHandler: function(form){
				$('form[id=coupon_form]').ajaxSubmit({
					target: '#coupon_ok', 
					success: function(response){
						$('form[id=addemail]').slideUp('fast'); 												
					}
				}); 
			}
		})
});