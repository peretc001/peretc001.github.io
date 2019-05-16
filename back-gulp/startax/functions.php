<?php

add_action('after_setup_theme', 'theme_setup');
if(!function_exists('theme_setup')):

function coolwp_remove_open_sans_from_wp_core(){
	wp_deregister_style('open-sans');
	wp_register_style('open-sans', false);
	wp_enqueue_style('open-sans','');
}
add_action('init', 'coolwp_remove_open_sans_from_wp_core');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// https://www.role-editor.com/remove-main-text-editor-field-woocommerce-product-edit-page/
/*function remove_product_editor(){
	remove_post_type_support( 'product', 'editor' );
}
add_action( 'init', 'remove_product_editor' );*/

/*add_filter( 'woocommerce_product_subcategories_hide_empty', 'show_empty_categories', 10, 1 );
function show_empty_categories ( $show_empty ) {
    $show_empty  =  true;
    return $show_empty;
}*/

/*function so_26720687_keep_session_on_logout(){
	remove_action( 'clear_auth_cookie', array( WC()->session, 'destroy_session' ) );
} 
add_action( 'woocommerce_loaded', 'so_26720687_keep_session_on_logout' );*/


////////////////////////////////////////////
function search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', 'product' );
		$query->is_archive = true;
		$query->is_post_type_archive = true;
	}
	return $query;
}
add_filter( 'pre_get_posts', 'search_filter' );
////////////////////////////////////////////

/* Настройки темы */
function startax_theme_customizer($wp_customize){
	
	/* Логотип */
	$wp_customize->add_section( 'logo_section' , array(
		'title'       => __('Логотип','startax'),
		'priority'    => 0,
	));
	$wp_customize->add_setting( 'logo', array(
		'default'      => '',
        'transport'    => 'postMessage'
    ));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label'    => '',
		'section'  => 'logo_section',
		'settings' => 'logo',
	)));
	
	/* Телефон */
	$wp_customize->add_section('startax_phone_section', array(
		'title'       => __('Телефон','startax'),
		'priority'    => 20,
		'description' => '',
	));
	$wp_customize->add_setting('startax_phone');
	$wp_customize->add_control('startax_phone', array(
		'label'      => '',
		'section'    => 'startax_phone_section',
		'settings'   => 'startax_phone',
    ));
	
	/* Footer address */
	$wp_customize->add_section('startax_address_section', array(
		'title'       => __('Адрес','startax'),
		'priority'    => 40,
		'description' => '',
	));
	$wp_customize->add_setting('startax_address');
	$wp_customize->add_control('startax_address', array(
		'label'      => '',
		'section'    => 'startax_address_section',
		'settings'   => 'startax_address',
		'type' => 'textarea',
    ));
	
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('nav');
}
add_action('customize_register', 'startax_theme_customizer');

function theme_setup(){
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	
	register_nav_menus(array(
		'primary' => __('Главное меню'),
		'footer' => __('Нижнее меню'),
		'categories' => __('Меню категорий'),
	));
}
endif;

// Disable all woocommerce stylesheets
add_filter('woocommerce_enqueue_styles', '__return_empty_array' );

// Remove each style one by one, not working
/*add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	global $post;
	if(!is_page('my-account')){
	if(!is_account_page()){
	if($post->ID!='47'){
		unset($enqueue_styles['woocommerce-general']);	// Remove the gloss
		unset($enqueue_styles['woocommerce-layout']);		// Remove the layout
		unset($enqueue_styles['woocommerce-smallscreen']);	// Remove the smallscreen optimisation
		return $enqueue_styles;
	}
}*/


// Disable woocommerce-products-filter stylesheets
//add_filter( 'enqueue_scripts_styles', '__return_empty_array' );
//remove_action('wp_head','woof');
wp_deregister_style(WOOF_LINK . 'css/front.css');
wp_dequeue_style('woof', WOOF_LINK . 'css/front.css');
wp_dequeue_style('chosen-drop-down', WOOF_LINK . 'js/chosen/chosen.min.css');
wp_dequeue_style('plainoverlay', WOOF_LINK . 'css/plainoverlay.css');

// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

wp_deregister_script('wc-add-to-cart');
wp_register_script('wc-add-to-cart', '/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.js' , array( 'jquery' ), WC_VERSION, TRUE);
wp_enqueue_script('wc-add-to-cart');

/* not working
if(!is_account_page()){
	wp_dequeue_style('woocommerce-general');
	wp_dequeue_style('woocommerce-layout');
	wp_dequeue_style('woocommerce-smallscreen');
}*/


