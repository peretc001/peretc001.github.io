<?php 
/**
* The template for displaying all single posts
*
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); ?>

<?php
	while ( have_posts() ) :
		the_post(); 
		$post_tumb = get_post_thumbnail_id( $post->ID );
?>
	<section class="single_page">
		<div class="container">
			<h1 class="h2_title"><?php echo the_title(); ?></h1>
			<?php echo the_content(); ?>
		</div>
	</section>

<?php endwhile;

		

get_footer(); ?>
		