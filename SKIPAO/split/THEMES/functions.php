<?php
function skipao_scripts() {
	wp_enqueue_style( 'bootstrap-4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/js/slick/slick.css', array(), null );
	wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.min.css', array(), null );
	wp_enqueue_style( 'skipao-style', get_template_directory_uri() . '/css/main.min.css', array(), time() );
	
	// wp_deregister_script('jquery');
	// wp_register_script( 'jquery', includes_url( 'js/jquery/jquery.js' ), false, null, true );
	// wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'jqmin', '//code.jquery.com/jquery-3.3.1.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'skipao-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'skipao-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '1', true );

	wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.min.js', array('jquery'), null, true );

	wp_enqueue_script( 'skipao-js', get_template_directory_uri() . '/js/script.js', array(), time(), true );
}
add_action( 'wp_enqueue_scripts', 'skipao_scripts' );

function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('skipao-custom');
   
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
// add_action( 'template_redirect', function() {
// 	if( is_page(49) || is_page(70) || is_page(72) || is_page(85)){
// 		wp_redirect( home_url() );
// 		exit;
// 	}
// } );

//Получаем первую картинку поста
function skipao_get_first_img() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); // выдираем первый имагес
	$first_img = $matches [1] [0];
  
 // Если картинка в посте отсутствует, тогда выводим изображение по умолчанию (указать путь и имя к картинке)
	if(empty($first_img)){
	 $first_img = "/img/default.jpg";
	}
	return $first_img;
 }


// Hook for adding admin menus
add_action('admin_menu', 'skipao_add_pages');
 
// action function for above hook
function skipao_add_pages() {
    add_menu_page('КОМПАНИЯ', 'КОМПАНИЯ', 8, __FILE__, 'skipao_page', 'dashicons-twitter', 84.5);
    register_setting( 'skipaoCustom', 'skipao_settings' ); 
}