if(function_exists('add_image_size')){
	add_image_size('woocommerce-cart-item-thumb', 170, 108, true);
	add_image_size('product-category-thumb', 270, 194, true);
	add_image_size('product-category', 275, 275, true);
	add_image_size('product-middle-thumb', 570, 547, true);
}

function custom_pagination($numpages = '', $pagerange = '', $paged=''){

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '/page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => false,
    'prev_text'       => __('Предыдущая страница'),
    'next_text'       => __('Следующая страница'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if($paginate_links)echo '<nav class="pagination clearfix wrapper">'.$paginate_links.'</nav>';

}

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2017.01.21
 * лицензия: MIT
*/
function dimox_breadcrumbs($home){
	
  /* === ОПЦИИ === */
  
  if($home && $home!=''){
	  $text['home'] = esc_attr($home);
  }else{
	  $text['home'] = 'Главная';
  }
  
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><div class="container">'; // открывающий тег обертки
  $wrap_after = '</div></div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '/'; // разделитель между "крошками"
  $sep_before = '<span class="delimiter">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 1; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          //case 'UAH': $currency_symbol = 'грн.'; break;
		  case 'RUB': $currency_symbol = 'руб.'; break;
     }
     return $currency_symbol;
}

// Делаем поля необязательными
/*add_filter('woocommerce_default_address_fields' , 'custom_override_default_address_fields');
function custom_override_default_address_fields($address_fields) {
	//print_r($address_fields);
	$address_fields['last_name']['required'] = 0;
	$address_fields['address_1']['required'] = 1;
	$address_fields['address_2']['required'] = 0;
	$address_fields['postcode']['required'] = 0;
	$address_fields['country']['required'] = 0;
	$address_fields['state']['required'] = 0;
	print_r($address_fields);	
	return $address_fields;
}*/

// удаляем ненужные поля при оформлении заказа
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields', 10, 1);
function custom_override_checkout_fields( $fields ){
	
	unset($fields['account']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_address_2']);
	
	$fields['billing']['billing_first_name']['priority'] = 1;
    $fields['billing']['billing_last_name']['priority'] = 2;
    $fields['billing']['billing_country']['priority'] = 3;
	$fields['billing']['billing_city']['priority'] = 4;
	$fields['billing']['billing_address_1']['priority'] = 5;
	$fields['billing']['billing_phone']['priority'] = 120;
	$fields['billing']['billing_email']['priority'] = 140;
	$fields['billing']['billing_company']['priority'] = 160;
	
	/*$fields['billing']['billing_first_name']['label'] = 'Имя и фамилия *';
	$fields['billing']['billing_first_name']['placeholder'] = 'Ваше полное имя';
	$fields['billing']['billing_email']['placeholder'] = 'Укажите Вашу эл. почту';
	
	$fields['billing']['billing_phone']['label'] = 'Телефон *';
	$fields['billing']['billing_phone']['placeholder'] = 'Укажите номер Вашего мобильного телефона';
	$fields['billing']['billing_email']['label'] = 'Email *';
	$fields['billing']['billing_country']['label'] = 'Страна *';
	*/
	$fields['billing']['billing_address_1']['label'] = 'Адрес';
	$fields['billing']['billing_address_1']['required'] = true;
	$fields['billing']['billing_address_1']['placeholder'] = 'Куда доставить товар?';
	
	$fields['billing']['billing_city']['label'] = "Город";
	$fields['billing']['billing_city']['placeholder'] = "Укажите Ваш город";
	$fields['billing']['billing_city']['required'] = true;
	
	$fields['billing']['billing_first_name']['placeholder'] = 'Представьтесь, пожалуйста';
	$fields['billing']['billing_last_name']['placeholder'] = 'Представьтесь, пожалуйста';
	
	$fields['billing']['billing_phone']['placeholder'] = '+7 (499) 555-12-47';
	
	$fields['billing']['billing_email']['billing_email'] = "Город";
	$fields['billing']['billing_email']['placeholder'] = "Ваша электронная почта";
	
	$fields['billing']['billing_company']['label'] = "Компания";
	$fields['billing']['billing_company']['placeholder'] = "Название компании";
	$fields['order']['order_comments']['label'] = 'Комментарий к заказу';
	$fields['order']['order_comments']['placeholder'] = 'Вы можете уточнить детали заказа, до того как с вами свяжется наш менеджер';
	
	$fields['billing']['billing_first_name']['class'][0] = 'form-row-first';
	$fields['billing']['billing_company']['class'][0] = 'form-row-last';
	
	/*$ordering = array(
		"billing_first_name", 
		"billing_last_name", 
		"billing_country", 
		"billing_city", 
		"billing_address_1", 
		"billing_phone"
		"billing_email", 
		"billing_company",
	);
	
	foreach($ordering as $field) {
		$ordered_fields[$field] = $fields["billing"][$field];
		}
	$fields["billing"] = $ordered_fields;*/
	
	return $fields;
}

/*wp_deregister_script('woocommerce_admin', WC()->plugin_url() . '/assets/js/admin/woocommerce_admin' . $suffix . '.js', array( 'jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip' ), WC_VERSION );
wp_dequeue_script('woocommerce_admin', WC()->plugin_url() . '/assets/js/admin/woocommerce_admin' . $suffix . '.js', array( 'jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip' ), WC_VERSION );*/

function load_custom_wp_admin_style() {
	//wp_deregister_script('woocommerce_admin');
	//wp_dequeue_script('woocommerce_admin');
	wp_deregister_script('woocommerce_admin', WC()->plugin_url() . '/assets/js/admin/woocommerce_admin' . $suffix . '.js', array( 'jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip' ), WC_VERSION );
	wp_dequeue_script('woocommerce_admin', WC()->plugin_url() . '/assets/js/admin/woocommerce_admin' . $suffix . '.js', array( 'jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip' ), WC_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style', 99, 1);

add_filter('gettext', 'change_backend_product_regular_price', 100, 3 );
function change_backend_product_regular_price( $translated_text, $text, $domain ) {
	global $pagenow;
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'Regular price' === $text  ){
		$translated_text =  __( 'Розница', $domain );
	}
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'Sale price' === $text  ){
		$translated_text =  __( 'Оптовая цена', $domain );
	}
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'opt1' === $text  ){
		$translated_text =  __( 'Опт 1', $domain );
	}
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'netcost' === $text  ){
		$translated_text =  __( 'Себестоимость', $domain );
	}
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'retail' === $text  ){
		$translated_text =  __( 'Розница', $domain );
	}
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'opt2' === $text  ){
		$translated_text =  __( 'Опт 2', $domain );
	}
	
	if ( is_admin() && 'woocommerce' === $domain && 'post.php' === $pagenow && isset( $_GET['post'] ) && 'product' === get_post_type( $_GET['post'] ) && 'opt3' === $text  ){
		$translated_text =  __( 'Опт 3', $domain );
	}
	
	return $translated_text;
}

