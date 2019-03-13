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
$options = get_option( 'okHall_settings' );

$company_desc = $options['description'];
$number_in = preg_replace('~\\D+~u', '', $options['phone']); //71234567890
$number_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $number_in); //+7 (123) 456-78-90
$number_public = substr($number_in_valid, 0, -9) .'<b>' . substr($number_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>

$mobile_in = preg_replace('~\\D+~u', '', $options['mobile']); //71234567890
$mobile_in_valid = preg_replace("#(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})#", "+\\1 (\\2) \\3-\\4-\\5", $mobile_in); //+7 (123) 456-78-90
$mobile_public = substr($mobile_in_valid, 0, -9) .'<b>' . substr($mobile_in_valid, -9) .'</b>'; //+7 (123) <b>456-78-90</b>
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="author" lang="ru" content="Верстка и натяжка на WP: Красовский Игорь => peretc001.github.io" />
	<title><?php the_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
			background-color: #ffffff;
		}
	</style>
	<?php wp_head(); ?>
</head>

<body>
	<div class="page">
		<nav class="nav_menu inverse">
			<div class="container">
				<div class="row">
						
						<div class="mobile__menu">
							<a href="#my-menu">
								<div class="hamburger hamburger--emphatic">
									<span class="hamburger-box"><span class="hamburger-inner"></span></span>
								</div>
							</a>
						</div>
							
						
						<div class="nav_menu__left">

							<p class="nav_menu__left__logo">
								<a href="/">
									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
									y="0px" viewBox="134.3 -0.9 31.5 30.9" enable-background="new 134.3 -0.9 31.5 30.9" xml:space="preserve">
										<g>
											<g>
												<ellipse fill="none" stroke="#000000" cx="145.6" cy="10.6" rx="9.9" ry="9.5" />
												<polyline fill="none" stroke="#000000" points="152.2,2.1 152.2,1.1 155.6,1.1 155.6,20.1 152.2,20.1 152.2,19 		" />
												<line fill="none" stroke="#000000" x1="152.2" y1="5.2" x2="152.2" y2="16.1" />
												<line fill="none" stroke="#000000" x1="161.8" y1="1.1" x2="155.6" y2="12.9" />
												<line fill="none" stroke="#000000" x1="164.6" y1="20.1" x2="156.8" y2="10.6" />
											</g>
											<g enable-background="new    ">
												<path d="M140.3,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3s-0.3-0.1-0.3-0.3S140.1,27.2,140.3,27.2z" />
												<path d="M141.1,27.5c0-0.9,0.8-1.5,1.8-1.5s1.8,0.6,1.8,1.5c0,0.9-0.8,1.5-1.8,1.5S141.1,28.4,141.1,27.5z M141.5,27.5
														c0,0.7,0.6,1.2,1.4,1.2c0.8,0,1.4-0.5,1.4-1.2s-0.6-1.2-1.4-1.2C142.1,26.3,141.5,26.8,141.5,27.5z" />
												<path d="M145.8,27.3l1.5-1.3h0.5l-1.6,1.4l1.7,1.6h-0.5l-1.4-1.4l-0.1,0.1V29h-0.4v-3h0.4V27.3z" />
												<path d="M148.5,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3s-0.3-0.1-0.3-0.3S148.3,27.2,148.5,27.2z" />
												<path d="M149.9,27.2h1.8V26h0.4v3h-0.4v-1.4h-1.8V29h-0.4v-3h0.4V27.2z" />
												<path d="M154.9,28.2h-1.5L153,29h-0.4l1.6-3.1l1.6,3.1h-0.4L154.9,28.2z M154.7,27.9l-0.6-1.2l-0.6,1.2H154.7z" />
												<path d="M156.6,26v2.7h1V29h-1.4v-3H156.6z" />
												<path d="M158.5,26v2.7h1V29h-1.4v-3H158.5z" />
												<path d="M160.1,27.2c0.2,0,0.3,0.1,0.3,0.3s-0.2,0.3-0.3,0.3c-0.2,0-0.3-0.1-0.3-0.3S159.9,27.2,160.1,27.2z" />
											</g>
										</g>

									</svg>
								</a>
							</p>
							<p class="nav_menu__left__text">
								<b><?php bloginfo('description'); ?></b>
								<span><?php echo $company_desc; ?></span>
							</p>
						</div>
						<div class="nav_menu__right">
							
							<ul class="navbar-nav">
								<? 
									echo preg_replace( '#<li[^>]+><a href="#',  '<li class="nav-item"><a class="nav-link go_to" href="',
							            wp_nav_menu(
							                   array(
													'menu' 				=> 'top-menu', 
													'container' 		=> 'ul',
													'container_class'		=> 'navbar-nav',
													'items_wrap'        => '%3$s',
													'depth'             => 1,
													'echo'              => false
							                         )
							                    )
							            );
								?>
							</ul>

							<div class="nav_menu__right__items">
								<div class="social">
									<p>
										<a href="<?php echo $options['ok_vk']; ?>" target="_blank"><i class="fab fa-vk"></i></a>
										<a href="<?php echo $options['ok_facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
										<a href="<?php echo $options['ok_instagramm']; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
									</p>
								</div>
								<div class="phone">
									<p><span class="work"><a href="tel:<?php echo $number_in; ?>"><?php echo $number_public; ?></a></span>
										<a href="viber://chat?number=<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/viber.svg" alt="Viber"></a>
										<a href="https://wa.me/<?php echo $mobile_in; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/header/whatsapp.svg" alt="Whatsapp"></a>
										<a href="tel:<?php echo $mobile_in; ?>"><?php echo $mobile_public; ?></a>
									</p>
									<p class="d-lg-none"><a href="tel:<?php echo $mobile_in; ?>"><i class="fas fa-phone"></i></a></p>
								</div>


							</div>

						</div>
						
				</div>
			</div>
		</nav>
		<div class="clearfix"></div>