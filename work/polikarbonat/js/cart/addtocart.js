$('document').ready(function()
								{
									$('#add').ajaxForm( {
										target: '.cartajax', 
										success: function() { 
											$("html, body").animate({scrollTop: 0});
											$('#menu table td.cart p.cart a.cart').hide();
											$('#menu table td.cart p.cart a.cartajax').fadeIn;
											$('#menu table td.cart p.cart a.cartajax').animate({opacity: 0.2}, 1200);
											$('#menu table td.cart p.cart a.cartajax').animate({opacity: 1}, 0);
										} 
									});			
								});