// Disable AJAX on checkout
//function so_27023433_disable_checkout_script(){
    //wp_dequeue_script( 'wc-checkout' );
//}
//add_action( 'wp_enqueue_scripts', 'so_27023433_disable_checkout_script' );

// Wordpress Ajax: Get different cart items count
add_action( 'wp_ajax_nopriv_checking_cart_items', 'checking_cart_items' );
add_action( 'wp_ajax_checking_cart_items', 'checking_cart_items' );
function checking_cart_items(){
	if( isset($_POST['added']) ){
		//echo json_encode( sizeof( WC()->cart->get_cart() ) );
		$output_mini_cart='';
		global $woocommerce;
		
		$cart_url = $woocommerce->cart->get_cart_url();
		//print_r(WC()->cart);
		$count = WC()->cart->cart_contents_count;
		$total = WC()->cart->total;
		
		$output_count = 0;
		
		if($count > 0 ){
			$output_count = esc_html($count);
		}
		
		$output_mini_cart .= '<a class="cart icon icon-basket" href="'.$cart_url.'"><span class="count">'.$output_count.'</span><strong>'.esc_html($total).' р.</strong></a>';
		echo $output_mini_cart;
	}
	die();
}

function startax_update_mini_cart() {
	echo wc_get_template( 'cart/mini-cart.php' );
	die();
}
add_filter('wp_ajax_nopriv_startax_update_mini_cart', 'startax_update_mini_cart' );
add_filter('wp_ajax_startax_update_mini_cart', 'startax_update_mini_cart' );

