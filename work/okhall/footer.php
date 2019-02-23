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
			$(function() {


		//Sticky header menu
		$(document).scroll(function () {
			if ($(document).scrollTop() > 100) {
				$('.header__nav').addClass('sticky animated fadeIn faster');
				$('.header').addClass('gutter');
				$('#svg').addClass('black');
			} else {
				$('#svg').removeClass('black');
				$('.header__nav').removeClass('sticky animated fadeIn faster');
				$('.header').removeClass('gutter');
			}
		});

		$("#my-menu").mmenu({ 
			"extensions": ["theme-black", "pagedim-black", "position-left"], 
			"navbar": { "title": '<img src="img/logo_footer.svg" alt="Ok-Hall">' }
		}); 
		
		// var openMenu = $("#my-menu").data("mmenu"); 
		// openMenu.bind("open:finish", function () { 
		// 	$(".hamburger").addClass("is-active");
			
		// }), openMenu.bind("close:finish", function () { 
		// 	$(".hamburger").removeClass("is-active") 
		// });
		// $('.mm-menu').bind('touchmove', function (e) { 
		// 	e.preventDefault() 
		// });
		$('.step__two').hide();
		$('.step__three').hide();

		$('#step1').submit(function(e){
			e.preventDefault();
			var m_method=$(this).attr('method');
			var m_action=$(this).attr('action');
			var m_data=$(this).serialize();
			$.ajax({
				type: m_method,
				url: m_action,
				data: m_data,
				success: function(result){
					$('#step1').hide();
					$('.price__form').append(result).addClass('animated fadeInDown');
					setTimeout(function() { 
						$('.price__form').removeClass('fadeInDown');
					}, 6000);
					
				}
			});
		});

		$(".partners__carousel").on("initialized.owl.carousel", function () {
			setTimeout(function () {
				partnersServices()
			}, 100);
		});
		$(".partners__carousel").owlCarousel({
			loop: true,
			nav: true,
			smartSpeed: 700,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots: false,
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 2
				},
				768: {
					items: 3
				},
				992: {
					items: 4
				}
			}
		});

		function onResize() {
			if ($(window).width() > '300') { 
				$('.has-carousel.has-carousel-xlrg.flickity-enabled.is-draggable').css('height', '200px'); 
				$('.flickity-viewport').css('height', '200px'); 
			}
			if ($(window).width() > '450') { 
				$('.has-carousel.has-carousel-xlrg.flickity-enabled.is-draggable').css('height', '300px'); 
				$('.flickity-viewport').css('height', '300px'); 
			}
			if ($(window).width() > '576') { 
				$('.has-carousel.has-carousel-xlrg.flickity-enabled.is-draggable').css('height', '330px'); 
				$('.flickity-viewport').css('height', '350px'); 
			}
			if ($(window).width() > '768') { 
				$('.has-carousel.has-carousel-xlrg.flickity-enabled.is-draggable').css('height', '420px'); 
				$('.flickity-viewport').css('height', '450px'); 
			}
			if ($(window).width() > '992') { 
				$('.has-carousel.has-carousel-xlrg.flickity-enabled.is-draggable').css('height', '500px'); 
				$('.flickity-viewport').css('height', '500px'); 
			}
			if ($(window).width() > '1200') { 
				$('.has-carousel.has-carousel-xlrg.flickity-enabled.is-draggable').css('height', '600px'); 
				$('.flickity-viewport').css('height', '600px'); 
			}
		}
		onResize();

		function partnersServices() {
			$(".partners__carousel").each(function () {
				var ths = $(this),
					thsh = ths.find(".partners__carousel .owl-item img").outerHeight();
				ths.find(".partners__carousel .owl-item").css("min-height", thsh);

			});
		}
		partnersServices();
		//Resize windows
		// function onResize() {
		// 	$('.partners__carousel__content').equalHeights();
		// }
		// onResize();
		window.onresize = function () {
			onResize()
		};




});
		</script>
</body>
</html>
