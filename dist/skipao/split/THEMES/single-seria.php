<?php 
/**
* The template for displaying all single posts
*
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); 

$options = get_option( 'skipao_settings' );
		
		$id = $post->ID; 
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
	<div class="breadcrumb">
		<a href="/">Главная</a> > <a href="/brands/">Бренды</a> > <a href="/brands/<?php echo $brand_slug; ?>/"><?php echo $brand_name; ?></a> > <?php echo the_title(); ?>
	</div>

	<!-- Top ptoducts -->
		<section class="top__product">
			<div class="container">
				<h1 class="h2__title liner">Сплит система <?php echo $brand_name; ?> <?php echo the_title(); ?></h1>
					
				<div class="product__carousel">
					<!-- Card -->
					<div class="top__card" id="<?php echo $i; ?>">
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
														<span>Таймер</span>
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
										'posts_per_page'=>13, 
										'orderby'=>'post_title', 
										'order'=>'ASC',
									));
										if ($models) {
											foreach( $models as $model ){ ?>
									<tr>
										<td class="model"><p><?php echo esc_html($model->post_title); ?></p></td>
										<td class="square"><p> до<?php
															if ( get_field( 'square', $model->ID ) ): ?>
															<?php echo the_field( 'square', $model->ID ); ?>
														<?php endif; ?></p>
														<p><?php 
												if ( get_field( 'square', $model->ID ) <= '20') {
													echo '07';
												}
												if ( get_field( 'square', $model->ID ) == '22') {
													echo '08';
												}
												else if ( get_field( 'square', $model->ID ) <= '27') {
													echo '09';
												}
												else if ( get_field( 'square', $model->ID ) <= '33') {
													echo '11';
												}
												else if ( get_field( 'square', $model->ID ) <= '36') {
													echo '12';
												}
												else if ( get_field( 'square', $model->ID ) <= '40') {
													echo '13';
												}
												else if ( get_field( 'square', $model->ID ) == '40') {
													echo '14';
												}
												else if ( get_field( 'square', $model->ID ) <= '56') {
													echo '18';
												}
												else if ( get_field( 'square', $model->ID ) <= '72') {
													echo '24';
												}
												else if ( get_field( 'square', $model->ID ) <= '90') {
													echo '30';
												}
												else if ( get_field( 'square', $model->ID ) <= '110') {
													echo '36';
												}
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
														<?php endif; ?></p></td>
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
				
				</div>

			</div>
		</section>
	<!-- Top products -->

	<!-- Single content -->
		<section class="seria_about">
			<div class="container">
				<?php 
					$query = new WP_Query(array ( 
						'post_type' => 'seria', 
						'post__in'  => array($id)
					));
						if ($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post();

						$images = get_post_meta($post->ID, 'vdw_gallery_id', true); 
						$youtube = get_field( 'youtube', $post->ID ); 
					?>
					<div class="row">
						<div class="col-12 <?php echo ($images || $youtube) ? ' col-md-7' : ''; ?>">
							<?php echo the_content(); ?>
						</div>
						<div class="col-12 <?php echo ($images || $youtube) ? ' col-md-5' : ''; ?>">
						<?php 
							if ($images) {
								$i = 0;
								foreach ($images as $image) {
									//echo wp_get_attachment_url($image, 'large');
									//echo wp_get_attachment_image($image, 'large');
									?>
									<a <?php echo ($i > 0) ? 'style="display: none;"' : 'class="seria_about__img"'; ?> data-fancybox="gallary" href="<?php echo wp_get_attachment_url($image, 'large'); ?>">
										<img src="<?php echo wp_get_attachment_url($image, 'large'); ?>" alt="<?php echo the_title(); ?>">
									</a>
									<?php $i++;
								}
							}
						?>
						<?php if ($youtube) { ?>
							<iframe width="100%" height="250px" src="https://www.youtube.com/embed/<?php the_field( 'youtube' ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<?php } ?>
						</div>
					</div>

				
				<?php
					endwhile; wp_reset_postdata();
					endif;
				?>
			</div>
		</section>
	<!-- End Single content -->

<!-- Callback form -->
	<?php
		#Данный блок редактируется в админке -> вкладка Компания
	?>
	<section class="callform">
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



	

<?php get_footer(); ?>
		