function overwrite_shortcode_custom(){
	function override_recent_products_shortcode( $atts ) {
		global $post, $wp_locale;
		$atts = array_merge( array(
			'limit'        => '12',
			'columns'      => '4',
			'orderby'      => 'date',
			'order'        => 'DESC',
			'category'     => '',
			'cat_operator' => 'IN',
		), (array) $atts );
		
		
		//print_r($atts);
		//  Array ( [limit] => 12 [columns] => 4 [orderby] => date [order] => DESC [category] => [cat_operator] => IN [per_page] => 40 ) 

		//$shortcode = new WC_Shortcode_Products( $atts, 'recent_products' );
		
		if (array_key_exists('per_page', $atts)) {
			//echo "Массив содержит элемент 'per_page'.";
			$atts['posts_per_page'] = $atts['per_page'];
		}
		
		$products = wc_get_products($atts);
				$i=0;
				if($products): ?>
				
				<ul class="list-products">
				
				<?php
				foreach ( $products as $product) : $i++;
				
					//if($i==1)print_r($product);
				
				?>
				<li id="id-<?php echo $product->id; ?>">
					<a href="<?php echo esc_url(get_permalink($product->id)); ?>"><?php if (has_post_thumbnail($product->id)) echo get_the_post_thumbnail($product->id, 'product-category-thumb', array( 'class' => 'lazyload')); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="270" height="194" class="lazyload" />'; ?></a>
					<div class="product-wrap">
						<div class="product-title"><a href="<?php echo esc_url(get_permalink($product->id)); ?>"><?php echo $product->name; ?></a></div>
						<div class="product-sku">Артикул: <?php echo $product->sku; ?></div>
						<div class="product-in-stock">
							<span>Наличие:</span>
							<?php
								if($product->stock_status == 'instock'){
									print '<span class="green">На складе</span>';
								}else{
									print '<span class="red">Нет в наличии</span>';
								}
							?>
						</div>
						
						<?php echo $product->get_price_html(); ?>
						
						<form action="<?php echo do_shortcode('[add_to_cart_url id="'.$product->id.'"]'); ?>" class="cart" method="post" enctype="multipart/form-data">
							<div class="number-input">
								<button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;">-</button>
								<?php woocommerce_quantity_input( array('min_value' => 1, 'max_value' => 10000), $product, true ); ?>
								<button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;" class="plus">+</button>
							</div>
							<button onclick="var qnty = this.parentNode.querySelector('input[type=number]').value; this.setAttribute('data-quantity', qnty); return false;" data-quantity="1" data-product_id="<?php echo $product->id; ?>" type="submit" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Добавить</button>
						</form>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>
				
		
	<?php
		//return $shortcode->get_content();
	}
	remove_shortcode('recent_products');
	add_shortcode( 'recent_products', 'override_recent_products_shortcode' );
}
add_action( 'wp_loaded', 'overwrite_shortcode_custom' );




function my_meta_price($price, $product){
	global $post, $woocommerce;
	$new_price = $price;
	$product_id = $product->id;
	if(is_user_logged_in()){
		$meta = get_user_meta(get_current_user_id(), 'startax_pricecode', true);
		if(!empty($meta) || $meta > 0){
			$meta_price = get_post_meta($product_id, '_price_'.$meta, true);
			if(!empty($meta_price)){
				$new_price = $meta_price;
			}
		}
	}
	return $new_price;
}
add_filter('woocommerce_product_get_price', 'my_meta_price', $product, 2);

add_filter('woocommerce_get_price_html', 'customer_price_html', 100, 2);
function customer_price_html($price, $product){
	$price_html = '';
	$meta = '';
	$price_retail = get_post_meta($product->id, '_regular_price', true);
	$new_price = $price_retail;
	$meta = get_user_meta(get_current_user_id(), 'startax_pricecode', true);
	if(!empty($meta)){
		$meta_price = get_post_meta($product->id, '_price_'.$meta, true);
		if(!empty($meta_price)){
			$new_price = $meta_price;
		}
	}else{
		$new_price = get_post_meta($product->id, '_price_000000006', true);
	}
	
	$price_html = '<span class="product-retail-price">Розница: '.$price_retail.'&nbsp;'.get_woocommerce_currency_symbol().'</span>&nbsp;<span class="woocommerce-Price-amount amount">'.$new_price.'&nbsp;<span class="woocommerce-Price-currencySymbol">'.get_woocommerce_currency_symbol().'</span></span>';
	
	return $price_html;
}

class List_Category_Images extends Walker_Category {
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		$image_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
		//echo $image_id.'<br>';
		
		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);
		
		$link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
		if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}
		
		$link .= '>';
		if(!empty($image_id) && $image_id > 0){
			$cat_thumbnail_img = wp_get_attachment_image_src($image_id, 'full');
			$link .= '<img src="'.$cat_thumbnail_img[0].'" alt="'.esc_attr($category->name).'" title="'.esc_attr($category->name).'">';
		}
		$link .= '</a><div class="category-name"><strong>'.$cat_name.'</strong></div>';
		
		if ( ! empty( $args['show_count'] ) ) {
			$link .= ' (' . number_format_i18n( $category->count ) . ')';
		}
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( ! empty( $args['current_category'] ) ) {
				$_current_category = get_term( $args['current_category'], $category->taxonomy );
				if ( $category->term_id == $args['current_category'] ) {
					$class .=  ' current-cat';
				} elseif ( $category->term_id == $_current_category->parent ) {
					$class .=  ' current-cat-parent';
				}
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



?>