<?php
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
function remove_block_css(){
wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

//Add my styles and scripts
	add_action( 'get_footer', 'my_scripts');
	function my_scripts() {
		wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', false, null, all);
		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css', false, null, all);
		wp_enqueue_style( 'hamburgers', get_stylesheet_directory_uri() . '/css/hamburgers.min.css', false, null, all );
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