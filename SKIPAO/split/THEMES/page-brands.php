<?php 
/**
* The template for displaying taxonomy brands
* Template Name: brands
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); 
$options = get_option( 'skipao_settings' ); ?>

<!-- Brands list -->
	<section class="brands__list">
		<div class="container">
			<h3 class="h2__title liner">
				Выберите интересующий бренд
			</h3>

			<div class="brands__list__row">
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
			
		</div>
	</section>
<!-- End Brands list -->


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