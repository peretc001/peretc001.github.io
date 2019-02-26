<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package okhall
 */

get_header();
?>
<p class="text-center"><b>Блог</b></p>

	<?php
		if ( have_posts() ) : 

			if ( is_home() && ! is_front_page() ) : get_template_part( 'template-parts/content', 'blog' ); endif;

			else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
	?>

<?php
get_sidebar();
get_footer();
