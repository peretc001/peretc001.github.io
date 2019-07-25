<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/logo.png" type="image/png" />
	<title><?php echo get_bloginfo('name') .' - '. get_bloginfo('description'); ?></title>
<?php wp_head(); ?>
</head>
<body>
  <?php if ( is_front_page() ) { echo '<main>'; } ?>
	<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="/" class="navbar-brand">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="<?php echo get_bloginfo('name') .' - '. get_bloginfo('description'); ?>">
          <!-- <div class="brand-name">
            <p><?php echo get_bloginfo('name'); ?></p>
            <p><?php echo get_bloginfo('description'); ?></p>
          </div> -->
        </a>
        <button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarToggle"
          aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
          <span class="hamburger-box">
              <span class="hamburger-inner"></span>
          </span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarToggle">
      <?php wp_nav_menu(array(
        'theme_location'  => 'main_menu',
        'container'       => 'ul',
        'menu_class'      => 'navbar-nav m-auto',
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'		  => new Optimazed_Walker_Nav_Menu()
        )); 
      ?>
          <a class="nav-link phone" href="tel:123">8 (918) 123-34-56</a>
        </div>
    </div>
  </nav>
  <div class="divider"></div>
		