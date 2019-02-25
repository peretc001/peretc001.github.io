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
$options = get_option( 'okHall_settings' );
?>

	
<?php wp_footer(); ?>

	<div id="toTop"><img src="/wp-content/themes/okhall/img/arrow-top.svg"></div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script defer src="/wp-content/themes/okhall/js/mmenu/jquery.mmenu.all.js"></script>
	<script defer src="/wp-content/themes/okhall/js/owlCarousel/owl.carousel.min.js"></script>
	<script defer src="/wp-content/themes/okhall/js/equalHeights/jquery.equalheights.min.js"></script>
 	<script defer src="//script.marquiz.ru/v1.js"></script>
 	<script>document.addEventListener("DOMContentLoaded", function() {Marquiz.init({ id: '5b76ef0d051fef0042b1fc8b' });});</script>
 	<script defer src="/wp-content/themes/okhall/js/scripts.min.js"></script>
	<script defer src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
	<script>
			$(function() {
		

		

 		ymaps.ready(init);

		function init() {
			myMap = new ymaps.Map('map_page', {
				center: [55.7900,37.6000],
				zoom: 11
			});



			s = {
				iconLayout: 'default#image',
				iconImageHref: '/wp-content/themes/okhall/img/logo-map.svg',
				iconImageSize: [87, 74],
				iconImageOffset: [-43, -56]
			};
			m = {
				<?php $i = 1;
					for ($i = 1; $i < $options['map__point__count']; $i++) {
						echo 'm'. $i .': new ymaps.Placemark([' .$options['map__point__'. $i] .'], {}, s),'. PHP_EOL;
					}
					echo 'm'. $i .': new ymaps.Placemark([' .$options['map__point__'. $i] .'], {}, s)';
				?>
		
			};
			//myMap.behaviors.disable('scrollZoom');
			//на мобильных устройствах... (проверяем по userAgent браузера)
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				//... отключаем перетаскивание карты
				myMap.behaviors.disable('drag');
			}
			myMap.geoObjects
				<?php $i = 1;
					for ($i = 1; $i < $options['map__point__count']; $i++) {
						echo '.add(m["m'. $i .'"])'. PHP_EOL;
						
					}
					echo '.add(m["m'. $i .'"]);';
				?>
			function onResizeMap() {
				
				
				if ($(window).width() > '992') { 
					myMap.setCenter([55.7900,37.4000]);
				}
				if ($(window).width() > '1200') { 
					myMap.setCenter([55.7900,37.3000]);
				} 

			} onResizeMap();

			window.onresize = function () {
				onResizeMap();
			};
		};






});
</script>
</body>
</html>
