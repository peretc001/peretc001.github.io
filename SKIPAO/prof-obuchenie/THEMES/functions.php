<?php
function optimazed_scripts() {
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css', array(), null );
	wp_enqueue_style( 'skipao-style', get_template_directory_uri() . '/css/main.min.css', array(), time() );
	
	wp_deregister_script('jquery');
	//wp_register_script( 'jquery', includes_url( 'js/jquery/jquery.js' ), false, null, true );
	//wp_enqueue_script( 'jquery' );

	//wp_enqueue_script( 'optimazed-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1', true );
	//wp_enqueue_script( 'optimazed-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '1', true );
	wp_enqueue_script( 'skipao-js', get_template_directory_uri() . '/js/script.js', array(), time(), true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', array(), null, true );
}
add_action( 'wp_footer', 'optimazed_scripts' );

function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('optimazed-progressbar', 'optimazed-custom');
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

//ADMINBAR
	//add_filter( 'show_admin_bar', '__return_false');
	#add_action( 'wp_footer', 'admin_bar');

	//function admin_bar() { echo '<style>#wpadminbar {opacity:.1;} #wpadminbar:hover {opacity:1;}</style>';  }

//Add menu into admin
register_nav_menus(array(
		'main_menu' => 'Главное меню',
	)
);

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

//Walkers
class Optimazed_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = $item->current ? ' class="nav-item current-menu-item" ' : ' class="nav-item"';
		$output .= $indent . '<li' . $class_names .'>';


		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a class="nav-link" '. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/* --------------- Защита ----------------*/

remove_action( 'wp_head', 'wp_resource_hints', 2 ); //dns-prefetch
//Убираем text/javascript
add_action( 'template_redirect', function(){
	ob_start( function( $buffer ){
		 $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
		 $buffer = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );
		 return $buffer;
	});
});
/* --------------------------------------------------------------------------
 * Отключаем Emojii
 * -------------------------------------------------------------------------- */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
/* --------------------------------------------------------------------------- */
// Удаляем код meta name="generator"
remove_action( 'wp_head', 'wp_generator' );
// Удаляем link rel="canonical" // Этот тег лучше выводить с помощью плагина Yoast SEO или All In One SEO Pack
remove_action( 'wp_head', 'rel_canonical' );
// Удаляем link rel="shortlink" - короткую ссылку на текущую страницу
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); 
// Удаляем link rel="EditURI" type="application/rsd+xml" title="RSD"
// Используется для сервиса Really Simple Discovery 
remove_action( 'wp_head', 'rsd_link' ); 
// Удаляем link rel="wlwmanifest" type="application/wlwmanifest+xml"
// Используется Windows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' );
// Удаляем различные ссылки link rel
// на главную страницу
remove_action( 'wp_head', 'index_rel_link' ); 
// на первую запись
remove_action( 'wp_head', 'start_post_rel_link', 10 );  
// на предыдущую запись
remove_action( 'wp_head', 'parent_post_rel_link', 10 ); 
// на следующую запись
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
// Удаляем связь с родительской записью
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); 
// Удаляем вывод /feed/
remove_action( 'wp_head', 'feed_links', 2 );
// Удаляем вывод /feed/ для записей, категорий, тегов и подобного
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Удаляем ненужный css плагина WP-PageNavi
remove_action( 'wp_head', 'pagenavi_css' );

//Disable gutenberg style in Front
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
//Закрываем REST API не авторизованным пользвователям
add_filter( 'rest_authentication_errors', function( $result ) {
	// maybe authentication error already set
	if ( empty( $result ) ){
		if ( ! is_user_logged_in() ) 
			wp_redirect( home_url(), 301 );
	}
	return $result;
});
//И удаляем ссылки
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); 
remove_action( 'wp_head', 'rest_output_link_wp_head' ); 
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );


//Удаляем страницы автора
add_action( 'template_redirect', 'author_archive_redirect' );
add_filter( 'author_link', 'remove_author_pages_link' );

// редиректим на главную со страниц авторов
function author_archive_redirect() {
   if( is_author() ) {
	   wp_redirect( home_url(), 301 );
	   exit;
   }
}

// удаляем ссылку
function remove_author_pages_link( $content ) {
	return home_url();
}

// Отключение rss-ленты
function fb_disable_feed() {
	wp_redirect(home_url());
}

add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );

//Убираем wp-embed
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

//Переадресация со сладеров
add_action( 'template_redirect', function() {
	if( is_page(55) ){
		wp_redirect( home_url() );
		exit;
	}
} );


// Hook for adding admin menus
add_action('admin_menu', 'skipao_add_pages');
 
// action function for above hook
function skipao_add_pages() {
    add_menu_page('КОМПАНИЯ', 'КОМПАНИЯ', 8, __FILE__, 'skipao_page', 'dashicons-twitter', 84.5);
    register_setting( 'skipaoCustom', 'skipao_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function skipao_page() { 
	
	$options = get_option( 'skipao_settings' );
?>
    <link rel='stylesheet' id='bootstrap-css'  href='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' type='text/css' media='all' />
   <form action='options.php' method='post'>

   	<section class="mt-3">
   		<div class="container">
	   		<div class="text-center">
	   			<h2>НАСТРОЙКИ КОМПАНИИ</h2>
	   		</div>

	   		<div class="row">
	   			<div class="col-md-4 text-center">
	   				<label for="skipao__phone">Телефон</label>
	   				<input id="skipao__phone" type='text' class="form-control text-center mb-2"  name='skipao_settings[phone]' value='<?php echo $options['phone']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="skipao__whatsapp">Номер whatsapp</label>
	   				<input id="skipao__whatsapp" type='text' class="form-control text-center mb-2"  name='skipao_settings[whatsapp]' value='<?php echo $options['whatsapp']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="skipao__insta">Instagram</label>
	   				<input id="skipao__insta" type='text' class="form-control text-center mb-2"  name='skipao_settings[insta]' value='<?php echo $options['insta']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="skipao__city">Город</label>
	   				<input id="skipao__city" type='text' class="form-control text-center mb-2"  name='skipao_settings[city]' value='<?php echo $options['city']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="skipao__adress">Адрес</label>
	   				<input id="skipao__adress" type='text' class="form-control text-center mb-2"  name='skipao_settings[adress]' value='<?php echo $options['adress']; ?>'>
	   			</div>
	   		</div>

   		</div>
	   </section>
	   
	   <?php
	        settings_fields( 'skipaoCustom' );
	        do_settings_sections( 'skipaoCustom' );
	        submit_button('Сохранить');
	    ?>
	</form>
<?php }


//Шорткод карты
function skipao_add_map(){
	 return '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A243cf0479ab602d877238ac90340ca15a4d8a8b6363103bab9ecc86fa14232c7&amp;width=100%25&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>';
}
add_shortcode('map', 'skipao_add_map');

//Удаляем category из УРЛа категорий
add_filter( 'category_link', function($a){
	return str_replace( 'category/', '', $a );
}, 99 );

//Обрезаем анонс
function custom_excerpt_length( $length ) {
	return 20;
	}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
return;
}
add_filter('excerpt_more', 'new_excerpt_more');