<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/logo.png" type="image/png" />
	<link rel="apple-touch-icon" href="<?=get_template_directory_uri()?>/img/logo.png" />
	<?wp_head();
	$options = get_option( 'krasovsky23_settings' )?>
  <title><?=wp_title()?></title>
	<style>
     	body {opacity: 0; overflow-x: hidden;}
  	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a href="/" class="navbar-brand">
      <img src="<?=get_template_directory_uri()?>/img/logo.svg" alt="<?=get_bloginfo('name')?>">
    </a>

    <button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarToggle"
      aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
      <span class="hamburger-box">
          <span class="hamburger-inner"></span>
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggle">
      <?php 
        wp_nav_menu(array(
          'theme_location'  => 'main_menu',
          'container'       => '',
          'container_id'    => 'menu', 
          'container_class' => 'none', // css-класс блока
          'menu_class'      => 'navbar-nav',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'		  => new krasovsky23_Walker_Nav_Menu()
        )); 
      ?>
      <div class="navbar-contact">
        <a class="phone" href="tel:<?=preg_replace('/\s/', '', $options['phone'])?>"><img src="<?=get_template_directory_uri()?>/img/phone.svg" alt=""> <?=$options['phone']?></a>
        <a class="email" href="mailto:<?=preg_replace('/\s/', '', $options['email'])?>"><img src="<?=get_template_directory_uri()?>/img/email.svg" alt=""> <?=$options['email']?></a>
      </div>
    </div>
  </div>
</nav>
<?if ( !is_front_page() ):?><div class="divider"></div><?endif?>