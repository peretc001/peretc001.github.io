$('document').ready(function(){
					$('#price_form').validate(
						{	
							// правила для проверки
							rules:{
								"name":{
									required: true,
									minlength: 3
								},
								"city":{
									required: true,
									minlength: 3
								},
								"phone":{
									required: true
								},
								"email":{
									required: true,
									email:true
								},
											"policy":{
												required: true
											}								
							},

							// выводимые сообщения при нарушении соответствующих правил
							messages:{
								"name":{
									required:"Обязательное поле"
								},
								"city":{
									required:"Обязательное поле"
								},
								"phone":{
									required:"Обязательное поле"
								},
								"email":{
									required:"Обязательное поле"
								},
											"policy":{
												required:"Требуется ваше согласие"
											}
								
							},
				
			
			// указаваем обработчик
			submitHandler: function(form){
				$(form).ajaxSubmit({
				target: '#check_ok', 
				success: function(response){
					$("html, body h1").animate({scrollTop: 0});
					$('#price_form').slideUp();					
                }
			}); 
		}

	})
});