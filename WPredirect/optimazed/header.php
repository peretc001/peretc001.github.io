<!DOCTYPE HTML>
<!--
	Transitive by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<!-- Header -->
<html>
<head>
	<title>Transitive by TEMPLATED</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	<header id="header">
			<div class="logo"><a href="index.html">Transitive <span>by TEMPLATED</span></a></div>
			<a href="#menu" class="toggle"><span>Menu</span></a>
		</header>

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