<?php
/**
 * The template for displaying pages
 *
 *
 * @package WordPress
 * @subpackage Optimazed
 */

get_header(); ?>

<section class="page">
	<div class="container">

	<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
			<h1 class="h2_title"><?php the_title(); ?></h1>
			<?php the_content(); ?>

	<?php endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>
