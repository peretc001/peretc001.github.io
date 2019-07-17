$('document').ready(function(){
					$('#zakaz').validate(
						{	
							// правила для проверки
							rules:{
								"firstname":{
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
								"msg":{
									required: false,
									maxlength: 150
								},
								"policy":{
									required: true
								}
								
								
							},

							// выводимые сообщения при нарушении соответствующих правил
							messages:{
								"firstname":{
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
								}
								,
								"msg":{
									maxlength:"Слишком много текста"
								},
								"policy":{
									required:"Требуется ваше согласие"
								}
							},
					})
});