<?php get_header(); 
$options = get_option( 'skipao_settings' );
?>
   <div class="breadcrumb">
      <div class="container">
         <a href="/">Главная</a> > <?php echo single_cat_title(); ?>
      </div>
   </div>

   <section class="blog<?php echo is_category('Услуги') ? ' services' : ''; ?>">
      <div class="container">
         <h5 class="h2__title liner">
            <?php single_cat_title(); 
            $category = get_queried_object()->term_id; ?>
         </h5>

         <div class="row">
             <?php 
                $query = new WP_Query(array ( 'category__in' => array($category), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8));
                  if ($query->have_posts()):
                  while ( $query->have_posts() ) : $query->the_post();
                  $post_tumb = get_post_thumbnail_id( $post->ID );
            ?>
            <div class="col-md-6 col-lg-3">
               <?php if ($post_tumb) { ?>
               <div class="img__wrapper">
                  <a href="<?php echo get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'large' ); ?>" alt="<?php echo the_title(); ?>"></a>
               </div>
               <?php } ?>
               <a href="<?php echo get_permalink(); ?>"<?php echo is_category('Услуги') ? ' class="services__card"' : ''; ?>>
                  <?php if ( is_category('Услуги') ) { ?>
                     <div class="services__card__title">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/check.svg" alt="">
                        <p><?php echo the_title(); ?></p>
                     </div>
                  <?php } else { ?>
                     <strong><?php echo the_title(); ?></strong>
                  <?php } ?>
               </a>
               <?php echo the_excerpt(); ?>
               <a href="<?php echo get_permalink(); ?>" class="btn btn-outline-accent">Подробнее</a>
            </div>
            <?php
                endwhile; wp_reset_postdata();
                endif;
            ?>
         </div>
      </div>
   </section>
    
<!-- Callback form -->
   <?php
		#Данный блок редактируется в админке -> вкладка Компания
	?>
	<section class="callform">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-4 left">
					<h5><?php echo $options['callform_title']; ?></h5>
					<p><?php echo $options['callform_desc']; ?></p>
					<form action="/" method="post" class="callback__form">
						<div class="callform_row">
							<input type="text" name="name" class="form-control col-md-4" value="" placeholder="Ваше имя" required>
							<input type="text" name="phone" class="form-control col-md-4 tel" value="" placeholder="Телефон" required>
							<button type="submit" class="btn btn-dark col-md-4 callback__form__button">Отправить</button>
						</div>
						<div class="robot">
							<div class="robot__check">
								<svg viewBox="0 0 60 60">
									<line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
									<line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
								</svg>
							</div>
							<span>Я согласен(а) с условиями <a href="/policy/">передачи информации</a></span>
						</div>
					</form>
				</div>
				<div class="right">
					<img src="<?php echo $options['callform_img']; ?>" alt="">
				</div>
			</div>
		</div>
	</section>
<!-- End Callback form -->

<?php get_footer(); ?>