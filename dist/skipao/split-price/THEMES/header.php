<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="yandex-verification" content="a62f723da8c37b5c" />
	<?php
	if ( is_front_page() ) {
	echo '<link rel="canonical" href="https://split-price.ru/"/>';
	}
	?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/logo.png" type="image/png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
   <title><?php 
   if ( is_tax('brands') ) {
      $term = get_queried_object();
      echo 'Сплит-система '. $term->name .': купить в Краснодаре кондиционер '. $term->name .' дешево: Цена, отзывы';
   } else if ( is_category() ) {
      echo single_cat_title() .' - '. get_bloginfo('name');
   } else if ( is_singular('seria') ) {
      $term_list = wp_get_post_terms( $post->ID, 'brands', array('fields' => 'names') );
      echo 'Кондиционер ';
      echo $term_list[0];
      echo ' ';
      echo the_title();
      echo ' купить в Краснодаре недорого: цена, характеристики';
   } else if ( is_front_page() ) {
      echo 'Купить кондиционер в Краснодаре дешево. Недорогие  Сплит-системы';
   } else if ( is_single(57) ) {
      echo 'Кондиционер ремонт в краснодаре на дому недорого цена';
   } else if ( is_single(59) ) {
      echo 'Чистка сплит систем в краснодаре на дому цена';
   } else if ( is_single(61) ) {
      echo 'Установка сплит систем в краснодаре: цена недорого';
   } else if ( is_page(6016) || is_page(6019) || is_page(6022) || is_page(6025) || is_page(6028) ) {
      echo the_title() .' купить в краснодаре недорого: цена';
   }
   else {
      echo the_title() .' - '. get_bloginfo('name') .' - '. get_bloginfo('description'); 
   }
      ?></title>
   <?php wp_head(); 
      $options = get_option( 'skipao_settings' );
   ?>
</head>
<body>
   <main>
      <div class="top_menu">
         <div class="container">
            <a href="/" class="navbar-brand">
               <img src="<?php echo $options['logo']; ?>" alt="<?php echo get_bloginfo('name'); ?>">
               <p><?php echo $options['slug']; ?></p>
            </a>

            <div class="adress">
               <p><a href="/contact/"><?php echo $options['city']; ?> <span><?php echo $options['adress']; ?></span></a></p>
            </div>

            <div class="email">
               <p><a href="mailto:<?php echo $options['email']; ?>"><?php echo $options['email']; ?></a></p>
            </div>

            <div class="phone">
               <a class="phone-icon" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a>
               <div class="social">
                     <a href="https://api.whatsapp.com/send?phone=<?php echo $options['whatsapp']; ?>&text=Добрый%20день.%20Меня%20интересует%20сплит-система.%20Свяжитесь%20со%20мной" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/whatsapp.svg" alt=""></a>
                     <a href="<?php echo $options['insta']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/instagram.svg" alt=""></a>
                     <a href="<?php echo $options['vk']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social/vk.svg" alt=""></a>
               </div>
            </div>

            <button class="navbar-toggler hamburger hamburger--slider" type="button" data-toggle="collapse" data-target="#navbarToggle"
               aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
               <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
               </span>
            </button>
         </div>
      </div>
      
      <nav class="navbar navbar-expand-md">
         <div class="collapse navbar-collapse" id="navbarToggle">
            <div class="mobile--menu">
               <!-- <a class="catalog" href="/brands/">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/menu/menu.svg" alt="">
                  Каталог
               </a> -->
               <a class="brands" href="/brands/">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/menu/brand.svg" alt="">
                  Бренды
               </a>
               <a class="prom" href="/polupromyshlennye/">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/menu/prom.svg" alt="">
                  Полупромышленные
               </a>
               <a class="dop" href="/czvetnye-kondiczionery/">
                  Цветные кондиционеры
               </a>
               <a class="dop" href="/ekrany-dlya-kondiczionerov/">
                  Экраны для кондиционеров
               </a>
               <a class="sale" href="/sale/">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/menu/sale.svg" alt="">
                  Акции
               </a>
            </div>
            <ul class="navbar-nav">
               <li class="nav-item menu menu--hover">
                     <div class="dropdown">
                        <button class="nav-link catalog dropdown-toggle" type="button" id="catalogDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img src="<?php echo get_template_directory_uri(); ?>/img/menu/menu.svg" alt="">
                           Каталог
                        </button>
                        <div class="dropdown-menu" aria-labelledby="catalogDropdownMenu">
                           <div class="col-row">
                              <div class="col-x-3">
                                 <a class="dropdown-item" href="/brands/">Сплит-системы для дома</a>
                                 <a class="dropdown-item" href="/czvetnye-kondiczionery/">Цветные кондиционеры</a>
                                 <a class="dropdown-item" href="/polupromyshlennye/">Полупромышленные</a>
                                 <a class="dropdown-item" href="/ekrany-dlya-kondiczionerov/">Экраны для кондиционеров</a>
                                 <a class="dropdown-item" href="/galereya-rabot/">Галерея работ</a>
                              </div>
                           </div>
                        </div>
                     </div>
               </li>
               <li class="nav-item menu--hover brand">
                  <div class="dropdown">
                     <a href="/brands/" class="nav-link brands dropdown-toggle" type="button" id="brandsDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/menu/brand.svg" alt="">
                        Бренды
                     </a>
                     <div class="dropdown-menu" aria-labelledby="brandsDropdownMenu">
                        <div class="col-row">
                           <div class="col-x-3">
                        <?php $brands = get_terms( 'brands' );

                           if( $brands && ! is_wp_error($brands) ){
                              $i = 1;
                              foreach( $brands as $brand ){ 
                                 if ( $brand->term_id < 92 ||  $brand->term_id > 95 ) {

                                 $url = get_term_link( $brand->term_id, 'brands' ); 
                                 ?>
                                 <a class="dropdown-item" href="<?php echo $url; ?>"><?php echo $brand->name; ?></a>
                           <?php 
                              if ($i % 10 == 0 ) { echo '</div><div class="col-x-3">'; }
                              $i++;
                                 } } } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item menu--hover prom">
                  <div class="dropdown">
                     <a href="/polupromyshlennye/" class="nav-link brands dropdown-toggle" type="button" id="promDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/menu/prom.svg" alt="">
                        Полупромышленные
                     </a>
                     <div class="dropdown-menu" aria-labelledby="promDropdownMenu">
                        <div class="col-row">
                           <div class="col-x-3">
                              <?php 
                                 $query = new WP_Query('post_parent=19&post_type=page&orderby=date&order=ASC');
                                    if ($query->have_posts()):
                                    while ( $query->have_posts() ) : $query->the_post();
                              ?>
                              <a class="dropdown-item" href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
                              <?php
                                 endwhile; wp_reset_postdata();
                                 endif;
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item sale">
                  <a class="nav-link sale" href="/sale/">
                     <img src="<?php echo get_template_directory_uri(); ?>/img/menu/sale.svg" alt="">
                     Акции
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/uslugi/">Услуги</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/oplata/">Оплата и доставка</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link about" href="/about/">О компанни</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/contact/">Контакты</a>
               </li>
               <li class="nav-item mobile-phone">
                  <a class="nav-link nav-phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link nav-whatsapp" href="https://api.whatsapp.com/send?phone=79885007001&text=Добрый%20день.%20Меня%20интересует%20сплит-система.%20Свяжитесь%20со%20мной" target="_blank">Написать в whatsapp</a>
               </li>
            </ul>
         </div>
      </nav>

      