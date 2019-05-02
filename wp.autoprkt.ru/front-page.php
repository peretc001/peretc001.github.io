<?php get_header(); ?>

	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-3 content-left">
					<?php include get_theme_file_path( 'inc/left.php' ); //Подключаем левую колонку ?>
				</div>
				<!-- / end left -->
				<div class="col-md-6 content-center">
					<div class="content-center-block">
						<div class="row">
						<?php
							//Новые записи
							$query = new WP_Query( array( 'tag__not_in' => array(19,22), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 6 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$img_id = get_post_thumbnail_id( $post->ID );

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
						?>
							<div class="col-md-6">
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
										echo wp_trim_words( $excerpt , '20' ); 
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

	<?php 
    $categories = get_categories( array(
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'id',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	) );
	
	if( $categories ){
		foreach( $categories as $cat ){
			if($cat->category_parent || $cat->term_id == 1) {}
			else {
?>

	<section class="category">
		<div class="container">
			<div class="row">
				
				<div class="col-md-3 category-left">
				<?php
					//Записи с рубрикой Инвестиции
					$cat_id = $cat->term_id;
					$query = new WP_Query( array( 'category__in' => $cat_id, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 ) );
					while ( $query->have_posts() ) {
						$query->the_post();

						$img_id = get_post_thumbnail_id( $post->ID );

						$category = get_the_category(); 
						$cat_name = $category[0]->cat_name;

						$first_id = $post->ID;
				?>
					<?php if ($img_id) { ?><a href="<?php echo get_permalink(); ?>">
					<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
								srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
								sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
								<span><i><?php echo $cat_name; ?></i></span>
					</a><?php } ?>
					<h2>
						<a class="the_title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<p>
						<a class="the_excerpt" href="<?php echo get_permalink(); ?>"><?php 
							$excerpt = get_the_excerpt();
							echo wp_trim_words( $excerpt , '20' ); 
						?></a>
					</p>
				<?php } ?>
				</div>
				<!-- /.category-left -->

				<div class="col-md-6 category-center">
					<div class="category-menu<?php if($category[1]) { echo ' active'; } ?>">
						<?php if($category[1]) { ?>
						<?php wp_list_categories(array('child_of' => $cat_id, 'hide_empty' => 1, 'style' => 'none', 'number' => 6)); ?>
						<?php } ?>
					</div>
					<!-- /.category-menu -->

					<div class="row">
						<?php
							$query = new WP_Query( array( 'post__not_in' => array($first_id), 'category__in' => $cat_id, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 ) );
							while ( $query->have_posts() ) {
								$query->the_post();
								
								$count = $query->post_count;

								$img_id = get_post_thumbnail_id( $post->ID );
						?>
						<div class="col-lg-<?php if($count == 3 or $count == 6) { echo '4'; } else { echo '6'; } ?> category-center-item">
							<?php if ($img_id) { ?>
								<a href="<?php echo get_permalink(); ?>">
									<div class="img_wrapper">
										<img src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
												srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
												sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
									</div>
								</a>
							<?php } ?>
							<h4>
								<a class="the_title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<p>
								<a class="the_excerpt" href="<?php echo get_permalink(); ?>"><?php 
									$excerpt = get_the_excerpt();
									echo wp_trim_words( $excerpt , '20' ); 
								?></a>
							</p>
						</div>
						<?php } ?>
					
					</div>
					<!-- /.row -->
				</div>
				<!-- /.content-center -->

				<div class="col-md-3 category-right">
					<?php
						$query = new WP_Query( array( 'category__in' => $cat_id, 'post_type' => 'post', 'orderby' => 'meta_value_num', 'meta_key' => 'views', 'order' => 'DESC', 'posts_per_page' => 2 ) );
						$i = 0;
						while ( $query->have_posts() ) {
							$query->the_post();
							
							$img_id = get_post_thumbnail_id( $post->ID );
					?>
					<?php if ($img_id and $i == '0') { ?><a href="<?php echo get_permalink(); ?>">
						<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
									srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
									sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
									<span><i>Самое читаемое</i></span>
					</a><?php } ?>
					<a href="<?php echo get_permalink(); ?>">
					<div class="category-right-views">
							<i class="far fa-eye"></i> <?php if(get_post_meta ($post->ID,'views',true) != '') { echo get_post_meta ($post->ID,'views',true); } else { echo '0'; } ?>
						</div>
						<h5><?php the_title(); ?></h5>
						<p>
							<?php 
								$excerpt = get_the_excerpt();
								echo wp_trim_words( $excerpt , '10' ); 
							?>
						</p>
					</a>
					<?php wp_reset_postdata(); ?>
					<?php $i++; }  ?>
				</div>
				<!-- /.content-right -->
			</div>
		</div>
	</section>
<?
			}
		}
	}
?>
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
sliceTheExcerpt('.the_title', 48);
</script>
<?php get_footer(); ?>