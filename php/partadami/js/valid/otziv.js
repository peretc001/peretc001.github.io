$('document').ready(function(){
					$('#valid_otziv').validate(
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
								"key":{
									required: true,
									equalTo: "#url"
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
								"key":{
									required:"Обязательное поле",
									equalTo: "Код неверный"
								},
											"policy":{
												required:"Требуется ваше согласие"
											}
							},
					})
});