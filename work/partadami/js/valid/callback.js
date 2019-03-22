$('document').ready(function(){
								$('#callback').validate(
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
												required:"Обязательное поле",
												equalTo: "Код неверный"
											}
										},
										
										// указаваем обработчик
										submitHandler: function(form){
											$(form).ajaxSubmit({
											target: '#preview', 
											success: function(response){
												$('.form').slideUp('fast'); 
												$("#popup_overlay").delay(2500).fadeOut(800);
											}
										}); 
									}

								})
							});