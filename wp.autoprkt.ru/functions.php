<?php

//Включаем миниатюры	
add_theme_support( 'post-thumbnails' );

//Jquery migrate
function remove_jq_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
	$script = $scripts->registered['jquery'];
	if ( $script->deps ) {
	$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
	}
	}
}
add_action( 'wp_default_scripts', 'remove_jq_migrate' );
//Delete всякую хрень
remove_action('wp_head','jquery', 1); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress

remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );

remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0 );

remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_oembed_add_discovery_links' );
remove_action('wp_head', 'wp_oembed_add_host_js' );
remove_action('wp_print_styles', 'print_emoji_styles');
function remove_block_css(){
wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

 
function deregister_cf7_styles() {
    if ( !is_page(array(25,45)) ) {
        wp_deregister_style('contact-form-7');
    }
}
add_action('wp_print_styles', 'deregister_cf7_styles', 100); 

//Add my styles and scripts
	add_action( 'get_footer', 'my_scripts');
	function my_scripts() {
		wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', false, null, all);
		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css', false, null, all);
		wp_enqueue_style( 'hamburgers', get_stylesheet_directory_uri() . '/css/hamburgers.min.css', false, null, all );
		wp_enqueue_style( 'contact-form-7', plugins_url( '/contact-form-7/includes/css/styles.css' ), false, null, all );
		wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.min.css', false, time(), all );

		//Переподключаем JQUERY в footer
		wp_deregister_script('jquery');
		wp_register_script( 'jquery', includes_url( 'js/jquery/jquery.js' ), false, null, true );
		wp_register_script( 'poper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', 'jquery', null, true);
		wp_register_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', 'jquery', null, true);
		wp_register_script( 'myscript', get_stylesheet_directory_uri() . '/js/script.js', 'jquery', time(), true);
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'poper' );
		wp_enqueue_script( 'bootstrap_js' );
		wp_enqueue_script( 'myscript' );
	}


//ADMINBAR
	//add_filter( 'show_admin_bar', '__return_false');
	#add_action( 'wp_footer', 'admin_bar');

	//function admin_bar() { echo '<style>#wpadminbar {opacity:.1;} #wpadminbar:hover {opacity:1;}</style>';  }


//Add menu into admin
	register_nav_menus(array(
			'top_menu' => 'Верхнее меню',
			'center_menu' => 'Центральное меню',
			'category_menu' => 'Рубрики'
		)
	);

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
		$classes[] = 'nav-item';

		//$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
		
		// Добавляем класс к li
		#$class_names = $item->current ? ' class="nav-item current-menu-item" ' : '';
		#$output .= $indent . '<li' . $class_names .'>';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		#$id = apply_filters( 'nav_menu_item_id', 'nav-item-' . $item->ID, $item, $args, $depth );
		#$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $class_names . '>';


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
		
		
		//Добавляем класс к ссылке a вместо data-atr
		$attributes = ' class="nav-link"';
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
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

## Функция для подсветки слов поиска в WordPress
add_filter('the_content', 'kama_search_backlight');
add_filter('the_excerpt', 'kama_search_backlight');
add_filter('the_title', 'kama_search_backlight');
function kama_search_backlight( $text ){
	// ------------ Настройки -----------
	

	// только для страниц поиска...
	if( ! is_search() ) {
		return $text;
	} 
	
	$query_terms = get_query_var('search_terms');
	if( empty($query_terms) ) $query_terms = array(get_query_var('s'));
	if( empty($query_terms) ) return $text;

	$n = 0;
	foreach( $query_terms as $term ){
		$n++;

		$term = preg_quote( $term, '/' );
		$text = preg_replace_callback( "/$term/iu", function($match) use ($n){
			if( is_admin() ) {
				return $match[0];
			} else {
				return '<u class="search_term">'. $match[0] .'</u>';
			}
		}, $text );
	}

	return $text;
}

/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
$who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}

#Сортировка ПОИСКА
function my_search_order( $query ) {
    if ($query->is_search) {
  $query->set( 'order', 'DESC' );
        $query->set( 'orderby', 'date' );
    };
    return $query;
};
add_filter( 'pre_get_posts', 'my_search_order' );




// Hook for adding admin menus
add_action('admin_menu', 'optimazed_add_pages');
 
// action function for above hook
function optimazed_add_pages() {
    add_menu_page('Соц. сети', 'Соц. сети', 8, __FILE__, 'optimazed_page', 'dashicons-twitter', 84.5);
    register_setting( 'optimazedCustom', 'optimazed_settings' ); 
}
 
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function optimazed_page() { 
	
	$options = get_option( 'optimazed_settings' );
?>
    <link rel='stylesheet' id='bootstrap-css'  href='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' type='text/css' media='all' />
   <form action='options.php' method='post'>

   	<section class="mt-3">
   		<div class="container">
	   		<div class="text-center">
	   			<h2>Социальные сети</h2>
	   		</div>

	   		<div class="row">
	   			<div class="col-md-4 text-center">
	   				<label for="optimazed__vk">ВК</label>
	   				<input id="optimazed__vk" type='text' class="form-control text-center mb-2"  name='optimazed_settings[vk]' value='<?php echo $options['vk']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="optimazed__fb">Facebook</label>
	   				<input id="optimazed__fb" type='text' class="form-control text-center mb-2"  name='optimazed_settings[fb]' value='<?php echo $options['fb']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center">
	   				<label for="optimazed_tw">Twitter</label>
	   				<input id="optimazed_tw" type='text' class="form-control text-center mb-2"  name='optimazed_settings[tw]' value='<?php echo $options['tw']; ?>'>
	   			</div>
	   		</div>

   		</div>
	   </section>
	   
	   <?php
	        settings_fields( 'optimazedCustom' );
	        do_settings_sections( 'optimazedCustom' );
	        submit_button('Сохранить');
	    ?>
	</form>
<?php }