
jQuery(document).ready(function ($) {
		$('.navbar').on('show.bs.collapse', function () {
			$('.hamburger').addClass('is-active');
		});
		$('.navbar').on('hide.bs.collapse', function () {
			$('.hamburger').removeClass('is-active');
		});

	$(window).on('scroll', function () {
		// remove any existing active
		$('.active').removeClass("active");

		// change bg color of active section
		$('.navbar').addClass("active");

		// change bg color of navbar
		$(".navbar").addClass("active");

	});

	$(window).scroll(function () {
		/* remove style on scroll back to top */
		if ($(document).scrollTop() < 60) {
			$('.navbar').removeClass('active');
		}
	});
});