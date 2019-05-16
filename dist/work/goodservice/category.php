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

get_header(); ?>
<section class="content single_content">
	<div class="container">
		<div class="row">

			<div class="col-md-3 content-left order-2 order-md-12">
				<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
			</div>
			<!-- / end left -->

			<div class="col-md-9 content-center order-1 order-md-12">
				<div class="content-center-card mb-4">
					<h2>
						<?php echo $cat_title = single_cat_title(); 
							
							$category = get_category(get_query_var('cat'));
							$current = $category->parent;
						?>
					</h2>
					<div class="hide_description">
						<?php 
							$excerpt = term_description();
							#echo wp_trim_words( $excerpt , '40' ); 
							echo $excerpt;
						?>
					</div>
					<div class="text-center">
						<a href="#" class="btn btn-outline-accent show_description">показать <i class="fas fa-angle-down"></i></a>
					</div>
				</div>
				<?php
					//Вывод рекламного блока
					$options = get_option( 'optimazedReklama_settings' ); 
					if($options['single']) { ?>
				<div class="content-center-banner">
					<?php echo $options['single']; ?>
				</div>
				<?php }	?>
				<?php
					echo $cat_list = wp_list_categories(array('child_of' => get_query_var('cat'), 'style' => 'none', 'taxonomy' => 'category', 'hide_empty' => 0, 'show_option_none' => '', 'echo' => 0, 'walker' => new Walker_MY_Category ));
				?>
			
			<?php 
			if($current != '0') {
				if (have_posts()) : 
				$query = new WP_Query( array('category__not_in' => $cat_name) );
				/* Start the Loop */
				while ( have_posts() ) : the_post(); 
					
					$img_id = get_post_thumbnail_id( $post->ID );
				?>
					<div class="content-center-card">
						<h2>
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<?php if ($img_id) { ?>
							<a href="<?php echo get_permalink(); ?>">
								<div class="img_wrapper">
									<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
												srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
												sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
								</div>
							</a>
						<?php } ?>
						<p class="the_excerpt">
							<?php $content = get_the_content();
									echo wp_trim_words( $content, '40'); 
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

				<?php endif;
				
				} ?>
				
			</div>
			<!-- / end center -->
		</div>
	</div>
</section>
		
<script>
//Обрезаем Заголовок и Анонс
function sliceTheExcerpt(selector, count) {
	document.querySelectorAll(selector).forEach(item => {
		item.textContent.trim();
		if(item.textContent.length < count) { return }
		else {
			const str = item.textContent.slice(0, count + 1) + "...";
			item.textContent = str;
		}
	});
}
sliceTheExcerpt('.the_excerpt', 300);
</script>
<?php get_footer(); ?>