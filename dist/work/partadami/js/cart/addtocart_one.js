$('document').ready(function()
								{
									$('#addone').ajaxForm( {
										target: '#cartajax', 
										success: function() { 
											$('#cart').hide();
											$('#addtocartone').show();
											$('#lean_overlay2').show();
										} 
									});			
								});