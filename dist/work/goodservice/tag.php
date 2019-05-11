<?php
/**
 * The template for displaying TAGS
 *
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); ?>
<section class="content single_content">
	<div class="container">
		<div class="row">

			<div class="col-md-3 content-left order-2 order-md-12">
				<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
			</div>
			<!-- / end left -->

			<div class="col-md-6 content-center order-1 order-md-12">
				<p class="text-center">
					Записи с меткой: <i class="fas fa-tag"></i> <b><?php
						$tag = get_queried_object();
						echo $tag->name;
					?></b>
				</p>
			<?php

			$query = new WP_Query( array('tag__in' => $tag->name) );
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 
				
				$media = get_attached_media( 'image', $post->ID );
				$media = array_shift( $media );
				$image_url = $media->guid;

				$category = get_the_category(); 
				$cat__name = $category[0]->cat_name;
			?>
				<div class="content-center-card">
					<h2>
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<p class="post-date">
						
					</p>
					<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a>
					<p>
						<?php $content = get_the_content();
									$trimmed_content = wp_trim_words( $content, 60, '...' );
									echo $trimmed_content; ?>
					</p>
					<div class="single_content_line">
						<div class="category">
							<div class="single_category_tags"><i class="fas fa-tags"></i> <?php echo $cat__name; ?></div>
						</div>
						<div class="social">
						<i class="far fa-eye"></i> <?php if(get_post_meta ($post->ID,'views',true) != '') { echo get_post_meta ($post->ID,'views',true); } else { echo '0'; } ?>
						</div>
					</div>
				</div>
			<?php endwhile; // End of the loop. ?>
			<?php
				//Вывод рекламного блока
				$options = get_option( 'optimazedReklama_settings' ); 
				if($options['single']) { ?>
			<div class="content-center-banner">
				<?php echo $options['single']; ?>
			</div>
			<?php }	?>
				
			</div>
			<!-- / end center -->

			<div class="col-md-3 order-3 order-md-12 content-right">
				<?php include get_theme_file_path( 'inc/right.php' ); //Подключаем правую колонку ?>
			</div>
			<!-- / end right -->
		</div>
	</div>
</section>
		

<?php get_footer(); ?>