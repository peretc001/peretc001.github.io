<?php 
/**
 * The template for displaying POSTS
 *
 * 
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); 
	$cat = get_the_category($post->ID);
	$current = $cat[0]->term_id;
	$category = $cat[0]->cat_name;
	$slug = $cat[0]->slug;
?>
	<section class="single">
		<div class="container">
			<div class="breadcrumbs">
				<a href="/">Главная</a> > <a href="/<?php echo $slug; ?>/"><?php echo $category; ?></a> > <?php the_title(); ?>
			</div>
			<?php 
				while ( have_posts() ) : the_post();
			?>
			<h1><?php the_title(); ?></h1>	
			<?php the_content(); ?>
			<?php 
				endwhile; 
			?>
			<div class="row news">
				<?php
					$query = new WP_Query( array( 'post__not_in' => array($post->ID), 'category__in' => $current, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 2 ) );
					while ( $query->have_posts() ) { $query->the_post();
						$img_id = get_post_thumbnail_id( $post->ID );
				?>
				<div class="col-md-6">
					<h4><a href="<?php echo get_permalink(); ?>"  class="news_title"><?php the_title(); ?></a></h4>
					<?php if ($img_id) { ?>
						<a href="<?php echo get_permalink(); ?>">
							<div class="img_wrapper">
								<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
											srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
											sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
											<span><i><?php echo (get_post_meta($post->ID, 'Вид работ', true)); ?></i></span>
							</div>
						</a>
					<?php } ?>
					<p>
						<?php $excerpt = get_the_excerpt(); echo wp_trim_words( $excerpt , '20' ); ?>
					</p>
					<a href="<?php echo get_permalink(); ?>" class="btn btn-outline-dark">подробнее</a>	
				</div>
				<?php } ?>
			</div>

		</div>
	</section>	
<?php get_footer(); ?>
<script>
	//Обрезаем Заголовок новости
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
	sliceTheExcerpt('.news_title', 70);
</script>