<?php 
/**
 * The template for displaying index page
 *
 * Template Name: INDEX
 *
 * @package WordPress
 * @subpackage OKHall
 * @since 1.0.0
 */


get_header(); 
//

$options = get_option( 'wpSetup_api_settings' );

$company_desc = $options['wpSetup_api_text_description'];
$number_in = preg_replace('~\\D+~u', '', $options['wpSetup_api_text_phone']); //71234567890
$number_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $number_in); //+7 (123) 456-78-90
$number_public = substr($number_in_valid, 0, -9) .'<b>' . substr($number_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>

$mobile_in = preg_replace('~\\D+~u', '', $options['wpSetup_api_text_mobile']); //71234567890
$mobile_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $mobile_in); //+7 (123) 456-78-90
$mobile_public = substr($mobile_in_valid, 0, -9) .'<b>' . substr($mobile_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>
?>

	<header class="header" style="background-image: url('<?php bloginfo('template_url'); ?>/img/Img_1_Header.jpg')">
		
		<nav class="header__nav">
			<div class="container">
				<div class="row border_bottom">
						
						<div class="mobile__menu">
							<a href="#my-menu">
								<div class="hamburger hamburger--emphatic">
									<span class="hamburger-box"><span class="hamburger-inner"></span></span>
								</div>
							</a>
						</div>
							
						
						<!-- left -->
						<div class="header__nav__left">

							<p class="header__nav__left__logo">
								<a href="/">
									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="134.3 -0.9 31.5 30.9" enable-background="new 134.3 -0.9 31.5 30.9" xml:space="preserve">
										<g>
											<g>
												<ellipse fill="none" stroke="#000000" cx="145.6" cy="10.6" rx="9.9" ry="9.5" />
												<polyline fill="none" stroke="#000000" points="152.2,2.1 152.2,1.1 155.6,1.1 155.6,20.1 152.2,20.1 152.2,19 		" />
												<line fill="none" stroke="#000000" x1="152.2" y1="5.2" x2="152.2" y2="16.1" />
												<line fill="none" stroke="#000000" x1="161.8" y1="1.1" x2="155.6" y2="12.9" />
												<line fill="none" stroke="#000000" x1="164.6" y1="20.1" x2="156.8" y2="10.6" />
											</g>
											<g enable-background="new    ">
												<path d="M140.3,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3s-0.3-0.1-0.3-0.3S140.1,27.2,140.3,27.2z" />
												<path d="M141.1,27.5c0-0.9,0.8-1.5,1.8-1.5s1.8,0.6,1.8,1.5c0,0.9-0.8,1.5-1.8,1.5S141.1,28.4,141.1,27.5z M141.5,27.5
												c0,0.7,0.6,1.2,1.4,1.2c0.8,0,1.4-0.5,1.4-1.2s-0.6-1.2-1.4-1.2C142.1,26.3,141.5,26.8,141.5,27.5z" />
												<path d="M145.8,27.3l1.5-1.3h0.5l-1.6,1.4l1.7,1.6h-0.5l-1.4-1.4l-0.1,0.1V29h-0.4v-3h0.4V27.3z" />
												<path d="M148.5,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3s-0.3-0.1-0.3-0.3S148.3,27.2,148.5,27.2z" />
												<path d="M149.9,27.2h1.8V26h0.4v3h-0.4v-1.4h-1.8V29h-0.4v-3h0.4V27.2z" />
												<path d="M154.9,28.2h-1.5L153,29h-0.4l1.6-3.1l1.6,3.1h-0.4L154.9,28.2z M154.7,27.9l-0.6-1.2l-0.6,1.2H154.7z" />
												<path d="M156.6,26v2.7h1V29h-1.4v-3H156.6z" />
												<path d="M158.5,26v2.7h1V29h-1.4v-3H158.5z" />
												<path d="M160.1,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3c-0.2,0-0.3-0.1-0.3-0.3S159.9,27.2,160.1,27.2z" />
											</g>
										</g>
										
									</svg>
								</a>
							</p>
							<p class="header__nav__left__text">
								<b><?php bloginfo('description'); ?></b>
								<span><?php echo $company_desc; ?></span>
							</p>
						</div>
						<!-- End Left -->
						<!-- Right -->
						<div class="header__nav__right">
							
							<ul class="navbar-nav">
								<? 
									echo preg_replace( '#<li[^>]+><a href="#',  '<li class="nav-item"><a class="nav-link" href="',
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
							</ul>	

							
							
							<div class="header__nav__right__items">
								<div class="social">
									<p>
										<?php
											$id = 27; // id страницы
											
											$post = get_page($id);
											$content = $post->post_content;
											echo $post->post_content;
										?>
									</p>
								</div>
								<div class="phone">
									<p><?php echo $number_public; ?></p>
									<p>
										<a href="viber://chat?number=<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/viber.svg" alt="Viber"></a>
										<a href="https://wa.me/<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/whatsapp.svg" alt="Whatsapp"></a>
										<?php echo $mobile_public; ?>
									</p>
									<p class="d-lg-none"><a href="tel:<?php echo $mobile_in; ?>"><i class="fas fa-mobile-alt"></i></a></p>
								</div>


							</div>

						</div>
						<!-- End Right -->
						
					
					
					
				</div>
			</div>
		</nav>

			

		<div class="header__block">
			<div class="container">
				
				

				<?php
					$id = 5; // id страницы
					
					$post = get_page($id);
					$content = $post->post_content;
					echo $post->post_content;
				?>
			
			</div>
		</div>
	</header>


	<section class="advantages" style="background-image:url('<?php bloginfo('template_url'); ?>/img/advantages/pattern.jpg')">
		
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mouse" x="0px"
			y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
			<g>
				<g>
					<path
						d="M256,0C156.595,0,75.726,82.14,75.726,183.099v145.807C75.726,429.865,156.595,512,256,512    c99.399,0,180.274-81.886,180.274-182.534V183.099C436.274,82.14,355.399,0,256,0z M402.366,329.466    c0,81.954-65.656,148.627-146.366,148.627c-80.705,0-146.366-66.927-146.366-149.192V183.099    c0-82.265,65.661-149.192,146.366-149.192c80.711,0,146.366,66.927,146.366,149.192V329.466z"
						fill="#FFFFFF" />
				</g>
			</g>
			<g>
				<g>
					<path
						d="M256,140.15c-9.364,0-16.954,7.59-16.954,16.954v59.338c0,9.364,7.59,16.954,16.954,16.954    c9.364,0,16.954-7.59,16.954-16.954v-59.338C272.954,147.74,265.364,140.15,256,140.15z"
						fill="#FFFFFF" />
				</g>
			</g>
		</svg>
		
	
		<div class="container">
			<div class="row">

				<div class="col-12 advantages__block">
				<?php 
					$args = array('post_type' => 'post');
					$query = new WP_Query($args); 

						if ( $query->have_posts() ) : 

						while ( $query->have_posts() ) : $query->the_post(); ?>
							<h2><?php the_title(); ?></h2>
							<p><?php echo $post->post_content; ?></p>
						<?php endwhile; 

						wp_reset_postdata(); 

						else : ?>
						<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
					<?php endif; ?>
				</div>

				
				<div class="col-12 advantages__block">
					<p class="advantages__img">
						<img src="" alt="">
					</p>
					<h3>
						Комфорт во всем
					</h3>
					<p>
						Узнаем о ваших привычках и увлечениях. Найдем место для тренажера, лыж, велосипеда, сейфа.
						У каждого предмета есть место. У каждого электроприбора своя розетка
					</p>
				</div>

				<div class="col-12 advantages__block">
					<p class="advantages__img">
						<img src="" alt="">
					</p>
					<h3>
						Ведомость отделки с указанием отделочных материалов
					</h3>
					<p>
						Заставьте ремонтную бригаду работать по своему плану, покупайте только необходимые
						отделочные материалы и в нужном количестве – сэкономьте до 30%
					</p>
				</div>

				<div class="col-12 advantages__block">
					<p class="advantages__img">
						<img src="" alt="">
					</p>
					<h3>
						Честный выбор мебели под бюджет
					</h3>
					<p>
						У нас нет любимчиков среди поставщиков. Выбираем мебель строго под ваш бюджет.
						Рекомендуем магазины, которые являются официальными дилерами
					</p>
				</div>

				<div class="col-12 advantages__block">
					<p class="advantages__img">
						<img src="" alt="">
					</p>
					<h3>
						3D визуализация – 3, 5 фотографий на одну комнату
					</h3>
					<p>
						Сначала увидите, как будут выглядеть комнаты после ремонта, а потом сделаете
						ремонт по точному плану
					</p>
				</div>

				<div class="col-12 advantages__block">
					<p class="advantages__img">
						<img src="" alt="">
					</p>
					<h3>
						Все есть в Москве
					</h3>
					<p>
						Мебель, светильники, картины и предметы интерьера легко найти и купить.
						Все дизайн - проекты реально воплотить в жизнь, дадим контакты проверенных поставщиков мебели
					</p>
				</div>
			</div>
		</div>

	</section>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
 crossorigin="anonymous"></script>
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

			//Bold phone last 9
			// var boldPhone = document.querySelectorAll(".main_phone");
			// for(var i = 0; i < boldPhone.length; i++) {
			// 	var boldText = boldPhone[i].innerHTML;
			// 	var boldPhoneWith = boldText.length;
			// 	var lastNine = boldText.slice(-9);
			// 	var firstNine = boldPhoneWith - lastNine.length;
			// 	var firstText = boldText.substr(0, firstNine);

			// 	boldPhone[i].innerHTML = `${firstText} <b>${lastNine}</b>`;
			// }
			
			

		})
	</script>

<?php
get_footer(); ?>
