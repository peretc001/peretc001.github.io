;(function($) {
						$(function() {
							$('#my-button').bind('click', function(e) {
								e.preventDefault();
								$('#element_to_pop_up').bPopup();
							});
						});
					 })(jQuery);