<?php
/**
 * The template for displaying pages
 *
 *
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); ?>

<?php  #FOOTER
    $query = new WP_Query('page_id=129&post_type=page');
      if ($query->have_posts()):
      while ( $query->have_posts() ) : $query->the_post();
  ?>
  <section class="footer">
  	<h1 class="h2_title"><?php the_title(); ?></h1>
    <div class="map">
      <div class="map_wrapper">
	  <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Adf9d6b65cc618cf65717f499d3ff75beec3b8d79bf09833a4f76dbe57b63e049&amp;width=100%25&amp;height=600&amp;lang=ru_RU&amp;scroll=false"></script>
      </div>
    </div>
    <div class="footer_block">
      <?php echo the_content(); ?>
    </div>
  </section>
  <?php
    endwhile; wp_reset_postdata();
    endif;
  ?>

<?php get_footer(); ?>
