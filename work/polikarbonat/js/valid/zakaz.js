$('document').ready(function(){
					$('#zakaz').validate(
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
								"email":{
									required: true,
									email: true
								},
								"city":{
									required: true,
									minlength: 3
								},
								"policy":{
									required: true
								}
								
								
							},

							// выводимые сообщения при нарушении соответствующих правил
							messages:{
								"user":{
									required:"Обязательное поле"
								},
								"phone":{
									required:"Обязательное поле"
								},
								"email":{
									required:"Обязательное поле"
								},
								"city":{
									required:"Обязательное поле"
								},
								"policy":{
									required:"Требуется ваше согласие"
								}
							},
					})
});