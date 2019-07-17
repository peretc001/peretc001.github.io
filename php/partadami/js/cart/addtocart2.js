$('document').ready(function()
								{
									$('#add2').ajaxForm( {
										target: '#cartajax', 
										success: function() { 
											$("html, body").animate({scrollTop: 0});
											$('#cart').hide();
											 $("#cartajax").animate({
												opacity: 0.1,
												width:"150%"
											  }, 500 );
											  $("#cartajax").animate({
												opacity: 1,
												width:"100%"
											  }, 500 );
										} 
									});			
								});