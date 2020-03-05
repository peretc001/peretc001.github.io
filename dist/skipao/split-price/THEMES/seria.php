<?php 
/**
* The template for displaying seria
* Theme Name: Skipao
*
* @package WordPress
* @subpackage skipao
* @author https://krasovsky23.ru
*/

get_header(); 

	while ( have_posts() ) :
		the_post(); ?>
		<section class="single_page">
			<div class="container">
			123
				<h1 class="h2__title"><?php echo the_title(); ?></h1>
				<?php echo the_content(); ?>
			</div>
		</section>

	<?php endwhile;

		

get_footer(); ?>
		