<?php get_header(); ?>

<section class="not_find">
	<div class="container">
		<p>Опс... такой страницы не существует &nbsp;&nbsp;&nbsp;&nbsp;<a href="/" class="btn btn-outline-accent">на главную</a></p>
		<p>Возможно вас заинтересуют самые свежие записи:</p>
	</div>
</section>

<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-12 content-center">
					<div class="content-center-block">
						<div class="row">
						<?php
							//Новые записи
							$query = new WP_Query( array( 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$img_id = get_post_thumbnail_id( $post->ID );

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
						?>
							<div class="col-sm-6 col-md-4 col-lg-3">
								<?php if ($img_id) { ?>
									<a href="<?php echo get_permalink(); ?>">
									<div class="img_wrapper">
										<img class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
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
										echo wp_trim_words( $excerpt , '20' ); 
									?></a>
								</p>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>


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
sliceTheExcerpt('.the_title', 35);
sliceTheExcerpt('.the_excerpt', 100);
</script>
<?php get_footer(); ?>

<?php get_footer(); ?>
		