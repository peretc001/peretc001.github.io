<?php
/**
 * The template for displaying all pages
 *
 * @package WordPress
 * @subpackage Krasovsky
 * @since 1.0
 * @version 1.0
 */

get_header()?>
<section class="page">
	<div class="container">
	<?
	while ( have_posts() ) : the_post()?>

		<?=the_content()?>

	<?endwhile?>
	</div>
</section>
<?php get_footer();
