<?php
/**
 * Plugin Name: Редактор Главной
 * Description: Плагин добавляет возможность редактировать галвную страницу
 * Author URI:  https://peretc001.github.io
 * Author:      Красовский Игорь
 *
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */


// Hook for adding admin menus
add_action('admin_menu', 'optimazedLanding_add_pages');

// action function for above hook
function optimazedLanding_add_pages() {
    add_menu_page('Редактор Главной', 'Редактор Главной', 9, __FILE__, 'optimazedLanding_page', 'dashicons-admin-settings', 84.6);
    register_setting( 'optimazedLandingCustom', 'optimazedLanding_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function optimazedLanding_page() { 
	$options = get_option( 'optimazedLanding_settings' );
?>
	<style>
	#wpcontent {padding-left: 0}
	.header {min-height: 300px !important;height: 300px !important;padding-top: 0px !important;}
	.transp, input.transp { background: Transparent; border: 0.5px dashed #fff; }
    .white, input.white { color:#fff; }
    .blc, input.blc { border: 0.5px dashed #000; }
    .admin_top {padding: 30px 30px 100px 30px;background-size:cover;}
	.title_white {color: #fff;}
	.fs1 {font-size: 1em;}
	.fs13 {font-size: 1.3em;}
	.fs15 {font-size: 1.5em;}
	.fs2 {font-size: 2em;}
	</style>
	<form action='options.php' method='post'>

	<section class="admin_top"  style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
   		<div class="container">
	   		<div class="text-center">
	   			<h2>НАСТРОЙКИ КОМПАНИИ</h2>
			    <p>
			    	На данной странице вы можете изменить данные о компании,<br>номера телефонов, адреса, ссылки на соц. сети, контент главной страницы и тд
			    </p>
	   		</div>
   		

	   		<div class="row">
			   <div class="col-md-3 text-center">
	   				<label for="build__mobile">Whatsapp</label>
	   				<input id="build__mobile" type='text' class="form-control blc text-center"  name='optimazedLanding_settings[whatsapp]' value='<?php echo $options['whatsapp']; ?>'>
	   			</div>
	   			<div class="col-md-3 text-center">
	   				<label for="build__phone">Телефон</label>
	   				<input id="build__phone" type='text' class="form-control blc text-center"  name='optimazedLanding_settings[phone]' value='<?php echo $options['phone']; ?>'>
				</div>
				<div class="col-md-3 text-center">
	   				<label for="build__name">Название</label>
	   				<input id="build__name" type='text' class="form-control blc text-center"  name='optimazedLanding_settings[name]' value='<?php echo $options['name']; ?>'>
				</div>
				<div class="col-md-3 text-center">
	   				<label for="build__word">График работы</label>
	   				<input id="build__word" type='text' class="form-control blc text-center"  name='optimazedLanding_settings[work]' value='<?php echo $options['work']; ?>'>
	   			</div>
	   		</div>

	   		<div class="row mt-3">
	   			<div class="col-md-4 text-center">
	   				<label for="build__vk">VK</label>
	   				<input id="build__vk" type='text' class="form-control blc"  name='optimazedLanding_settings[build_vk]' value='<?php echo $options['build_vk']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="build__fb">Facebook</label>
	   				<input id="build__fb" type='text' class="form-control blc"  name='optimazedLanding_settings[build_facebook]' value='<?php echo $options['build_facebook']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="build__insta">Instagramm</label>
	   				<input id="build__insta" type='text' class="form-control blc"  name='optimazedLanding_settings[build_instagramm]' value='<?php echo $options['build_instagramm']; ?>'>
	   			</div>
			</div>
		
		</div>
	</section>
			   
	<div class="header" id="header" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/header.jpg'; ?>')">
		<div class="container header-content">
			<h1 class="edit_text" 
				data-okhall="optimazedLanding_settings[header__h1]" 
				contenteditable="true"><?php echo $options['header__h1']; ?></h1>
				<input type='hidden' 
					name='optimazedLanding_settings[header__h1]' 
					value='<?php echo $options['header__h1']; ?>'>
			<p class="edit_text" 
				data-okhall="optimazedLanding_settings[header__p]" 
				contenteditable="true"><?php echo $options['header__p']; ?></p>
				<input type='hidden' 
					name='optimazedLanding_settings[header__p]' 
					value='<?php echo $options['header__p']; ?>'>
		</div>
	</div>

	<section class="advantages" id="advantages" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title edit_text" 
				data-okhall="optimazedLanding_settings[advantages__h2]" 
				contenteditable="true"><?php echo $options['advantages__h2']; ?></h2>
				<input type='hidden' 
					name='optimazedLanding_settings[advantages__h2]' 
					value='<?php echo $options['advantages__h2']; ?>'>
			<div class="row">
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3 class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__h3__1]" 
						contenteditable="true"><?php echo $options['advantages__h3__1']; ?></h3>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__h3__1]' 
							value='<?php echo $options['advantages__h3__1']; ?>'>
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__p__1]" 
						contenteditable="true"><?php echo $options['advantages__p__1']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__p__1]' 
							value='<?php echo $options['advantages__p__1']; ?>'>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3 class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__h3__2]" 
						contenteditable="true"><?php echo $options['advantages__h3__2']; ?></h3>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__h3__2]' 
							value='<?php echo $options['advantages__h3__2']; ?>'>
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__p__2]" 
						contenteditable="true"><?php echo $options['advantages__p__2']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__p__2]' 
							value='<?php echo $options['advantages__p__2']; ?>'>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3 class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__h3__3]" 
						contenteditable="true"><?php echo $options['advantages__h3__3']; ?></h3>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__h3__3]' 
							value='<?php echo $options['advantages__h3__3']; ?>'>
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__p__3]" 
						contenteditable="true"><?php echo $options['advantages__p__3']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__p__3]' 
							value='<?php echo $options['advantages__p__3']; ?>'>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3 class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__h3__4]" 
						contenteditable="true"><?php echo $options['advantages__h3__4']; ?></h3>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__h3__4]' 
							value='<?php echo $options['advantages__h3__4']; ?>'>
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__p__4]" 
						contenteditable="true"><?php echo $options['advantages__p__4']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__p__4]' 
							value='<?php echo $options['advantages__p__4']; ?>'>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3 class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__h3__5]" 
						contenteditable="true"><?php echo $options['advantages__h3__5']; ?></h3>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__h3__5]' 
							value='<?php echo $options['advantages__h3__5']; ?>'>
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__p__5]" 
						contenteditable="true"><?php echo $options['advantages__p__5']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__p__5]' 
							value='<?php echo $options['advantages__p__5']; ?>'>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3 class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__h3__6]" 
						contenteditable="true"><?php echo $options['advantages__h3__6']; ?></h3>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__h3__6]' 
							value='<?php echo $options['advantages__h3__6']; ?>'>
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[advantages__p__6]" 
						contenteditable="true"><?php echo $options['advantages__p__6']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[advantages__p__6]' 
							value='<?php echo $options['advantages__p__6']; ?>'>
				</div>
			</div>
		</div>
	</section>

	<section class="price" id="price" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
		<h2 class="h2_title edit_text" 
				data-okhall="optimazedLanding_settings[price__h2]" 
				contenteditable="true"><?php echo $options['price__h2']; ?></h2>
				<input type='hidden' 
					name='optimazedLanding_settings[price__h2]' 
					value='<?php echo $options['price__h2']; ?>'>
			<div class="row">
				<div class="col-md-4">
					<div class="services-item" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/price/1.jpg'; ?>')">
						<div class="services-item__title"><span class="edit_text" 
								data-okhall="optimazedLanding_settings[price__item__name__1]" 
								contenteditable="true"><?php echo $options['price__item__name__1']; ?></span>
								<input type='hidden' 
									name='optimazedLanding_settings[price__item__name__1]' 
									value='<?php echo $options['price__item__name__1']; ?>'></div>
						<div class="services-item__text">от <span class="edit_text" 
								data-okhall="optimazedLanding_settings[price__item__price__1]" 
								contenteditable="true"><?php echo $options['price__item__price__1']; ?></span>
								<input type='hidden' 
									name='optimazedLanding_settings[price__item__price__1]' 
									value='<?php echo $options['price__item__price__1']; ?>'> <span>руб/м<sup>2</sup></span></div>
						<a class="more-link" data-toggle="modal" data-target="#callbackModal" data-whatever="Стоимость ремонта Стандарт" data-title="Заказать ремонт"><i class="fas fa-chevron-right icon icon-more"></i> заказать ремонт</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="services-item"  style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/price/2.jpg'; ?>')">
						<div class="services-item__title"><span class="edit_text" 
								data-okhall="optimazedLanding_settings[price__item__name__2]" 
								contenteditable="true"><?php echo $options['price__item__name__2']; ?></span>
								<input type='hidden' 
									name='optimazedLanding_settings[price__item__name__2]' 
									value='<?php echo $options['price__item__name__2']; ?>'></div>
						<div class="services-item__text">от <span class="edit_text" 
								data-okhall="optimazedLanding_settings[price__item__price__2]" 
								contenteditable="true"><?php echo $options['price__item__price__2']; ?></span>
								<input type='hidden' 
									name='optimazedLanding_settings[price__item__price__2]' 
									value='<?php echo $options['price__item__price__2']; ?>'> <span>руб/м<sup>2</sup></span></div>
						<a class="more-link" data-toggle="modal" data-target="#callbackModal" data-whatever="Стоимость ремонта Бизнес" data-title="Заказать ремонт"><i class="fas fa-chevron-right icon icon-more"></i> заказать ремонт</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="services-item" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/price/3.jpg'; ?>')">
						<div class="services-item__title"><span class="edit_text" 
								data-okhall="optimazedLanding_settings[price__item__name__3]" 
								contenteditable="true"><?php echo $options['price__item__name__3']; ?></span>
								<input type='hidden' 
									name='optimazedLanding_settings[price__item__name__3]' 
									value='<?php echo $options['price__item__name__3']; ?>'></div>
						<div class="services-item__text">от <span class="edit_text" 
								data-okhall="optimazedLanding_settings[price__item__price__3]" 
								contenteditable="true"><?php echo $options['price__item__price__3']; ?></span>
								<input type='hidden' 
									name='optimazedLanding_settings[price__item__price__3]' 
									value='<?php echo $options['price__item__price__3']; ?>'> <span>руб/м<sup>2</sup></span></div>
						<a class="more-link" data-toggle="modal" data-target="#callbackModal" data-whatever="Стоимость ремонта Эксклюзив" data-title="Заказать ремонт"><i class="fas fa-chevron-right icon icon-more"></i> заказать ремонт</a>
					</div>
				</div>
			</div>
			<div class="text-center">
				<a href="" class="btn btn-accent"><i class="fas fa-calculator"></i> Калькулятор стоимости</a>
			</div>
		</div>
	</section>

	<section class="portfolio" id="portfolio" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title">Портфолио</h2>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="text-center">
						<p class="fs13">Новые записи в блок Портфолио добавляются через Записи с рубрикой <u>"Портфолио"</u></p>
						<p class="fs15">Перейти в <a href="/wp-admin/edit.php">Записи</a></p>
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/_WOUxVYFZto" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="steps"  style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/steps.jpg'; ?>')">
		<div class="container">
			<h3 class="h2_title title_white edit_text" 
				data-okhall="optimazedLanding_settings[steps__h3]" 
				contenteditable="true"><?php echo $options['steps__h3']; ?></h3>
				<input type='hidden' 
					name='optimazedLanding_settings[steps__h3]' 
					value='<?php echo $options['steps__h3']; ?>'>
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/call.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__1]" 
						contenteditable="true"><?php echo $options['steps__item__1']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__1]' 
							value='<?php echo $options['steps__item__1']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/rulers.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__2]" 
						contenteditable="true"><?php echo $options['steps__item__2']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__2]' 
							value='<?php echo $options['steps__item__2']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/price.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__3]" 
						contenteditable="true"><?php echo $options['steps__item__3']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__3]' 
							value='<?php echo $options['steps__item__3']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/doc.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__4]" 
						contenteditable="true"><?php echo $options['steps__item__4']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__4]' 
							value='<?php echo $options['steps__item__4']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/paint-roller.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__5]" 
						contenteditable="true"><?php echo $options['steps__item__5']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__5]' 
							value='<?php echo $options['steps__item__5']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/pay.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__6]" 
						contenteditable="true"><?php echo $options['steps__item__6']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__6]' 
							value='<?php echo $options['steps__item__6']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/dust.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__7]" 
						contenteditable="true"><?php echo $options['steps__item__7']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__7]' 
							value='<?php echo $options['steps__item__7']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/employee.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__8]" 
						contenteditable="true"><?php echo $options['steps__item__8']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__8]' 
							value='<?php echo $options['steps__item__8']; ?>'>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/final.svg'; ?>" alt="">
					<p class="edit_text" 
						data-okhall="optimazedLanding_settings[steps__item__9]" 
						contenteditable="true"><?php echo $options['steps__item__9']; ?></p>
						<input type='hidden' 
							name='optimazedLanding_settings[steps__item__9]' 
							value='<?php echo $options['steps__item__9']; ?>'>
				</div>
				
			</div>
			<div class="text-center">
				<button class="btn btn-accent" data-toggle="modal" data-target="#callbackModal" data-whatever="Шаги - Заказать ремонт" data-title="Заказать ремонт"><i class="fas fa-tools"></i> Заказать ремонт</button>
			</div>
		</div>
	</section>
	   
	<section class="review" id="review" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/review.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title title_white">Отзывы</h2>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="text-center">
						<p class="fs13">Новые записи в блок Отзывы добавляются через Записи с рубрикой <u>"Отзывы"</u></p>
						<p class="fs15">Перейти в <a href="/wp-admin/edit.php">Записи</a></p>
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/oTAsSLaEHo0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="news" id="news" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
			<h3 class="h2_title">Новости</h3>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="text-center">
						<p class="fs13">Новости добавляются через Записи  с рубрикой <u>"Новости"</u></p>
						<p class="fs15">Перейти в <a href="/wp-admin/edit.php">Записи</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	   
	   <?php
	        settings_fields( 'optimazedLandingCustom' );
	        do_settings_sections( 'optimazedLandingCustom' );
	        submit_button('Сохранить');
	    ?>
	</form>

	<link rel='stylesheet' id='bootstrap-css'  href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-css'  href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' type='text/css' media='all' />
	<link rel='stylesheet' id='hamburgers-css'  href='https://build.autoprkt.ru/wp-content/themes/optimazed/css/hamburgers.min.css' type='text/css' media='all' />
	<link rel='stylesheet' id='owl-css'  href='https://build.autoprkt.ru/wp-content/themes/optimazed/js/owlCarousel/css/owl.carousel.min.css' type='text/css' media='all' />
	<link rel='stylesheet' id='main-css'  href='https://build.autoprkt.ru/wp-content/themes/optimazed/css/main.min.css?ver=1556900662' type='text/css' media='all' />
	
	<script type='text/javascript' src='https://build.autoprkt.ru/wp-includes/js/jquery/jquery.js'></script>
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
	<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
	<script type='text/javascript' src='https://build.autoprkt.ru/wp-content/themes/optimazed/js/owlCarousel/owl.carousel.min.js'></script>
	<script type='text/javascript' src='https://build.autoprkt.ru/wp-content/themes/optimazed/js/script.js?ver=1556900662'></script>
	<script>
		jQuery(document).ready(function ($) {
			$('.edit_text').focus(function(){
				
				oldVal 		= $(this).text();
				data_attr 	= $(this).data('okhall');
				
			}).blur(function(){
					
				newVal 	= $(this).text();
				console.log(newVal);
				
				if (newVal != oldVal){
					input 	= $('input[name="'+ data_attr + '"]');
					input.val(newVal);
					console.log(input)
					}
			});
		});
	</script>

<?php }