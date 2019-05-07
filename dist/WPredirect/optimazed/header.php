<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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