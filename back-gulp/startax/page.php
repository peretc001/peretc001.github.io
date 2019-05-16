<?php //echo $post->ID; ?>
<?php if(!is_user_logged_in() && in_array($post->ID, array(5130,5913))): ?>

<?php

	// hide pages by id
	// http://startaks.ru/novaya-produkciya/
	// http://startaks.ru/actions/
	
	/*global $wp_query;
	$wp_query->set_404();
	status_header(404);
	get_template_part(404);*/
	wp_safe_redirect(get_page_link(47));
	exit();

?>

<?php else: ?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php echo dimox_breadcrumbs($home=''); ?>
	
	<div class="block__content"><div class="container">
			
		<div class="wp-content">
			<?php the_content(''); ?>
		</div>
			
	</div></div>
	
	<?php endwhile; endif; ?>

<?php get_footer(); ?>

<?php endif; ?>