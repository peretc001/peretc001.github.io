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
$company_desc = $options['description'];
$number_in = preg_replace('~\\D+~u', '', $options['phone']); //71234567890
$number_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $number_in); //+7 (123) 456-78-90
$number_public = substr($number_in_valid, 0, -9) .'<b>' . substr($number_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>

$mobile_in = preg_replace('~\\D+~u', '', $options['mobile']); //71234567890
$mobile_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $mobile_in); //+7 (123) 456-78-90
$mobile_public = substr($mobile_in_valid, 0, -9) .'<b>' . substr($mobile_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>
?>
	<footer class="footer" id="footer">
		<div class="container-fluid">
			<div class="row">

				<div class="right__title">
					<p>Дома в которых сделаны наши интерьеры</p>
				</div>

				<div id="map_page"></div>

				<div class="container">
					<div class="col-sm-12 offset-0 col-md-10 offset-md-2 col-lg-7 offset-lg-0">
						<div class="row">
							<div class="col-12 col-sm-2 footer__logo">
								<a href="/"><img src="/wp-content/uploads/2019/02/logo_footer.svg" alt="<?php echo bloginfo('name'); ?>"></a>
							</div>
							
							<div class="col-12 col-sm-8 col-md-7 footer__text">
								<b><?php bloginfo('description'); ?></b>
								<span><?php echo $options['description']; ?></span>
							</div>
							
						</div>
				
						<div class="row">
							<div class="col-12 col-sm-7 col-md-6 footer__phone">
								<p class="footer__grey__text">
									Свяжитесь с нами:
								</p>
								<p><a href="tel:<?php echo $number_in; ?>"><?php echo $number_public; ?></a></p>
								<p>
									<a href="tel:<?php echo $mobile_in; ?>"><?php echo $mobile_public; ?></a>
									<span class="block">
									<a href="viber://chat?number=<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/viber.svg" alt="Viber"></a>
									<a href="https://wa.me/<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/whatsapp.svg" alt="Whatsapp"></a>
									</span>
								</p>
							</div>
							<div class="col-12 col-sm-5 footer__social">
								<p class="footer__grey__text">
									Мы в соц сетях:
								</p>
								<p>
									<a href="<?php echo $options['ok_vk']; ?>" target="_blank"><i class="fab fa-vk"></i></a>
									<a href="<?php echo $options['ok_facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
									<a href="<?php echo $options['ok_instagramm']; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
								</p>
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-sm-7 col-md-6">
								<p class="footer__grey__text bottom">
									<?php bloginfo('name'); ?> © <?php echo date('Y'); ?> Все права защищены
								</p>
							</div>
							<div class="col-12 col-sm-5">
								<p class="footer__grey__text bottom">
									<a href="">Политика конфидициальности</a>
								</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>
</div>
<nav id="my-menu">
	<ul>
		<? 
			echo preg_replace( '#<li[^>]+><a href="#',  '<li><a class="go_to" href="',
	            wp_nav_menu(
	                   array(
							'menu' 				=> 'top-menu', 
							'container' 		=> 'ul',
							'container_class'		=> 'navbar-nav',
							'items_wrap'        => '%3$s',
							'depth'             => 1,
							'echo'              => false
	                         )
	                    )
	            );
		?>
		<li class="phone">
			<a href="tel:<?php echo $number_in; ?>"><?php echo $number_public; ?></a>
		</li>
		<li class="phone bottom">
			<a href="tel:<?php echo $mobile_in; ?>"><?php echo $mobile_public; ?></a>
		</li>
	</ul>
</nav>


	<div id="toTop"><p></p></div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script defer src="/wp-content/themes/okhall/js/owlCarousel/owl.carousel.min.js"></script>
	<?php wp_footer(); ?>
	<script>document.addEventListener("DOMContentLoaded", function() {Marquiz.init({ id: '5b76ef0d051fef0042b1fc8b' });});</script>
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
					if ($(window).width() < '576') { 
						myMap.setCenter([55.7750,37.6000]);
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
