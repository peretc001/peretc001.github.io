<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<base href="/">

	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/img/favicon/apple-touch-icon-180x180.png">
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/hamburgers.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.min.css">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
