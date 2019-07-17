$('document').ready(function(){
					$('#one_send').validate(
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
								"city":{
									required: true
								},
								"mail":{
									email: true
								},
								"key":{
									required: true,
									equalTo: "#url"
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
								"city":{
									required:"Обязательное поле"
								},
								"key":{
									required:"Обязательное поле",
									equalTo: "Код неверный"
								}
							},
					})
});