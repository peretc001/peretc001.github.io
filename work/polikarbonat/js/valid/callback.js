$('document').ready(function(){
					$('#callback_form').validate(
						{	
							rules:{
								"phone":{
									required: true,
									minlength: 5
								},
								"user":{
									required: true,
									minlength: 3
								},
								"policy":{
									required: true
								}
								
							},

							messages:{
								"phone":{
									required:"Обязательное поле"
								},
								"user":{
									required:"Обязательное поле"
								},
								"policy":{
									required:"Требуется ваше согласие"
								}
							},
				
			
			submitHandler: function(form){
				$(form).ajaxSubmit({
				target: '#callback_ok', 
				success: function(response){
					$('#callback_form').slideUp();					
                }
			}); 
		}

	})
});