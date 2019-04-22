<?php get_header(); ?>

	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-3 content-left">
					<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
				</div>
				<!-- / end left -->
				<div class="col-md-6 content-center">
					<?php
						//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА+ВАЖНО, id=(21+20)
						$query = new WP_Query( array( 'tag__and' => array(20,21), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 ) );
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
						<p>
						<a href="<?php echo get_permalink(); ?>"><?php the_excerpt(); ?></a>
						</p>
						<a href="<?php echo get_permalink(); ?>"><img src="<?php echo $image_url; ?>"></a>
					</div>
					<?php } ?>
					<div class="content-center-block">
						<div class="row">
						<?php
							//Записи с меткой ЦЕНТРАЛЬНАЯ КОЛОНКА и без метки ВАЖНО, id=(21-20)
							$query = new WP_Query( array( 'tag__in'=>array(21), 'tag__not_in' => array(20), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$media = get_attached_media( 'image', $post->ID );
								$media = array_shift( $media );
								$image_url = $media->guid;

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
						?>
							<div class="col-md-6">
								<a href="<?php echo get_permalink(); ?>">
									<img src="<?php echo $image_url; ?>" alt="">
									<span><i><?php echo $cat__name; ?></i></span>
								</a>
								<h3>
									<a class="the_title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p>
									<a class="the_excerpt" href="<?php echo get_permalink(); ?>"><?php 
										$excerpt = get_the_excerpt();
										echo wp_trim_words( $excerpt , '10' ); 
									?></a>
								</p>
							</div>
						<?php } ?>
						</div>
					</div>
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
				<div class="col-md-3 content-right">
					<?php include get_theme_file_path( 'inc/right.php' ); //Подключаем правую колонку ?>
				</div>
				<!-- / end right -->
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