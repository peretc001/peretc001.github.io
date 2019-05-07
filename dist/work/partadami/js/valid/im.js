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
												minlength: 5
											},
											"url":{
												required: true,
												minlength: 3
											},
											"email":{
												required: true,
												email: true
											},											
											"key":{
												required: true,
												minlength: 4
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
											"url":{
												required:"Обязательное поле"
											},
											"email":{
												required:"Обязательное поле"
											},
											"key":{
											required:"Обязательное поле"
											}
										},
					})
});