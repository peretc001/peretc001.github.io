
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
  
});