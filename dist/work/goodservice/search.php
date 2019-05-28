<?php 
/**
 * The template for SEARCH
 *
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); ?>
<div class="content search_content">
	<div class="container">
		<div class="row">

			<div class="col-md-3 content-left order-2 order-md-12">
				<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
			</div>
			<!-- / end left -->

			<div class="col-md-9 content-center order-1 order-md-12">
				
				<p class="term">Вы искали: <strong>"<?php echo $_GET['s'];?>"</strong></p>

				
				<?php if (have_posts()) : ?>
				<div class="content-center-block">
					
				
					<?php while (have_posts()) : ?>
						
							<?php the_post(); 
				
								$media = get_attached_media( 'image', $post->ID );
								$media = array_shift( $media );
								$image_url = $media->guid;

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
								
							?>
							<div class="row">
							<?php if($image_url) { ?>
								
									<div class="col-md-3">
										<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a>
									</div>
								
							<?php } ?>
							<div class="col">
								<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
								<p><?php $content = get_the_content();
									$trimmed_content = wp_trim_words( $content, 30, '...' );
									$search_result = $trimmed_content;
									echo kama_search_backlight($search_result); ?>
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
							</div>
					<?php endwhile; ?>
					
					
				</div>
					
				<?php else: ?>

					<div class="not_find search">
						<p>
							<i class="far fa-frown"></i>
						</p>
						<p><b>Ничего не найдено</b></p>
						<p>
							попробуйте изменить поисковую фразу<br> или перейдите на главную<br>
							<a href="/" class="btn btn-outline-accent">на главную</a>
						</p>
					</div>

				<?php endif;?>
			</div>
			<!-- / end center -->

		</div>
	</div>
</div>
 <?php get_footer(); ?>