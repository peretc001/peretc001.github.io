<?php
/**
 * The template for displaying all single posts
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

			<?php
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
							<?php foreach((get_the_tags()) as $tags) { 
								if($tags->term_id == '19' or $tags->term_id == '21' or $tags->term_id == '22') {} else {
								echo '<i class="fas fa-tags"></i> <a href="'.get_tag_link($tags->term_id).'" title="'.$tags->name.'">'.$tags->name.'</a>';
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
				//Вывод рекламного блока по центру
				$query = new WP_Query( array('page_id' => 108) );
				while ( $query->have_posts() ) {
					$query->the_post(); ?>
				<div class="content-center-banner">
					<?php the_content(); ?>
				</div>
			<?php }	?>
			
			<div class="content-center-block">
				<p>Еще по теме:</p>
				<div class="row">
					<?php
						//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА и без метки ВАЖНО, id=(21-20)
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'category_name' => $current, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$post_category = get_the_category($post->ID); 
							$cat__name = $post_category[0]->cat_name;
			
							$img_id = get_post_thumbnail_id( $post->ID );
					?>
						<div class="col-md-4">
							<?php if ($img_id) { ?>
								<a href="<?php echo get_permalink(); ?>">
									<div class="img_wrapper">
										<img src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
												srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
												sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
												<span><i><?php echo $cat__name; ?></i></span>
									</div>
								</a>
							<?php } ?>
							<h3>
								<a class="the_title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p>
								<a class="the_excerpt" href="<?php echo get_permalink(); ?>"><?php 
									$excerpt = get_the_excerpt();
									echo wp_trim_words( $excerpt , 10); 
								?></a>
							</p>
						</div>
					<?php } ?>
					</div>
				</div>

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
sliceTheExcerpt('.the_title', 40);
</script>

<?php get_footer(); ?>