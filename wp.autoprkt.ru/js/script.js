
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
});