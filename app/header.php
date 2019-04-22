<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="author" lang="ru" content="Разработка: Красовский Игорь => peretc001.github.io" />
	<meta charset="UTF-8">
	<title><?php if( is_front_page() or is_search() ) {
   		echo bloginfo('name'); ?> - <?php echo bloginfo('description'); 
	} else {
		echo esc_html( get_the_title() );
	} ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<style>
		body {opacity: 0;overflow-x: hidden;}html {background-color: #fff;}
	</style>
	<?php 	wp_head();
			if( is_front_page() ) {} else {
				global $post_id;
				$post_id = get_the_ID(); 
			}
	?>	
</head>
<body>

	<nav class="navbar navbar-dark navbar-expand-md">
		<div class="container">
			<button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
				aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<a href="/" class="navbar-brand"><?php echo bloginfo('name'); ?></a>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<?php wp_nav_menu(array(
					'theme_location'  => 'category_menu',
					'container'       => 'ul',
					'menu_class'      => 'navbar-nav', //ul class
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'		  => new Optimazed_Walker_Nav_Menu()
					)); 
				?>
				<form role="search" method="get" id="searchform" action="/" class="desctop-form">
					<div class="row no-gutters">
						<div class="col">
							<input class="form-control border-secondary border-right-0 rounded-0" type="text" value="" name="s" id="s" placeholder="Поиск" required>
						</div>
						<div class="col-auto">
							<button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="submit" id="searchsubmit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		
		</div>
	</nav>
	<div class="mobile-search">
		<form role="search" method="get" id="searchform" action="/" class="mobile-form">
			<div class="row no-gutters">
				<div class="col">
					<input class="form-control border-secondary border-right-0 rounded-0" type="text" value="" name="s" id="s" placeholder="Поиск" required>
				</div>
				<div class="col-auto">
					<button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="submit" id="searchsubmit">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>
	</div>