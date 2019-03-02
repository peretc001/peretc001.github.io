<?php 
/**
 * The template for displaying BLOG page
 * @package WordPress
 * @subpackage OKHall
 * @since 1.0.0
 */

?>
	<section class="advantages blog">	
		<div class="container">
			
			<?php 
				$args = array('post_type' => 'post', 'category__not_in' => array(3,4));
				$query = new WP_Query($args); 

					if ( $query->have_posts() ) : 

					while ( $query->have_posts() ) : $query->the_post(); 
					

					$media = get_attached_media( 'image', $post->ID );
					$media = array_shift( $media );
					$image_url = $media->guid;

					$thumbs = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
					if ($thumbs) { $thumb = '<p class="advantages__post__img"><a href="'. get_permalink() .'"><img src="'. $thumbs .'" alt=""></a></p>'; } else {  $thumb = ''; }
				?> 			
				<div class="row advantages__post" style="background-image: url('<?php echo $image_url; ?>')">
					<div class="col-8">
						<?php echo $thumb; ?>
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="advantages__post__text">
							<?php 
								$content = get_the_content();
								$trimmed_content = wp_trim_words( $content, 16 );
								echo $trimmed_content; 
							?>
						</p>
						
					</div>
			</div><!-- end row-->

			<?php endwhile; 

				else : ?>
				<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
			<?php endif; ?>
			
		</div>
	</section>
	<br><br>