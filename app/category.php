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

get_header(); ?>
<section class="content single_content">
	<div class="container">
		<div class="row">

			<div class="col-md-3 content-left order-2 order-md-12">
				<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
			</div>
			<!-- / end left -->

			<div class="col-md-6 content-center order-1 order-md-12">

			<?php

			/* Start the Loop */
			while ( have_posts() ) : the_post(); 
				
				$category = get_the_category(); 
				$cat__name = $category[0]->cat_name;

				$media = get_attached_media( 'image', $post->ID );
				$media = array_shift( $media );
				$image_url = $media->guid;
			?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<div class="single_content_line">
					<?php the_category('single'); ?>
					<div class="social">
						<p>поделиться:</p>
						<a href="https://vk.com/share.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&image=<?php echo $image_url; ?>" target="_blank"><i class="fab fa-vk"></i></a>
						<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images]=<?php echo $image_url; ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
						<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			<?php endwhile; // End of the loop. ?>
			<?php
				//Вывод рекламного блока по центру
				$query = new WP_Query( array('page_id' => 108) );
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
				<div class="content-center-banner">
					<?php the_content(); ?>
				</div>
				<?php }	?>
				<?php
						//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА+ВАЖНО, id=(21+20)
						
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__and' => array(20,21), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							
							$media = get_attached_media( 'image', $post->ID );
							$media = array_shift( $media );
							$image_url = $media->guid;
				?>
				<div class="content-center-card">
					<h2>
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a>
					<p>
						<?php $content = get_the_content();
									$trimmed_content = wp_trim_words( $content, 60, '...' );
									echo $trimmed_content; ?>
					</p>
				</div>
				<?php } 
					//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА и без метки ВАЖНО, id=(21-20)
					$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__in'=>array(21), 'tag__not_in' => array(20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4 ) );
					while ( $query->have_posts() ) {
						$query->the_post();

						$media = get_attached_media( 'image', $post->ID );
						$media = array_shift( $media );
						$image_url = $media->guid;

						$category = get_the_category(); 
						$cat__name = $category[0]->cat_name;

				?>
				<div class="content-center-block">
						<h3>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<a href="<?php echo get_permalink(); ?>">
							<img src="<?php echo $image_url; ?>" alt="">
							<span><i><?php echo $cat__name; ?></i></span>
						</a>
						
						<p>
							<?php $content = get_the_content();
								$trimmed_content = wp_trim_words( $content, 60, '...' );
								echo $trimmed_content; ?>
						</p>
					</div>	
				<?php } ?>
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