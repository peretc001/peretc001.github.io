$('document').ready(function(){
					$('#settingup').validate(
						{	
							// правила для проверки
							rules:{
								"user":{
									required: true,
									minlength: 3
								},
								"phone":{
									required: true,
									minlength: 5
								},
								"key":{
									required: true,
									minlength: 4
								}
								
							},

							// выводимые сообщения при нарушении соответствующих правил
							messages:{
								"user":{
									required:"Это поля является обязательным для заполнения"
								},
								"phone":{
									required:"Это поля является обязательным для заполнения"
								},
								"key":{
								required:"Это поля является обязательным для заполнения"
								}
							},
				
			
			// указаваем обработчик
			submitHandler: function(form){
				$(form).ajaxSubmit({
				target: '#setup', 
				success: function(response){
					$('.settingup').slideUp('fast'); 
                }
			}); 
		}

	})
});