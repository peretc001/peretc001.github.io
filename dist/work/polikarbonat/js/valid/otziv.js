$('document').ready(function(){
					$('#otziv_send').validate(
						{	
							// правила для проверки
							rules:{
								"username":{
									required: true,
									minlength: 3
								},
								"msg":{
									required: true,
									minlength: 7
								},
								"policy":{
									required: true
								}
								
							},

							// выводимые сообщения при нарушении соответствующих правил
							messages:{
								"username":{
									required:"Обязательное поле"
								},
								"msg":{
									required:"Обязательное поле"
								},
								"policy":{
									required:"Требуется ваше согласие"
								}
							},
					})
});