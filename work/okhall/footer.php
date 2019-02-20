<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package okhall
 */

?>

	
<?php wp_footer(); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/animate.css">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/hamburgers.min.css">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/jquery.mmenu.all.css">
	<link rel="stylesheet" href="/wp-content/themes/okhall/js/owlCarousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/main.min.css">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/insert.css">
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
	crossorigin="anonymous"></script>
	<script src="/wp-content/themes/okhall/js/mmenu/jquery.mmenu.all.js"></script>
	<script src="/wp-content/themes/okhall/js/owlCarousel/owl.carousel.min.js"></script>
	<script src="/wp-content/themes/okhall/js/equalHeights/jquery.equalheights.min.js"></script>
 	<script src="//script.marquiz.ru/v1.js" type="application/javascript"></script><script>document.addEventListener("DOMContentLoaded", function() {Marquiz.init({ id: '5b76ef0d051fef0042b1fc8b' });});</script>
	<script>
			$(function () {

				//Sticky header menu
				$(document).scroll(function () {
					if ($(document).scrollTop() > 100) {
						$('.header__nav').addClass('sticky animated fadeIn faster');
						$('.header').addClass('gutter');
						$('#svg').addClass('black');
						console.log('sticky');
					} else {
						$('#svg').removeClass('black');
						$('.header__nav').removeClass('sticky animated fadeIn faster');
						$('.header').removeClass('gutter');
						console.clear();
					}
				});
			})
		</script>
</body>
</html>
