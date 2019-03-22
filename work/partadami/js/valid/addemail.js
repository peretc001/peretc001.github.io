$('document').ready(function(){
								$('#addemail').validate(
									{	
										// правила для проверки
										rules:{
											"email":{
												required: true,
												email: true
											},
											"policy":{
												required: true
											}
											
										},

										// выводимые сообщения при нарушении соответствующих правил
										messages:{
											"email":{
												required:"Обязательное поле"
											},
											"policy":{
												required:"Требуется ваше согласие"
											}
										},
										
										// указаваем обработчик
										submitHandler: function(form){
											$('form[id=addemail]').ajaxSubmit({
											target: '#send', 
											success: function(response){
												$('form[id=addemail]').slideUp('fast'); 												
											}
										}); 
									}

								})
							});