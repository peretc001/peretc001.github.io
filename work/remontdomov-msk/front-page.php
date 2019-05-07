<?php get_header(); 
$options = get_option( 'optimazedLanding_settings' ); ?>
	
	<div class="header" id="header" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/header.jpg'; ?>')">
		<div class="container">
			<div class="logo">
				<img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>" alt="">
				<button class="btn btn-accent" data-toggle="modal" data-target="#callbackModal" data-whatever="Шапка: Обратный звонок" data-title="Заказать звонок">Заказать звонок</button>
			</div>
		</div>
		<div class="container header-content">
			<h1><?php echo $options['header__h1']; ?></h1>
			<p><?php echo $options['header__p']; ?></p>
			<p>
				<a href="#price" class="btn btn-accent">Цены</a>
				<a href="#portfolio" class="btn btn-accent">Портфолио</a>
			</p>
		</div>
	</div>
	
	<section class="advantages" id="advantages" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title"><?php echo $options['advantages__h2']; ?></h2>
			<div class="row">
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3>
						<?php echo $options['advantages__h3__1']; ?>
					</h3>
					<p><?php echo $options['advantages__p__1']; ?></p>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3>
						<?php echo $options['advantages__h3__2']; ?>
					</h3>
					<p><?php echo $options['advantages__p__2']; ?></p>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3>
						<?php echo $options['advantages__h3__3']; ?>
					</h3>
					<p><?php echo $options['advantages__p__3']; ?></p>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3>
						<?php echo $options['advantages__h3__4']; ?>
					</h3>
					<p><?php echo $options['advantages__p__4']; ?></p>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3>
						<?php echo $options['advantages__h3__5']; ?>
					</h3>
					<p><?php echo $options['advantages__p__5']; ?></p>
				</div>
				<div class="col-sm-6 col-lg-4 feature-box fbox-center fbox-border fbox-effect noborder">
					<div class="fbox-icon">
						<i class="icon-ok"></i>
					</div>
					<h3>
						<?php echo $options['advantages__h3__6']; ?>
					</h3>
					<p><?php echo $options['advantages__p__6']; ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="price" id="price" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title"><?php echo $options['price__h2']; ?></h2>
			<div class="row">
				<div class="col-md-4">
					<div class="services-item" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/price/1.jpg'; ?>')">
						<div class="services-item__title"><?php echo $options['price__item__name__1']; ?></div>
						<div class="services-item__text">от <?php echo $options['price__item__price__1']; ?> <span>руб/м<sup>2</sup></span></div>
						<a class="more-link" data-toggle="modal" data-target="#callbackModal" data-whatever="Стоимость ремонта - Стандарт" data-title="Заказать ремонт"><i class="fas fa-chevron-right icon icon-more"></i> заказать ремонт</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="services-item"  style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/price/2.jpg'; ?>')">
						<div class="services-item__title"><?php echo $options['price__item__name__2']; ?></div>
						<div class="services-item__text">от <?php echo $options['price__item__price__2']; ?> <span>руб/м<sup>2</sup></span></div>
						<a class="more-link" data-toggle="modal" data-target="#callbackModal" data-whatever="Стоимость ремонта - Бизнес" data-title="Заказать ремонт"><i class="fas fa-chevron-right icon icon-more"></i> заказать ремонт</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="services-item" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/price/3.jpg'; ?>')">
						<div class="services-item__title"><?php echo $options['price__item__name__3']; ?></div>
						<div class="services-item__text">от <?php echo $options['price__item__price__3']; ?> <span>руб/м<sup>2</sup></span></div>
						<a class="more-link" data-toggle="modal" data-target="#callbackModal" data-whatever="Стоимость ремонта - Эксклюзив" data-title="Заказать ремонт"><i class="fas fa-chevron-right icon icon-more"></i> заказать ремонт</a>
					</div>
				</div>
			</div>
			<!-- <div class="text-center">
				<a href="" class="btn btn-accent"><i class="fas fa-calculator"></i> Калькулятор стоимости</a>
			</div> -->
		</div>
	</section>
	
	<section class="portfolio" id="portfolio" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/pattern.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title">Портфолио</h2>
			<div class="row">
				<?php
					$query = new WP_Query( array( 'category__in' => 3, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 6 ) );
					while ( $query->have_posts() ) {
						$query->the_post();

						$img_id = get_post_thumbnail_id( $post->ID );
				?>
				<div class="col-md-6">
					<a href="<?php echo get_permalink(); ?>" class="portfolio-item">
						<?php if ($img_id) { ?>
						<div class="img_wrapper">
							<img 	src="<?php echo wp_get_attachment_image_url( $img_id, 'medium' ) ?>"
										srcset="<?php echo wp_get_attachment_image_srcset( $img_id, 'medium' ) ?>"
										sizes="<?php echo wp_get_attachment_image_sizes( $img_id, 'medium' ) ?>" alt="<?php the_title(); ?>">
										<span><i><?php echo (get_post_meta($post->ID, 'Вид работ', true)); ?></i></span>
						</div>
						<?php } ?>
						<p><b><?php the_title(); ?></b></p>
						<p><?php echo (get_post_meta($post->ID, 'Адрес поселка', true)); ?></p>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="steps"  style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/steps.jpg'; ?>')">
		<div class="container">
			<h3 class="h2_title title_white"><?php echo $options['steps__h3']; ?></h3>
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/call.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__1']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/rulers.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__2']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/price.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__3']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/doc.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__4']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/paint-roller.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__5']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/pay.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__6']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/dust.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__7']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/employee.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__8']; ?></p>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/steps/final.svg'; ?>" alt="">
					<p><?php echo $options['steps__item__9']; ?></p>
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-accent" data-toggle="modal" data-target="#callbackModal" data-whatever="Как заказать ремонт дома" data-title="Заказать ремонт"><i class="fas fa-tools"></i> Заказать ремонт</button>
			</div>
		</div>
	</section>

	<section class="review" id="reviews"  style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/review.jpg'; ?>')">
		<div class="container">
			<h2 class="h2_title title_white">Отзывы наших клиентов</h2>
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-sm-12">
					
					<div class="owl-carousel review-carousel">
					<?php
						$query = new WP_Query( array( 'category__in' => 5, 'orderby' => 'date', 'order' => 'DESC' ) );
						while ( $query->have_posts() ) {
							$query->the_post();
					?>
						<div class="review-carousel-item">
							<p class="review-carousel-item__title">
								<?php the_title(); ?>
							</p>
							<div class="review-carousel-item__date"><?php echo the_date('d F Y'); ?></div>
							<div class="review-carousel-item__rating">
								<?php 
								#Выводим рейтинг
								$num = get_post_meta($post->ID, 'Рейтинг', true); 
								for ($i = 0; $i < $num; $i++) {
									echo '<i class="fas fa-star"></i>'; 
								} ?>
							</div>
							<div class="review-carousel-item__text">
								<?php the_content(); ?>
							</div>
						</div>
					<?php } ?>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<section class="news" id="news">
		<div class="container">
			<h3 class="h2_title">Новости</h3>
			<div class="row">
			<?php
					$query = new WP_Query( array( 'category__not_in' => array(3,5), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4 ) );
					while ( $query->have_posts() ) {
						$query->the_post();
				?>
				<div class="col-md-6">
					<h4><a href="<?php echo get_permalink(); ?>"  class="news_title"><?php the_title(); ?></a></h4>
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
	<?php if( is_front_page() ) { ?>
		const anchors = document.querySelectorAll('.nav-link');

		for (let anchor of anchors) {
			anchor.addEventListener('click', function (e) {
				e.preventDefault()
				let block = anchor.getAttribute('href');

				const blockID = block.replace('/','');
				
				document.querySelector('' + blockID).scrollIntoView({
				behavior: 'smooth',
				block: 'start'
				})
			})
		}
	<?php } ?>
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