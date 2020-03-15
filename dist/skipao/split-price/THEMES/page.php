<?php 
/**
* The template for displaying all single posts
*
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); ?>
<div class="breadcrumb">
	<a href="/">Главная</a> > <?php echo the_title(); ?>
</div>

<?php
	while ( have_posts() ) :
		the_post(); 
		$polyprom = $post->post_parent; 
		$pageID = $post->ID?>
		<section class="single_page<?php echo is_page(5770) ? ' oplata' : ''; ?>">
			<div class="container">
				<h1 class="h2__title liner"><?php echo the_title(); ?></h1>
				<?php echo the_content(); ?>
				<? 
				if ( get_field( 'polyprom-card', $post->ID ) ): 
					$seria = get_field( 'polyprom-card', $post->ID );

					foreach($seria as $s) {
						$term_list = wp_get_post_terms( $s, 'brands', array('fields' => 'all') );
						foreach($term_list as $term) {
							if ($term->slug != 'top' &&  $term->slug != 'price' &&  $term->slug != 'recent' &&  $term->slug != 'inventor') {
								$brand_slug = $term->slug;
								$brand_name = $term->name;
								$brand_id[] = $term->term_id;
							}
						}
					}
				endif;
			?>
			</div>
		</section>

	<?php endwhile; ?>

<? if ($polyprom == 19 || $pageID == 8122) { 
	$options = get_option( 'skipao_settings' ); ?>
	<section class="top__product">
		<div class="container">
			<div class="product__carousel">
		
			<?php 
				$query = new WP_Query(array (
					'post_type' => 'seria',
					'post__in'    => $seria,
					'tax_query' => array(
						array(
							'taxonomy' => 'brands',
							'field'    => 'id',
							'terms'    => $brand_id
						),
					),
					'orderby' => 'name', 'order' => 'ASC', 'posts_per_page' => -1));
					if ($query->have_posts()):
					$i = 0;
					while ( $query->have_posts() ) : $query->the_post();
					
					$post_tumb = get_post_thumbnail_id( $post->ID );
					
					$term_list = wp_get_post_terms( $post->ID, 'brands', array('fields' => 'all') );
					$term_link = get_term_link($term_list[0], 'brands');
			?>
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
							<h3><a href="<? echo $term_link; ?>"><?php echo $term_list[0]->name; ?></a> <?php echo the_title(); ?></h3>
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
						<div class="url"><a class="orange" href="<?php echo get_permalink(); ?>">ПОЛНЫЕ характеристики ОЗНАКОМЬТЕСЬ!!! </a></div>
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
		</div>
	</section>

	<!-- Callback form -->
	<?php #Данный блок редактируется в админке -> вкладка Компания ?>
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
<? } ?>		

<? get_footer(); ?>
		