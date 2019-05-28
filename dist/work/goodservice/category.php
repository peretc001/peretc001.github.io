<?php
/**
 * The template for displaying CATEGORYS
 *
 * 
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
					<h1>
						<?php echo $cat_title = single_cat_title(); 
							
							$category = get_category(get_query_var('cat'));
							$current = $category->parent;
						?>
					</h1>
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
				query_posts( array('category__in' => $category, 'posts_per_page' => 12) );
				
				#$query = new WP_Query( array('category__not_in' => $cat_name, 'posts_per_page' => 1);
				if( have_posts() ){ 
					while( have_posts() ){ 
						 the_post();
					
					$img_id = get_post_thumbnail_id( $post->ID );
				?>
					<a href="<?php echo get_permalink(); ?>"><b><?php the_title(); ?></b></a><br />
					<div class="row category_desc">
						<div class="col-lg-4">
							<div class="img_wrapper">
								<a href="<?php echo get_permalink(); ?>">
									<img 	class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
								</a>
							</div>
						</div>
						<div class="col the_excerpt">
							<p class="the_excerpt">
								<?php $content = get_the_content();
										echo wp_trim_words( $content, '40'); 
								?>
							</p>
						</div>
					</div>
					<?php }
				wp_reset_query();
				
				// End of the loop. ?>
				<?php } else { ?>

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

				<?php }
				
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