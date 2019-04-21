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
			global $post_id;
			$post_id = get_the_ID(); 
	?>	
</head>
<body>
<?php

#Функция вывода ПОЛНОГО НАЗВАНИЯ русского месяца для поиска
function fdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array('января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря');
	if(strpos($param,'M')===false) return date($param, $time);
	else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
} ?>
	<nav class="navbar navbar-dark navbar-expand-md">
		
		<button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
			aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
		<a href="/" class="navbar-brand d-md-none d-inline"><?php echo bloginfo('name'); ?></a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			
			<div class="navbar-first">
				<div class="container">
					
					<?php wp_nav_menu(array(
						'theme_location'  => 'top_menu',
						'container'       => 'ul',
						'menu_class'      => 'navbar-nav', //ul class
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'		  => new Optimazed_Walker_Nav_Menu()
						)); 
					?>
				
				</div>
			</div>
			
			<div class="navbar-second">
				<div class="container ">
					<span class="nav-date"><?php echo fdate('d M Y'); ?></span>
					<?php wp_nav_menu(array(
						'theme_location'  => 'center_menu',
						'container'       => 'ul',
						'menu_class'      => 'navbar-nav ml-auto', //ul class
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'		  => new Optimazed_Walker_Nav_Menu()
						)); 
					?>
					
				</div>
			</div>

			<div class="navbar-third">
				<div class="container ">

					<a href="/" class="navbar-brand d-none d-md-inline"><?php echo bloginfo('name'); ?></a>
					<div class="navbar-third--container">
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
			</div>
		
		</div>
	</nav>
	<div class="mobile-search">
		<p class="nav-date"><?php echo fdate('d M Y'); ?></p>
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