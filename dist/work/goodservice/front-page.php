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
							$query = new WP_Query( array( 'tag__not_in' => array(19,22), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 8 ) );
							while ( $query->have_posts() ) {
								$query->the_post();

								$img_id = get_post_thumbnail_id( $post->ID );

								$category = get_the_category(); 
								$cat__name = $category[0]->cat_name;
						?>
							<div class="col-lg-6">
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
					<?php
						//Вывод рекламного блока
						$options = get_option( 'optimazedReklama_settings' ); 
						if($options['single']) { ?>
					<div class="content-center-banner">
						<?php echo $options['single']; ?>
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
	//Пиздец тут четр ногу сломит, сам удивляюсь как я это написал
	//выводим список категорий по алфавиту
    $categories = get_categories( array(
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'id',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '1',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	) );
	//Создаем функцию, которая по id Главной рубрики собирает id Подрубрик
	function the_services_navigations($item){
		// Получить данные рубрик, в том числе и без записей, у которых родительская рубрика с ID = 6
		$cat_data = get_categories( array( 'parent' => $item, 'hide_empty' => 1 ) );
		if ( $cat_data ) {
		 $cat_links = '';
		 foreach ( $cat_data as $one_cat_data) {
			//Запихиваем id подрубрик в массив
			$termid[] = $one_cat_data->term_id;
		 }
		 return $termid;
		}
	 }
	//Если у нас есть категории
	if( $categories ){
		foreach( $categories as $cat ){
			//Если нет дочерних рубрик пропускае
			if ($cat->category_parent) {}
			else {					
				//Выводим ту блядскую функцию, которая собирала id подрубрик
				$cat_id = the_services_navigations($cat->term_id);
				//Если подрубрики есть нихуя не делаем
				if($cat_id != null) {}
				//Если нет, ТОГДА это Родительская рубрика, присваиваем ее id
				else {
					$cat_id = $cat->term_id;
				}
// А теперь просто все выводим на экран		
?>	
	<section class="category">
		<div class="container">
			<div class="category-title">
				<h2><?php echo $cat->cat_name; ?></h2>
			</div>
			<div class="row">

				<div class="col-md-7 col-lg-9 category-left">
					<div class="row">
						<?php
							$query = new WP_Query( array( 'category__in' => $cat_id, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 ) );
							while ( $query->have_posts() ) { $query->the_post();
								$img_id = get_post_thumbnail_id( $post->ID );
						?>
						<div class="col-lg-4">
							<?php if ($img_id) { ?>
							<a href="<?php echo get_permalink(); ?>">
								<div class="img_wrapper">
									<img class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
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
				<!-- /.content-left -->

				<div class="col-md-5 col-lg-3 category-right">
					<?php
						$query = new WP_Query( array( 'category__in' => $cat_id, 'post_type' => 'post', 'orderby' => 'meta_value_num', 'meta_key' => 'views', 'order' => 'DESC', 'posts_per_page' => 1 ) );
						$i = 0;
						while ( $query->have_posts() ) {
							$query->the_post();
							
							$img_id = get_post_thumbnail_id( $post->ID );
					?>
					<?php if ($img_id and $i == '0') { ?><a href="<?php echo get_permalink(); ?>">
						<img class="lazy" src="<?php echo get_stylesheet_directory_uri() .'/img/img.jpg'; ?>" data-src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
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
sliceTheExcerpt('.the_title', 35);
sliceTheExcerpt('.the_excerpt', 100);
</script>
<?php get_footer(); ?>