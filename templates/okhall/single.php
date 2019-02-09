<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
Это single.php
	<?php 
					$args = array('post_type' => 'post');
					$query = new WP_Query($args); 

						if ( $query->have_posts() ) : 

						while ( $query->have_posts() ) : $query->the_post(); ?>
							<h2><?php the_title(); ?></h2>
							<p><?php echo $post->post_content; ?></p>
						<?php endwhile; 

						wp_reset_postdata(); 

						else : ?>
						<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
					<?php endif; ?>

<?php
get_footer();
