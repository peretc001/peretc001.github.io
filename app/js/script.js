
jQuery(document).ready(function ($) {
		$('.navbar').on('show.bs.collapse', function () {
			$('.hamburger').addClass('is-active');
		});
		$('.navbar').on('hide.bs.collapse', function () {
			$('.hamburger').removeClass('is-active');
		});
	});