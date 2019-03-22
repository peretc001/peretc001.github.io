$('document').ready(function(){
					$('#kredit_send').validate(
						{
										// правила для проверки
										rules:{
											"firstname":{
												required: true,
												minlength: 3
											},
											"lastname":{
												required: true,
												minlength: 3
											},
											"middlename":{
												required: true,
												minlength: 3
											},
											"cellphone":{
												required: true,
												minlength: 5
											},
											"email":{
												required: true,
												email: true
											},
											"delivery":{
												required: true
											},
											"key":{
												required: true,
												equalTo: "#url"
											}
											
										},

										// выводимые сообщения при нарушении соответствующих правил
										messages:{
											"firstname":{
												required:"Обязательное поле"
											},
											"lastname":{
												required:"Обязательное поле"
											},
											"middlename":{
												required:"Обязательное поле"
											},
											"cellphone":{
												required:"Обязательное поле"
											},
											"email":{
												required:"Обязательное поле"
											},
											"delivery":{
												required:"Обязательное поле"
											},
											"key":{
												required:"Обязательное поле",
												equalTo: "Код неверный"
											}
										},
										
									
								})
							});