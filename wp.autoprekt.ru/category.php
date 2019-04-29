<?php
/**
 * The template for displaying CATEGORYS
 *
 * 
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); 
$category = get_the_category(); 
$cat__name = $category[0]->cat_name; ?>
<section class="content single_content">
	<div class="container">
		<div class="row">

			<div class="col-md-3 content-left order-2 order-md-12">
				<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
			</div>
			<!-- / end left -->

			<div class="col-md-6 content-center order-1 order-md-12">

			<?php if (have_posts()) : 
			$query = new WP_Query( array('category__in' => $cat_name) );
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
								echo wp_trim_words( $content, 60); 
						?>
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
			<?php else: ?>

				<div class="not_find text-center">
					<p>
						<i class="far fa-frown"></i>
					</p>
					<p><b>Опс...</b></p>
					<p>Похоже что мы не успели опубликовать статьию по данной теме<br>
					Узнайте первым когда она появится</p>
					<p>
						Подписаться на рассылку:
					</p>
					<?php echo do_shortcode( '[contact-form-7 id="12" title="footer_email"]' ); ?>
					<div class="policy__checked">
						<div class="radio">
							<input id="policy_callback2" type="checkbox" name="policy" checked required>
							<label for="policy_callback2">Согласен с условиями</label> <a href="/policy/" target="_blank">Политики конфиденциальности</a>
						</div>
					</div>
					<br>
					<p>
						<a href="/" class="btn btn-outline-accent">на главную</a>
					</p>
				</div>

			<?php endif;?>
			<?php
				//Вывод рекламного блока по центру
				$query = new WP_Query( array('page_id' => 108) );
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
				<div class="content-center-banner">
					<?php the_content(); ?>
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