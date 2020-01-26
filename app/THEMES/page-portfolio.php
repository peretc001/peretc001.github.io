<?php
/**
 * The template for displaying pages
 *
 *
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); ?>

<section class="page">
	<div class="container">

	<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
			<h1 class="h2_title"><?php the_title(); ?></h1>
			<?php the_content(); ?>

	<?php endwhile; ?>

	</div>
</section>

<section class="work">
    <div class="container">      
      <div class="row">
      <?php 
        $query = new WP_Query(array ( 'category__in' => array(3), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
          if ($query->have_posts()):
          while ( $query->have_posts() ) : $query->the_post();
          $post_tumb = get_post_thumbnail_id( $post->ID );
      ?>
      <div class="col-md-6">
          <div class="img_wrapper">
			 <a href="<?php echo get_permalink(); ?>">
            <img class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ) ?>" alt="<?php the_title(); ?>">  
			</a>
          </div>
        <p><a href="<?php echo get_permalink(); ?>"><?php echo $post->post_title; ?></a></p>
      </div>
      <?php
        endwhile; wp_reset_postdata();
        endif;
      ?>
      </div>

    </div>
  </section>

<?php get_footer(); ?>
