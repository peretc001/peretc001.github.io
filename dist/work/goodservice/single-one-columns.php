<?php
/**
 * Template Name: С правым меню
 * Template Post Type: post
 * 
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

			<?php

			/* Start the Loop */
			while ( have_posts() ) : the_post(); 
				
				$cat = get_the_category($post->ID);
				$current = $cat[0]->cat_name;

				$tags = get_the_tags();
			?>
			
				<h1><?php the_title(); ?></h1>
				<div class="single_content_line">
					<div class="category">
						<div class="single_category_tags">
						<?php foreach((get_the_category()) as $category) { 
							if($category->cat_name == $current) {} else {
							echo '<i class="fas fa-tags"></i> <a href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a>';
							}
						} ?>
						</div>
					</div>
					<div class="social">
						<p>поделиться:</p>
						<a href="https://vk.com/share.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&image=<?php echo $image_url; ?>" target="_blank"><i class="fab fa-vk"></i></a>
						<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images]=<?php echo $image_url; ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
						<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
				<?php the_content(); ?>
				<div class="single_content_line">
					<div class="category">
						<div class="single_category_tag">
							<?php if(get_the_tags()) {
								foreach((get_the_tags()) as $tags) { 
								if($tags->term_id == '19' or $tags->term_id == '21' or $tags->term_id == '22') {} else {
								echo '<i class="fas fa-tags"></i> <a href="'.get_tag_link($tags->term_id).'" title="'.$tags->name.'">'.$tags->name.'</a>';
								}
							} 
						} ?>
						</div>
					</div>
					<div class="social">
						<i class="far fa-eye"></i> <?php echo get_post_meta ($post->ID,'views',true); ?>
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
				<?php
						//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА+ВАЖНО, id=(21+20)
						
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'tag__and' => array(20,21), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$img_id = get_post_thumbnail_id( $post->ID );
				?>
				<div class="content-center-card">
					<h2>
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<?php if ($img_id) { ?>
						<a href="<?php echo get_permalink(); ?>">
							<div class="img_wrapper">
								<img src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
										srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
										sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
							</div>
						</a>
					<?php } ?>
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

						$category = get_the_category(); 
						$cat__name = $category[0]->cat_name;

						$img_id = get_post_thumbnail_id( $post->ID );
				?>
				<div class="content-center-block">
						<h3>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<?php if ($img_id) { ?>
								<a href="<?php echo get_permalink(); ?>">
										<img src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
												srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
												sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
												<span><i><?php echo $cat__name; ?></i></span>
								</a>
							<?php } ?>
						
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