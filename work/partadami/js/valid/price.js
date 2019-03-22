$('document').ready(function(){
								$('#price').validate(
									{	
										// правила для проверки
										rules:{
											"user":{
												required: true,
												minlength: 3
											},
											"phone":{
												required: true,
												digits: true
												
											},
											"company":{
												required: true,
												minlength: 3
											},
											"city":{
												required: true,
												minlength: 3
											},
											"email":{
												required: true,
												email: true
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
											"company":{
												required:"Обязательное поле"
											},
											"city":{
												required:"Обязательное поле"
											},
											"email":{
												required:"Обязательное поле"
											}
										},
					})
});