$('document').ready(function(){
					$('#zakaz_teplica').validate(
						{	
							// правила для проверки
							rules:{
								"phone":{
									required: true,
									minlength: 5
								},
								"user":{
									required: true,
									minlength: 3
								}
								
							},

							// выводимые сообщения при нарушении соответствующих правил
							messages:{
								"phone":{
									required:"Обязательное поле"
								},
								"user":{
									required:"Обязательное поле"
								}
							},
					})
});