
jQuery(document).ready(function ($) {
	//Разрешение экрана
	window.onload = function(){
		console.log(window.screen.availWidth- (window.screen.availWidth - window.innerWidth));
	};

	$('.navbar').on('show.bs.collapse', function () {
		$('.hamburger').addClass('is-active');
	});
	$('.navbar').on('hide.bs.collapse', function () {
		$('.hamburger').removeClass('is-active');
	});

	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('.toTop').fadeIn();
		} else {
				$('.toTop').fadeOut();
		}
	});
	$('.toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
  });
  
  //Hide - show description
	$('.show_description').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$('.hide_description').toggleClass('opener');
		if (!$(this).data('status')) {
			$(this).data('status', true).html('скрыть <i class="fas fa-angle-up"></i>');
		} else {
			$(this).data('status', false).html('показать <i class="fas fa-angle-down"></i>');
		}
	});

	$('.lazy').Lazy({
		scrollDirection: 'vertical',
		effect: 'fadeIn',
		visibleOnly: true,
		onError: function(element) {
			 console.log('error loading ' + element.data('src'));
		}
  	});


});