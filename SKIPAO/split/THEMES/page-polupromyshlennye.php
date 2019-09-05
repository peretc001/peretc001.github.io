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
		the_post(); ?>
		<section class="polupromyshlennye">
			<div class="container">
				<h1 class="h2__title liner"><?php echo the_title(); ?></h1>
				<?php echo the_content(); ?>
				<div class="row">
				<?php 
					$query = new WP_Query('post_parent=19&post_type=page&orderby=date&order=ASC');
						if ($query->have_posts()):
						while ( $query->have_posts() ) : $query->the_post();
						$post_tumb = get_post_thumbnail_id( $post->ID );
				?>
					<div class="col-md-6">
						<div class="row">
							<div class="col-lg-4 align-self-center text-center">
								<img class="lazy" data-src="<?php echo wp_get_attachment_image_url( $post_tumb, 'full' ); ?>" src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="<?php echo the_title(); ?>">
							</div>
							<div class="col-lg-8 block">
								<h2><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h2>
								<div class="excerpt">
									<?php echo kama_excerpt( array('maxchar'=>100) ); ?>
								</div>
								<a href="<?php echo get_permalink(); ?>" class="btn btn-accent">Подробнее</a>
							</div>
						</div>
					</div>
				<?php
					endwhile; wp_reset_postdata();
					endif;
				?>
				</div>
			</div>
		</section>

	<?php endwhile;

		

get_footer(); ?>
		