<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/logo.png" type="image/x-icon" />
	<title><?php //Title
	if( is_front_page() ) {
   		echo bloginfo('name'); ?> - <?php echo bloginfo('description'); 
	} elseif ( is_category() or is_tag() ) {
		single_cat_title('', 1);
		echo ' - ';
		echo bloginfo('name');
	} else {
		echo get_the_title();
		echo ' - ';
		echo bloginfo('name');
	} ?></title>
	<meta name="description" content="<?php if( is_front_page() ) { 
		?>Программа профессионального обучения специальности: «Слесарь по ремонту и обслуживанию систем вентиляции и кондиционирования» в Краснодаре. Звоните!<?php 
	} 
	elseif( is_category() or is_tag() ) {
		$cat_desc = term_description();
		if($cat_desc) {
    		$cat_description = strip_tags($cat_desc);
    		echo mb_substr($cat_description, 0,139,'UTF-8');
		} else {
		    echo 'Программа профессионального обучения специальности: «Слесарь по ремонту и обслуживанию систем вентиляции и кондиционирования» в Краснодаре. Звоните!';
		}
	}
	else {
		$excerpt = get_the_excerpt();
		echo wp_trim_words( $excerpt , '10' ); 
	} ?>">
	<style>
      body {opacity: 0;overflow-x: hidden;}
   </style>
   <?php 
        wp_head(); 
        $options = get_option( 'skipao_settings' );
   ?>
</head>
<body <?php body_class( $class ); ?>>
    
    <nav class="navbar navbar-expand-md">
      <div class="first-line">
         <p class="navbar-brand">
            <a href="/">
               <?php echo get_bloginfo('name'); ?>
               <span><?php echo get_bloginfo('description'); ?></span>
            </a>
         </p>

         <div class="adress">
            <p><?php echo $options['city']; ?>, <?php echo $options['adress']; ?></p>
         </div>

         <div class="phone">
               <a class="phone-icon" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a>
               <div class="social">
                     <a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/social/whatsapp.svg" alt=""></a>
                     <a href="<?php echo $options['insta']; ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/social/instagram.svg" alt=""></a>
               </div>
               </div>

         <button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarToggle"
            aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box">
               <span class="hamburger-inner"></span>
            </span>
         </button>

      </div>
      
      <div class="collapse navbar-collapse" id="navbarToggle">
	
		<?php wp_nav_menu(array(
			'theme_location'  => 'main_menu',
			'container'       => false,
			'container_id'    => false, 
			'container_class' => none, // css-класс блока
			'menu_class'      => 'navbar-nav',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'		  => new Optimazed_Walker_Nav_Menu()
			)); 
		?>
		
		</div>
   </nav>