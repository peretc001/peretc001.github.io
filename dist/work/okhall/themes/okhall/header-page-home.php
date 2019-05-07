<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package okhall
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="author" lang="ru" content="Верстка и натяжка на WP: Красовский Игорь => peretc001.github.io" />
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!-- Template Basic Images Start -->
	<link rel="shortcut icon" href="/wp-content/uploads/2019/02/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/wp-content/uploads/2019/02/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/uploads/2019/02/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/uploads/2019/02/apple-touch-icon.png">
	<!-- Template Basic Images End -->
	<style>
		body {
			opacity: 0;
			overflow-x: hidden;
		}

		html {
			background-color: #111111;
		}
	</style>
	<?php wp_head(); ?>
</head>

<body>