//Add input file Media
function skipao_image_uploader( $name, $width, $height ) {

	// Set variables
	$options = get_option( 'skipao_settings' );
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
					<input type="hidden" name="skipao_settings[' . $name . ']" id="skipao_settings[' . $name . ']" value="' . $value . '" />
					<button type="submit" class="upload_image_button button">' . $text . '</button>
					<button type="submit" class="remove_image_button button">&times;</button>
			  </div>
		 </div>
	';
}
//Script upload img from WP Media
function true_include_skipao_admin() {
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// само собой - меняем admin.js на название своего файла
 	wp_enqueue_script( 'skipao_admin', get_stylesheet_directory_uri() . '/js/upload.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'true_include_skipao_admin' );

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function skipao_page() { 
	
	$options = get_option( 'skipao_settings' );
?>
	<link rel='stylesheet' id='bootstrap-css'  href='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel='stylesheet' id='skipao-css'  href='<?php echo get_stylesheet_directory_uri(); ?>/css/main.min.css' type='text/css' media='all' />
	<style>
		.edit_text {
			border: 1px dashed #000;
			padding: 10px;
		}
	</style>
   <form action='options.php' method='post'>

   	<section class="mt-3">
   		<div class="container">
	   		<div class="text-center">
	   			<h2>НАСТРОЙКИ КОМПАНИИ</h2>
	   		</div>

	   		<div class="row">
					<div class="col-md-4 text-center">
					<label for="skipao__city">Логотип в шапке</label>
						<?php skipao_image_uploader( 'logo', $width = 60, $height = 60 ); ?>
					</div>
					<div class="col-md-4 text-center">
					<label for="skipao__city">Логотип в подвале</label>
						<?php skipao_image_uploader( 'logo_footer', $width = 60, $height = 60 ); ?>
					</div>
				</div>
				<div class="row pt-4">

					<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__slug">Слоган</label>
	   				<input id="skipao__slug" type='text' class="form-control text-center mb-2"  name='skipao_settings[slug]' value='<?php echo $options['slug']; ?>'>
					</div>
					<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__city">Город</label>
	   				<input id="skipao__city" type='text' class="form-control text-center mb-2"  name='skipao_settings[city]' value='<?php echo $options['city']; ?>'>
					</div>
					<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__adress">Адрес</label>
	   				<input id="skipao__adress" type='text' class="form-control text-center mb-2"  name='skipao_settings[adress]' value='<?php echo $options['adress']; ?>'>
					</div>
					<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__email">E-mail</label>
	   				<input id="skipao__email" type='text' class="form-control text-center mb-2"  name='skipao_settings[email]' value='<?php echo $options['email']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__phone">Телефон</label>
	   				<input id="skipao__phone" type='text' class="form-control text-center mb-2"  name='skipao_settings[phone]' value='<?php echo $options['phone']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__whatsapp">Номер whatsapp</label>
	   				<input id="skipao__whatsapp" type='text' class="form-control text-center mb-2"  name='skipao_settings[whatsapp]' value='<?php echo $options['whatsapp']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__insta">Instagram</label>
	   				<input id="skipao__insta" type='text' class="form-control text-center mb-2"  name='skipao_settings[insta]' value='<?php echo $options['insta']; ?>'>
	   			</div>
	   			<div class="col-md-4 text-center mb-4">
	   				<label for="skipao__vk">Вконтакте</label>
	   				<input id="skipao__vk" type='text' class="form-control text-center mb-2"  name='skipao_settings[vk]' value='<?php echo $options['vk']; ?>'>
	   			</div>
	   		</div>

   		</div>
		</section>
		
		<section class="callform">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-4 left">
					<h5 class="edit_text" 
						data-skipao="skipao_settings[callform_title]" 
						contenteditable="true"><?php echo $options['callform_title']; ?></h5>
						<input type='hidden' 
							name='skipao_settings[callform_title]' 
							value='<?php echo $options['callform_title']; ?>'>
					<p class="edit_text" 
						data-skipao="skipao_settings[callform_desc]" 
						contenteditable="true"><?php echo $options['callform_desc']; ?></p>
						<input type='hidden' 
							name='skipao_settings[callform_desc]' 
							value='<?php echo $options['callform_desc']; ?>'>
					
						<div class="callform_row">
							<input type="text" name="name" class="form-control col-md-4" value="" placeholder="Ваше имя">
							<input type="text" name="phone" class="form-control col-md-4 tel" value="" placeholder="Телефон">
							<button class="btn btn-dark col-md-4 callback__form__button">Отправить</button>
						</div>

				</div>
				<div class="right">
					<?php skipao_image_uploader( 'callform_img', $width = 200, $height = 200 ); ?>
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

	<script>
		$('.edit_text').focus(function(){
						
			oldVal 		= $(this).text();
			data_attr 	= $(this).data('skipao');
			
		}).blur(function(){
			 
			newVal 	= $(this).text();
			console.log(newVal);
			
			if (newVal != oldVal){
				input 	= $('input[name="'+ data_attr + '"]');
				input.val(newVal);
				console.log(input)
			 }
		});
	</script>
<?php }

//Добавляем таксономию Категории для Серий
add_action( 'init', 'pages_tax' );
function pages_tax() {
    register_taxonomy(
        'brands',
        'seria',
        array(
            'label' => __( 'Бренд' ),
            'rewrite' => array( 'slug' => 'brands' ),
				'public'                => true,
				'publicly_queryable'    => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'show_in_nav_menus'     => true,
				'show_in_rest'          => false,
				'rest_base'             => 'url_rest',
				'rest_controller_class' => 'WP_REST_Terms_Controller',
				'show_tagcloud'         => true,
				'show_in_quick_edit'    => true,
				'meta_box_cb'           => null,
				'show_admin_column'     => true,
				'description'           => '',
				'hierarchical'          => true,
				'update_count_callback' => '',
				'query_var'             => true,       
				'rewrite'               => true,
				'sort'                  => true,
				'_builtin'              => false,

        )
    );
}

add_action('init', 'my_custom_init_series');
function my_custom_init_series(){
	register_post_type('seria', array(
		'labels'             => array(
			'name'               => 'Серии', // Основное название типа записи
			'singular_name'      => 'Серия', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую серию',
			'edit_item'          => 'Редактировать серию',
			'new_item'           => 'Новая серия',
			'view_item'          => 'Посмотреть серию',
			'search_items'       => 'Найти серию',
			'not_found'          =>  'Серий не найдено',
			'not_found_in_trash' => 'В корзине серий не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Серии'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest' 		=> true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
		'taxonomies'          => array( 'brands' ),
	) );
}

add_action('init', 'my_custom_init_models');
function my_custom_init_models(){
	register_post_type('models', array(
		'labels'             => array(
			'name'               => 'Модели', // Основное название типа записи
			'singular_name'      => 'Модель', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую модель',
			'edit_item'          => 'Редактировать модель',
			'new_item'           => 'Новая модель',
			'view_item'          => 'Посмотреть модель',
			'search_items'       => 'Найти модель',
			'not_found'          =>  'Моделей не найдено',
			'not_found_in_trash' => 'В корзине моделей не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Модели'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest' 		=> true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
	) );
}

//Связь между Сериями и моделями
add_action('add_meta_boxes', function () {
	add_meta_box( 'seria', 'Серия', 'seria_metabox', 'models', 'side', 'low'  );
}, 1);
// метабокс с селектом команд
function seria_metabox( $post ){
	$brands = get_terms( 'brands' );

	if( $brands && ! is_wp_error($brands) ){
		echo '<ul  style="max-height:300px; overflow-y:auto;">';
		foreach( $brands as $brand ){
			if ($brand->slug != 'top' &&  $brand->slug != 'price' &&  $brand->slug != 'recent' &&  $brand->slug != 'inventor') {
				echo "<li><b>". $brand->name ."</b></li>";
			
			
				$serias = query_posts( array(
					'post_type' => 'seria', 
					'posts_per_page'=>-1, 
					'orderby'=>'post_title', 
					'order'=>'ASC', 
					'tax_query' => array(
						array(
							'taxonomy' => 'brands',
							'field'    => 'slug',
							'terms'    => $brand->name
						)
					)
				));	
			?>
			<div>
					<?php 

					if ($serias) { ?>
					
						<ul>
						<?php foreach( $serias as $seria ){
							echo '
							<li><label>
								<input type="radio" name="post_parent" value="'. $seria->ID .'" '. checked($seria->ID, $post->post_parent, 0) .'> '. esc_html($seria->post_title) .'
							</label></li>
							';
						} ?>
						</ul>
					<?php } else {
						echo 'Серий нет';
						} ?>
			</div>

		<?php 
			}
		}
		echo "</ul>";
	}
};

//Находим картинку по названию
function get_attachment_url_by_slug( $slug ) {
	$args = array(
	  'post_type' => 'attachment',
	  'name' => sanitize_title($slug),
	  'posts_per_page' => 1,
	  'post_status' => 'inherit',
	);
	$_background = get_posts( $args );
	$background = $_background ? array_pop($_background) : null;
	return $background ? wp_get_attachment_url($background->ID) : '';
 }

 //Удаляем category из УРЛа категорий
add_filter( 'category_link', function($a){
	return str_replace( 'category/', '', $a );
}, 99 );

require_once 'gallery-metabox/gallery.php';

//Обрезаем Анонс
function kama_excerpt( $args = '' ){
	global $post;

	if( is_string($args) )
		parse_str( $args, $args );

	$rg = (object) array_merge( array(
		'maxchar'   => 350,   // Макс. количество символов.
		'text'      => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
							  // Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется все до <!--more--> вместе с HTML.
		'autop'     => true,  // Заменить переносы строк на <p> и <br> или нет?
		'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
		'more_text' => 'Читать дальше...', // Текст ссылки `Читать дальше`.
	), $args );

	$rg = apply_filters( 'kama_excerpt_args', $rg );

	if( ! $rg->text )
		$rg->text = $post->post_excerpt ?: $post->post_content;

	$text = $rg->text;
	$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text ); // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
	$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text ); // убираем шоткоды: [singlepic id=3]. Учитывает markdown
	$text = trim( $text );

	// <!--more-->
	if( strpos( $text, '<!--more-->') ){
		preg_match('/(.*)<!--more-->/s', $text, $mm );

		$text = trim( $mm[1] );

		$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
	}
	// text, excerpt, content
	else {
		$text = trim( strip_tags($text, $rg->save_tags) );

		// Обрезаем
		if( mb_strlen($text) > $rg->maxchar ){
			$text = mb_substr( $text, 0, $rg->maxchar );
			$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1...', $text ); // убираем последнее слово, оно 99% неполное
		}
	}

	// Сохраняем переносы строк. Упрощенный аналог wpautop()
	if( $rg->autop ){
		$text = preg_replace(
			array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}

	$text = apply_filters( 'kama_excerpt', $text, $rg );

	if( isset($text_append) )
		$text .= $text_append;

	return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
}