$('document').ready(function(){
					$('#send').validate(
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
				target: '#send_ok', 
				success: function(response){
					$('#product table.product td.right #user #forma').slideUp();
					$('#product table.product td.right #user #send)ok').fadeIn();						
                }
			}); 
		}

	})
});