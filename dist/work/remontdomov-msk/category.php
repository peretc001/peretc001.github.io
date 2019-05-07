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
	$cat = get_the_category($post->ID);
	$current = $cat[0]->term_id;
	$category = $cat[0]->cat_name;
	$slug = $cat[0]->slug;
?>
<section class="category">
	<div class="container">
			<div class="breadcrumbs">
				<a href="/">Главная</a> > <?php echo $category; ?>
			</div>
			<h3 class="h2_title"><?php echo $category; ?></h3>
			<div class="row">
			<?php
					$query = new WP_Query( array( 'category__in' => $current, 'orderby' => 'date', 'order' => 'DESC' ) );
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
		

<?php get_footer(); ?>