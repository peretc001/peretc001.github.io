<?php 
/**
 * The template for displaying PAGE
 *
 * 
 * @link https://peretc001.github.io
 * @author Krasovsky
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); 
	$cat = get_the_category($post->ID);
	$current = $cat[0]->term_id;
	$category = $cat[0]->cat_name;
	$slug = $cat[0]->slug;
?>
	<section class="single">
		<div class="container">
			<div class="breadcrumbs">
				<a href="/">Главная</a> > <?php the_title(); ?>
			</div>
			<?php 
				while ( have_posts() ) : the_post();
			?>
			<h1><?php the_title(); ?></h1>	
			<?php the_content(); ?>
			<?php 
				endwhile; 
			?>
		</div>
	</section>	
<?php get_footer(); ?>