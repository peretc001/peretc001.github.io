<?php /*
Template Name: Каталог
*/get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php echo dimox_breadcrumbs($home=''); ?>
	
	<div class="block__content"><div class="container">
			
		<div class="wp-content">
			<?php the_content(''); ?>
		</div>
			
	</div></div>
	
	<?php endwhile; endif; ?>

<?php get_footer(); ?>