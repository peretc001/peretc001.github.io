<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
	<title><?php echo get_bloginfo('name') .' - '. get_bloginfo('description'); ?></title>
</head>
<body>
	
		<?php wp_nav_menu(array(
			'theme_location'  => 'main_menu',
			'container'       => 'nav',
			'container_id'    => 'menu', 
			'container_class' => none, // css-класс блока
			'menu_class'      => 'links',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'		  => new Optimazed_Walker_Nav_Menu()
			)); 
		?>