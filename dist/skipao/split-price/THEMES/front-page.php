<?php 
/**
* The template for displaying front-page
*
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

#Меню редактирунтся в файле header.php
get_header(); 
$options = get_option( 'skipao_settings' );
?>

<!-- Header -->
<?php #Данный блок редактируется в админке -> Страницы -> Главная
		$query = new WP_Query('page_id=2&post_type=page');
			if ($query->have_posts()):
			while ( $query->have_posts() ) : $query->the_post();
			$post_tumb = get_post_thumbnail_id( $post->ID );
	?>
	<section class="header lazy" style="background-image: url('<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>')">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
						<?php echo the_content(); ?>
				</div>
				<div class="col-md-5 right">
					<!-- Форма обратной связи -->
					<div class="consultation">
						<form action="/" class="form_consult callback__form" method="post">
							<p>Получить консультацию</p>
							<div class="consultation__row">
								<input type="hidden" name="human" value="">
								<input type="tel" name="phone" class="form-control tel" value="" placeholder="Телефон" required>
								<button type="submit" class="btn btn-dark callback__form__button">Получить</button>
							</div>
							<div class="robot">
								<div class="robot__check">
									<svg viewBox="0 0 60 60">
										<line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
										<line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
									</svg>
								</div>
								<span>Согласен с условиями <a href="#" data-toggle="modal" data-target="#policy">Политики конфиденциальности</a></span>
							</div>
						</form>
						<div class="request_callback">Заявка принята!!!</div>
					</div>
					<!-- Конец формы обратной связи -->
				</div>
			</div>
		</div>
	</section>
	<?php
		endwhile; wp_reset_postdata();
		endif;
	?>
<!-- End Header -->

<!-- About -->
	<section class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 left">
				<?php #Данный блок редактируется в админке -> Страницы -> О компании
					$query = new WP_Query('page_id=29&post_type=page');
						if ($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post();
				?>
					<h1 class="h2__title liner">
						<?php echo the_title(); ?>
					</h1>
					<?php echo the_content(); ?>
				</div>
				<?php
					endwhile; wp_reset_postdata();
					endif;
				?>
				<div class="col-lg-5">
					<div class="proposal">
						<h4><span>Предлагаем</span></h4>
						<div class="credit">
							<img src="<?php echo get_template_directory_uri(); ?>/img/about/discount.svg" alt="">
							<a href="" data-toggle="modal" data-target="#credit" 
                        		data-credit="Заявка на кредит" ><span>Кредит</span></a>
						</div>
						<div class="credit">
							<img src="<?php echo get_template_directory_uri(); ?>/img/about/calendar.svg" alt="">
							<a href="" data-toggle="modal" data-target="#credit" 
                        		data-credit="Заявка на рассрочку" ><span>Рассрочка</span></a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
<!-- End About -->

<!-- Top ptoducts -->
	<section class="top__product">
		<div class="container">
			<h2 class="h2__title liner">
				ВИТРИНА сплит-систем 
			</h2>
			
			<ul class="nav nav-pills nav__tabs__menu" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-top-tab" data-toggle="pill" href="#pills-top" role="tab" aria-controls="pills-top" aria-selected="true">ТОП продаж</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-action-tab" data-toggle="pill" href="#pills-action" role="tab" aria-controls="pills-action" aria-selected="false">Лучшая цена</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="false">Рекомендуемые</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-invertor-tab" data-toggle="pill" href="#pills-invertor" role="tab" aria-controls="pills-invertor" aria-selected="false">Инверторные</a>
				</li>
			</ul>

			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-top" role="tabpanel" aria-labelledby="pills-top-tab">
					<!-- Tab1 -->
					<div class="product__carousel init">
					<?php 
						$query = new WP_Query(array ( 'tax_query' => array(
							array(
								'taxonomy' => 'brands',
								'field'    => 'id',
								'terms'    => 92
							)
							), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
							if ($query->have_posts()):
							$i = 0;
							while ( $query->have_posts() ) : $query->the_post();

							$term_list = wp_get_post_terms( $post->ID, 'brands', array('fields' => 'all') );
							foreach($term_list as $term) {
								if ($term->slug != 'top' &&  $term->slug != 'price' &&  $term->slug != 'recent' &&  $term->slug != 'inventor') {
									$brand_slug = $term->slug;
									$brand_name = $term->name;
									$brand_id = $term->term_id;
								}
							}							
							$post_tumb = get_post_thumbnail_id( $post->ID );
					?>
						<!-- Card -->
						<div class="top__card">
							<div class="top__card__header">
								<div class="top__card__header__img">
									<a data-fancybox href="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>">
										<img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" alt="<?php echo the_title(); ?>">
									</a>
								</div>
								<div class="top__card__header__title">
									<div class="top__card__header__title__wrap">
										<div class="top__card__header__title__caption">
											<h3><a href="/brands/<?php echo $brand_slug; ?>/"><?php echo $brand_name; ?></a> <?php echo the_title(); ?></h3>
										</div>
										<!-- TAB -->
										<div class="top__card__header__title__caption__tabs">
											<ul class="nav nav-pills nav__tabs__card" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about<?php echo $i; ?>" role="tab" aria-controls="pills-about" aria-selected="true">Описание</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-tech-tab" data-toggle="pill" href="#pills-tech<?php echo $i; ?>" role="tab" aria-controls="pills-tech" aria-selected="false">Характеристики</a>
												</li>
											</ul>
											<div class="top__card__header__title__caption__tabs__warrantly">
												<p><b>Звоните:</b> <a class="phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
											</div>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade" id="pills-about<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-top-about">
												<div class="slice brand__about">
													<?php echo the_excerpt(); ?>
												</div>
											</div>
											<div class="tab-pane fade show active" id="pills-tech<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-tech-tab">
													<!-- Start Tech -->
													<ul class="tech__list">
														<li class="tech__list__item">
															<span>Завод изготовитель</span>
															<span>
															<?php
																if ( get_field( 'zavod_izgotovitel', $post->ID ) ): ?>
																<?php the_field( 'zavod_izgotovitel' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Страна бренда</span>
															<span>
															<?php
																if ( get_field( 'strana_brenda', $post->ID ) ): ?>
																<?php the_field( 'strana_brenda' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Ионизация</span>
															<span>
															<?php
																if ( get_field( 'ionizacziya', $post->ID ) ): ?>
																<?php the_field( 'ionizacziya' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Уровень шума</span>
															<span>
															<?php
																if ( get_field( 'uroven_shuma', $post->ID ) ): ?>
																<?php the_field( 'uroven_shuma' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Тип компрессора</span>
															<span>
															<?php
																if ( get_field( 'tip_kompressora', $post->ID ) ): ?>
																<?php the_field( 'tip_kompressora' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Класс энергоэффективности</span>
															<span>
															<?php
																if ( get_field( 'klass_energoeffektivnosti', $post->ID ) ): ?>
																<?php the_field( 'klass_energoeffektivnosti' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Wi-Fi</span>
															<span>
															<?php
																if ( get_field( 'wi-fi', $post->ID ) ): ?>
																<?php the_field( 'wi-fi' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Марка компрессора</span>
															<span>
															<?php
																if ( get_field( 'tajmer', $post->ID ) ): ?>
																<?php the_field( 'tajmer' ); ?>
															<?php endif; ?>
															</span>
														</li>
													</ul>
													<!-- End Tech -->
											</div>
										</div>
										<!-- END TAB -->
									</div>
									<div class="top__card__header__title__bottom">
										<?php
													if ( get_field( 'garanty', $post->ID ) ): ?>
													<p><?php the_field( 'garanty' ); ?></p>
												<?php endif; ?>
										<div class="url"><a href="/brands/<?php echo $brand_slug; ?>/">Все серии</a> <a class="orange" href="<?php echo get_permalink(); ?>">ПОЛНЫЕ характеристики ОЗНАКОМЬТЕСЬ!!!</a></div>
									</div>
								</div>
							</div>
							<div class="top__card__body">
								<!-- Table -->
								<table class="table">
									<thead>
										<tr>
											<td class="model">Модель</td>
											<td>Площадь, м<sup>2</sup></td>
											<td>Холод, квт</td>
											<td>Тепло, квт</td>
											<td class="size">Размер, мм</td>
											<td>Цена, руб</td>
											<td class="note">Примечание</td>
											<td></td>
										</tr>
										<tr>
											
										</tr>
									</thead>
									<tbody>
										<?php 
										$models = query_posts( array(
											'post_type' => 'models',
											'post_parent__in' => array($post->ID),
											'posts_per_page'=>-1, 
											'orderby'=>'post_title', 
											'order'=>'ASC',
										));
											if ($models) {
												foreach( $models as $model ){ 
										?>
										<tr>
											<td class="model"><p><?php echo esc_html($model->post_title); ?></p></td>
											<td class="square"><p>до <?php
																if ( $model_square = get_field( 'square', $model->ID ) ): ?>
																<?php echo the_field( 'square', $model->ID ); ?>
															<?php endif; ?></p>
												<p><?php 
													echo add_shortcode_skipao_mobile_model($model_square);
												?></p>
											</td>
											<td class="twin"><p><?php
																if ( get_field( 'cold', $model->ID ) ): ?>
																<?php echo the_field( 'cold', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="twin"><p><?php
																if ( get_field( 'hot', $model->ID ) ): ?>
																<?php echo the_field( 'hot', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="size"><p><?php
																if ( get_field( 'size', $model->ID ) ): ?>
																<?php echo the_field( 'size', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="price"><p><?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="note"><p><?php
																if ( get_field( 'primechanie', $model->ID ) ): ?>
																<?php echo the_field( 'primechanie', $model->ID ); ?>
															<?php else: echo 'В наличии'; endif; ?></p></td>
											<td class="buy">
												<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#add" 
													data-name="Заказать сплит-систему" 
													data-title="<?php echo esc_html($brand_name .' '. $post->post_title); ?>"
													data-model="<?php echo esc_html($model->post_title); ?>"
													data-price="<?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?>">
													<img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg"> <span>Купить</span>
												</a>
											</td>
										</tr>
										<?php } } ?>
									</tbody>
								</table>
								<!-- End Table -->
							</div>
							
							
						</div>
						<!-- End Card -->
					<?php
						$i++;
						endwhile; wp_reset_postdata();
						endif;
					?>
					</div>
					<!-- End TAB1 -->
				</div>
				<div class="tab-pane fade" id="pills-action" role="tabpanel" aria-labelledby="pills-action-tab">
					<!-- Tab2 -->
					<div class="product__carousel init">
					<?php 
						$query = new WP_Query(array ( 'tax_query' => array(
							array(
								'taxonomy' => 'brands',
								'field'    => 'id',
								'terms'    => 93
							)
							), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
							if ($query->have_posts()):
							$i = 10;
							while ( $query->have_posts() ) : $query->the_post();

							$term_list = wp_get_post_terms( $post->ID, 'brands', array('fields' => 'all') );
							foreach($term_list as $term) {
								if ($term->slug != 'top' &&  $term->slug != 'price' &&  $term->slug != 'recent' &&  $term->slug != 'inventor') {
									$brand_slug = $term->slug;
									$brand_name = $term->name;
									$brand_id = $term->term_id;
								}
							}							
							$post_tumb = get_post_thumbnail_id( $post->ID );
					?>
						<!-- Card -->
						<div class="top__card">
							<div class="top__card__header">
								<div class="top__card__header__img">
									<a data-fancybox href="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>">
										<img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" alt="<?php echo the_title(); ?>">
									</a>
								</div>
								<div class="top__card__header__title">
									<div class="top__card__header__title__wrap">
										<div class="top__card__header__title__caption">
											<h3><a href="/brands/<?php echo $brand_slug; ?>/"><?php echo $brand_name; ?></a> <?php echo the_title(); ?></h3>
										</div>
										<!-- TAB -->
										<div class="top__card__header__title__caption__tabs">
											<ul class="nav nav-pills" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about<?php echo $i; ?>" role="tab" aria-controls="pills-about" aria-selected="true">Описание</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-tech-tab" data-toggle="pill" href="#pills-tech<?php echo $i; ?>" role="tab" aria-controls="pills-tech" aria-selected="false">Характеристики</a>
												</li>
											</ul>
											<div class="top__card__header__title__caption__tabs__warrantly">
												<p><b>Звоните:</b> <a class="phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
											</div>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade" id="pills-about<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-top-about">
												<div class="slice brand__about">
													<?php echo the_excerpt(); ?>
												</div>
											</div>
											<div class="tab-pane fade show active" id="pills-tech<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-tech-tab">
													<!-- Start Tech -->
													<ul class="tech__list">
														<li class="tech__list__item">
															<span>Завод изготовитель</span>
															<span>
															<?php
																if ( get_field( 'zavod_izgotovitel', $post->ID ) ): ?>
																<?php the_field( 'zavod_izgotovitel' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Страна бренда</span>
															<span>
															<?php
																if ( get_field( 'strana_brenda', $post->ID ) ): ?>
																<?php the_field( 'strana_brenda' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Ионизация</span>
															<span>
															<?php
																if ( get_field( 'ionizacziya', $post->ID ) ): ?>
																<?php the_field( 'ionizacziya' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Уровень шума</span>
															<span>
															<?php
																if ( get_field( 'uroven_shuma', $post->ID ) ): ?>
																<?php the_field( 'uroven_shuma' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Тип компрессора</span>
															<span>
															<?php
																if ( get_field( 'tip_kompressora', $post->ID ) ): ?>
																<?php the_field( 'tip_kompressora' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Класс энергоэффективности</span>
															<span>
															<?php
																if ( get_field( 'klass_energoeffektivnosti', $post->ID ) ): ?>
																<?php the_field( 'klass_energoeffektivnosti' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Wi-Fi</span>
															<span>
															<?php
																if ( get_field( 'wi-fi', $post->ID ) ): ?>
																<?php the_field( 'wi-fi' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Марка компрессора</span>
															<span>
															<?php
																if ( get_field( 'tajmer', $post->ID ) ): ?>
																<?php the_field( 'tajmer' ); ?>
															<?php endif; ?>
															</span>
														</li>
													</ul>
													<!-- End Tech -->
											</div>
										</div>
										<!-- END TAB -->
									</div>
									<div class="top__card__header__title__bottom">
										<?php
													if ( get_field( 'garanty', $post->ID ) ): ?>
													<p><?php the_field( 'garanty' ); ?></p>
												<?php endif; ?>
										<div class="url"><a href="/brands/<?php echo $brand_slug; ?>/">Все серии</a> <a class="orange" href="<?php echo get_permalink(); ?>">ПОЛНЫЕ характеристики ОЗНАКОМЬТЕСЬ!!!</a></div>
									</div>
								</div>
							</div>
							<div class="top__card__body">
								<!-- Table -->
								<table class="table">
									<thead>
										<tr>
											<td class="model">Модель</td>
											<td>Площадь, м<sup>2</sup></td>
											<td>Холод, квт</td>
											<td>Тепло, квт</td>
											<td class="size">Размер, мм</td>
											<td>Цена, руб</td>
											<td class="note">Примечание</td>
											<td></td>
										</tr>
										<tr>
											
										</tr>
									</thead>
									<tbody>
										<?php 
										$models = query_posts( array(
											'post_type' => 'models',
											'post_parent__in' => array($post->ID),
											'posts_per_page'=>-1, 
											'orderby'=>'post_title', 
											'order'=>'ASC',
										));
											if ($models) {
												foreach( $models as $model ){ 
										?>
										<tr>
											<td class="model"><p><?php echo esc_html($model->post_title); ?></p></td>
											<td class="square"><p>до <?php
																if ( $model_square = get_field( 'square', $model->ID ) ): ?>
																<?php echo the_field( 'square', $model->ID ); ?>
															<?php endif; ?></p>
												<p><?php 
													echo add_shortcode_skipao_mobile_model($model_square);
												?></p>
											</td>
											<td class="twin"><p><?php
																if ( get_field( 'cold', $model->ID ) ): ?>
																<?php echo the_field( 'cold', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="twin"><p><?php
																if ( get_field( 'hot', $model->ID ) ): ?>
																<?php echo the_field( 'hot', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="size"><p><?php
																if ( get_field( 'size', $model->ID ) ): ?>
																<?php echo the_field( 'size', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="price"><p><?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="note"><p><?php
																if ( get_field( 'primechanie', $model->ID ) ): ?>
																<?php echo the_field( 'primechanie', $model->ID ); ?>
															<?php else: echo 'В наличии'; endif; ?></p></td>
											<td class="buy">
												<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#add" 
													data-name="Заказать сплит-систему" 
data-title="<?php echo esc_html($brand_name .' '. $post->post_title); ?>"
													data-model="<?php echo esc_html($model->post_title); ?>"
													data-price="<?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?>">
													<img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg"> <span>Купить</span>
												</a>
											</td>
										</tr>
										<?php } } ?>
									</tbody>
								</table>
								<!-- End Table -->
							</div>
							
							
						</div>
						<!-- End Card -->
					<?php
						$i++;
						endwhile; wp_reset_postdata();
						endif;
					?>
					</div>
					<!-- End Tab2 -->
				</div>
				<div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
					<!-- Tab3 -->
					<div class="product__carousel init">
					<?php 
						$query = new WP_Query(array ( 'tax_query' => array(
							array(
								'taxonomy' => 'brands',
								'field'    => 'id',
								'terms'    => 94
							)
							), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
							if ($query->have_posts()):
							$i = 20;
							while ( $query->have_posts() ) : $query->the_post();

							$term_list = wp_get_post_terms( $post->ID, 'brands', array('fields' => 'all') );
							foreach($term_list as $term) {
								if ($term->slug != 'top' &&  $term->slug != 'price' &&  $term->slug != 'recent' &&  $term->slug != 'inventor') {
									$brand_slug = $term->slug;
									$brand_name = $term->name;
									$brand_id = $term->term_id;
								}
							}							
							$post_tumb = get_post_thumbnail_id( $post->ID );
					?>
						<!-- Card -->
						<div class="top__card">
							<div class="top__card__header">
								<div class="top__card__header__img">
									<a data-fancybox href="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>">
										<img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" alt="<?php echo the_title(); ?>">
									</a>
								</div>
								<div class="top__card__header__title">
									<div class="top__card__header__title__wrap">
										<div class="top__card__header__title__caption">
											<h3><a href="/brands/<?php echo $brand_slug; ?>/"><?php echo $brand_name; ?></a> <?php echo the_title(); ?></h3>
										</div>
										<!-- TAB -->
										<div class="top__card__header__title__caption__tabs">
											<ul class="nav nav-pills" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about<?php echo $i; ?>" role="tab" aria-controls="pills-about" aria-selected="true">Описание</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-tech-tab" data-toggle="pill" href="#pills-tech<?php echo $i; ?>" role="tab" aria-controls="pills-tech" aria-selected="false">Характеристики</a>
												</li>
											</ul>
											<div class="top__card__header__title__caption__tabs__warrantly">
												<p><b>Звоните:</b> <a class="phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
											</div>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade" id="pills-about<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-top-about">
												<div class="slice brand__about">
													<?php echo the_excerpt(); ?>
												</div>
											</div>
											<div class="tab-pane fade show active" id="pills-tech<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-tech-tab">
													<!-- Start Tech -->
													<ul class="tech__list">
														<li class="tech__list__item">
															<span>Завод изготовитель</span>
															<span>
															<?php
																if ( get_field( 'zavod_izgotovitel', $post->ID ) ): ?>
																<?php the_field( 'zavod_izgotovitel' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Страна бренда</span>
															<span>
															<?php
																if ( get_field( 'strana_brenda', $post->ID ) ): ?>
																<?php the_field( 'strana_brenda' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Ионизация</span>
															<span>
															<?php
																if ( get_field( 'ionizacziya', $post->ID ) ): ?>
																<?php the_field( 'ionizacziya' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Уровень шума</span>
															<span>
															<?php
																if ( get_field( 'uroven_shuma', $post->ID ) ): ?>
																<?php the_field( 'uroven_shuma' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Тип компрессора</span>
															<span>
															<?php
																if ( get_field( 'tip_kompressora', $post->ID ) ): ?>
																<?php the_field( 'tip_kompressora' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Класс энергоэффективности</span>
															<span>
															<?php
																if ( get_field( 'klass_energoeffektivnosti', $post->ID ) ): ?>
																<?php the_field( 'klass_energoeffektivnosti' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Wi-Fi</span>
															<span>
															<?php
																if ( get_field( 'wi-fi', $post->ID ) ): ?>
																<?php the_field( 'wi-fi' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Марка компрессора</span>
															<span>
															<?php
																if ( get_field( 'tajmer', $post->ID ) ): ?>
																<?php the_field( 'tajmer' ); ?>
															<?php endif; ?>
															</span>
														</li>
													</ul>
													<!-- End Tech -->
											</div>
										</div>
										<!-- END TAB -->
									</div>
									<div class="top__card__header__title__bottom">
										<?php
													if ( get_field( 'garanty', $post->ID ) ): ?>
													<p><?php the_field( 'garanty' ); ?></p>
												<?php endif; ?>
										<div class="url"><a href="/brands/<?php echo $brand_slug; ?>/">Все серии</a> <a class="orange" href="<?php echo get_permalink(); ?>">ПОЛНЫЕ характеристики ОЗНАКОМЬТЕСЬ!!!</a></div>
									</div>
								</div>
							</div>
							<div class="top__card__body">
								<!-- Table -->
								<table class="table">
									<thead>
										<tr>
											<td class="model">Модель</td>
											<td>Площадь, м<sup>2</sup></td>
											<td>Холод, квт</td>
											<td>Тепло, квт</td>
											<td class="size">Размер, мм</td>
											<td>Цена, руб</td>
											<td class="note">Примечание</td>
											<td></td>
										</tr>
										<tr>
											
										</tr>
									</thead>
									<tbody>
										<?php 
										$models = query_posts( array(
											'post_type' => 'models',
											'post_parent__in' => array($post->ID),
											'posts_per_page'=>-1, 
											'orderby'=>'post_title', 
											'order'=>'ASC',
										));
											if ($models) {
												foreach( $models as $model ){ 
										?>
										<tr>
											<td class="model"><p><?php echo esc_html($model->post_title); ?></p></td>
											<td class="square"><p>до <?php
																if ( $model_square = get_field( 'square', $model->ID ) ): ?>
																<?php echo the_field( 'square', $model->ID ); ?>
															<?php endif; ?></p>
												<p><?php 
													echo add_shortcode_skipao_mobile_model($model_square);
												?></p>
											</td>
											<td class="twin"><p><?php
																if ( get_field( 'cold', $model->ID ) ): ?>
																<?php echo the_field( 'cold', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="twin"><p><?php
																if ( get_field( 'hot', $model->ID ) ): ?>
																<?php echo the_field( 'hot', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="size"><p><?php
																if ( get_field( 'size', $model->ID ) ): ?>
																<?php echo the_field( 'size', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="price"><p><?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="note"><p><?php
																if ( get_field( 'primechanie', $model->ID ) ): ?>
																<?php echo the_field( 'primechanie', $model->ID ); ?>
															<?php else: echo 'В наличии'; endif; ?></p></td>
											<td class="buy">
												<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#add" 
													data-name="Заказать сплит-систему" 
													data-title="<?php echo esc_html($brand_name .' '. $post->post_title); ?>"
													data-model="<?php echo esc_html($model->post_title); ?>"
													data-price="<?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?>">
													<img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg"> <span>Купить</span>
												</a>
											</td>
										</tr>
										<?php } } ?>
									</tbody>
								</table>
								<!-- End Table -->
							</div>
							
							
						</div>
						<!-- End Card -->
					<?php
						$i++;
						endwhile; wp_reset_postdata();
						endif;
					?>
					</div>
					<!-- End Tab3 -->
				</div>
				<div class="tab-pane fade" id="pills-invertor" role="tabpanel" aria-labelledby="pills-invertor-tab"> 
					<!-- Tab4 -->
					<div class="product__carousel init">
					<?php 
						$query = new WP_Query(array ( 'tax_query' => array(
							array(
								'taxonomy' => 'brands',
								'field'    => 'id',
								'terms'    => 95
							)
							), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1));
							if ($query->have_posts()):
							$i = 30;
							while ( $query->have_posts() ) : $query->the_post();

							$term_list = wp_get_post_terms( $post->ID, 'brands', array('fields' => 'all') );
							foreach($term_list as $term) {
								if ($term->slug != 'top' &&  $term->slug != 'price' &&  $term->slug != 'recent' &&  $term->slug != 'inventor') {
									$brand_slug = $term->slug;
									$brand_name = $term->name;
									$brand_id = $term->term_id;
								}
							}							
							$post_tumb = get_post_thumbnail_id( $post->ID );
					?>
						<!-- Card -->
						<div class="top__card">
							<div class="top__card__header">
								<div class="top__card__header__img">
									<a data-fancybox href="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>">
										<img src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" alt="<?php echo the_title(); ?>">
									</a>
								</div>
								<div class="top__card__header__title">
									<div class="top__card__header__title__wrap">
										<div class="top__card__header__title__caption">
											<h3><a href="/brands/<?php echo $brand_slug; ?>/"><?php echo $brand_name; ?></a> <?php echo the_title(); ?></h3>
										</div>
										<!-- TAB -->
										<div class="top__card__header__title__caption__tabs">
											<ul class="nav nav-pills" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about<?php echo $i; ?>" role="tab" aria-controls="pills-about" aria-selected="true">Описание</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-tech-tab" data-toggle="pill" href="#pills-tech<?php echo $i; ?>" role="tab" aria-controls="pills-tech" aria-selected="false">Характеристики</a>
												</li>
											</ul>
											<div class="top__card__header__title__caption__tabs__warrantly">
												<p><b>Звоните:</b> <a class="phone" href="tel:<?php echo $options['phone']; ?>"><?php echo $options['phone']; ?></a></p>
											</div>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade" id="pills-about<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-top-about">
												<div class="slice brand__about">
													<?php echo the_excerpt(); ?>
												</div>
											</div>
											<div class="tab-pane fade show active" id="pills-tech<?php echo $i; ?>" role="tabpanel" aria-labelledby="pills-tech-tab">
													<!-- Start Tech -->
													<ul class="tech__list">
														<li class="tech__list__item">
															<span>Завод изготовитель</span>
															<span>
															<?php
																if ( get_field( 'zavod_izgotovitel', $post->ID ) ): ?>
																<?php the_field( 'zavod_izgotovitel' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Страна бренда</span>
															<span>
															<?php
																if ( get_field( 'strana_brenda', $post->ID ) ): ?>
																<?php the_field( 'strana_brenda' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Ионизация</span>
															<span>
															<?php
																if ( get_field( 'ionizacziya', $post->ID ) ): ?>
																<?php the_field( 'ionizacziya' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Уровень шума</span>
															<span>
															<?php
																if ( get_field( 'uroven_shuma', $post->ID ) ): ?>
																<?php the_field( 'uroven_shuma' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Тип компрессора</span>
															<span>
															<?php
																if ( get_field( 'tip_kompressora', $post->ID ) ): ?>
																<?php the_field( 'tip_kompressora' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Класс энергоэффективности</span>
															<span>
															<?php
																if ( get_field( 'klass_energoeffektivnosti', $post->ID ) ): ?>
																<?php the_field( 'klass_energoeffektivnosti' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Wi-Fi</span>
															<span>
															<?php
																if ( get_field( 'wi-fi', $post->ID ) ): ?>
																<?php the_field( 'wi-fi' ); ?>
															<?php endif; ?>
															</span>
														</li>
														<li class="tech__list__item">
															<span>Марка компрессора</span>
															<span>
															<?php
																if ( get_field( 'tajmer', $post->ID ) ): ?>
																<?php the_field( 'tajmer' ); ?>
															<?php endif; ?>
															</span>
														</li>
													</ul>
													<!-- End Tech -->
											</div>
										</div>
										<!-- END TAB -->
									</div>
									<div class="top__card__header__title__bottom">
										<?php
													if ( get_field( 'garanty', $post->ID ) ): ?>
													<p><?php the_field( 'garanty' ); ?></p>
												<?php endif; ?>
										<div class="url"><a href="/brands/<?php echo $brand_slug; ?>/">Все серии</a> <a class="orange" href="<?php echo get_permalink(); ?>"> ПОЛНЫЕ характеристики ОЗНАКОМЬТЕСЬ!!!</a></div>
									</div>
								</div>
							</div>
							<div class="top__card__body">
								<!-- Table -->
								<table class="table">
									<thead>
										<tr>
											<td class="model">Модель</td>
											<td>Площадь, м<sup>2</sup></td>
											<td>Холод, квт</td>
											<td>Тепло, квт</td>
											<td class="size">Размер, мм</td>
											<td>Цена, руб</td>
											<td class="note">Примечание</td>
											<td></td>
										</tr>
										<tr>
											
										</tr>
									</thead>
									<tbody>
										<?php 
										$models = query_posts( array(
											'post_type' => 'models',
											'post_parent__in' => array($post->ID),
											'posts_per_page'=>-1, 
											'orderby'=>'post_title', 
											'order'=>'ASC',
										));
											if ($models) {
												foreach( $models as $model ){ 
										?>
										<tr>
											<td class="model"><p><?php echo esc_html($model->post_title); ?></p></td>
											<td class="square"><p>до <?php
																if ( $model_square = get_field( 'square', $model->ID ) ): ?>
																<?php echo the_field( 'square', $model->ID ); ?>
															<?php endif; ?></p>
												<p><?php 
													echo add_shortcode_skipao_mobile_model($model_square);
												?></p>
											</td>
											<td class="twin"><p><?php
																if ( get_field( 'cold', $model->ID ) ): ?>
																<?php echo the_field( 'cold', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="twin"><p><?php
																if ( get_field( 'hot', $model->ID ) ): ?>
																<?php echo the_field( 'hot', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="size"><p><?php
																if ( get_field( 'size', $model->ID ) ): ?>
																<?php echo the_field( 'size', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="price"><p><?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?></p></td>
											<td class="note"><p><?php
																if ( get_field( 'primechanie', $model->ID ) ): ?>
																<?php echo the_field( 'primechanie', $model->ID ); ?>
															<?php else: echo 'В наличии'; endif; ?></p></td>
											<td class="buy">
												<a href="#" class="btn btn-accent" data-toggle="modal" data-target="#add" 
													data-name="Заказать сплит-систему" 
													data-title="<?php echo esc_html($post->post_title); ?>"
													data-model="<?php echo esc_html($model->post_title); ?>"
													data-price="<?php
																if ( get_field( 'price', $model->ID ) ): ?>
																<?php echo the_field( 'price', $model->ID ); ?>
															<?php endif; ?>">
													<img src="<?php echo get_template_directory_uri(); ?>/img/shopping-cart.svg"> <span>Купить</span>
												</a>
											</td>
										</tr>
										<?php } } ?>
									</tbody>
								</table>
								<!-- End Table -->
							</div>
							
							
						</div>
						<!-- End Card -->
					<?php
						$i++;
						endwhile; wp_reset_postdata();
						endif;
					?>
					</div>
					<!-- End Tab4 -->
				</div>
			</div>

		</div>
	</section>
<!-- Top products -->

<!-- Recent posts -->
	<section class="how lazy" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/how.jpg')">
		<div class="container">
			<div class="row">
			<?php #Данный блок редактируется в админке -> Записи с рубрикой Советы
				$query = new WP_Query( array( 'category__in' => array(3), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 2 ) );	
					if ($query->have_posts()):
						$i = 1;
					while ( $query->have_posts() ) : $query->the_post();
			?>
				<div class="col-lg-4 <?php if ($i == 1) { echo 'left'; } else { echo 'offset-lg-4 right'; } ?>">
					<h4><?php echo the_title(); ?></h4>
					<div class="desc">
						<?php echo the_excerpt(); ?>
						<p><a href="<?php echo get_permalink(); ?>" class="btn btn-outline-dark">читать</a></p>
					</div>
				</div>
			<?php
			$i++;
				endwhile; wp_reset_postdata();
				endif;
			?>
			</div>
		</div>
	</section>
<!-- End Recent posts -->

<!-- Brands list -->
	<section class="brands__list">
		<div class="container">
			<h3 class="h2__title liner">
				Выберите интересующий бренд
			</h3>

			<div class="brands__list__row hide_description">
			<?php $brands = get_terms( 'brands' );

				if( $brands && ! is_wp_error($brands) ){
					foreach( $brands as $brand ){ 
						$post_tumb = get_post_thumbnail_id( $post->ID );
						$url = get_term_link( $brand->term_id, 'brands' ); 
						
						if ( $brand->term_id < 92 ||  $brand->term_id > 95 ) { ?>

				<div class="brands__list__row__col">
					<a href="<?php echo $url; ?>">
						<div class="brand__img">
							<img class="lazy" data-src="<?php echo get_field('img', 'brands_'. $brand->term_id); ?>" src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="<?php echo $brand->name; ?>"></div>
						<span><?php echo $brand->name; ?></span>
					</a>
				</div>

				<?php } } } ?>
			</div>

			<div class="show_description"></div>
			
		</div>
	</section>
<!-- End Brands list -->


<!-- Features -->
	<section class="features">
		<div class="container">
			<h3 class="h2__title liner">
				Для Вас
			</h3>
			<div class="row align-items-center">
				<?php #Данный блок редактируется в админке -> Страницы -> Наши акции
					$query = new WP_Query('page_id=6009&post_type=page');
						if ($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post();
						$post_tumb = get_post_thumbnail_id( $post->ID );
				?>
				<div class="col-md-6">
					<div class="features__sale" style="background-image: url('<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>')">
						<h5><?php echo the_title(); ?></h5>
						<?php echo the_content(); ?>
						<a href="/sale/" class="btn btn-outline-white">Подробнее</a>
					</div>
				</div>
				<?php
					endwhile; wp_reset_postdata();
					endif;
				?>
				<?php #Данный блок редактируется в админке -> Страницы -> Для вас
					$query = new WP_Query('page_id=40&post_type=page');
						if ($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post();
						$post_tumb = get_post_thumbnail_id( $post->ID );
				?>
				<div class="col-md-6">
					<div class="row">
						<?php echo the_content(); ?>
					</div>
				</div>
				<?php
					endwhile; wp_reset_postdata();
					endif;
				?>
			</div>
		</div>
	</section>
	<div class="divider"></div>
<!-- End Features -->

<!-- Services -->
	<section class="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="h2__title liner">Услуги компнаии</div>
						<div class="row">
						<?php #Данный блок редактируется в админке -> Записи с рубрикой Услуги
							$query = new WP_Query( array( 'category__in' => array(4), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 4 ) );	
								if ($query->have_posts()):
								while ( $query->have_posts() ) : $query->the_post();
						?>
							<div class="col-md-6">
								<a href="<?php echo get_permalink(); ?>" class="services__card">
									<div class="services__card__title">
										<img src="<?php echo get_template_directory_uri(); ?>/img/check.svg" alt="">
										<p>
											<?php echo the_title(); ?>
										</p>
									</div>
									<p>
										<?php echo the_excerpt(); ?>
									</p>
								</a>
							</div>
						<?php
							endwhile; wp_reset_postdata();
							endif;
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="h2__title liner">Наши работы</div>
						<div class="our__work">
						<?php #Данный блок редактируется в админке -> Страницы -> Наши работы
							$query = new WP_Query('page_id=53&post_type=page');
								if ($query->have_posts()):
								while ( $query->have_posts() ) : $query->the_post();
						?>
							<?php echo the_content(); ?>
						<?php
							endwhile; wp_reset_postdata();
							endif;
						?>

					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End Services -->

<!-- Callback form -->
	<?php
		#Данный блок редактируется в админке -> вкладка Компания
	?>
	<section class="callform is-front-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-4 left">
					<h5><?php echo $options['callform_title']; ?></h5>
					<p><?php echo $options['callform_desc']; ?></p>
					<form action="/" method="post" class="callback__form">
						<div class="callform_row">
							<input type="text" name="name" class="form-control col-md-4" value="" placeholder="Ваше имя" required>
							<input type="text" name="phone" class="form-control col-md-4 tel" value="" placeholder="Телефон" required>
							<button type="submit" class="btn btn-dark col-md-4 callback__form__button">Отправить</button>
						</div>
						<div class="robot">
							<div class="robot__check">
								<svg viewBox="0 0 60 60">
									<line class="st0 line1" x1="4.5" y1="30.5" x2="29.5" y2="52.5"/>
									<line class="st0 line2" x1="56.5" y1="4.5" x2="29.5" y2="52.5"/>
								</svg>
							</div>
							<span>Я согласен(а) с условиями <a href="/policy/">передачи информации</a></span>
						</div>
					</form>
				</div>
				<div class="right">
					<img src="<?php echo $options['callform_img']; ?>" alt="">
				</div>
			</div>
		</div>
	</section>
<!-- End Callback form -->

<!-- News -->
	<section class="blog">
		<div class="container">
			<h5 class="h2__title liner">
				Полезные статьи
			</h5>

			<div class="row slice">
			<?php #Данный блок редактируется в админке -> Записи с рубрикой Услуги
						$query = new WP_Query( array( 'category__in' => array(5), 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 ) );	
							if ($query->have_posts()):
							while ( $query->have_posts() ) : $query->the_post();
							$post_tumb = get_post_thumbnail_id( $post->ID );
					?>
				<div class="col-md-4">
					<div class="img__wrapper">
						<a href="<?php echo get_permalink(); ?>"><img class="lazy" data-src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" alt="<?php echo the_title(); ?>"></a>
					</div>
					<a href="<?php echo get_permalink(); ?>"><strong class="the_title"><?php echo the_title(); ?></strong></a>
					<div class="the_excerpt"><?php echo the_excerpt(); ?></div>
					<a href="<?php echo get_permalink(); ?>" class="btn btn-outline-accent">Подробнее</a>
				</div>
				<?php
					endwhile; wp_reset_postdata();
					endif;
				?>
				

				<div class="col-12 text-center">
					<a href="/category/news/" class="btn btn-accent">Все новости</a>
				</div>
			</div>
		</div>
	</section>
<!-- End News -->

<!-- Seo -->
	<section class="single_page">
		<div class="container">
		<?php #Данный блок редактируется в админке -> Страницы -> Для вас
			$query = new WP_Query('page_id=5960&post_type=page');
				if ($query->have_posts()):
				while ( $query->have_posts() ) : $query->the_post();
				$post_tumb = get_post_thumbnail_id( $post->ID );
		?>
			<h3 class="h2__title liner">
				<?php echo the_title(); ?>
			</h2>
			<?php echo the_content(); ?>
		<?php
			endwhile; wp_reset_postdata();
			endif;
		?>
		</div>
	</section>
<!-- End Seo -->

<?php get_footer(); ?>
		