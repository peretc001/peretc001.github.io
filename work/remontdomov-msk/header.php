<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="author" lang="ru" content="Разработка: Красовский Игорь => peretc001.github.io" />
	<meta charset="utf-8">
	<title><?php if( is_front_page() ) {
   		echo bloginfo('name'); ?> - <?php echo bloginfo('description'); 
	} elseif ( is_category() or is_tag() ) {
		single_cat_title('', 1);
	} else {
		echo esc_html( get_the_title() );
	} ?></title>
	<meta name="description" content="<?php if( is_front_page() ) { 
		echo bloginfo('description'); 
	} 
	elseif( is_category() or is_tag() ) {
		$cat_desc = term_description();
		$cat_description = strip_tags($cat_desc);
		echo mb_substr($cat_description, 0,139,'UTF-8');
	}
	else {
		while ( have_posts() ) : the_post();
			$excerpt = get_the_content();
			echo mb_substr($excerpt, 0,139,'UTF-8');
		endwhile;
	} ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/img/favicon.png'; ?>">
	<style>
		body {opacity: 0;overflow-x: hidden;}html {background-color: #fff;}
	</style>
</head>
<body>
	<?php 
		$options = get_option( 'optimazedLanding_settings' );
		$phone  = $options['phone'];
		$phone_number = preg_replace('~\\D+~u', '', $phone); //71234567890
	?>
	<nav class="navbar fixed-top navbar-expand-md">
		<div class="container">
			
			<button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarToggle"
				aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<div class="nav-whatsapp d-inline d-md-none ml-auto">
				<a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>&text=Добрый%20день.%20Меня%20интересует%20ремонт%20загородного%20дома.%20Свяжитесь%20со%20мной" target="_blank"><i class="fab fa-whatsapp"></i> <span>Написать в</span> Whatsapp</a>
			</div>
			
			<div class="nav-phone d-inline d-md-none">
				<a href="tel:<?php echo $phone_number; ?>"><i class="fas fa-mobile-alt"></i><?php echo $phone; ?></a>
			</div>

			<div class="collapse navbar-collapse" id="navbarToggle">
				<?php wp_nav_menu(array(
					'theme_location'  => 'main_menu',
					'container'       => 'ul',
					'menu_class'      => 'navbar-nav',
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'		  => new Optimazed_Walker_Nav_Menu()
					)); 
				?>
			</div>
			<div class="nav-whatsapp d-none d-md-inline ml-auto">
				<a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>&text=Добрый%20день.%20Меня%20интересует%20ремонт%20загородного%20дома.%20Свяжитесь%20со%20мной" target="_blank"><i class="fab fa-whatsapp"></i> <span>Написать в</span> Whatsapp</a>
			</div>
			<div class="nav-phone d-none d-md-inline">
				<a href="tel:<?php echo $phone_number; ?>"><i class="fas fa-mobile-alt"></i><?php echo $phone; ?></a>
			</div>
			
		</div>
	</nav>