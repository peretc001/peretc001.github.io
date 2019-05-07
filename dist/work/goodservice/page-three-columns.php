<?php
/**
 * Template Name: На всю ширину
 * Template Post Type: page
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

			<div class="col-md-12 content-center">

			<?php
				while ( have_posts() ) : the_post(); 
				
				$category = get_the_category(); 
				$cat__name = $category[0]->cat_name;

				$media = get_attached_media( 'image', $post->ID );
				$media = array_shift( $media );
				$image_url = $media->guid;

				$tags = get_the_tags();
			?>
			
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<div class="single_content_line">
					<div class="category">
						<div class="single_category_tag"> </div>
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
					echo $category_name;
						//Последние записи
						$query = new WP_Query( array( 'post__not_in' => array($post_id), 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 ) );
						while ( $query->have_posts() ) {
							$query->the_post();

							$media = get_attached_media( 'image', $post->ID );
							$media = array_shift( $media );
							$image_url = $media->guid;

							if($image_url) {
					?>
						<div class="col-md-4">
							<a href="<?php echo get_permalink(); ?>">
								<img src="<?php echo $image_url; ?>" alt="">
							</a>
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
					<?php } } ?>
					</div>
				</div>

			</div>
			<!-- / end center -->
		</div>
	</div>
</section>
		

<script>
let tags = <?php echo json_encode($tags) ?>; //Передаем массив МЕТОК из PHP в JS
single_category_tag = document.querySelector('.single_category_tag'); //Находим css класс куда будет записывать МЕТКИ

let tagList = tags.filter( item => item.term_id != 19 && item.term_id != 21 && item.term_id != 22 ) //Фильтруем метки и удаляем оттуда по ID те которые не нужны
.forEach(item => {
	if(item) {
		let card = document.createElement('a'); //Создаем ссылку
		card.innerHTML = `<i class="fas fa-tag"></i> <a href="/tags/${item.slug}/">${item.name}</a>`; // Запихиваем в нее отфильтрованные метки
		single_category_tag.appendChild(card); //Вставляем на страницу
	}
});
//Обрезаем Заголовок и Анонс
function sliceTheExcerpt(selector, count) {
	document.querySelectorAll(selector).forEach(item => {
		item.textContent.trim();
		console.log(item.textContent);
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