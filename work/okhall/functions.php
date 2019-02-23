<?php
/**
 * okhall functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package okhall
 */

if ( ! function_exists( 'okhall_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function okhall_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on okhall, use a find and replace
		 * to change 'okhall' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'okhall', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'okhall' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'okhall_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'okhall_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function okhall_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'okhall_content_width', 640 );
}
add_action( 'after_setup_theme', 'okhall_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function okhall_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'okhall' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'okhall' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'okhall_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function okhall_scripts() {
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburgers.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css' );

	wp_enqueue_script( 'okhall-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'okhall-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// add_action( 'wp_enqueue_scripts', 'okhall_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
  */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//TGM Load plugins
require get_template_directory() . '/tgm/okhall.php';

//Script upload img from WP Media
function true_include_okhall_admin() {
	// у вас в админке уже должен быть подключен jQuery, если нет - раскомментируйте следующую строку:
	// wp_enqueue_script('jquery');
	// дальше у нас идут скрипты и стили загрузчика изображений WordPress
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// само собой - меняем admin.js на название своего файла
 	wp_enqueue_script( 'okhall_admin', get_stylesheet_directory_uri() . '/js/okhall_admin.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'true_include_okhall_admin' );

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
	
	?>


   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	crossorigin="anonymous">
	<link rel="stylesheet" href="/wp-content/themes/okhall/css/main.min.css">
   <style type="text/css">
   		#wpcontent, #wpfooter {margin-left: 140px;}
   		body {padding: 0; margin: 0;}
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
    	.header_admin::before { content: ''; position: absolute; left: 0; top: 0; width: 100%; height: 100%; background: #000; opacity: .7}
    	.admin_top {padding: 30px 30px 100px 30px;}
    	.admin_top .row label {font-weight: bold;}
	   	.admin_top .row .adm_menu {padding: 20px 0;}
	   	.admin_top .row .adm_menu p {font-size:1.3rem;font-weight: bold;}
    	.admin_top .row .adm_menu ul {margon:0;padding:0;}
    	.admin_top .row .adm_menu ul li {display:inline-block;margin: 0 10px;font-size: 1.3rem;}
    	.banner {height: 100%;}

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
		   				<li><a href="#blog">Блог</a></li>
		   				<li><a href="#video">Видео</a></li>
		   				<li><a href="#calc">Калькулятор</a></li>
		   				<li><a href="#foto">Фото</a></li>
		   				<li><a href="#dp">Дизайн-проект</a></li>
		   				<li><a href="#rew">Отзывы</a></li>
		   				<li><a href="#wm">Красотки</a></li>
		   				<li><a href="#price">Цены</a></li>
		   				<li><a href="#ban">Баннер</a></li>
		   				<li><a href="#stp">Шаги</a></li>
		   				<li><a href="#aft">Итог</a></li>
		   				<li><a href="#oper">Оператор</a></li>
		   			</ul>
	   			</div>
	   		</div>

   		</div>
   	</section>
	
	<header class="header_admin" style="background-image:url('<?php echo $options['header__bg__img']; ?>')">
		<div class="container">
		
		<p style="position: relative;"><span style="color: #fff;">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br> <input type='text' class="form-control transp white" name='okHall_settings[header__bg__img]' value='<?php echo $options['header__bg__img']; ?>'></p>
		
		<div class="header__block">
			<div class="container">
				
				<div class="row yellowHolder">
					<div class="col-md-8 yellowHolder__left">
						
						<h1>
							<input type='text' class="text-center form-control transp white" name='okHall_settings[header__h2__intro]' value='<?php echo $options['header__h2__intro']; ?>'>
						</h1>
						<p>
							<input type='text' class="text-center form-control transp white" name='okHall_settings[header__p__intro]' value='<?php echo $options['header__p__intro']; ?>'>
						</p>
					</div>
					<div class="col yellowHolder__right">
						<p class="yellowHolder__right__old"><input type='text' class="form-control transp white" name='okHall_settings[header__right__old]' value='<?php echo $options['header__right__old']; ?>'></p>
						<p class="yellowHolder__right__total"><input type='text' class="form-control transp white" name='okHall_settings[header__right__total]' value='<?php echo $options['header__right__total']; ?>'></p>
						<p class="yellowHolder__right__date"><input type='text' class="form-control transp white" name='okHall_settings[header__right__date]' value='<?php echo $options['header__right__date']; ?>'></p>
					</div>
					
				</div>
				
				<div class="row header__block__column">
					<div class="col-md-4 header__block__column__item text-center">
						<?php arthur_image_uploader( 'header__block__img1', $width =60, $height = 60 ); ?>
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[header__block__item1]' value='<?php echo $options['header__block__item1']; ?>'></p>
					</div>
					<div class="col-md-4 header__block__column__item text-center">
						<?php arthur_image_uploader( 'header__block__img2', $width =60, $height = 60 ); ?>
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[header__block__item2]' value='<?php echo $options['header__block__item2']; ?>'></p>
					</div>
					<div class="col-md-4 header__block__column__item text-center">
						<?php arthur_image_uploader( 'header__block__img3', $width =60, $height = 60 ); ?>
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[header__block__item3]' value='<?php echo $options['header__block__item3']; ?>'></p>
					</div>
				</div>
			</div>

		</div>

		</div>
	</header>

	<section id="blog" class="advantages" style="background-image:url('/wp-content/uploads/2019/02/pattern.jpg')">
		<img class="mouse" src="/wp-content/themes/okhall/img/header/mouse.svg" alt="">

		<div class="container style="padding: 50px 0">
	
			<div class="introHolder inverse">
				<h2>Блог</h2>
				<p>
					Данный блок редактируется путем добавления или изменения Записей.<br>Перейти в <a href="/wp-admin/edit.php">ЗАПИСИ</a>
				</p>
			</div>
		
		</div>
	</section>

	<section id="video" class="macbook">
		<div class="container">
			
			<div class="introHolder">
				<h2>
					<input type='text' class="text-center form-control transp white" name='okHall_settings[macbook__h2__intro]' value='<?php echo $options['macbook__h2__intro']; ?>'>
				</h2>
				<p>
					<input type='text' class="text-center form-control transp white" name='okHall_settings[macbook__p__intro]' value='<?php echo $options['macbook__p__intro']; ?>'>
				</p>
				<p>
					<input type='text' class="text-center form-control transp white" name='okHall_settings[macbook__video__href]' value='<?php echo $options['macbook__video__href']; ?>' placeholder="Ссылка на видео">
				</p>
			</div>
			
			<div class="button-play"><a href=""><img src="/wp-content/uploads/2019/02/play.svg" alt=""></a></div>
			

		</div>
	</section>

	<section id="calc" class="calculator"  style="background-image:url('<?php echo $options['calculator__bg__img']; ?>')">

		<div class="container">
			<p style="position: relative;"><span style="color: #fff;">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br> <input type='text' class="form-control transp white" name='okHall_settings[calculator__bg__img]' value='<?php echo $options['calculator__bg__img']; ?>'></p>
			
			
			<div class="introHolder">
				<h2>
					<input type='text' class="text-center form-control transp white" name='okHall_settings[calculator__h2__intro]' value='<?php echo $options['calculator__h2__intro']; ?>'>
				</h2>
				<p>
					<input type='text' class="text-center form-control transp white" name='okHall_settings[calculator__p__intro]' value='<?php echo $options['calculator__p__intro']; ?>'>
				</p>
			</div>

			<div class="row no-gutters calculator__block">
				<div class="col-md-2 text-center"><?php arthur_image_uploader( 'calculator__block__img1', $width =60, $height = 60 ); ?></div>
				<div class="col-md-4">
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[calculator__block__p1]' value='<?php echo $options['calculator__block__p1']; ?>'></p>
				</div>
			
				<div class="col-md-2 text-center"><?php arthur_image_uploader( 'calculator__block__img2', $width =60, $height = 60 ); ?></div>
				<div class="col-md-4">
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[calculator__block__p2]' value='<?php echo $options['calculator__block__p2']; ?>'></p>
				</div>
			</div>
			<div class="introHolder">
				<a class="btn btn-accent"><b><input type='text' class="text-center form-control transp white"  name='okHall_settings[calculator__block__btn]' value='<?php echo $options['calculator__block__btn']; ?>'></b></a>
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
				<h2>
					<input type='text' class="form-control blc text-center"  name='okHall_settings[photos__h2__intro]' value='<?php echo $options['photos__h2__intro']; ?>'>
				</h2>
				<p>
					<input type='text' class="form-control blc text-center"  name='okHall_settings[photos__p__intro]' value='<?php echo $options['photos__p__intro']; ?>'>
				</p>
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
				<a class="btn btn-accent"><input type='text' class="form-control transp white text-center"  name='okHall_settings[photos__btn]' value='<?php echo $options['photos__btn']; ?>'></a>
				<p class="text-center"><input type='text' style="max-width: 300px;margin: 0 auto;" class="form-control blc text-center"  name='okHall_settings[photos__btn__href]' value='<?php echo $options['photos__btn__href']; ?>' placeholder="Ссылка на каталог"></p>
			</div>
	
	
	
			<div class="row">
				<div class="col-10 offset-1 col-lg-6 offset-lg-3 text-center">

					<div class="modal-content okhall">
						
						<p><b><input type='text' class="form-control blc text-center"  name='okHall_settings[photos__modal__p__intro]' value='<?php echo $options['photos__modal__p__intro']; ?>'></b></p>
						<textarea class="form-control blc fwnorm row2"  name='okHall_settings[photos__modal__text]'><?php echo $options['photos__modal__text']; ?></textarea>

					</div>
				</div>
			</div>
	
		</div>
	</section>

	<section id="dp" class="design_project">
		<div class="container">
			
			<div class="introHolder">
				<h2>
					<input type='text' class="form-control transp white text-center"  name='okHall_settings[design_project__h2__intro]' value='<?php echo $options['design_project__h2__intro']; ?>'>
				</h2>
				<p>
					<input type='text' class="form-control transp white text-center"  name='okHall_settings[design_project__p__intro]' value='<?php echo $options['design_project__p__intro']; ?>'>
				</p>
			</div>
			
			<div class="row no-gutters">
				
				<div class="col-12 col-md-6 col-lg-5">
					<div class="design_project__header">
						<p>
							<span><i class="far fa-thumbs-down"></i></span> <input type='text' class="form-control transp white text-center"  name='okHall_settings[design_project__header__left]' value='<?php echo $options['design_project__header__left']; ?>'>
						</p>
					</div>
				
					<div class="design_project__center">
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__left__1]'><?php echo $options['design_project__header__left__1']; ?></textarea>
						</p>
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__left__2]'><?php echo $options['design_project__header__left__2']; ?></textarea>
						</p>
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__left__3]'><?php echo $options['design_project__header__left__3']; ?></textarea>
						</p>
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__left__4]'><?php echo $options['design_project__header__left__4']; ?></textarea>
						</p>
					</div>
					<p><b><textarea class="form-control transp white row1" name='okHall_settings[design_project__header__left__5]'><?php echo $options['design_project__header__left__5']; ?></textarea></b></p>
				</div>

				<div class="col-12 col-md-6 col-lg-5 offset-lg-2 right">
					<div class="design_project__header">
						<p>
							<span><i class="far fa-thumbs-up"></i></span> <input type='text' class="form-control transp white text-center" name='okHall_settings[design_project__header__right]' value='<?php echo $options['design_project__header__right']; ?>'>
						</p>
					</div>
			
					<div class="design_project__center">
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__right__1]'><?php echo $options['design_project__header__right__1']; ?></textarea>
						</p>
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__right__2]'><?php echo $options['design_project__header__right__2']; ?></textarea>
							
						</p>
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__right__3]'><?php echo $options['design_project__header__right__3']; ?></textarea>
							
						</p>
						<p>
							<textarea class="form-control transp white row1" name='okHall_settings[design_project__header__right__4]'><?php echo $options['design_project__header__right__4']; ?></textarea>
							
						</p>
					</div>
					<p><b><textarea class="form-control transp white row1" name='okHall_settings[design_project__header__right__5]'><?php echo $options['design_project__header__right__5']; ?></textarea></b></p>
			</div>

		</div>
	</section>

	<section id="rew" class="recomendation" style="background-image:url('<?php echo $options['recomendation__bg__img']; ?>')">
		<div class="container">
			<p>Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:<br> 
			<input type='text' class="form-control blc" name='okHall_settings[recomendation__bg__img]' value='<?php echo $options['recomendation__bg__img']; ?>'></p>
			
			<div class="introHolder blue">
				<h2>
					<input type='text' class="text-center form-control blc" name='okHall_settings[recomendation__h2__intro]' value='<?php echo $options['recomendation__h2__intro']; ?>'>
				</h2>
				<p>
					<input type='text' class="text-center form-control blc" name='okHall_settings[recomendation__p__intro]' value='<?php echo $options['recomendation__p__intro']; ?>'>
				</p>

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
			<p><span style="color: #fff">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</span><br> <input type='text' class="form-control transp white" name='okHall_settings[acquaintance__img]' value='<?php echo $options['acquaintance__img']; ?>'></p>
			
			<div class="introHolder">
				<h2><input type='text' class="form-control transp white text-center" name='okHall_settings[acquaintance__h2__intro]' value='<?php echo $options['acquaintance__h2__intro']; ?>'></h2>
			</div>


			<div class="row">
				<div class="col-md-6">
					<div class="acquaintance__block">
						<div class="acquaintance__block__about">
							<div class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__left', $width =40, $height = 60 ); ?></div>
							<img class="manager" src="<?php echo $options['acquaintance__img__left']; ?>" alt="Оборонева Мария">
							<h3><input type='text' class="form-control transp white text-center" name='okHall_settings[acquaintance__h3]' value='<?php echo $options['acquaintance__h3']; ?>'></h3>
							<textarea class="form-control transp white row3" name='okHall_settings[acquaintance__text]'><?php echo $options['acquaintance__text']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="acquaintance__block">
						<div class="acquaintance__block__about">
							<div class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__right', $width =40, $height = 60 ); ?></div>
							<img class="manager right" src="<?php echo $options['acquaintance__img__right']; ?>" alt="Курбанниязова Юлия">
							<h3><input type='text' class="form-control transp white text-center" name='okHall_settings[acquaintance__h3__right]' value='<?php echo $options['acquaintance__h3__right']; ?>'></h3>
							<textarea class="form-control transp white row3" name='okHall_settings[acquaintance__text__right]'><?php echo $options['acquaintance__text__right']; ?></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="row acquaintance__img">
				<div class="col-lg-4 text-center">
					<p class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__url__1', $width =60, $height = 60 ); ?></p>
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[acquaintance__img__item__1]' value='<?php echo $options['acquaintance__img__item__1']; ?>'></p>
				</div>
				<div class="col-lg-4 text-center">
					<p class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__url__2', $width =60, $height = 60 ); ?></p>
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[acquaintance__img__item__2]' value='<?php echo $options['acquaintance__img__item__2']; ?>'></p>
				</div>
				<div class="col-lg-4 text-center">
					<p class="text-center pb-3"><?php arthur_image_uploader( 'acquaintance__img__url__3', $width =60, $height = 60 ); ?></p>
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[acquaintance__img__item__3]' value='<?php echo $options['acquaintance__img__item__3']; ?>'></p>
				</div>
			</div>

			<div class="row acquaintance__text">
				<div class="col"><input type='text' class="form-control blc text-center" name='okHall_settings[acquaintance__text__bottom]' value='<?php echo $options['acquaintance__text__bottom']; ?>'></div>
			</div>

		</div>
	</section>
	
	<section id="price" class="price" style="background-image:url('<?php echo $options['price__bg__img']; ?>')">
		<div class="container">
			<p style="position: relative;">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:<br>
			<input type='text' class="form-control blc" name='okHall_settings[price__bg__img]' value='<?php echo $options['price__bg__img']; ?>'></p>
			
			<div class="introHolder blue">
				<h2>
					<input type='text' class="text-center form-control blc" name='okHall_settings[price__h2__intro]' value='<?php echo $options['price__h2__intro']; ?>'>
				</h2>
				<p>
					<input type='text' class="text-center form-control blc" name='okHall_settings[price__p__intro]' value='<?php echo $options['price__p__intro']; ?>'>
				</p>
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
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b1__h1]' value='<?php echo $options['price__b1__h1']; ?>'>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b1__h2]' value='<?php echo $options['price__b1__h2']; ?>'>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b1__h3]' value='<?php echo $options['price__b1__h3']; ?>'>
					</div>

					<div class="price__center">
						<ul>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b1__c1]' value='<?php echo $options['price__b1__c1']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b1__c2]' value='<?php echo $options['price__b1__c2']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b1__c3]' value='<?php echo $options['price__b1__c3']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b1__c4]' value='<?php echo $options['price__b1__c4']; ?>'></li>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<li>
								<?php arthur_image_uploader( 'price__b1__n1', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b1]' value='<?php echo $options['price__b1__b1']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n2', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b2]' value='<?php echo $options['price__b1__b2']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n3', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b3]' value='<?php echo $options['price__b1__b3']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n4', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b4]' value='<?php echo $options['price__b1__b4']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n5', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b5]' value='<?php echo $options['price__b1__b5']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n6', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b6]' value='<?php echo $options['price__b1__b6']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n7', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b7]' value='<?php echo $options['price__b1__b7']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n8', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b8]' value='<?php echo $options['price__b1__b8']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n9', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b9]' value='<?php echo $options['price__b1__b9']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n10', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b10]' value='<?php echo $options['price__b1__b10']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n11', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b11]' value='<?php echo $options['price__b1__b11']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b1__n12', $width = 30, $height = 30 ); ?>
								<input type='text'  class="form-control blc" name='okHall_settings[price__b1__b12]' value='<?php echo $options['price__b1__b12']; ?>'>
							</li>
						</ul>
						<div class="introHolder">
							<a class="btn btn-accent">Рассчитать стоимость</a>
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
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b2__h1]' value='<?php echo $options['price__b2__h1']; ?>'>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b2__h2]' value='<?php echo $options['price__b2__h2']; ?>'>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b2__h3]' value='<?php echo $options['price__b2__h3']; ?>'>
					</div>

					<div class="price__center">
						<ul>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b2__c1]' value='<?php echo $options['price__b2__c1']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b2__c2]' value='<?php echo $options['price__b2__c2']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b2__c3]' value='<?php echo $options['price__b2__c3']; ?>'></li>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<li>
								<?php arthur_image_uploader( 'price__b2__n1', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b1]' value='<?php echo $options['price__b2__b1']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n2', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b2]' value='<?php echo $options['price__b2__b2']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n3', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b3]' value='<?php echo $options['price__b2__b3']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n4', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b4]' value='<?php echo $options['price__b2__b4']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n5', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b5]' value='<?php echo $options['price__b2__b5']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n6', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b6]' value='<?php echo $options['price__b2__b6']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n7', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b7]' value='<?php echo $options['price__b2__b7']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n8', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b8]' value='<?php echo $options['price__b2__b8']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b2__n9', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b2__b9]' value='<?php echo $options['price__b2__b9']; ?>'>
							</li>
						</ul>
						<div class="introHolder">
							<a class="btn btn-accent">Рассчитать стоимость</a>
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
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b3__h1]' value='<?php echo $options['price__b3__h1']; ?>'>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b3__h2]' value='<?php echo $options['price__b3__h2']; ?>'>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[price__b3__h3]' value='<?php echo $options['price__b3__h3']; ?>'>
					</div>

					<div class="price__center">
						<ul>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b3__c1]' value='<?php echo $options['price__b3__c1']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b3__c2]' value='<?php echo $options['price__b3__c2']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b3__c3]' value='<?php echo $options['price__b3__c3']; ?>'></li>
							<li><input type='text' class="form-control blc" name='okHall_settings[price__b3__c4]' value='<?php echo $options['price__b3__c4']; ?>'></li>
						</ul>
					</div>

					<div class="price__bottom">
						<ul>
							<li>
								<?php arthur_image_uploader( 'price__b3__n1', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b1]' value='<?php echo $options['price__b3__b1']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n2', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b2]' value='<?php echo $options['price__b3__b2']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n3', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b3]' value='<?php echo $options['price__b3__b3']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n4', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b4]' value='<?php echo $options['price__b3__b4']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n5', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b5]' value='<?php echo $options['price__b3__b5']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n6', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b6]' value='<?php echo $options['price__b3__b6']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n7', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b7]' value='<?php echo $options['price__b3__b7']; ?>'>
							</li>
							<li>
								<?php arthur_image_uploader( 'price__b3__n8', $width = 30, $height = 30 ); ?>
								<input type='text' class="form-control blc" name='okHall_settings[price__b3__b8]' value='<?php echo $options['price__b3__b8']; ?>'>
							</li>
						</ul>
						<div class="introHolder">
							<a class="btn btn-accent">Рассчитать стоимость</a>
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
			<p style="color:#fff">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</p>
			<input type='text' class="form-control transp white" name='okHall_settings[banner__bg__img]' value='<?php echo $options['banner__bg__img']; ?>'>
			<br><br>
			<div class="row yellowHolder">
				<div class="col-md-8 yellowHolder__left">
					<p>
						<span><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__p__intro]' value='<?php echo $options['banner__p__intro']; ?>'></span>
					</p>
					<h2>
						<input type='text' class="text-center form-control transp white" name='okHall_settings[banner__h2__intro]' value='<?php echo $options['banner__h2__intro']; ?>'>
					</h2>
				</div>
				<div class="col yellowHolder__right">
					<p class="yellowHolder__right__text"><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__right__text]' value='<?php echo $options['banner__right__text']; ?>'></p>
					<p class="yellowHolder__right__total"><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__right__text__price]' value='<?php echo $options['banner__right__text__price']; ?>'></p>
				</div>
			</div>

			<div class="row no-gutters banner__list">
				<div class="col-md-4">
					<ul>
						<li><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__list__1]' value='<?php echo $options['banner__banner__list__1']; ?>'></li>
						<li><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__list__2]' value='<?php echo $options['banner__banner__list__2']; ?>'></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__list__3]' value='<?php echo $options['banner__banner__list__3']; ?>'></li>
						<li><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__list__4]' value='<?php echo $options['banner__banner__list__4']; ?>'></li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul>
						<li><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__list__5]' value='<?php echo $options['banner__banner__list__5']; ?>'></li>
						<li><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__list__6]' value='<?php echo $options['banner__banner__list__6']; ?>'></li>
					</ul>
				</div>
			</div>

			<div class="row no-gutters banner__click">
				<div class="col-12">
					<p><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__banner__click]' value='<?php echo $options['banner__banner__click']; ?>'></p>
				</div>
				<br><br>
				<div class="col-12 introHolder  text-center">
					<div class="row">
						<div class="col col-md-4 offset-md-4"><a href="" class="btn btn-accent">Оставить заявку</a></div>
					</div>
					<div class="row">
						<div class="col col-md-4 offset-md-4"><a href="" class="download">Скачать пример</a></div>
					</div>
					<div class="row">
						<div class="col col-md-4 offset-md-4"><input type='text' class="text-center form-control transp white" name='okHall_settings[banner__btn__2]' value='<?php echo $options['banner__btn__2']; ?>' placeholder="Адрес ссылки"></p></div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-10 offset-1 col-lg-6 offset-lg-3 text-center">

					<div class="modal-content okhall">
						
						<p><b><input type='text' class="form-control blc text-center"  name='okHall_settings[banner__modal__p__intro]' value='<?php echo $options['banner__modal__p__intro']; ?>'></b></p>
						<textarea class="form-control blc fwnorm row2"  name='okHall_settings[banner__modal__text]'><?php echo $options['banner__modal__text']; ?></textarea>

					</div>
				</div>
			</div>
			<br><br>
		</div>
	</section>
	

	<section id="stp" class="staps" style="background-image:url('<?php echo $options['staps__bg__img']; ?>')">
		<div class="container">
			<p style="color:#fff">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</p>
			<input type='text' class="form-control transp white" name='okHall_settings[staps__bg__img]' value='<?php echo $options['staps__bg__img']; ?>'>
			<br><br>
			<div class="introHolder">
				<h2>
					<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__h2__intro]' value='<?php echo $options['staps__h2__intro']; ?>'>
				</h2>
			</div>

			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[staps__01__num]' value='<?php echo $options['staps__01__num']; ?>'></p>
						<hr>
					</div>
					<p class="staps__name">
						<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__01__name]' value='<?php echo $options['staps__01__name']; ?>'>
					</p>
					<p>
						<textarea class="form-control transp white row2" name='okHall_settings[staps__01__text]'><?php echo $options['staps__01__text']; ?></textarea>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[staps__02__num]' value='<?php echo $options['staps__02__num']; ?>'></p>
						<hr>
					</div>
					<p class="staps__name">
						<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__02__name]' value='<?php echo $options['staps__02__name']; ?>'>
					</p>
					<p>
						<textarea class="form-control transp white row2" name='okHall_settings[staps__02__text]'><?php echo $options['staps__02__text']; ?></textarea>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[staps__03__num]' value='<?php echo $options['staps__03__num']; ?>'></p>
						<hr>
					</div>
					<p class="staps__name">
						<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__03__name]' value='<?php echo $options['staps__03__name']; ?>'>
					</p>
					<p>
						<textarea class="form-control transp white row2" name='okHall_settings[staps__03__text]'><?php echo $options['staps__03__text']; ?></textarea>
					</p>
				</div>
			
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[staps__04__num]' value='<?php echo $options['staps__04__num']; ?>'></p>
						<hr>
					</div>
					<p class="staps__name">
						<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__04__name]' value='<?php echo $options['staps__04__name']; ?>'>
					</p>
					<p>
						<textarea class="form-control transp white row2" name='okHall_settings[staps__04__text]'><?php echo $options['staps__04__text']; ?></textarea>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[staps__05__num]' value='<?php echo $options['staps__05__num']; ?>'></p>
						<hr>
					</div>
					<p class="staps__name">
						<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__05__name]' value='<?php echo $options['staps__05__name']; ?>'>
					</p>
					<p>
						<textarea class="form-control transp white row2" name='okHall_settings[staps__05__text]'><?php echo $options['staps__05__text']; ?></textarea>
					</p>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="staps__num">
						<p><input type='text' class="text-center form-control transp white" name='okHall_settings[staps__06__num]' value='<?php echo $options['staps__06__num']; ?>'></p>
					</div>
					<p class="staps__name">
						<input type='text' class="text-center form-control transp white" name='okHall_settings[staps__06__name]' value='<?php echo $options['staps__06__name']; ?>'>
					</p>
					<p>
						<textarea class="form-control transp white row2" name='okHall_settings[staps__06__text]'><?php echo $options['staps__06__text']; ?></textarea>
					</p>
				</div>
			</div>

		</div>
	</section>

	<section id="aft" class="after" style="background-image:url('<?php echo $options['after__bg__img']; ?>')">
		<div class="container">
			<p style="color:#fff">Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</p>
			<input type='text' class="form-control transp white" name='okHall_settings[after__bg__img]' value='<?php echo $options['after__bg__img']; ?>'>
			<br><br>
			<div class="introHolder">
				<h2>
					<input type='text' class="form-control text-center transp white" name='okHall_settings[after__h2__intro]' value='<?php echo $options['after__h2__intro']; ?>'>
				</h2>
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

				
				<div class="row align-items-center">
					<p>Ссылка на ФОНОВОЕ ИЗОБРАЖЕНИЕ:</p>
					<input type='text' class="form-control blc" name='okHall_settings[operator__bg__img]' value='<?php echo $options['operator__bg__img']; ?>'>
				
					<div class="col-md-6">
						<h2>
							<input type='text' class="form-control text-center blc" name='okHall_settings[operator__h2__intro]' value='<?php echo $options['operator__h2__intro']; ?>'>
						</h2>
					</div>
					<div class="col-md-6">
						<ul>
							<textarea class="form-control blc fwnorm row1" name='okHall_settings[operator__ul_intro]'><?php echo $options['operator__ul_intro']; ?></textarea>
						</ul>
					</div>
				</div>

			</div>
		</div>

		<div class="operator__text">
			<div class="container">

				<div class="row">
					<div class="col-md-6">
						<h4>
							<input type='text' class="form-control text-center blc" name='okHall_settings[operator__text__h4]' value='<?php echo $options['operator__text__h4']; ?>'>
						</h4>
						<p class="phone">
							<input type='text' class="form-control text-center blc" name='okHall_settings[operator__text__phone]' value='<?php echo $options['operator__text__phone']; ?>'>
						</p>
						<p>
							<input type='text' class="form-control text-center blc" name='okHall_settings[operator__text__p]' value='<?php echo $options['operator__text__p']; ?>'>
						</p>
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

	    <?php
	        settings_fields( 'okHallCustom' );
	        do_settings_sections( 'okHallCustom' );
	        submit_button('Сохранить');
	    ?>
    </form>


<?php }