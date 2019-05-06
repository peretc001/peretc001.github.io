<?php
/**
 * Разработка: Красовский Игорь https://peretc001.github.io
 * 
 * 
 * 
 */
/**
 * okhall functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package okhall
 */
/**
 * Enqueue scripts and styles.
 */
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );

register_nav_menus(array(
			'main_menu' => 'top_menu',
		)
	);

//Delete всякую хрень
remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress

remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );

remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

remove_action( 'wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_oembed_add_discovery_links' );
remove_action('wp_head', 'wp_oembed_add_host_js' );
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp-block-library-css', 'print_block_styles');

function custom_theme_assets() {
	wp_dequeue_style( 'wp-block-library' );	
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets', 100 );


function okhall_scripts() {
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css', false, null, all);
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', false, null, all);
	wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburgers.min.css',false, null, all);
	wp_enqueue_style( 'mmenu', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.3.2/jquery.mmenu.all.css', false, null, all);
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/js/owlCarousel/css/owl.carousel.min.css', false, null, all);
	wp_enqueue_style( 'owl-default', get_template_directory_uri() . '/js/owlCarousel/css/owl.theme.default.css', false, null, all);
	wp_enqueue_style( 'my-main-css', get_template_directory_uri() . '/css/main.min.css', false, null, all);


	wp_deregister_script('jquery-migrate');
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', includes_url( 'js/jquery/jquery.js' ), false, null, true );

	wp_enqueue_script( 'jquery' );
	
	wp_register_script( 'owl', get_template_directory_uri() . '/js/owlCarousel/owl.carousel.min.js', 'jquery', null, true);
	wp_register_script( 'mmenu', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.3.2/jquery.mmenu.js', 'jquery', null, true);
	wp_register_script( 'poper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', 'jquery', null, true);
	wp_register_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', 'jquery', null, true);
	wp_register_script( 'marquiz', 'https://script.marquiz.ru/v1.js', 'jquery', null, true);
	wp_register_script( 'yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', 'jquery', null, true);
	wp_register_script( 'myscripts', get_template_directory_uri() . '/js/scripts.min.js', 'jquery', null, true);

	
	wp_enqueue_script( 'owl');
	wp_enqueue_script( 'mmenu');
	wp_enqueue_script( 'poper');
	wp_enqueue_script( 'bootstrap');	
	wp_enqueue_script( 'marquiz');
	wp_enqueue_script( 'yandex');
	wp_enqueue_script( 'myscripts');

}
add_action( 'get_footer', 'okhall_scripts' );

//TGM Load plugins
require get_template_directory() . '/tgm/okhall.php';

//Script upload img from WP Media
function true_include_okhall_admin() {
	// у вас в админке уже должен быть подключен jQuery, если нет - раскомментируйте следующую строку:
	// 
	// дальше у нас идут скрипты и стили загрузчика изображений WordPress
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// само собой - меняем admin.js на название своего файла
 	wp_enqueue_script( 'okhall_admin', get_stylesheet_directory_uri() . '/js/okhall_admin.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'true_include_okhall_admin' );

//Add SPAN button into WP-EDIT
add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );
function appthemes_add_quicktags() {
	if ( ! wp_script_is('quicktags') )
		return;

	?>
	<script type="text/javascript">
	QTags.addButton( 'b', 'b', '<b>', '</b>', 1 );
	QTags.addButton( 'sup', 'sup', '<sup>', '</sup>', 1 );
	QTags.addButton( 'span', 'span', '<span>', '</span>', 1 );
	QTags.addButton( 'br', 'br', '<br>', '', 1 );
	</script>
	<?php
}

//Add input file Media
function arthur_image_uploader( $name, $width, $height ) {

    // Set variables
    $options = get_option( 'okHall_settings' );
    $default_image = get_stylesheet_directory_uri() . '/img/no-image.png';

    if ( !empty( $options[$name] ) ) {
        $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $options[$name];
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Выбрать', RSSFI_TEXT );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $value . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="okHall_settings[' . $name . ']" id="okHall_settings[' . $name . ']" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';
}




// Hook for adding admin menus
add_action('admin_menu', 'okHall_add_pages');
 


// action function for above hook
function okHall_add_pages() {
    add_menu_page('НАСТРОЙКИ КОМПАНИИ', 'НАСТРОЙКИ КОМПАНИИ', 8, __FILE__, 'okHall_page');
    register_setting( 'okHallCustom', 'okHall_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function okHall_page() { 
	
	$options = get_option( 'okHall_settings' );
	
	$wp_editor_settings = array(
	    'wpautop' => 0,
	    'media_buttons' => false,
	    'textarea_rows' => 2,
	    'tabindex'      => null,
	    'teeny'         => 1,
	    'dfw'           => 0,
	    'tinymce'       => 0,
	    'quicktags'		=> array('buttons' => 'b,span,sup,br'),
		'drag_drop_upload' => false
	);
	?>


   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/main.min.css">
   <style type="text/css">
   		#wpcontent, #wpfooter {margin-left: 140px;}
   		body {padding: 0; margin: 0;}
   		#footer-thankyou, #footer-upgrade {display: none;}
    	.transp, input.transp { background: Transparent; border: 0.5px dashed #fff; }
    	.white, input.white { color:#fff; }
    	.blc, input.blc { border: 0.5px dashed #000; }
    	.fwnorm {font-weight: normal;}
    	.row1 {min-height: 100px;}
    	.row2 {min-height: 200px;}
    	.row3 {min-height: 300px;}
    	.row4 {min-height: 400px;}
    	.admin_text {font-size: 10px;font-weight:normal;}
    	.header_admin {padding: 20px 0;background-size: cover; background-position: center; color: #ffffff; position: relative; box-sizing: border-box; }
    	.header_admin .container {padding: 50px 0;}
    	.header_admin::before { content: ''; position: absolute; left: 0; top: 0; width: 100%; height: 100%; background: #000; opacity: .6}
    	.admin_top {padding: 30px 30px 100px 30px;}
    	.admin_top .row label {font-weight: bold;}
	   	.admin_top .row .adm_menu {padding: 20px 0;}
	   	.admin_top .row .adm_menu p {font-size:1.3rem;font-weight: bold;}
    	.admin_top .row .adm_menu ul {margon:0;padding:0;}
    	.admin_top .row .adm_menu ul li {display:inline-block;margin: 0 10px;font-size: 1.3rem;}
    	.banner {height: 100%;}
    	.upload {position: relative;z-index:100;}
    	.fs1 {font-size: 1em;}
    	.fs13 {font-size: 1.3em;}
    	.fs15 {font-size: 1.5em;}
    	.fs17 {font-size: 1.7em;}
    	.fs2 {font-size: 2em;}
    	.grey {color: #a5a5a5;}
    	.tsilver {color: #1a1a1a;}

    	#submit.button.button-primary { max-width: 130px; font-size: 18px;height:45px;line-height:45px;font-weight: bold; text-shadow: none; position: fixed; top: 50px; right: 50px; z-index: 100;}
    </style>
    
   <form action='options.php' method='post'>

   	<section class="admin_top" style="background-image:url('/wp-content/uploads/2019/02/pattern.jpg')">
   		<div class="container">
	   		<div class="introHolder inverse">
	   			<h2>НАСТРОЙКИ КОМПАНИИ</h2>
			    <p>
			    	На данной странице вы можете изменить данные о компании,<br>номера телефонов, адреса, ссылки на соц. сети, контент главной страницы и тд
			    </p>
	   		</div>
   		

	   		<div class="row">
	   			<div class="col-md-3 text-center">
	   				<label for="OK__desc">Слоган</label>
	   				<input id="OK__desc" type='text' class="form-control blc"  name='okHall_settings[description]' value='<?php echo $options['description']; ?>'>
	   			</div>
	   			<div class="col-md-3 text-center">
	   				<label for="OK__phone">Телефон</label>
	   				<input id="OK__phone" type='text' class="form-control blc text-center"  name='okHall_settings[phone]' value='<?php echo $options['phone']; ?>'>
	   			</div>
	   			<div class="col-md-3 text-center">
	   				<label for="OK__mobile">Сотовый</label>
	   				<input id="OK__mobile" type='text' class="form-control blc text-center"  name='okHall_settings[mobile]' value='<?php echo $options['mobile']; ?>'>
	   			</div>
	   			<div class="col-md-3 text-center">
	   				<label for="OK__email">Email для писем</label>
	   				<input id="OK__email" type='email' class="form-control blc text-center"  name='okHall_settings[ok_email]' value='<?php echo $options['ok_email']; ?>'>
	   			</div>
	   		</div>

	   		<div class="row mt-3">
	   			<div class="col-md-4 text-center">
	   				<label for="OK__desc">VK</label>
	   				<input id="OK__desc" type='text' class="form-control blc"  name='okHall_settings[ok_vk]' value='<?php echo $options['ok_vk']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="OK__phone">Facebook</label>
	   				<input id="OK__phone" type='text' class="form-control blc"  name='okHall_settings[ok_facebook]' value='<?php echo $options['ok_facebook']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="OK__mobile">Instagramm</label>
	   				<input id="OK__mobile" type='text' class="form-control blc"  name='okHall_settings[ok_instagramm]' value='<?php echo $options['ok_instagramm']; ?>'>
	   			</div>
	   		</div>

	   		<div class="row mt-3">
	   			<div class="col-12 text-center adm_menu">
	   				<p>Быстрый переход вниз к разделу:</p>
	   				<ul>
		   				<li><a href="#advantages">Преимущества</a></li>
		   				<li><a href="#video">Видео</a></li>
		   				<li><a href="#calc">Калькулятор</a></li>
		   				<li><a href="#foto">Фото</a></li>
		   				<li><a href="#dp">Дизайн-проект</a></li>
		   				<li><a href="#rew">Отзывы</a></li>
		   				<li><a href="#wm">Красотки</a></li>
		   				<li><a href="#price">Цены</a></li>
		   				<li><a href="#ban">Баннер</a></li>
		   				<li><a href="#partners">Партнеры</a></li>
		   				<li><a href="#stp">Шаги</a></li>
		   				<li><a href="#aft">Итог</a></li>
		   				<li><a href="#oper">Оператор</a></li>
		   				<li><a href="#footer">Карта</a></li>
		   				<li><a href="#letters">Письма</a></li>
		   			</ul>
	   			</div>
	   		</div>

   		</div>
   	</section>
	
	<header class="header_admin" style="background-image:url('<?php echo $options['header__bg__img']; ?>')">
		<div class="container">
		
		<p style="position: relative;"><span style="color: #fff;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br>
		<?php arthur_image_uploader( 'header__bg__img', $width = 60, $height = 60 ); ?></p>
				
			
		
		<div class="header__block">
			<div class="container">

				<div class="row yellowHolder mb-4">
					<div class="col-md-8 yellowHolder__left">
						
						<h1 class="edit_text" 
							data-okhall="okHall_settings[header__h2__intro]" 
							contenteditable="true"><?php echo $options['header__h2__intro']; ?></h1>
							<input type='hidden' 
								name='okHall_settings[header__h2__intro]' 
								value='<?php echo $options['header__h2__intro']; ?>'>
						
						<p class="edit_text" 
							data-okhall="okHall_settings[header__p__intro]" 
							contenteditable="true"><?php echo $options['header__p__intro']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__p__intro]' 
								value='<?php echo $options['header__p__intro']; ?>'>

					</div>

					<div class="col yellowHolder__right">

						<p class="edit_text yellowHolder__right__old" 
							data-okhall="okHall_settings[header__right__old]" 
							contenteditable="true"><?php echo $options['header__right__old']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__right__old]' 
								value='<?php echo $options['header__right__old']; ?>'>
						<p class="edit_text yellowHolder__right__total" 
							data-okhall="okHall_settings[header__right__total]" 
							contenteditable="true"><?php echo $options['header__right__total']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__right__total]' 
								value='<?php echo $options['header__right__total']; ?>'>

						<p class="edit_text yellowHolder__right__date" 
							data-okhall="okHall_settings[header__right__date]" 
							contenteditable="true"><?php echo $options['header__right__date']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__right__date]' 
								value='<?php echo $options['header__right__date']; ?>'>

					</div>
					
				</div>
									
				
				
				<div class="row header__block__column">
					<div class="col-md-4 header__block__column__item text-center">
						<p><?php arthur_image_uploader( 'header__block__img1', $width =60, $height = 60 ); ?></p>
						<p class="edit_text fs15" 
							data-okhall="okHall_settings[header__block__item1b]" 
							contenteditable="true"><b><?php echo $options['header__block__item1b']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[header__block__item1b]' 
								value='<?php echo $options['header__block__item1b']; ?>'>
						<p class="edit_text fs13 grey" 
							data-okhall="okHall_settings[header__block__item1]" 
							contenteditable="true"><?php echo $options['header__block__item1']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__block__item1]' 
								value='<?php echo $options['header__block__item1']; ?>'>
					</div>
					<div class="col-md-4 header__block__column__item text-center">
						<p><?php arthur_image_uploader( 'header__block__img2', $width =60, $height = 60 ); ?></p>
						<p class="edit_text fs15" 
							data-okhall="okHall_settings[header__block__item2b]" 
							contenteditable="true"><b><?php echo $options['header__block__item2b']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[header__block__item2b]' 
								value='<?php echo $options['header__block__item2b']; ?>'>
						<p class="edit_text fs13 grey" 
							data-okhall="okHall_settings[header__block__item2]" 
							contenteditable="true"><?php echo $options['header__block__item2']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__block__item2]' 
								value='<?php echo $options['header__block__item2']; ?>'>
					</div>
					<div class="col-md-4 header__block__column__item text-center">
						<p><?php arthur_image_uploader( 'header__block__img3', $width =60, $height = 60 ); ?></p>
						<p class="edit_text fs15" 
							data-okhall="okHall_settings[header__block__item3b]" 
							contenteditable="true"><b><?php echo $options['header__block__item3b']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[header__block__item3b]' 
								value='<?php echo $options['header__block__item3b']; ?>'>
						<p class="edit_text fs13 grey" 
							data-okhall="okHall_settings[header__block__item3]" 
							contenteditable="true"><?php echo $options['header__block__item3']; ?></p>
							<input type='hidden' 
								name='okHall_settings[header__block__item3]' 
								value='<?php echo $options['header__block__item3']; ?>'>
					</div>
				</div>
			</div>

		</div>

		</div>
	</header>

	<section id="advantages" class="advantages" style="background-image:url('/wp-content/uploads/2019/02/pattern.jpg')">
		<img class="mouse" src="/wp-content/themes/okhall/img/header/mouse.svg" alt="">

		<div class="container">
			<p class="text-center"><?php arthur_image_uploader( 'advantages__post__bg1', $width =60, $height = 60 ); ?></p>
			<div class="row advantages__post" style="background-image: url('<?php echo $options['advantages__post__bg1']; ?>');padding:0;margin:0">
				<div class="col-11 col-md-8">
					<p><?php arthur_image_uploader( 'advantages__post__img1', $width =60, $height = 60 ); ?></p>
					<h3 class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__header1]" 
						contenteditable="true"><?php echo $options['advantages__post__header1']; ?></h3>
						<input type='hidden' 
							name='okHall_settings[advantages__post__header1]' 
							value='<?php echo $options['advantages__post__header1']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__intro1]" 
						contenteditable="true"><?php echo $options['advantages__post__intro1']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__intro1]' 
							value='<?php echo $options['advantages__post__intro1']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__text1]" 
						contenteditable="true"><?php echo $options['advantages__post__text1']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__text1]' 
							value='<?php echo $options['advantages__post__text1']; ?>'>
				</div>
			</div><!-- end row-->

			<p class="text-center"><?php arthur_image_uploader( 'advantages__post__bg2', $width =60, $height = 60 ); ?></p>
			<div class="row advantages__post" style="background-image: url('<?php echo $options['advantages__post__bg2']; ?>');padding:0;margin:0">
				<div class="col-11 col-md-8">
					<p><?php arthur_image_uploader( 'advantages__post__img2', $width =60, $height = 60 ); ?></p>
					<h3 class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__header2]" 
						contenteditable="true"><?php echo $options['advantages__post__header2']; ?></h3>
						<input type='hidden' 
							name='okHall_settings[advantages__post__header2]' 
							value='<?php echo $options['advantages__post__header2']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__intro2]" 
						contenteditable="true"><?php echo $options['advantages__post__intro2']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__intro2]' 
							value='<?php echo $options['advantages__post__intro2']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__text2]" 
						contenteditable="true"><?php echo $options['advantages__post__text2']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__text2]' 
							value='<?php echo $options['advantages__post__text2']; ?>'>
				</div>
			</div><!-- end row-->

			<p class="text-center"><?php arthur_image_uploader( 'advantages__post__bg3', $width =60, $height = 60 ); ?></p>
			<div class="row advantages__post" style="background-image: url('<?php echo $options['advantages__post__bg3']; ?>');padding:0;margin:0">
				<div class="col-11 col-md-8">
					<p><?php arthur_image_uploader( 'advantages__post__img3', $width =60, $height = 60 ); ?></p>
					<h3 class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__header3]" 
						contenteditable="true"><?php echo $options['advantages__post__header3']; ?></h3>
						<input type='hidden' 
							name='okHall_settings[advantages__post__header3]' 
							value='<?php echo $options['advantages__post__header3']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__intro3]" 
						contenteditable="true"><?php echo $options['advantages__post__intro3']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__intro3]' 
							value='<?php echo $options['advantages__post__intro3']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__text3]" 
						contenteditable="true"><?php echo $options['advantages__post__text3']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__text3]' 
							value='<?php echo $options['advantages__post__text3']; ?>'>
				</div>
			</div><!-- end row-->

			<p class="text-center"><?php arthur_image_uploader( 'advantages__post__bg4', $width =60, $height = 60 ); ?></p>
			<div class="row advantages__post" style="background-image: url('<?php echo $options['advantages__post__bg4']; ?>');padding:0;margin:0">
				<div class="col-11 col-md-8">
					<p><?php arthur_image_uploader( 'advantages__post__img4', $width =60, $height = 60 ); ?></p>
					<h3 class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__header4]" 
						contenteditable="true"><?php echo $options['advantages__post__header4']; ?></h3>
						<input type='hidden' 
							name='okHall_settings[advantages__post__header4]' 
							value='<?php echo $options['advantages__post__header4']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__intro4]" 
						contenteditable="true"><?php echo $options['advantages__post__intro4']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__intro4]' 
							value='<?php echo $options['advantages__post__intro4']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__text4]" 
						contenteditable="true"><?php echo $options['advantages__post__text4']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__text4]' 
							value='<?php echo $options['advantages__post__text4']; ?>'>
				</div>
			</div><!-- end row-->

			<p class="text-center"><?php arthur_image_uploader( 'advantages__post__bg5', $width =60, $height = 60 ); ?></p>
			<div class="row advantages__post" style="background-image: url('<?php echo $options['advantages__post__bg5']; ?>');padding:0;margin:0">
				<div class="col-11 col-md-8">
					<p><?php arthur_image_uploader( 'advantages__post__img5', $width =60, $height = 60 ); ?></p>
					<h3 class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__header5]" 
						contenteditable="true"><?php echo $options['advantages__post__header5']; ?></h3>
						<input type='hidden' 
							name='okHall_settings[advantages__post__header5]' 
							value='<?php echo $options['advantages__post__header5']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__intro5]" 
						contenteditable="true"><?php echo $options['advantages__post__intro5']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__intro5]' 
							value='<?php echo $options['advantages__post__intro5']; ?>'>
					<p class="edit_text fs15" 
						data-okhall="okHall_settings[advantages__post__text5]" 
						contenteditable="true"><?php echo $options['advantages__post__text5']; ?></p>
						<input type='hidden' 
							name='okHall_settings[advantages__post__text5]' 
							value='<?php echo $options['advantages__post__text5']; ?>'>
				</div>
			</div><!-- end row-->

		</div>
	</section>

	<section id="video" class="macbook">
		<div class="container">
			
			

			<div class="introHolder">
				<div class="radio">
					<input id="home" type="checkbox" name="okHall_settings[macbook__active]" value="1" <?php if ($options['macbook__active'] == '1') { echo 'checked'; } ?> />
					<label for="home" style="color: #fff;">Показать на главной</label>
				</div>
					<h2 class="edit_text" 
						data-okhall="okHall_settings[macbook__h2__intro]" 
						contenteditable="true"><?php echo $options['macbook__h2__intro']; ?></h2>
						<input type='hidden' 
							name='okHall_settings[macbook__h2__intro]' 
							value='<?php echo $options['macbook__h2__intro']; ?>'>
					<p class="edit_text" 
						data-okhall="okHall_settings[macbook__p__intro]" 
						contenteditable="true"><?php echo $options['macbook__p__intro']; ?></p>
						<input type='hidden' 
							name='okHall_settings[macbook__p__intro]' 
							value='<?php echo $options['macbook__p__intro']; ?>'>
			</div>
			<br>
			<div class="row">
				<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
					<p class="text-center fs13" style="color: #fff">
						Ссылка на видео с Yotube
					</p>
					<p>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[macbook__video__href]' value='<?php echo $options['macbook__video__href']; ?>' placeholder="https://www.youtube.com/embed/ ...">
					</p>
				<p class="text-center fs13" style="color: #fff">
					нужно заменить <u>"watch?v="</u> на <u style="color:#ffae04">"embed/"</u>
				</p>
				</div>
			</div>
			

		</div>
	</section>

	<section id="calc" class="calculator"  style="background-image:url('<?php echo $options['calculator__bg__img']; ?>')">

		<div class="container">
			<p style="position: relative;"><span style="color: #fff;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br>
			<?php arthur_image_uploader( 'calculator__bg__img', $width = 60, $height = 60 ); ?></p>	
			
			<div class="introHolder">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[calculator__h2__intro]" 
					contenteditable="true"><?php echo $options['calculator__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[calculator__h2__intro]' 
						value='<?php echo $options['calculator__h2__intro']; ?>'>
				<p class="edit_text" 
					data-okhall="okHall_settings[calculator__p__intro]" 
					contenteditable="true"><?php echo $options['calculator__p__intro']; ?></p>
					<input type='hidden' 
						name='okHall_settings[calculator__p__intro]' 
						value='<?php echo $options['calculator__p__intro']; ?>'>
			</div>

			<div class="row no-gutters calculator__block">
				<div class="col-md-2 text-center"><?php arthur_image_uploader( 'calculator__block__img1', $width =60, $height = 60 ); ?></div>
				<div class="col-md-4">
					<p class="edit_text" 
						data-okhall="okHall_settings[calculator__block__p1]" 
						contenteditable="true"><?php echo $options['calculator__block__p1']; ?></p>
						<input type='hidden' 
							name='okHall_settings[calculator__block__p1]' 
							value='<?php echo $options['calculator__block__p1']; ?>'>
				</div>
			
				<div class="col-md-2 text-center"><?php arthur_image_uploader( 'calculator__block__img2', $width =60, $height = 60 ); ?></div>
				<div class="col-md-4">
					<p class="edit_text" 
						data-okhall="okHall_settings[calculator__block__p2]" 
						contenteditable="true"><?php echo $options['calculator__block__p2']; ?></p>
						<input type='hidden' 
							name='okHall_settings[calculator__block__p2]' 
							value='<?php echo $options['calculator__block__p2']; ?>'>

				</div>
			</div>
			<div class="introHolder">
				<p class="edit_text btn btn-accent" 
					data-okhall="okHall_settings[calculator__block__btn]" 
					contenteditable="true"><?php echo $options['calculator__block__btn']; ?></p>
					<input type='hidden' 
						name='okHall_settings[calculator__block__btn]' 
						value='<?php echo $options['calculator__block__btn']; ?>'>
			</div>

			<div class="row">
				<div class="col-10 offset-1 col-lg-4 offset-lg-4 text-center">
					<p>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[calculator__block__href]' value='<?php echo $options['calculator__block__href']; ?>' placeholder="Ссылка на квиз">
					</p>
				</div>
			</div>
			
		</div>
	</section>

	<section id="foto" class="photos">
		<div class="container">
			
			<div class="introHolder inverse">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[photos__h2__intro]" 
					contenteditable="true"><?php echo $options['photos__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[photos__h2__intro]' 
						value='<?php echo $options['photos__h2__intro']; ?>'>

				<p class="edit_text" 
						data-okhall="okHall_settings[photos__p__intro]" 
						contenteditable="true"><?php echo $options['photos__p__intro']; ?></p>
						<input type='hidden' 
							name='okHall_settings[photos__p__intro]' 
							value='<?php echo $options['photos__p__intro']; ?>'>

				<p style="padding: 50px 0 10px 0">
					<b>Данный блок редактируется путем добавления или изменения Записей.</b>
				</p>
				<p style="padding: 20px 0;background: repeating-linear-gradient(45deg, rgba(255, 105, 180, .4), rgba(255, 105, 180, .4) 10px, transparent 10px, transparent 20px);" class="blc">
					Обязательно указывайте Рубрику - <b>Галерея<b>.
				</p>
				<p style="padding: 10px 0 10px 0">
					<b>Перейти в <a href="/wp-admin/edit.php">ЗАПИСИ</a></b>
				</p>
			</div>

			<div class="introHolder">
				<p class="edit_text btn btn-accent" 
					data-okhall="okHall_settings[photos__btn]" 
					contenteditable="true"><?php echo $options['photos__btn']; ?></p>
					<input type='hidden' 
						name='okHall_settings[photos__btn]' 
						value='<?php echo $options['photos__btn']; ?>'>

				
				<p class="text-center"><span class="tsilver fs1">Ссылка на каталог</span></p>
				<p><input type='text' style="max-width: 300px;margin: 0 auto;" class="form-control blc text-center"  name='okHall_settings[photos__btn__href]' value='<?php echo $options['photos__btn__href']; ?>' placeholder="Ссылка на каталог"></p>
			</div>

		</div>
	</section>

	<section id="dp" class="design_project">
		<div class="container">
			
			<div class="introHolder">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[design_project__h2__intro]" 
					contenteditable="true"><?php echo $options['design_project__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[design_project__h2__intro]' 
						value='<?php echo $options['design_project__h2__intro']; ?>'>

				<p class="edit_text" 
						data-okhall="okHall_settings[design_project__p__intro]" 
						contenteditable="true"><?php echo $options['design_project__p__intro']; ?></p>
						<input type='hidden' 
							name='okHall_settings[design_project__p__intro]' 
							value='<?php echo $options['design_project__p__intro']; ?>'>
			</div>
			
			<div class="row no-gutters">
				
				<div class="col-12 col-md-6 col-lg-5">
					<div class="design_project__header">
						<p><span><i class="far fa-thumbs-down"></i></span> <strong class="edit_text" 
							data-okhall="okHall_settings[design_project__header__left]" 
							contenteditable="true"><?php echo $options['design_project__header__left']; ?></strong></p>
						<input type='hidden' 
							name='okHall_settings[design_project__header__left]' 
							value='<?php echo $options['design_project__header__left']; ?>'>
					</div>
				
					<div class="design_project__center">
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__left__1]" 
							contenteditable="true"><?php echo $options['design_project__header__left__1']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__left__1]' 
								value='<?php echo $options['design_project__header__left__1']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__left__2]" 
							contenteditable="true"><?php echo $options['design_project__header__left__2']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__left__2]' 
								value='<?php echo $options['design_project__header__left__2']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__left__3]" 
							contenteditable="true"><?php echo $options['design_project__header__left__3']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__left__3]' 
								value='<?php echo $options['design_project__header__left__3']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__left__4]" 
							contenteditable="true"><?php echo $options['design_project__header__left__4']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__left__4]' 
								value='<?php echo $options['design_project__header__left__4']; ?>'>
					</div>
					<div class="design_project__bottom">
						<p class="edit_text fs1" 
							data-okhall="okHall_settings[design_project__header__left__5]" 
							contenteditable="true"><b><?php echo $options['design_project__header__left__5']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__left__5]' 
								value='<?php echo $options['design_project__header__left__5']; ?>'>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-5 offset-lg-2 right">
					<div class="design_project__header">
						<p><span><i class="far fa-thumbs-down"></i></span> <strong class="edit_text" 
							data-okhall="okHall_settings[design_project__header__right]" 
							contenteditable="true"><?php echo $options['design_project__header__right']; ?></strong></p>
						<input type='hidden' 
							name='okHall_settings[design_project__header__right]' 
							value='<?php echo $options['design_project__header__right']; ?>'>
					</div>
			
					<div class="design_project__center">
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__right__1]" 
							contenteditable="true"><?php echo $options['design_project__header__right__1']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__right__1]' 
								value='<?php echo $options['design_project__header__right__1']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__right__2]" 
							contenteditable="true"><?php echo $options['design_project__header__right__2']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__right__2]' 
								value='<?php echo $options['design_project__header__right__2']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__right__3]" 
							contenteditable="true"><?php echo $options['design_project__header__right__3']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__right__3]' 
								value='<?php echo $options['design_project__header__right__3']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[design_project__header__right__4]" 
							contenteditable="true"><?php echo $options['design_project__header__right__4']; ?></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__right__4]' 
								value='<?php echo $options['design_project__header__right__4']; ?>'>
					</div>
					<div class="design_project__bottom">
						<p class="edit_text fs1" 
							data-okhall="okHall_settings[design_project__header__right__5]" 
							contenteditable="true"><b><?php echo $options['design_project__header__right__5']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[design_project__header__right__5]' 
								value='<?php echo $options['design_project__header__right__5']; ?>'>
					</div>
			</div>

		</div>
	</section>

	<section id="rew" class="recomendation" style="background-image:url('<?php echo $options['recomendation__bg__img']; ?>')">
		<div class="container">
			<p style="position: relative;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:<br>
			<?php arthur_image_uploader( 'recomendation__bg__img', $width = 60, $height = 60 ); ?></p>	
			

			<div class="introHolder blue">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[recomendation__h2__intro]" 
					contenteditable="true"><?php echo $options['recomendation__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[recomendation__h2__intro]' 
						value='<?php echo $options['recomendation__h2__intro']; ?>'>

				<p class="edit_text" 
						data-okhall="okHall_settings[recomendation__p__intro]" 
						contenteditable="true"><?php echo $options['recomendation__p__intro']; ?></p>
						<input type='hidden' 
							name='okHall_settings[recomendation__p__intro]' 
							value='<?php echo $options['recomendation__p__intro']; ?>'>

				<p style="padding: 50px 0 10px 0">
					<b>Данный блок редактируется путем добавления или изменения Записей.</b>
				</p>
				<p style="padding: 20px 0;background: repeating-linear-gradient(45deg, rgba(255, 105, 180, .4), rgba(255, 105, 180, .4) 10px, transparent 10px, transparent 20px);" class="blc">
					Обязательно указывайте Рубрику - <b>Отзыв<b>.
				</p>
				<p style="padding: 10px 0 10px 0">
					<b>Перейти в <a href="/wp-admin/edit.php">ЗАПИСИ</a></b>
				</p>
			</div>
			
		</div>
	</section>


	<section id="wm" class="acquaintance" style="background-image:url('<?php echo $options['acquaintance__img']; ?>')">
		<div class="container">
			<p style="position: relative;"><span style="color: #fff;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br>
			<?php arthur_image_uploader( 'acquaintance__img', $width = 60, $height = 60 ); ?></p>	
			
			<div class="introHolder">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[acquaintance__h2__intro]" 
					contenteditable="true"><?php echo $options['acquaintance__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[acquaintance__h2__intro]' 
						value='<?php echo $options['acquaintance__h2__intro']; ?>'>
			</div>


			<div class="row">
				<div class="col-md-6">
					<div class="acquaintance__block">
						<div class="acquaintance__block__about">
							<div class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__left', $width =40, $height = 60 ); ?></div>
							<img class="manager" src="<?php echo $options['acquaintance__img__left']; ?>" alt="Оборонева Мария">
							<h3 class="edit_text text-center" 
								data-okhall="okHall_settings[acquaintance__h3]" 
								contenteditable="true"><?php echo $options['acquaintance__h3']; ?></h3>
								<input type='hidden' 
									name='okHall_settings[acquaintance__h3]' 
									value='<?php echo $options['acquaintance__h3']; ?>'>
							<p class="edit_text" 
								data-okhall="okHall_settings[acquaintance__text1]" 
								contenteditable="true"><?php echo $options['acquaintance__text1']; ?><p>
								<input type='hidden' 
									name='okHall_settings[acquaintance__text1]' 
									value='<?php echo $options['acquaintance__text1']; ?>'>
							<p class="edit_text" 
								data-okhall="okHall_settings[acquaintance__text2]" 
								contenteditable="true"><?php echo $options['acquaintance__text2']; ?><p>
								<input type='hidden' 
									name='okHall_settings[acquaintance__text2]' 
									value='<?php echo $options['acquaintance__text2']; ?>'>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="acquaintance__block">
						<div class="acquaintance__block__about">
							<div class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__right', $width =40, $height = 60 ); ?></div>
							<img class="manager right" src="<?php echo $options['acquaintance__img__right']; ?>" alt="Курбанниязова Юлия">
							<h3 class="edit_text text-center" 
								data-okhall="okHall_settings[acquaintance__h3__right]" 
								contenteditable="true"><?php echo $options['acquaintance__h3__right']; ?></h3>
								<input type='hidden' 
									name='okHall_settings[acquaintance__h3__right]' 
									value='<?php echo $options['acquaintance__h3__right']; ?>'>
							<p class="edit_text" 
								data-okhall="okHall_settings[acquaintance__text__right1]" 
								contenteditable="true"><?php echo $options['acquaintance__text__right1']; ?><p>
								<input type='hidden' 
									name='okHall_settings[acquaintance__text__right1]' 
									value='<?php echo $options['acquaintance__text__right1']; ?>'>
							<p class="edit_text" 
								data-okhall="okHall_settings[acquaintance__text__right2]" 
								contenteditable="true"><?php echo $options['acquaintance__text__right2']; ?><p>
								<input type='hidden' 
									name='okHall_settings[acquaintance__text__right2]' 
									value='<?php echo $options['acquaintance__text__right2']; ?>'>
						</div>
					</div>
				</div>
			</div>

			<div class="row acquaintance__img">
				<div class="col-lg-4 text-center">
					<p class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__url__1', $width =60, $height = 60 ); ?></p>
					<p class="edit_text fs13" style="color: #fff"
						data-okhall="okHall_settings[acquaintance__img__item__1]" 
						contenteditable="true"><?php echo $options['acquaintance__img__item__1']; ?><p>
						<input type='hidden' 
							name='okHall_settings[acquaintance__img__item__1]' 
							value='<?php echo $options['acquaintance__img__item__1']; ?>'>
				</div>
				<div class="col-lg-4 text-center">
					<p class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__url__2', $width =60, $height = 60 ); ?></p>
					<p class="edit_text fs13" style="color: #fff"
						data-okhall="okHall_settings[acquaintance__img__item__2]" 
						contenteditable="true"><?php echo $options['acquaintance__img__item__2']; ?><p>
						<input type='hidden' 
							name='okHall_settings[acquaintance__img__item__2]' 
							value='<?php echo $options['acquaintance__img__item__2']; ?>'>
				</div>
				<div class="col-lg-4 text-center">
					<p class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__url__3', $width =60, $height = 60 ); ?></p>
					<p class="edit_text fs13" style="color: #fff"
						data-okhall="okHall_settings[acquaintance__img__item__3]" 
						contenteditable="true"><?php echo $options['acquaintance__img__item__3']; ?><p>
						<input type='hidden' 
							name='okHall_settings[acquaintance__img__item__3]' 
							value='<?php echo $options['acquaintance__img__item__3']; ?>'>
				</div>
			</div>

			<div class="row acquaintance__text">
				<span class="edit_text" 
						data-okhall="okHall_settings[acquaintance__text__bottom]" 
						contenteditable="true"><?php echo $options['acquaintance__text__bottom']; ?><span>
						<input type='hidden' 
							name='okHall_settings[acquaintance__text__bottom]' 
							value='<?php echo $options['acquaintance__text__bottom']; ?>'>
			</div>

		</div>
	</section>
	
	<section id="price" class="price" style="background-image:url('<?php echo $options['price__bg__img']; ?>')">
		<div class="container">
			<p style="position: relative;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:<br>
			<?php arthur_image_uploader( 'price__bg__img', $width = 60, $height = 60 ); ?></p>	
			
			<div class="introHolder blue">
				<h2 class="edit_text text-center" 
					data-okhall="okHall_settings[price__h2__intro]" 
					contenteditable="true"><?php echo $options['price__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[price__h2__intro]' 
						value='<?php echo $options['price__h2__intro']; ?>'>
				<p class="edit_text" 
					data-okhall="okHall_settings[price__p__intro]" 
					contenteditable="true"><?php echo $options['price__p__intro']; ?></p>
					<input type='hidden' 
						name='okHall_settings[price__p__intro]' 
						value='<?php echo $options['price__p__intro']; ?>'>
			</div>
			<div class="row">
					<div class="col-lg-4">
						<div class="text-center p-2" style="background-color:rgba(127, 255, 212, .5);">
							<?php if ($options['price__block__active'] == '1') { echo '<p>Главный</p>'; } else { echo '<p>Сделать главным</p>'; } ?>
							<div class="radio">
								<input id="home" type="radio" name="okHall_settings[price__block__active]" value="1" <?php if ($options['price__block__active'] == '1') { echo 'checked'; } ?> />
								<label for="home">Блок 1</label>
							</div>
						</div>
					<div class="price__header<?php if ($options['price__block__active'] == '1') { echo ' top'; } ?>">
						<p class="edit_text name" 
							data-okhall="okHall_settings[price__b1__h1]" 
							contenteditable="true"><?php echo $options['price__b1__h1']; ?></p>
							<input type='hidden' 
								name='okHall_settings[price__b1__h1]' 
								value='<?php echo $options['price__b1__h1']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[price__b1__h2]" 
							contenteditable="true"><b><?php echo $options['price__b1__h2']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[price__b1__h2]' 
								value='<?php echo $options['price__b1__h2']; ?>'>
						<p class="edit_text price__header__sum" 
							data-okhall="okHall_settings[price__b1__h3]" 
							contenteditable="true"><?php echo $options['price__b1__h3']; ?></p>
							<input type='hidden' 
								name='okHall_settings[price__b1__h3]' 
								value='<?php echo $options['price__b1__h3']; ?>'>
					</div>

					<div class="price__center">
						<ul>
							<?php 
								for ($i = 1; $i < 5; $i++) {
							?>
							<li>
								<span class="edit_text fs1"
									data-okhall="okHall_settings[price__b1__c<?php echo $i; ?>]" 
									contenteditable="true"><?php echo $options['price__b1__c'. $i]; ?></span>
									<input type='hidden' 
										name='okHall_settings[price__b1__c<?php echo $i; ?>]' 
										value='<?php echo $options['price__b1__c'. $i]; ?>'>
							</li>
							<?php } ?>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<?php 
								for ($i = 1; $i < 13; $i++) {
							?>
							<li>
								<?php arthur_image_uploader( 'price__b1__n'. $i, $width = 30, $height = 30 ); ?>
								<span class="edit_text fs1"
									data-okhall="okHall_settings[price__b1__b<?php echo $i; ?>]" 
									contenteditable="true"><?php echo $options['price__b1__b'. $i]; ?></span>
									<input type='hidden' 
										name='okHall_settings[price__b1__b<?php echo $i; ?>]' 
										value='<?php echo $options['price__b1__b'. $i]; ?>'>
							</li>
							<?php } ?>
						</ul>
						<div class="introHolder">
							<span class="edit_text btn btn-accent fs1" 
								data-okhall="okHall_settings[price__b1__btn__1]" 
								contenteditable="true"><?php echo $options['price__b1__btn__1']; ?></span>
								<input type='hidden' 
									name='okHall_settings[price__b1__btn__1]' 
									value='<?php echo $options['price__b1__btn__1']; ?>'>
							<p><a class="download" href="<?php echo $options['price__b1__btn__2']; ?>">Скачать пример</a></p>
							<input type='text' class="text-center form-control blc" name='okHall_settings[price__b1__btn__2]' value='<?php echo $options['price__b1__btn__2']; ?>' placeholder="Адрес ссылки">
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="text-center p-2" style="background-color:rgba(127, 255, 212, .5);">
						<?php if ($options['price__block__active'] == '2') { echo '<p>Главный</p>'; } else { echo '<p>Сделать главным</p>'; } ?>
						<div class="radio">
							<input id="home" type="radio" name="okHall_settings[price__block__active]" value="2" <?php if ($options['price__block__active'] == '2') { echo 'checked'; } ?> />
							<label for="home2">Блок 2</label>
						</div>
					</div>
					<div class="price__header<?php if ($options['price__block__active'] == '2') { echo ' top'; } ?>">
						<p class="edit_text name" 
							data-okhall="okHall_settings[price__b2__h1]" 
							contenteditable="true"><?php echo $options['price__b2__h1']; ?></p>
							<input type='hidden' 
								name='okHall_settings[price__b2__h1]' 
								value='<?php echo $options['price__b2__h1']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[price__b2__h2]" 
							contenteditable="true"><b><?php echo $options['price__b2__h2']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[price__b2__h2]' 
								value='<?php echo $options['price__b2__h2']; ?>'>
						<p class="edit_text price__header__sum" 
							data-okhall="okHall_settings[price__b2__h3]" 
							contenteditable="true"><?php echo $options['price__b2__h3']; ?></p>
							<input type='hidden' 
								name='okHall_settings[price__b2__h3]' 
								value='<?php echo $options['price__b2__h3']; ?>'>
					</div>

					<div class="price__center">
						<ul>
							<?php 
								for ($i = 1; $i < 4; $i++) {
							?>
							<li>
								<span class="edit_text fs1"
									data-okhall="okHall_settings[price__b2__c<?php echo $i; ?>]" 
									contenteditable="true"><?php echo $options['price__b2__c'. $i]; ?></span>
									<input type='hidden' 
										name='okHall_settings[price__b2__c<?php echo $i; ?>]' 
										value='<?php echo $options['price__b2__c'. $i]; ?>'>
							</li>
							<?php } ?>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<?php 
								for ($i = 1; $i < 10; $i++) {
							?>
							<li>
								<?php arthur_image_uploader( 'price__b2__n'. $i, $width = 30, $height = 30 ); ?>
								<span class="edit_text fs1"
									data-okhall="okHall_settings[price__b2__b<?php echo $i; ?>]" 
									contenteditable="true"><?php echo $options['price__b2__b'. $i]; ?></span>
									<input type='hidden' 
										name='okHall_settings[price__b2__b<?php echo $i; ?>]' 
										value='<?php echo $options['price__b2__b'. $i]; ?>'>
							</li>
							<?php } ?>
						</ul>
						<div class="introHolder">
							<span class="edit_text btn btn-accent fs1" 
								data-okhall="okHall_settings[price__b2__btn__1]" 
								contenteditable="true"><?php echo $options['price__b2__btn__1']; ?></span>
								<input type='hidden' 
									name='okHall_settings[price__b2__btn__1]' 
									value='<?php echo $options['price__b2__btn__1']; ?>'>

							<p><a class="download" href="<?php echo $options['price__b2__btn__2']; ?>">Скачать пример</a></p>
							<input type='text' class="text-center form-control blc" name='okHall_settings[price__b2__btn__2]' value='<?php echo $options['price__b2__btn__2']; ?>' placeholder="Адрес ссылки">
						</div>
					</div>
					<div class="introHolder inverse">
						<p style="font-size: 18px;">Ссылка на ПУТЕВОДИТЕЛЬ ПО РЕМОНТУ</p>
						<input type='text' class="text-center form-control blc" name='okHall_settings[price__100]' value='<?php echo $options['price__100']; ?>' placeholder="Адрес ссылки">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="text-center p-2" style="background-color:rgba(127, 255, 212, .5);">
						<?php if ($options['price__block__active'] == '3') { echo '<p>Главный</p>'; } else { echo '<p>Сделать главным</p>'; } ?>
						<div class="radio">
							<input id="home" type="radio" name="okHall_settings[price__block__active]" value="3" <?php if ($options['price__block__active'] == '3') { echo 'checked'; } ?> />
							<label for="home3">Блок 3</label>
						</div>
					</div>
					<div class="price__header<?php if ($options['price__block__active'] == '3') { echo ' top'; } ?>">
						<p class="edit_text name" 
							data-okhall="okHall_settings[price__b3__h1]" 
							contenteditable="true"><?php echo $options['price__b3__h1']; ?></p>
							<input type='hidden' 
								name='okHall_settings[price__b3__h1]' 
								value='<?php echo $options['price__b3__h1']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[price__b3__h2]" 
							contenteditable="true"><b><?php echo $options['price__b3__h2']; ?></b></p>
							<input type='hidden' 
								name='okHall_settings[price__b3__h2]' 
								value='<?php echo $options['price__b3__h2']; ?>'>
						<p class="edit_text price__header__sum" 
							data-okhall="okHall_settings[price__b3__h3]" 
							contenteditable="true"><?php echo $options['price__b3__h3']; ?><p>
							<input type='hidden' 
								name='okHall_settings[price__b3__h3]' 
								value='<?php echo $options['price__b3__h3']; ?>'>
					</div>

					<div class="price__center">
						<ul>
							<?php 
								for ($i = 1; $i < 5; $i++) {
							?>
							<li>
								<span class="edit_text fs1"
									data-okhall="okHall_settings[price__b3__c<?php echo $i; ?>]" 
									contenteditable="true"><?php echo $options['price__b3__c'. $i]; ?><span>
									<input type='hidden' 
										name='okHall_settings[price__b3__c<?php echo $i; ?>]' 
										value='<?php echo $options['price__b3__c'. $i]; ?>'>
							</li>
							<?php } ?>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<?php 
								for ($i = 1; $i < 9; $i++) {
							?>
							<li>
								<?php arthur_image_uploader( 'price__b3__n'. $i, $width = 30, $height = 30 ); ?>
								<span class="edit_text fs1"
									data-okhall="okHall_settings[price__b3__b<?php echo $i; ?>]" 
									contenteditable="true"><?php echo $options['price__b2__b'. $i]; ?><span>
									<input type='hidden' 
										name='okHall_settings[price__b3__b<?php echo $i; ?>]' 
										value='<?php echo $options['price__b3__b'. $i]; ?>'>
							</li>
							<?php } ?>
						</ul>
						<div class="introHolder">
							<span class="edit_text btn btn-accent fs1" 
								data-okhall="okHall_settings[price__b3__btn__1]" 
								contenteditable="true"><?php echo $options['price__b3__btn__1']; ?></span>
								<input type='hidden' 
									name='okHall_settings[price__b3__btn__1]' 
									value='<?php echo $options['price__b3__btn__1']; ?>'>
							<p><a class="download" href="<?php echo $options['price__b3__btn__2']; ?>">Скачать пример</a></p>
							<input type='text' class="text-center form-control blc" name='okHall_settings[price__b3__btn__2]' value='<?php echo $options['price__b3__btn__2']; ?>' placeholder="Адрес ссылки">
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	
	<section id="ban" class="banner" style="background-image:url('<?php echo $options['banner__bg__img']; ?>')">
		<div class="container">
			<p style="position: relative;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:<br>
			<?php arthur_image_uploader( 'banner__bg__img', $width = 60, $height = 60 ); ?></p>	
			
			<div class="row yellowHolder">
				<div class="col-md-8 yellowHolder__left">
					<p class="edit_text" 
						data-okhall="okHall_settings[banner__p__intro]" 
						contenteditable="true"><span><?php echo $options['banner__p__intro']; ?></span></p>
						<input type='hidden' 
							name='okHall_settings[banner__p__intro]' 
							value='<?php echo $options['banner__p__intro']; ?>'>
					<h2 class="edit_text" 
						data-okhall="okHall_settings[banner__h2__intro]" 
						contenteditable="true"><?php echo $options['banner__h2__intro']; ?></h2>
						<input type='hidden' 
							name='okHall_settings[banner__h2__intro]' 
							value='<?php echo $options['banner__h2__intro']; ?>'>
				
				</div>
				<div class="col yellowHolder__right">
					<p class="edit_text yellowHolder__right__text" 
						data-okhall="okHall_settings[banner__right__text]" 
						contenteditable="true"><?php echo $options['banner__right__text']; ?></p>
						<input type='hidden' 
							name='okHall_settings[banner__right__text]' 
							value='<?php echo $options['banner__right__text']; ?>'>
					<p class="edit_text yellowHolder__right__total" 
						data-okhall="okHall_settings[banner__right__text__price]" 
						contenteditable="true"><?php echo $options['banner__right__text__price']; ?></p>
						<input type='hidden' 
							name='okHall_settings[banner__right__text__price]' 
							value='<?php echo $options['banner__right__text__price']; ?>'>
				</div>
			</div>

			<div class="row no-gutters banner__list">
				<div class="col-md-4">
					<ul>
						<li><span class="edit_text" 
							data-okhall="okHall_settings[banner__banner__list__1]" 
							contenteditable="true"><?php echo $options['banner__banner__list__1']; ?></span>
							<input type='hidden' 
								name='okHall_settings[banner__banner__list__1]' 
								value='<?php echo $options['banner__banner__list__1']; ?>'></li>
						<li><span class="edit_text" 
							data-okhall="okHall_settings[banner__banner__list__2]" 
							contenteditable="true"><?php echo $options['banner__banner__list__2']; ?></span>
							<input type='hidden' 
								name='okHall_settings[banner__banner__list__2]' 
								value='<?php echo $options['banner__banner__list__2']; ?>'></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><span class="edit_text" 
							data-okhall="okHall_settings[banner__banner__list__3]" 
							contenteditable="true"><?php echo $options['banner__banner__list__3']; ?></span>
							<input type='hidden' 
								name='okHall_settings[banner__banner__list__3]' 
								value='<?php echo $options['banner__banner__list__3']; ?>'></li>
						<li><span class="edit_text" 
							data-okhall="okHall_settings[banner__banner__list__4]" 
							contenteditable="true"><?php echo $options['banner__banner__list__4']; ?></span>
							<input type='hidden' 
								name='okHall_settings[banner__banner__list__4]' 
								value='<?php echo $options['banner__banner__list__4']; ?>'></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><span class="edit_text" 
							data-okhall="okHall_settings[banner__banner__list__5]" 
							contenteditable="true"><?php echo $options['banner__banner__list__5']; ?></span>
							<input type='hidden' 
								name='okHall_settings[banner__banner__list__5]' 
								value='<?php echo $options['banner__banner__list__5']; ?>'></li>
						<li><span class="edit_text" 
							data-okhall="okHall_settings[banner__banner__list__6]" 
							contenteditable="true"><?php echo $options['banner__banner__list__6']; ?></span>
							<input type='hidden' 
								name='okHall_settings[banner__banner__list__6]' 
								value='<?php echo $options['banner__banner__list__6']; ?>'></li>
					</ul>
				</div>
			</div>
			
			<div class="row no-gutters banner__click">
				<div class="col-md-8">
					<p class="edit_text" 
						data-okhall="okHall_settings[banner__banner__click]" 
						contenteditable="true"><?php echo $options['banner__banner__click']; ?></p>
						<input type='hidden' 
							name='okHall_settings[banner__banner__click]' 
							value='<?php echo $options['banner__banner__click']; ?>'>
				</div>
				<div class="col-md-4 introHolder">
					<p class="btn btn-accent"><span class="edit_text fs1" 
						data-okhall="okHall_settings[banner__btn__1]" 
						contenteditable="true"><?php echo $options['banner__btn__1']; ?></span></p>
						<input type='hidden' 
							name='okHall_settings[banner__btn__1]' 
							value='<?php echo $options['banner__btn__1']; ?>'>
					<p><a class="text-center" href="<?php echo $options['banner__btn__2']; ?>" class="download" target="_blank">Скачать пример</a></p>
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__btn__2]' value='<?php echo $options['banner__btn__2']; ?>' placeholder="Адрес ссылки"></p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="partners" class="partners">
		<div class="container">

			<div class="introHolder blue">
				<h2>
					ЖК Москвы, в которых <span class="nxt"></span>реализованы <span>наши проекты</span>
				</h2>
			</div>
			
			<!-- UIkit CSS -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />

			<!-- UIkit JS -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
			<div uk-slider="infinite: true">
				<div class="uk-position-relative">
					<div class="uk-slider-container">
						<ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-4@m uk-grid">
		        			 <?php
								$partners = $options['partners__gallary'];
								$partners_img = explode(";", $partners);
								$partnersCount = count($partners_img);

								for($i = 0; $i < $partnersCount; $i++) {
									echo 	'<li><img src="'. $partners_img[$i] .'"></li>';
								}
							?>
					    </ul>
					</div>

				    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
	    			<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
				</div>
			</div>

			<p class="text-center white" style="font-size: 18px;color:#000;">Ссылки на фотографии партнеров<br>
			<span class="fwnorm" style="color:#000;">(Разделитель <span style="font-size: 22px;color: #ffae04">;</span> между ссылками)</span></p>
			<div class="row">
				<div class="col-12 col-md-6 offset-md-3">
					<textarea class="form-control blc row3" name='okHall_settings[partners__gallary]'><?php echo $options['partners__gallary']; ?></textarea>
				</div>
			</div>

		</div>
	</section>

	<section id="stp" class="staps" style="background-image:url('<?php echo $options['staps__bg__img']; ?>')">
		<div class="container">
			<p style="position: relative;"><span style="color: #fff">ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br>
			<?php arthur_image_uploader( 'staps__bg__img', $width = 60, $height = 60 ); ?></p>	
			<div class="introHolder">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[staps__h2__intro]" 
					contenteditable="true"><?php echo $options['staps__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[staps__h2__intro]' 
						value='<?php echo $options['staps__h2__intro']; ?>'>
			</div>

			<div class="row">
				<?php for( $i = 1; $i < 7; $i++ ) { ?>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p class="edit_text" 
							data-okhall="okHall_settings[staps__0<?php echo $i; ?>__num]" 
							contenteditable="true"><?php echo $options['staps__0'. $i .'__num']; ?></span>
							<input type='hidden' 
								name='okHall_settings[staps__0<?php echo $i; ?>__num]' 
								value='<?php echo $options['staps__0'. $i .'__num']; ?>'>
						<hr>
					</div>
					<p class="edit_text staps__name" 
						data-okhall="okHall_settings[staps__0<?php echo $i; ?>__name]" 
						contenteditable="true"><?php echo $options['staps__0'. $i .'__name']; ?></p>
						<input type='hidden' 
							name='okHall_settings[staps__0<?php echo $i; ?>__name]' 
							value='<?php echo $options['staps__0'. $i .'__name']; ?>'>
					<p class="edit_text" 
							data-okhall="okHall_settings[staps__0<?php echo $i; ?>__text]" 
							contenteditable="true"><?php echo $options['staps__0'. $i .'__text']; ?></p>
							<input type='hidden' 
								name='okHall_settings[staps__0<?php echo $i; ?>__text]' 
								value='<?php echo $options['staps__0'. $i .'__text']; ?>'>
				</div>
				<?php } ?>
			</div>

		</div>
	</section>

	<section id="aft" class="after" style="background-image:url('<?php echo $options['after__bg__img']; ?>')">
		<div class="container">
			<p style="position: relative;"><span style="color: #fff">ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br>
			<?php arthur_image_uploader( 'after__bg__img', $width = 60, $height = 60 ); ?></p>	
			
			<div class="introHolder">
				<h2 class="edit_text" 
					data-okhall="okHall_settings[after__h2__intro]" 
					contenteditable="true"><?php echo $options['after__h2__intro']; ?></h2>
					<input type='hidden' 
						name='okHall_settings[after__h2__intro]' 
						value='<?php echo $options['after__h2__intro']; ?>'>
			</div>

			<div class="row">
				<div class="col-12 col-md-6">
					<div class="text-center pb-3"><?php arthur_image_uploader( 'after__block__img1', $width =60, $height = 60 ); ?></div>
					<p><textarea class="form-control transp white" name='okHall_settings[after__block__t1]'><?php echo $options['after__block__t1']; ?></textarea></p>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-center pb-3"><?php arthur_image_uploader( 'after__block__img2', $width =60, $height = 60 ); ?></div>
					<p><textarea class="form-control transp white" name='okHall_settings[after__block__t2]'><?php echo $options['after__block__t2']; ?></textarea></p>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-center pb-3"><?php arthur_image_uploader( 'after__block__img3', $width =60, $height = 60 ); ?></div>
					<p><textarea class="form-control transp white" name='okHall_settings[after__block__t3]'><?php echo $options['after__block__t3']; ?></textarea></p>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-center pb-3"><?php arthur_image_uploader( 'after__block__img4', $width =60, $height = 60 ); ?></div>
					<p><textarea class="form-control transp white" name='okHall_settings[after__block__t4]'><?php echo $options['after__block__t4']; ?></textarea></p>
				</div>
			</div>
			<br>
			<p class="text-center white" style="font-size: 18px;">Ссылки на фотографии 3D визуализации<br>
			<span class="fwnorm">(Разделитель <span style="font-size: 22px;color: #ffae04">;</span> между ссылками)</span></p>
			<div class="row">
				<div class="col-12 col-md-6 offset-md-3">
					<textarea class="form-control transp white row3" name='okHall_settings[after__gallary]'><?php echo $options['after__gallary']; ?></textarea>
				</div>
			</div>


		</div>
	</section>

	<section id="oper" class="operator" style="background-image: url('<?php echo $options['operator__bg__img']; ?>')">
		<div class="operator__blur">
			<div class="container">

				<p style="position: relative;">ФОНОВОЕ ИЗОБРАЖЕНИЕ:<br>
				<?php arthur_image_uploader( 'operator__bg__img', $width = 60, $height = 60 ); ?></p>	
			
				<div class="row align-items-center">
					<div class="col-md-6">
						<h2 class="edit_text" 
							data-okhall="okHall_settings[operator__h2__intro]" 
							contenteditable="true"><?php echo $options['operator__h2__intro']; ?></h2>
							<input type='hidden' 
								name='okHall_settings[operator__h2__intro]' 
								value='<?php echo $options['operator__h2__intro']; ?>'>
					</div>
					<div class="col-md-6">
						<ul>
							<li class="edit_text" 
								data-okhall="okHall_settings[operator__ul__1]" 
								contenteditable="true"><?php echo $options['operator__ul__1']; ?></li>
								<input type='hidden' 
									name='okHall_settings[operator__ul__1]' 
									value='<?php echo $options['operator__ul__1']; ?>'>
							<li class="edit_text" 
								data-okhall="okHall_settings[operator__ul__2]" 
								contenteditable="true"><?php echo $options['operator__ul__2']; ?></li>
								<input type='hidden' 
									name='okHall_settings[operator__ul__2]' 
									value='<?php echo $options['operator__ul__2']; ?>'>
							<li class="edit_text" 
								data-okhall="okHall_settings[operator__ul__3]" 
								contenteditable="true"><?php echo $options['operator__ul__3']; ?></li>
								<input type='hidden' 
									name='okHall_settings[operator__ul__3]' 
									value='<?php echo $options['operator__ul__3']; ?>'>

						</ul>
					</div>
				</div>

			</div>
		</div>

		<div class="operator__text">
			<div class="container">

				<div class="row">
					<div class="col-md-6">
						<h4 class="edit_text" 
							data-okhall="okHall_settings[operator__text__h4]" 
							contenteditable="true"><?php echo $options['operator__text__h4']; ?></h4>
							<input type='hidden' 
								name='okHall_settings[operator__text__h4]' 
								value='<?php echo $options['operator__text__h4']; ?>'>
						<p class="edit_text phone" 
							data-okhall="okHall_settings[operator__text__phone]" 
							contenteditable="true"><?php echo $options['operator__text__phone']; ?></p>
							<input type='hidden' 
								name='okHall_settings[operator__text__phone]' 
								value='<?php echo $options['operator__text__phone']; ?>'>
						<p class="edit_text" 
							data-okhall="okHall_settings[operator__text__p]" 
							contenteditable="true"><?php echo $options['operator__text__p']; ?></p>
							<input type='hidden' 
								name='okHall_settings[operator__text__p]' 
								value='<?php echo $options['operator__text__p']; ?>'>

						<div class="introHolder">
							<a class="btn btn-accent">Оставить заявку</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="text-center pb-3"><?php arthur_image_uploader( 'operator__text__img', $width =200, $height = 300 ); ?></div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<footer id="footer">
		<div class="container">

			<div class="row">

				<div class="col-md-6 offset-md-3">

					<div class="row">
						<div class="col-12 text-center">
							<br><br>
							<p style="font-size:22px;">Координаты Объектов на карте</p>
							<p>Определить координаты новой метки можно по <a href="http://webmap-blog.ru/tools/getlonglat-ymap2.html" target="_blank">ссылке</a></p>
							<?php
								for ($i = 1; $i < $options['map__point__count']; $i++) {
									
								} 

								$num = $i + 1;
								$list = 'okHall_settings[map__point__'. $num .']';

							
								

								for ($i = 1; $i < $options['map__point__count']; $i++) {
									echo '<div class="row">';
									echo '<div class="col-1"><p>'. $i .'</p></div><div class="col-11"><p><input type="text" class="form-control text-center blc" name="okHall_settings[map__point__'. $i .']" value="'. $options['map__point__'. $i] .'"></p></div>';
									echo '</div>';
								} 
								echo '<div class="row">';
								echo '<div class="col-1"><p>'. $i .'</p></div><div class="col-11"><p><input type="text" class="form-control text-center blc" name="okHall_settings[map__point__'. $i .']" value="'. $options['map__point__'. $i] .'"></p></div>';
								echo '</div>';
							?>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center">
							<p class="text-center">
							  <a class="btn btn-primary map_toggle_href">Добавить точку</a>
							</p>
						
						
							<div id="map_toggle">
							  
							    <p class="text-center">Координаты точки:</p>
							    <p class="text-center">
									<?php echo '<input type="text" class="form-control text-center blc" name="'. $list .'" value="'. $options['map__point__'. $num] .'">'; ?>
							    </p>
							    <p class="text-center">Нужно вручную исправить номер на <span style="font-size: 22px;color: #ffae04"><?php echo $num; ?></span></p>
							    <p class="text-center"><input type='text' class="form-control text-center blc" name='okHall_settings[map__point__count]' value='<?php echo $options['map__point__count']; ?>'></p>
							 
							</div>
						</div>
					</div>

							

							  <script>
							  	$('#map_toggle').hide();
							  	

									$('.map_toggle_href').click(function() {
										
										
											var $choices = $('#map_toggle');
											if ($choices.css("display") == "none") {
											    $choices.slideDown();
											}
											else {
											    $choices.slideUp(); }
											

									});
									
									
								

							  </script>
							</div>
						</div>
					</div>
				</div>
			</div>
	</footer>
	
	<div class="clearfix"></div>

	<section id="letters" style="background-image:url('/wp-content/uploads/2019/02/pattern.jpg')">
		<div class="container">

			<div class="introHolder inverse">
				<h2>Скачать каталог</h2>
			</div>
			
			<div class="row">
				<div class="col-10 offset-1 text-center">

					<div class="row">
						<div class="col-md-6 text-center">
							<p class="fs1">Тема письма:</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[photos__modal__subject]' value='<?php echo $options['photos__modal__subject']; ?>'>
						</div>
						<div class="col-md-6 text-center">
							<p class="fs1">Название отправителя</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[photos__modal__from]' value='<?php echo $options['photos__modal__from']; ?>'>
						</div>
					</div>
					<br>
					<div class="modal-content catalog__form">
    					<div class="modal-header">

				    		<h3 class="edit_text" 
								data-okhall="okHall_settings[photos__modal__p__intro]" 
								contenteditable="true"><?php echo $options['photos__modal__p__intro']; ?></h3>
								<input type='hidden' 
									name='okHall_settings[photos__modal__p__intro]' 
									value='<?php echo $options['photos__modal__p__intro']; ?>'>
				      	</div>
				      	<div class="modal-body">
							<p class="edit_text blue" 
								data-okhall="okHall_settings[photos__modal__text1]" 
								contenteditable="true"><?php echo $options['photos__modal__text1']; ?></p>
								<input type='hidden' 
									name='okHall_settings[photos__modal__text1]' 
									value='<?php echo $options['photos__modal__text1']; ?>'>

							<div class="row align-items-center">
								<div class="col-lg-6 text-center">

									<input type="text" name="name" class="form-control" placeholder="Имя" disabled/>
									<input type="email" name="email" class="form-control" placeholder="Email *" disabled/>
								</div>
								<div class="col-lg-6">
									<p class="edit_text right" 
										data-okhall="okHall_settings[photos__modal__text2]" 
										contenteditable="true"><?php echo $options['photos__modal__text2']; ?></p>
										<input type='hidden' 
											name='okHall_settings[photos__modal__text2]' 
											value='<?php echo $options['photos__modal__text2']; ?>'>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 text-center">
									<p class="edit_text grey" 
										data-okhall="okHall_settings[photos__modal__text3]" 
										contenteditable="true"><?php echo $options['photos__modal__text3']; ?></p>
										<input type='hidden' 
											name='okHall_settings[photos__modal__text3]' 
											value='<?php echo $options['photos__modal__text3']; ?>'>
									<span class="btn btn-accent">Отправить</span>
								</div>
							</div>
							<div class="row pt-2 justify-content-center">
								<p class="edit_text grey" 
									data-okhall="okHall_settings[photos__modal__text4]" 
									contenteditable="true"><?php echo $options['photos__modal__text4']; ?></p>
									<input type='hidden' 
										name='okHall_settings[photos__modal__text4]' 
										value='<?php echo $options['photos__modal__text4']; ?>'>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<br><br>
		<div class="container">

			<div class="introHolder inverse">
				<h2>Рассчитать стоимость</h2>
			</div>
			
			<div class="row">
				<div class="col-10 offset-1 text-center">

					<div class="row">
						<div class="col-md-6 text-center">
							<p class="fs1">Тема письма:</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[price__modal__subject]' value='<?php echo $options['price__modal__subject']; ?>'>
						</div>
						<div class="col-md-6 text-center">
							<p class="fs1">Название отправителя</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[price__modal__from]' value='<?php echo $options['price__modal__from']; ?>'>
						</div>
					</div>
					<br>
					<div class="modal-content price__form">
						<div class="modal-header">
							<h3 class="edit_text" 
								data-okhall="okHall_settings[price__modal__p__intro]" 
								contenteditable="true"><?php echo $options['price__modal__p__intro']; ?></h3>
								<input type='hidden' 
									name='okHall_settings[price__modal__p__intro]' 
									value='<?php echo $options['price__modal__p__intro']; ?>'>
						</div>
						<div class="modal-body">
							
								<div class="row">
									<div class="col-12 col-lg-6">
										<p class="edit_text" 
											data-okhall="okHall_settings[price__modal__left1]" 
											contenteditable="true"><b><?php echo $options['price__modal__left1']; ?></b></p>
											<input type='hidden' 
												name='okHall_settings[price__modal__left1]' 
												value='<?php echo $options['price__modal__left1']; ?>'>
									</div>
									<div class="col-4 col-lg-2">
										<div class="radio">
											<input id="home" type="radio" name="home">
											<label for="home" class="edit_text" 
												data-okhall="okHall_settings[price__modal__right1]" 
												contenteditable="true"><?php echo $options['price__modal__right1']; ?></label>
												<input type='hidden' 
													name='okHall_settings[price__modal__right1]' 
													value='<?php echo $options['price__modal__right1']; ?>'>
										</div>
									</div>
									<div class="col-4 col-lg-2">
										<div class="radio">
											<input id="home2" type="radio" name="home">
											<label for="home2" class="edit_text" 
												data-okhall="okHall_settings[price__modal__right2]" 
												contenteditable="true"><?php echo $options['price__modal__right2']; ?></label>
												<input type='hidden' 
													name='okHall_settings[price__modal__right2]' 
													value='<?php echo $options['price__modal__right2']; ?>'>
										</div>
									</div>
									<div class="col-4 col-lg-2">
										<div class="radio">
											<input id="home3" type="radio" name="home">
											<label for="home3" class="edit_text" 
												data-okhall="okHall_settings[price__modal__right3]" 
												contenteditable="true"><?php echo $options['price__modal__right3']; ?></label>
												<input type='hidden' 
													name='okHall_settings[price__modal__right3]' 
													value='<?php echo $options['price__modal__right3']; ?>'>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-lg-6">
										<p class="edit_text" 
											data-okhall="okHall_settings[price__modal__left2]" 
											contenteditable="true"><b><?php echo $options['price__modal__left2']; ?></b></p>
											<input type='hidden' 
												name='okHall_settings[price__modal__left2]' 
												value='<?php echo $options['price__modal__left2']; ?>'>
									</div>
									<div class="col-2 col-lg-1">
										<p class="text-right">м<sup>2</sup></p>
									</div>
									<div class="col-10 col-lg-2 text-left">
										<input type="tel" name="square" class="form-control form__one__metr" value="" disabled/>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-lg-6">
										<p class="edit_text" 
											data-okhall="okHall_settings[price__modal__left3]" 
											contenteditable="true"><b><?php echo $options['price__modal__left3']; ?></b></p>
											<input type='hidden' 
												name='okHall_settings[price__modal__left3]' 
												value='<?php echo $options['price__modal__left3']; ?>'>
									</div>
									<div class="col-4 col-lg-2">
										<div class="radio">
											<input id="time" type="radio" name="time">
											<label for="time" class="edit_text" 
												data-okhall="okHall_settings[price__modal__right4]" 
												contenteditable="true"><?php echo $options['price__modal__right4']; ?></label>
												<input type='hidden' 
													name='okHall_settings[price__modal__right4]' 
													value='<?php echo $options['price__modal__right4']; ?>'>
										</div>
									</div>
									<div class="col-4 col-lg-2">
										<div class="radio">
											<input id="time2" type="radio" name="time">
											<label for="time2" class="edit_text" 
												data-okhall="okHall_settings[price__modal__right5]" 
												contenteditable="true"><?php echo $options['price__modal__right5']; ?></label>
												<input type='hidden' 
													name='okHall_settings[price__modal__right5]' 
													value='<?php echo $options['price__modal__right5']; ?>'>
										</div>
									</div>
									<div class="col-4 col-lg-2">
										<div class="radio">
											<input id="time3" type="radio" name="time">
											<label for="time3" class="edit_text" 
												data-okhall="okHall_settings[price__modal__right6]" 
												contenteditable="true"><?php echo $options['price__modal__right6']; ?></label>
												<input type='hidden' 
													name='okHall_settings[price__modal__right6]' 
													value='<?php echo $options['price__modal__right6']; ?>'>
										</div>
									</div>
								</div>

								<div class="row no-padding">
									<div class="col-lg-6">
										<input type="text" name="name" class="form-control" value="" placeholder="Ваше имя" disabled>
										<input type="tel" name="phone" class="form-control" value="" placeholder="Телефон" disabled>
									</div>
									<div class="col-lg-6">
										<span class="form__one__button">Отправить</span>
									</div>
								</div>
								<p class="form__one__bottom text-center">
									<p class="edit_text" 
										data-okhall="okHall_settings[price__modal__bottom]" 
										contenteditable="true"><?php echo $options['price__modal__bottom']; ?></p>
										<input type='hidden' 
											name='okHall_settings[price__modal__bottom]' 
											value='<?php echo $options['price__modal__bottom']; ?>'>
								</p> 
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 text-center">
							<p class="fs1">Тема письма:</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[price__modal__subject__let2]' value='<?php echo $options['price__modal__subject__let2']; ?>'>
						</div>
						<div class="col-md-6 text-center">
							<p class="fs1">Название отправителя</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[price__modal__from__let2]' value='<?php echo $options['price__modal__from__let2']; ?>'>
						</div>
					</div>
					<br>
					<div class="modal-content price__form">
						<div class="modal-header">
							<h3 class="edit_text" 
								data-okhall="okHall_settings[price__modal__p__intro__let2]" 
								contenteditable="true"><?php echo $options['price__modal__p__intro__let2']; ?></h3>
								<input type="hidden"
									name='okHall_settings[price__modal__p__intro__let2]' 
									value='<?php echo $options['price__modal__p__intro__let2']; ?>'>
						</div>
						<div class="modal-body">
							<p class="edit_text blue" 
								data-okhall="okHall_settings[price__modal__let2__text1]" 
								contenteditable="true"><?php echo $options['price__modal__let2__text1']; ?></p>
								<input type="hidden"
									name='okHall_settings[price__modal__let2__text1]' 
									value='<?php echo $options['price__modal__let2__text1']; ?>'>
							<div class="row no-border">
								<div class="col-12 col-lg-6">
									<input type="email" name="email" class="form-control" value="" placeholder="e-mail" disabled>
									<p class="edit_text form__two__grey" 
										data-okhall="okHall_settings[price__modal__let2__text2]" 
										contenteditable="true"><?php echo $options['price__modal__let2__text2']; ?></p>
										<input type="hidden"
											name='okHall_settings[price__modal__let2__text2]' 
											value='<?php echo $options['price__modal__let2__text2']; ?>'>
								</div>
								<div class="col-12 col-lg-6">
									<span class="form__one__button">Отправить</span>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">

			<div class="introHolder inverse">
				<h2>Оставьте заявку</h2>
			</div>
			
			<div class="row">
				<div class="col-10 offset-1 text-center">

					<div class="row">
						<div class="col-md-6 text-center">
							<p class="fs1">Тема письма:</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[banner__modal__subject]' value='<?php echo $options['banner__modal__subject']; ?>'>
						</div>
						<div class="col-md-6 text-center">
							<p class="fs1">Название отправителя</p> 
							<input type='text' class="form-control blc text-center" name='okHall_settings[banner__modal__from]' value='<?php echo $options['banner__modal__from']; ?>'>
						</div>
					</div>
					<br>
					<div class="modal-content okhall-modal">

						<div class="modal-header">
							<h3 class="edit_text" 
								data-okhall="okHall_settings[banner__modal__p__intro]" 
								contenteditable="true"><?php echo $options['banner__modal__p__intro']; ?></h3>
								<input type='hidden' 
									name='okHall_settings[banner__modal__p__intro]' 
									value='<?php echo $options['banner__modal__p__intro']; ?>'>
						</div>
						<div class="modal-body">
							<div class="row align-items-center">
								<div class="col-lg-4 text-center">
									
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Имя" disabled/>
									</div>
									<div class="form-group">
										<input type="tel" name="phone" class="form-control" required placeholder="Телефон *" disabled/>
									</div>
									<span class="btn btn-accent">Отправить</span>
									
								</div>
								<div class="col-lg-8">
									<p class="edit_text rigth" 
										data-okhall="okHall_settings[banner__modal__text1]" 
										contenteditable="true"><?php echo $options['banner__modal__text1']; ?></p>
										<input type='hidden' 
											name='okHall_settings[banner__modal__text1]' 
											value='<?php echo $options['banner__modal__text1']; ?>'>
									<p class="edit_text rigth" 
										data-okhall="okHall_settings[banner__modal__text2]" 
										contenteditable="true"><?php echo $options['banner__modal__text2']; ?></p>
										<input type='hidden' 
											name='okHall_settings[banner__modal__text2]' 
											value='<?php echo $options['banner__modal__text2']; ?>'>
									<p class="edit_text rigth" 
										data-okhall="okHall_settings[banner__modal__text3]" 
										contenteditable="true"><?php echo $options['banner__modal__text3']; ?></p>
										<input type='hidden' 
											name='okHall_settings[banner__modal__text3]' 
											value='<?php echo $options['banner__modal__text3']; ?>'>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<br><br><br><br>
	</section>
	

	    <?php
	        settings_fields( 'okHallCustom' );
	        do_settings_sections( 'okHallCustom' );
	        submit_button('Сохранить');
	    ?>
    </form>
	<div id="toTop"><img src="/wp-content/themes/okhall/img/arrow-top.svg"></div>
	<script>
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
		//to TOP
		$(window).scroll(function() {
		 	if($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});
		$('#toTop').click(function() {
			$('body,html').animate({scrollTop:0},800);
		});
	</script>
<?php }